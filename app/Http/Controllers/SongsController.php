<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Songs;
use App\Dj;
use App\Category;
use Validator;

class SongsController extends Controller
{
    //
    public function index(Request $request) {
        $songs = Songs::with('djs')->with('category')->orderBy('id','DESC')->get();
        //sreturn $songs;
        return view('songs.list')->with('songs', $songs);
    }

    public function add() {
        $data['dj'] = Dj::all();
        $data['category'] = Category::all();
        return view('songs.add')->with( $data);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
            'song_name' => 'required',
            'artist_name' => 'required',
            'song_length' => 'required',
            'song_type' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('add.song')->with('error','Something Went Wrong!!!');
        }
        else
        {
            //return $request;
            if($request->hasFile('song')){

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $request->file('song')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('song')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload song
                $path = $request->file('song')->storeAs('public/song',$fileNameToStore);
                
                $song = new Songs;
                $song->song_name = $request->song_name;
                $song->artist_name = $request->artist_name;
                $song->song_length = gmdate("H:i:s", $request->song_length);
                if(in_array(2, $request->song_type)) {
                    $song->category_id = $request->category_id;
                }
                if(in_array(3, $request->song_type)) {
                    $song->dj_id = $request->dj_id;
                }
                $song->song_type = implode(',',$request->song_type);
                $song->song_url = $fileNameToStore;
               

                if($request->hasFile('image')){

                    //Storage::delete('/public/avatars/'.$user->avatar);
        
                    // Get filename with the extension
                    $filenameWithExt = $request->file('image')->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $request->file('image')->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $request->file('image')->storeAs('public/image',$fileNameToStore);
                    
                    $song->image = $fileNameToStore;
                }
                $song->save();
 
            }
            else {
                return redirect()->route('add.song')->with('error','Please upload valid image');
            }
            return redirect()->route('song')->with('success','Song Added Successfully.');
        }
    }

    public function edit($id) {
        $song = Songs::find($id);
        $song['song_type'] = explode(",",$song->song_type);
        $song['dj'] = Dj::all();
        $song['category'] = Category::all();
        // if (in_array(3, $song->song_type)){
        //     return 'true';
        // } else {
        //     return 'false';
        // }
        return view('songs.edit')->with('song', $song);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'song_name' => 'required',
            'artist_name' => 'required',
            'song_length' => 'required',
            'song_type' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('song')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $song = Songs::find($request->id);
            if($request->hasFile('song')){

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $request->file('song')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('song')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload song
                $path = $request->file('song')->storeAs('public/song',$fileNameToStore);
                
                $song->song_url = $fileNameToStore;
            }
            if($request->hasFile('image')){

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('image')->storeAs('public/image',$fileNameToStore);
                
                $song->image = $fileNameToStore;
            }

            $song->song_name = $request->song_name;
            $song->artist_name = $request->artist_name;
            $song->song_length = gmdate("H:i:s", $request->song_length);
            $song->song_type = implode(',',$request->song_type);

            if(in_array(2, $request->song_type)) {
                $song->category_id = $request->category_id;
            }
            if(in_array(3, $request->song_type)) {
                $song->dj_id = $request->dj_id;
            }
            $song->save();
            return redirect()->route('song')->with('success','song Updated Successfully.');
        }
    }

    public function delete($id) {
        Songs::find($id)->delete();
        return redirect()->route('song')->with('success','song Deleted Successfully.');
    }
}
