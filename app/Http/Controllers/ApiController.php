<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\Events;
use App\Songs;
use App\Biography;
use App\Dj;
use App\Player;
use App\Gallery;
use App\Video;
use App\Sponsers;
use App\Social;
use App\VideoPlayer;
use App\SliderImages;
use App\ContactUs;
use App\RadioSlider;
use App\Chat;
use App\BannerImages;
use App\Favourites;
use App\AppUsers;
use App\Playlist;
use App\SongsInPlaylist;
use App\Category;

class ApiController extends Controller
{
    //
    function promotion(Request $request) {
        $promotions = Promotion::all();
        if(count($promotions) > 0) {
            return ['status' => 1, 'data' => $promotions, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function events() {
        $events = Events::all();
        if(count($events) > 0) {
            return ['status' => 1, 'data' => $events, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function hot_mixes(Request $request) {
        $songs = Songs::where('song_type', 'like', '%2%')->get();
        if(count($songs) >0 ) {
            foreach($songs as $song) {
                $song['fav_status'] = Favourites::where('u_id', $request->u_id)->where('song_id',$song->id)->count();
            }
            return ['status' => 1, 'data' => $songs, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function mixes(Request $request) {
        $songs = Songs::where('song_type', 'like', '%1%')->get();
        if(count($songs) >0 ) {
            foreach($songs as $song) {
                $song['fav_status'] = Favourites::where('u_id', $request->u_id)->where('song_id',$song->id)->count();
            }
            return ['status' => 1, 'data' => $songs, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function biography() {
        $biography = Biography::find(1);
        return ['status' => 1, 'data' => $biography->description, 'msg' => 'success'];
    }

    function djs() {
        $dj = Dj::all();
        if(count($dj) >0 ) {
            return ['status' => 1, 'data' => $dj, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function Radio() {
        $temp = Player::find(1);
        $data['radio1_url'] = $temp->radio1_url;
        $data['radio1_name'] = $temp->radio1_name;
        $data['radio1_images'] = RadioSlider::where('type',1)->get();
        $data['radio2_url'] = $temp->radio2_url;
        $data['radio2_name'] = $temp->radio2_name;
        $data['radio2_images'] = RadioSlider::where('type',2)->get(); 
        return ['status' => 1, 'data' => $data, 'msg' => 'success'];
    }

    function gallery() {
        $gallery = Gallery::all();
        if(count($gallery) >0 ) {
            return ['status' => 1, 'data' => $gallery, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function videos() {
        $videos = Video::all();
        if(count($videos) >0 ) {
            return ['status' => 1, 'data' => $videos, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function sponsers() {
        $sponsers = Sponsers::all();
        if(count($sponsers) >0 ) {
            return ['status' => 1, 'data' => $sponsers, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function social() {
        return ['status' => 1, 'data' => Social::find(1), 'msg' => 'success'];
    }

    function donation_url() {
        return ['status' => 1, 'data' => VideoPlayer::find(1), 'msg' => 'success'];
    }

    function slider_images() {
        $slider = SliderImages::all();
        if(count($slider) > 0) {
            return ['status' => 1, 'data' => $slider, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No image found'];
        }
       
    }

    function contact_us(Request $request) {
        ContactUs::create($request->all());
        return ['status' => 1, 'msg' => 'Contact Us Submitted Successfully.'];
    }

    function dj_songs(Request $request) {
        $songs = Songs::where('dj_id', $request->dj_id)->get();
        if(count($songs) >0 ) {
            foreach($songs as $song) {
                $song['fav_status'] = Favourites::where('u_id', $request->u_id)->where('song_id',$song->id)->count();
            }
            return ['status' => 1, 'data' => $songs, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function chat(Request $request) {
        $chat = Chat::all();
        if(count($chat) >0 ) {
            return ['status' => 1, 'data' => $chat, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

    function banner_images(Request $request) {
        $slider = BannerImages::all();
        if(count($slider) > 0) {
            return ['status' => 1, 'data' => $slider, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No image found'];
        }
    }

    function all_songs(Request $request) {
        $all_songs = Songs::all();
        if(count($all_songs) > 0) {
            foreach($all_songs as $song) {
                $song['fav_status'] = Favourites::where('u_id', $request->u_id)->where('song_id',$song->id)->count();
            }
            return ['status' => 1, 'data' => $all_songs, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No image found'];
        }
    }

    public function add_favourites(Request $request)
    {
        $checkIfSongExists = Favourites::where(['u_id'=>$request->u_id,'song_id'=>$request->song_id])->first();
        if($checkIfSongExists)
        {
            $response = array(
                    'status' =>0,
                    'msg' => 'Song already exists in favourites.'
                );
        }
        else
        {
        	$fav = new Favourites;
        	$fav->u_id = $request->u_id;
        	$fav->song_id = $request->song_id;
        	$fav->save();

        	$response = array(
        			'status' =>1,
        			'msg' => 'Song added to favourites.'
        		);
        }

    	return $response;    	
    }

    public function removeSong(Request $request)
    {
    	$removeSong = Favourites::where('song_id',$request->song_id)->where('u_id',$request->u_id)->first();
    	if($removeSong)
    	{
    		$removeSong->delete();	
    		$response = array(
    			'status' =>1,
    			'msg' => 'Song removed from favourites.'
    		);
    	}
    	else
    	{
    		$response = array(
    			'status' =>0,
    			'msg' => 'No such song exists.'
    		);
    	}
    	return $response;
    }

    public function getFavourtieSongs(Request $request) {
        $songs = Favourites::with('songs')->where('u_id',$request->u_id)->get();
        if(count($songs)>0)
    	{
    		$response = array(
    			'status' =>1,
                'data' => $songs,
    			'msg' => 'Success.'
    		);
    	}
    	else
    	{
    		$response = array(
    			'status' =>0,
    			'msg' => 'No song exists.'
    		);
    	}
    	return $response;
    }

    public function register(Request $request) {
        $user_exsist = AppUsers::where('device_id', $request->device_id)->first();
        
        if(!$user_exsist) {
            $user = new AppUsers;
            $user->device_id = $request->device_id;
            $user->save();

            $response = array('status' => 1, 'u_id'=> $user->id, 'msg' => 'success');
        } else {
            $response = array('status' => 1, 'u_id'=> $user_exsist->id, 'msg' => 'success');
        }
       return $response;
    }

    public function add_playlist(Request $request)
    {
    	$newPlaylist = new Playlist;
    	$newPlaylist->u_id = $request->u_id;
    	$newPlaylist->name = $request->name;
    	$newPlaylist->save();

    	$response = array(
    			'status' => 1,
    			'msg' => 'Playlist successfully created.',
                'playlist_id' => $newPlaylist->playlist_id   			
    		);

    	return $response;
    }

    public function show_playlist(Request $request) {
        $playlist = Playlist::where('u_id',$request->u_id)->get();

        if(count($playlist) > 0) {
            $response = array('status' => 1, 'data' => $playlist, 'msg' => 'success');
        } else {
            $response = array('status' => 0, 'msg' => 'No Playlist Found');
        }
        return $response;
    }

    public function removePlaylist(Request $request) {
        SongsInPlaylist::where('playlist_id',$request->playlist_id)->delete();
        Playlist::where('playlist_id',$request->playlist_id)->delete();
        return array('status' => 1, 'msg' => 'Playlist deleted successfully.');
    }

    public function addSongToPlaylist(Request $request)
    {
        $checkIfSongExists = SongsInPlaylist::where(['playlist_id'=>$request->playlist_id,'u_id'=>$request->u_id,'song_id'=>$request->song_id])->first();

        if($checkIfSongExists)
        {
            $response = array(
                    'status' => 0,
                    'msg' => 'Song already exists in this playlist.'
                );
        }
        else
        {
        	$newSip = new SongsInPlaylist;
        	$newSip->playlist_id = $request->playlist_id;
        	$newSip->u_id = $request->u_id;
        	$newSip->song_id = $request->song_id;
        	$newSip->save();

        	$response = array(
        			'status' => 1,
        			'msg' => 'Song added to playlist.'
        		);
        }

    	return $response;
    }

    public function playlistSongs(Request $request) {
        $songs = SongsInPlaylist::with('songs')->where('playlist_id', $request->playlist_id)->get();

        if(count($songs) > 0) {
            foreach($songs as $song) {
                $song['fav_status'] = Favourites::where('u_id', $request->u_id)->where('song_id',$song->songs->id)->count();
            }
            $response = array('status' => 1, 'data' => $songs, 'msg' => 'success');
        } else {
            $response = array('status' => 0, 'msg' => 'no songs found');
        }
        return $response;
    }

    public function removePlaylistSongs(Request $request) {
        SongsInPlaylist::where('sip_id',$request->sip_id)->delete();
        return array('status' => 1, 'msg' => 'Songs deleted successfully.');
    }

    public function category(Request $request) {
        $category = Category::orderBy('name', 'asc')->get();
        return ['status' => 1, 'data' => $category];
    }

    public function category_songs(Request $request) {
        $songs = Songs::where('category_id', $request->category_id)->orderBy('id', 'desc')->get();
        if(count($songs) >0 ) {
            foreach($songs as $song) {
                $song['fav_status'] = Favourites::where('u_id', $request->u_id)->where('song_id',$song->id)->count();
            }
            return ['status' => 1, 'data' => $songs, 'msg' => 'success'];
        } else {
            return ['status' => 0, 'msg' => 'No data found.'];
        }
    }

}
