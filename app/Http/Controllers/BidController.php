<?php

namespace App\Http\Controllers;

use Nexmo\Laravel\Facade\Nexmo;
use App\Library\Notification;
use Illuminate\Http\Request;
use App\AppNotification;
use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\OutputMode;
use OpenTok\ArchiveMode;
use App\CallDetails;
use App\ExtendCall;
use Validator;
use App\User;
use App\Bid;
use DB;
Use File;

class BidController extends Controller
{
    //

    function online_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idol_id' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $online_status = User::find($request->idol_id);
            $online_status->online_status = $request->status;
            $online_status->save();

            $update_details = array(
                'on_going' => 0
            );

            DB::table('bid')
                ->where('idol_id', $request->idol_id)
                ->update($update_details);


            return ['status' => 1, 'msg' => 'Online status change successfully.'];
        }
    }

    function show_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $online_status = User::find($request->user_id);
            if ($online_status) {
                return ['status' => 1, 'data' => $online_status->online_status, 'msg' => 'Success'];
            } else {
                return ['status' => 0, 'msg' => 'No such user exists.'];
            }
        }
    }

    function add_bid(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idol_id' => 'required',
            'fan_id' => 'required',
            'bid_amount_per_minute' => 'required',
            'minutes' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {

            //check where fan is online or not
            $online = User::find($request->idol_id);
            if($online->online_status == 0)
            {
                return ['status' => 0, 'msg' => "Fan is offline."];
            }

            $check_bid = Bid::with('fan_details')->where('idol_id', $request->idol_id)->where('on_going', 1)->where('win',0)->orderBy('id', 'DESC')->first();


            //return $check_bid;
            if ($check_bid) {
                if ($request->fan_id == $check_bid->fan_id) {
                    return ['status' => 0, 'msg' => 'Your bid already exists.'];
                } else if ($request->bid_amount_per_minute <= $check_bid->bid_amount_per_minute) {
                    return ['status' => 0, 'msg' => 'Your bid must be graterthan previous id'];
                } else {

                    Nexmo::message()->send([
                        'to'   => $check_bid->fan_details->phone,
                        'from' => '17819950336',
                        'text' => 'You are outbided'
                    ]);
                }
            }
            $bid = new Bid();
            $bid->idol_id = $request->idol_id;
            $bid->fan_id = $request->fan_id;
            $bid->bid_amount_per_minute = $request->bid_amount_per_minute;
            $bid->minutes = $request->minutes;
            $bid->total_amount = $request->minutes * $request->bid_amount_per_minute;
            $bid->save();

            $idol_details = User::find($request->idol_id);

            $fan_details = User::find($request->fan_id);
            $message = $fan_details->fname.' '.$fan_details->lname. ' bidded on your profile.';

            $notification = new Notification;
            $notification->send_add_bid_notification($idol_details->fcm_id,$message,$request->idol_id,$request->fan_id,$request->bid_amount_per_minute,$request->minutes,$bid->id,$fan_details->fname,$fan_details->lname);
        
            $appNotification = new AppNotification;
            $appNotification->user_id = $request->idol_id;
            $appNotification->message = $message;
            $appNotification->noti_id = 'bid-'.$bid->id;
            $appNotification->data = json_encode([
                'message' => $message,
                'idol_id' => $request->idol_id,
                'fan_id' => $request->fan_id,
                'bid_amount_per_minute' => $request->bid_amount_per_minute,
                'minutes' => $request->minutes,
                'id' => $bid->id,
                'fname' => $fan_details->fname,
                'lname' => $fan_details->lname,
                'noti_type' => 'add_bid'
            ]);
            $appNotification->save();

            return ['status' => 1, 'msg' => 'Bid added successfully.'];
        }
    }

    function current_bids(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idol_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {

            $bid_history = Bid::with('fan_details')->where('idol_id', $request->idol_id)->where('on_going', 1)->where('win',0)->orderBy('id', 'DESC')->get();

            if (count($bid_history) > 0) {
                return ['status' => 1, 'data' => $bid_history, 'msg' => 'Success.'];
            } else {
                return ['status' => 0, 'msg' => 'No bid history found.'];
            }
        }
    }

    function complete_bid(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idol_id' => 'required',
            'bid_id' => 'required',
            'room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $bid = Bid::find($request->bid_id);
            $bid->win = 1;
            $bid->save();

            $update_details = array(
                'on_going' => 0
            );

            // DB::table('bid')
            //     ->where('idol_id', $request->idol_id)
            //     ->update($update_details);

            $user = User::find($bid->fan_id);
            $idol_details = User::find($request->idol_id);

            Nexmo::message()->send([
                'to'   => $user->phone,
                'from' => '17819950336',
                'text' => 'You have won the bid'
            ]);
            //generate token
            $apiKey = 46441972;
            $apiSecret = "e32f3de72fa05503e0fe0778441dc73fadac75a4";
            $opentok = new OpenTok($apiKey, $apiSecret);
            $sessionOptions = array(
                'archiveMode' => ArchiveMode::ALWAYS,
                'mediaMode' => MediaMode::ROUTED
            );
            $session = $opentok->createSession($sessionOptions);
            $sessionId = $session->getSessionId();
            $token = $opentok->generateToken($sessionId, array('expireTime' => time() + ($bid->minutes * 60)));
            
            $temp = explode("-", $request->room_id);

            $call_details = new CallDetails;
            $call_details->from_id = $temp[1];
            $call_details->to_id = $temp[2];
            $call_details->room_id = $request->room_id;
            $call_details->minutes = $bid->minutes;
            $call_details->session = $sessionId;
            $call_details->token = $token;
            $call_details->bid_amount_per_minute = $bid->bid_amount_per_minute;
            $call_details->save();

            $message = $idol_details->fname.' '.$idol_details->lname." has accepted your bid. Click here to join the call.";
            $notification = new Notification;
            //$notification->send_notifcation($user->fcm_id,$message);
            // if($user->device_type == "ios")
            // {
            //     $notification->send_ios_call_notification($user->voip_token,$message,$sessionId,$token,$request->room_id,$bid->minutes,$idol_details->fname.' '.$idol_details->lname);
            // }
            // else
            // {
                $notification->send_call_notification($user->fcm_id,$message,$sessionId,$token,$request->room_id,$bid->minutes,$bid->bid_amount_per_minute);
            //}
            //new code expire
            $noti = AppNotification::where('noti_id','bid-'.$request->bid_id)->first();
            $noti->expire = 1;
            $noti->save();
            
            
            //end new code

            $appNotification = new AppNotification;
           $appNotification->user_id = $bid->fan_id;
           $appNotification->message = $message;
           $appNotification->noti_id = 'call-'.$call_details->id;
           $appNotification->data = json_encode([
                "message" => $message,
                "noti_type" => "call",
                "session_id" => $sessionId,
                "token" => $token,
                "room_id" => $request->room_id,
                "minutes" => $bid->minutes,
                "price" => $bid->bid_amount_per_minute
           ]);
           $appNotification->save();

            return ['status' => 1, 'data' => array('session' => $sessionId, 'token' => $token), 'msg' => 'Bid Accepted Successfully.'];
        }
    }

    function archived(Request $request)
    {
        $apiKey = 46441972;
            $apiSecret = "e32f3de72fa05503e0fe0778441dc73fadac75a4";
            $opentok = new OpenTok($apiKey, $apiSecret);
        $archive = $opentok->startArchive($request->session);


        // Create an archive using custom options
        $archiveOptions = array(
            'name' => 'Important Presentation',     // default: null
            'hasAudio' => true,                     // default: true
            'hasVideo' => true,                     // default: true
            'outputMode' => OutputMode::COMPOSED,   // default: OutputMode::COMPOSED
            'resolution' => '1280x720'              // default: '640x480'
        );
        $archive = $opentok->startArchive($sessionId, $archiveOptions);

        // Store this archiveId in the database for later use
        $archiveId = $archive->id;
        return $archiveId;
    }
    function notification_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $notification = CallDetails::with('user_details')->where('to_id', $request->user_id)->where('is_completed', 0)->orderBy('id', 'DESC')->first();
            $text_notification = AppNotification::where('user_id',$request->user_id)->orderBy('id','DESC')->get();
            if (count($notification) > 0 || count($text_notification) > 0) {
                return ['status' => 1, 'data' => $notification, 'notification' => $text_notification, 'msg' => 'Success'];
            } else {
                return ['status' => 0, 'msg' => 'No Notification available.'];
            }
        }
    }

    function end_call(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $notification = CallDetails::where('room_id', $request->room_id)->where('is_completed', 0)->orderBy('id', 'DESC')->first();
            $notification->is_completed = 1;
            $notification->save();

            //new code expire
            $noti = AppNotification::where('noti_id','call-'.$notification->id)->first();
            $noti->expire = 1;
            $noti->save();
            //end new code
            return ['status' => 1, 'msg' => 'Call Ended Successfully.'];
        }
    }

    function statistics(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idol_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $result = [];
            $users = Bid::with('fan_details')->where('idol_id',$request->idol_id)->where('win',1)->get()->unique('fan_id');
            
            foreach($users as $user)
            {
                $arr = ['name' => $user->fan_details->fname.' '.$user->fan_details->lname,'amount' => $user->total_amount,'rating' => rand(0,5)];
                array_push($result,$arr);
            }
            
            if(count($users) > 0)
            {
                return ['status' => 1, 'data' => $result, 'msg' => 'Success'];
            }
            else{
                return ['status' => 0, 'msg' => 'No data found.'];
            }
        }
    }

    function fan_statistics($id)
    {
            $result = [];
            $users = Bid::with('idol_details')->where('fan_id',$id)->where('win',1)->get()->unique('idol_id');

            foreach($users as $user)
            {
                $arr = ['name' => $user->fan_details->fname.' '.$user->fan_details->lname,'amount' => $user->total_amount,'rating' => rand(0,5)];
                array_push($result,$arr);
            }
            
            if(count($users) > 0)
            {
                return ['status' => 1, 'data' => $result, 'msg' => 'Success'];
            }
            else{
                return ['status' => 0, 'msg' => 'No data found.'];
            }
        
    }

    function extend_call(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id'=>'required',
            'minutes' => 'required',
            'amount' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $extend_call = new ExtendCall;
            $extend_call->room_id = $request->room_id;
            $extend_call->amount = $request->amount;
            $extend_call->minutes = $request->minutes;
            $extend_call->save();

            $temp = explode("-", $request->room_id);

            $user = User::find($temp[1]);
            $message = $request->name." has sent you a extend call request";
            $notification = new Notification;
            $notification->send_extend_call_request_notifcation($user->fcm_id,$message,$request->amount,$request->minutes,$extend_call->id);

            return ['status' => 1, 'msg' => 'Extend Call Request Send Successfully'];
        }
    }

    function accept_decline_extend_call(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id'=>'required',
            'call_id' => 'required',
            'status' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $extend_call = ExtendCall::find($request->call_id);
            $extend_call->status = $request->status;
            $extend_call->save();

            $temp = explode("-", $request->room_id);

            $user = User::find($temp[2]);

            if($request->status == 2)
            {
                $message = $request->name.' has decline your extend call request';
                $notification = new Notification;
                $notification->send_notifcation($user->fcm_id,$message);

                return ['stattus' => 1, 'msg' => 'Extend call decline successfully.'];
            }
            else
            {
                //generate token
                $apiKey = 46441972;
                $apiSecret = "e32f3de72fa05503e0fe0778441dc73fadac75a4";
                $opentok = new OpenTok($apiKey, $apiSecret);
                $session = $opentok->createSession();
                $sessionId = $session->getSessionId();
                $token = $opentok->generateToken($sessionId, array('expireTime' => time() + ($extend_call->minutes * 60)));

                $temp = explode("-", $request->room_id);

                $call_details = new CallDetails;
                $call_details->from_id = $temp[2];
                $call_details->to_id = $temp[1];
                $call_details->room_id = $request->room_id;
                $call_details->minutes = $extend_call->minutes;
                $call_details->session = $sessionId;
                $call_details->token = $token;
                $call_details->save();

                $message = $request->name." has accepted your extend call";
                $notification = new Notification;
                $notification->send_extend_call_notification($user->fcm_id,$message,$sessionId,$token,$request->room_id);

                return ['status' => 1, 'data' => ['session' => $sessionId,'token' => $token,'room_id' => $request->room_id],'msg' =>'success'];
            }
        }
    }

    function bonus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
           $bonus_number = rand(1,100);

           if($bonus_number == 10)
           {
               return ['status' => 1, 'msg' => 'You won'];
           }
           else
           {
               return ['status' => 0, 'msg' => 'You lost. Try next time.'];
           }
        }
    }

    function notification(Request $request)
    {
//          $message = "{
//   priority: 'high',
//   sound: 'default',
//   notification: {
//     title: 'Message Title',
//     body: 'Message Body',
//   },
//   android: { ... },
//   apns: {
//     headers: {  // Add these 3 lines
//       'apns-push-type': 'alert',
//     },
//     payload: {
//       aps: {
//         badge: 1,
//         sound: 'default',
//       },
//     },
//   },
//   tokens: [ ... ],
// }; 
//     }";
// Put your device token here (without spaces):


$deviceToken = '3D42D17AA8BB7D2BB61367BAA3A89C7E0E53D59F4AF9D8560CA561F9EA3B3C89';
//
// Put your private key's passphrase here:
$passphrase = '66HPAR4YCK';

// Put your alert message here:
$message = 'My first push notification!';

$ctx = stream_context_create();
//stream_context_set_option($ctx, 'ssl', 'local_cert', File::get(public_path() . '/VOIP.pem'));
stream_context_set_option($ctx, 'ssl', 'local_cert', 'C:\xampp\htdocs\idoltime\public\VOIP.pem');
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

// Open a connection to the APNS server
$fp = stream_socket_client(
//  'ssl://gateway.push.apple.com:2195', $err,
    'ssl://gateway.sandbox.push.apple.com:2195', $err,
    $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

if (!$fp)
    exit("Failed to connect: $err $errstr" . PHP_EOL);

echo 'Connected to APNS' . PHP_EOL;

// Create the payload body

// $body['callerID'] = array(
//                      'content-available'=> 1,
//                      'alert' => $message,
//                      'sound' => 'default',
//                      'badge' => 0,
//                      );
$body['callerID'] = "7016355417";
// Encode the payload as JSON

$payload = json_encode($body);

// Build the binary notification
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
$result = fwrite($fp, $msg, strlen($msg));

if (!$result)
    echo 'Message not delivered' . PHP_EOL;
else
    echo 'Message successfully delivered' . PHP_EOL;

// Close the connection to the server
fclose($fp);
    
}
}