<?php

namespace App\Library;

Class Notification
{
    public function send_notifcation($fcm_id,$message)
    {
        
       $arr = [
            "to" => $fcm_id,
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "notification"
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "notification"
            ]
            ];
        $data = json_encode($arr);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AIzaSyBjYcPtnv8CmLk63dYMPtZ8Ynygw0Hz5lU';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Oops! FCM Send Error: ' . curl_error($ch));
        // }
        curl_close($ch);
        return;
    }

    public function send_extend_call_request_notifcation($fcm_id,$message,$amount,$minutes,$call_id)
    {
        
       $arr = [
            "to" => $fcm_id,
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "extend_call_request",
                "amount" => $amount,
                "minutes" => $minutes,
                "call_id" => $call_id
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "extend_call_request",
                "amount" => $amount,
                "minutes" => $minutes,
                "call_id" => $call_id
            ]
            ];
        $data = json_encode($arr);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AIzaSyBjYcPtnv8CmLk63dYMPtZ8Ynygw0Hz5lU';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Oops! FCM Send Error: ' . curl_error($ch));
        // }
        curl_close($ch);
        return;
    }

    function send_extend_call_notification($fcm_id,$message,$session,$token,$room_id)
    {
        $arr = [
            "to" => $fcm_id,
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "extend_call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "extend_call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id
            ]
            ];
        $data = json_encode($arr);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AIzaSyBjYcPtnv8CmLk63dYMPtZ8Ynygw0Hz5lU';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Oops! FCM Send Error: ' . curl_error($ch));
        // }
        curl_close($ch);
        return;
    }

        function send_call_notification($fcm_id,$message,$session,$token,$room_id,$minutes,$price)
    {
        $arr = [
            "to" => $fcm_id,
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id,
                "minutes" => $minutes,
                "price" => $price
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id,
                "minutes" => $minutes,
                "price" => $price
            ]
            ];
        $data = json_encode($arr);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AIzaSyBjYcPtnv8CmLk63dYMPtZ8Ynygw0Hz5lU';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Oops! FCM Send Error: ' . curl_error($ch));
        // }
        curl_close($ch);
        return;
    }

    function send_ios_call_notification($fcm_id,$message,$session,$token,$room_id,$minutes,$name)
    {
       $deviceToken = $fcm_id;
        //
        // Put your private key's passphrase here:
        $passphrase = '66HPAR4YCK';

        // Put your alert message here:
        

        $ctx = stream_context_create();
        //stream_context_set_option($ctx, 'ssl', 'local_cert', File::get(public_path() . '/VOIP.pem'));
        stream_context_set_option($ctx, 'ssl', 'local_cert', '/home/Harsita/projects/idoltime/public/VOIP.pem');
        //stream_context_set_option($ctx, 'ssl', 'local_cert', 'C:\xampp\htdocs\idoltime\public\VOIP.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = stream_socket_client(
        //  'ssl://gateway.push.apple.com:2195', $err,
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        //echo 'Connected to APNS' . PHP_EOL;

        // Create the payload body

        // $body['callerID'] = array(
        //                      'content-available'=> 1,
        //                      'alert' => $message,
        //                      'sound' => 'default',
        //                      'badge' => 0,
        //                      );
        $body = 
        [
        "notification" => [
                "callerID" => $name,
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id,
                "minutes" => $minutes
            ],
            "data" => [
                "callerID" => $name,
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id,
                "minutes" => $minutes
            ]
            ];
        //$body['callerID'] = "7016355417";
        // Encode the payload as JSON

        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        // if (!$result)
        //     echo 'Message not delivered' . PHP_EOL;
        // else
        //     echo 'Message successfully delivered' . PHP_EOL;

        // Close the connection to the server
        fclose($fp);
        return;
    }

    public function send_add_bid_notification($fcm_id,$message,$idol_id,$fan_id,$amount,$minutes,$id,$fname,$lname)
    {
        
       $arr = [
            "to" => $fcm_id,
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "idol_id" => $idol_id,
                "fan_id" => $fan_id,
                "amount" => $amount,
                "minutes" => $minutes,
                "id" => $id,
                "fname" => $fname,
                "lname" => $lname,
                "noti_type" => "add_bid"
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "idol_id" => $idol_id,
                "fan_id" => $fan_id,
                "amount" => $amount,
                "minutes" => $minutes,
                "id" => $id,
                "fname" => $fname,
                "lname" => $lname,
                "noti_type" => "add_bid"
            ]
            ];
        $data = json_encode($arr);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AIzaSyBjYcPtnv8CmLk63dYMPtZ8Ynygw0Hz5lU';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Oops! FCM Send Error: ' . curl_error($ch));
        // }
        curl_close($ch);
        return;
    }

    public function send_shoutout_notifcation($fcm_id,$message,$idol_id,$fan_id,$description,$amount,$email,$phone,$id)
    {

       $arr = [
            "to" => $fcm_id,
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "idol_id" => $idol_id,
                "fan_id" => $fan_id,
                "amount" => $amount,
                "description" => $description,
                "email" => $email,
                "phone" => $phone,
                "id" => $id,
                "noti_type" => "add_shoutout"
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "idol_id" => $idol_id,
                "fan_id" => $fan_id,
                "amount" => $amount,
                "description" => $description,
                "email" => $email,
                "phone" => $phone,
                "id" => $id,
                "noti_type" => "add_shoutout"
            ]
            ];
        $data = json_encode($arr);
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = 'AIzaSyBjYcPtnv8CmLk63dYMPtZ8Ynygw0Hz5lU';
        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Oops! FCM Send Error: ' . curl_error($ch));
        // }
        curl_close($ch);
        return;
    }

    public function send_ios_call_notification1($fcm_id,$message,$session,$token,$room_id,$minutes,$name)
    {
       // $deviceToken = '5DB9FC44A3C4A28313700A98BD38D2AE46A820100C7157390C05C0AF8E5F90C1';
       $deviceToken = $fcm_id; 
       //
        // Put your private key's passphrase here:
        $passphrase = '66HPAR4YCK';

        // Put your alert message here:
        //$message = 'My first push notification!';

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


        $body['apns'] = [
            "notification" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id,
                "minutes" => $minutes,
                "callerID" => $name
            ],
            "data" => [
                "body" => $message,
                "title" => "IdolTime",
                "noti_type" => "call",
                "session_id" => $session,
                "token" => $token,
                "room_id" => $room_id,
                "minutes" => $minutes,
                "callerID" => $name
            ]
            ];
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