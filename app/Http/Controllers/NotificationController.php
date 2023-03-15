<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Validator;

class NotificationController extends Controller
{
    //
    function index(Request $request)
    {
        $Notification = Notification::all();

        return view('Notification.list')->with('Notification', $Notification);
    }

    function add() {
        return view('Notification.add');
    }

    function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('Notification.add')->with('error', 'please fill all the details.');
        } else {
            //
            $image ='';
            if($request->hasFile('image')){

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = str_replace(" ","",$filename);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('image')->storeAs('public/image',$fileNameToStore);

               $image =  url('/').'/storage/image/'.$fileNameToStore;

            }
            //$image = 'https://www.gettyimages.in/gi-resources/images/500px/983794168.jpg';
            $message = $request->message;

            $url = 'https://fcm.googleapis.com/fcm/send';
            $server_key = "AAAAnGhril0:APA91bGCO00WTO5NhnIzxyjPbwUQZIdM01JjUzjHPa4z34dQDj-atBhIm4SXVgYrnc5KAJZFGMwK5MM6dSqeyGryHOBiMvsSNW0WcrPRJW9W-NJZLQVojPlJdqZ7PSuvD9gHDSDIEcKd";

            $fields = '{
            "to": "/topics/mmk_app",
            "data": {
                    "title":"'.$request->title.'",
                    "body": "'.$message.'",
                    "message":"'.$request->title.'",
                    "image":"'.$image.'",
                    "notiType":"0",
                    "sound":"default"
                },
            "notification": {
                    "title":"'.$request->title.'",
                    "body": "'.$message.'",
                    "message":"'.$request->title.'",
                    "image":"'.$image.'",
                    "notiType":"1",
                    "sound":"default"
                }
            }';

            $headers = array(
                'Authorization: key=' . $server_key,
                'Content-Type: application/json'
            );
            // Open connection
            $ch = curl_init();
            //print_r(json_encode($fields)); exit;
            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
     
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            
            // Execute post
            $result = curl_exec($ch);
            
            curl_close($ch);

            //
            $Notification = new Notification;
            $Notification->title = $request->title;
            $Notification->message = $request->message;
            
            $Notification->save();

            return redirect()->route('Notification')->with('success','Notification added successfully.');
        }
    }

    function delete($id) {
        Notification::find($id)->delete();
        return redirect()->route('Notification')->with('success','Notification deleted successfully.');
    }
}
