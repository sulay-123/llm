<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Sponsers;
use App\Dj;
use App\Social;
use App\Video;
use App\Chat;
use App\Events;
use App\VideoPlayer;
use App\Promotion;
use App\SliderImages;
use Auth;

class DashboardController extends Controller
{
    //
    function dashboard(Request $request)
    {
        $data['sponsers'] = Sponsers::count();
        $data['dj'] = Dj::count();
        $data['video'] = Video::count();
        $data['event'] = Events::count();
        $data['social'] = Social::find(1);
        return view('dashboard')->with($data);
    }

    function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email,'password' => $request->password]))
        {
            return redirect()->route('dashboard')->with('success','Login Successfully');
        }
        else
        {
            return redirect('/admin')->with('error','Invalid Credentials');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin');
    }

    function website() {
        $data['video'] = VideoPlayer::find(1);
        $data['radio'] = Player::find(1);
        $data['sponsers'] = Sponsers::all();
        $data['social'] = Social::find(1);
        $data['chat'] = Chat::all()->take(-50);
        $data['promotion'] = Promotion::all();
        $data['slider'] = SliderImages::all();
        //$data['chat'] = array_reverse($chat->toArray());
        //return($data['chat']);
        return view('website.index')->with($data);
    }

    function social_link() {
        $social = Social::find(1);
        return view('social_media')->with('social',$social);
    }

    function save_socail_link(Request $request) {
        $social = Social::find(1);
        $social->facebook = $request->facebook;
        $social->mmk_instagram = $request->mmk_instagram;
        $social->mmradio_instagram = $request->mmradio_instagram;
        $social->youtube = $request->youtube;
        $social->save();

        return redirect()->route('social_media')->with('success','Social link updated successfully');
    }
}
