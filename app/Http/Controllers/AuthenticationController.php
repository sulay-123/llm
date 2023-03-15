<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Category;
use App\Mail\EmailVerification;
use App\Mail\ForgotPassword;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;
use Validator;
use Hash;
use App\Referral;
use Nexmo\Laravel\Facade\Nexmo;

class AuthenticationController extends Controller
{
    //
    function step1(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {

            $user_exists = User::where('email', $request->email)->get();
            if (count($user_exists) == 0) {
                $verification_digit = $this->getName(4);
                $data = ['code' => $verification_digit];
                Mail::to($request->email)->send(new EmailVerification($data));

                return ['status' => 1, 'msg' => 'Check your email for verification code', 'data' => $verification_digit];
            } else {
                return ['status' => 0, 'msg' => 'Email id already exists'];
            }
        }
    }

    function step2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $code = $this->getName(4);
            Nexmo::message()->send([
                'to'   => $request->phone,
                'from' => '17819950336',
                'text' => 'Here is your verifcation code ' . $code
            ]);

            return ['status' => 1, 'data' => $code, 'msg' => 'Verification code is sent on your phone number'];
        }
    }

    function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'card_holder_name' => 'required',
            'card_number' => 'required',
            'card_expire_date' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $user = new User;
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->phone;
            $user->role = $request->role;
            $user->category = $request->category;
            $user->ssn = $request->ssn;
            $user->card_holder_name = $request->card_holder_name;
            $user->card_number = $request->card_number;
            $user->card_expire_date = $request->card_expire_date;
            $user->save();

            if(isset($request->referral_code))
            {
                $referral = new Referral;
                $referral->parent_id = substr($request->referral_code, strpos($request->referral_code, "-") + 1);
                $referral->user_id = $user->id;
                $referral->save();
            }
            return ['status' => 1, 'msg' => 'Your two step verification is successfully completed.', 'data' => $user->id];
        }
    }

    function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'device_type' => 'required',
            'fcm_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = User::find(Auth()->user()->id);
                if($user->referral_code == null || $user->referral_code == '')
                {
                    $user->referral_code = 'ref-'.Auth()->user()->id;
                }
                $user->device_type = $request->device_type;
                $remember_token = $this->getToken(200);
                $request->remember_token = $remember_token;
                $user->fcm_id = $request->fcm_id;
                $user->remember_token = $remember_token;
                if(isset($request->voip_token))
                {
                    $user->voip_token = $request->voip_token;
                }
                $user->save();
                
                if(Auth()->user()->category == NUll)
                {
                    $category_name = '';
                }
                else
                {
                    $category = Category::find(Auth()->user()->category);
                    $category_name = $category->name;
                }
                
                return [
                    'status' => 1,
                    'user_id' => Auth()->user()->id,
                    'fname' => Auth()->user()->fname,
                    'lname' => Auth()->user()->lname,
                    'email' => Auth()->user()->email,
                    'phone' => Auth()->user()->phone,
                    'role' => Auth()->user()->role,
                    'card_holder_name' => Auth()->user()->card_holder_name,
                    'card_number' => Auth()->user()->card_number,
                    'card_expire_date' => Auth()->user()->card_expire_date,
                    'category' => $category_name,
                    'token' => $remember_token,
                    'image' => Auth()->user()->image,
                    'referral_code' => 'ref-'.Auth()->user()->id
                ];
            } else {
                $check_email = User::where('email',$request->email)->count();
                
                if($check_email)
                {
                    return ['status' => 0, 'msg' => 'Password is incorrect'];
                }
                else
                {
                    return ['status' => 0, 'msg' => "Email'Id Doesn't Exists"];
                }
            }
        }
    }

    function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $user = User::find($request->user_id);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->save();
                $data = ['content' => 'You password has change successfully.'];
                Mail::to($user->email)->send(new NotifyMail($data));
                return ['status' => 1, 'msg' => 'Password Change Successfully'];
            } else {
                return ['status' => 0, 'msg' => 'Password is incorrect please try again.'];
            }
        }
    }

    function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $user = User::where('email', $request->email)->first();

            if (count($user) > 0) {
                $new_password = $this->getName(6);
                $user->password = bcrypt($new_password);
                $user->save();

                $data = ['password' => $new_password];
                Mail::to($request->email)->send(new ForgotPassword($data));

                return ['status' => 1, 'msg' => 'PLease checek your email for new password'];
            } else {
                return ['status' => 0, 'msg' => "Email id doen't exists"];
            }
        }
    }

    function edit_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $user = User::find($request->user_id);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            $data = ['content' => 'You profile has updated successfully.'];
            Mail::to($user->email)->send(new NotifyMail($data));
            return ['status' => 1, 'msg' => 'Profile updated successfully.'];
        }
    }

    function category_list(Request $request)
    {
        $categories = Category::all();
        if (count($categories) > 0) {
            return ['status' => 1, 'data' => $categories];
        } else {
            return ['status' => 0, 'msg' => "No category found."];
        }
    }

    function idol_list(Request $request)
    {
        $idols = User::where('category', $request->category_id)->where('id', '!=', $request->user_id)->where('online_status', 1)->get();
        if (count($idols) > 0) {
            return ['status' => 1, 'data' => $idols, 'msg' => 'Success.'];
        } else {
            return ['status' => 0, 'msg' => 'No Idol found for this category.'];
        }
    }

    function referral_list(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {
            $referral_list = Referral::with('user')->where('parent_id',$request->user_id)->get();

            if(count($referral_list) > 0)
            {
                return ['status' => 1 , 'data' => $referral_list, 'msg' => 'success'];
            }
            else
            {
                return ['status' => 0, 'msg' => 'No referral found.'];
            }
        }
    }

    function upload_image(Request $request)
    {
        $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $name = str_replace(' ','-',$name);
        //$name = time().'-'.$name;
        $destinationPath = public_path('/storage/images');
        $image->move($destinationPath, $name);
        
        $user = User::find($request->user_id);
        $user->image = $name;
        $user->save();
        return ['status' => 1, 'data' =>$name, 'msg' => 'Photo Uploaded Successfully.' ];
    }
    }

    function getName($n)
    {
        $characters = '0123456789';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    function getToken($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

    function logout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => 0, 'msg' => 'Please fill all the details.'];
        } else {

            $user = User::find($request->user_id);
            $user->online_status = 0;
            $user->fcm_id = '';
            $user->save();

            return ['status' => 1, 'msg' => 'Logout Successfully.'];
        }
    }
}
