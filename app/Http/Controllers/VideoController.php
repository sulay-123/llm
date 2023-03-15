<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Validator;

class VideoController extends Controller
{
    //
    public function index(Request $request) {
        $videos = Video::all();
        return view('video.list')->with('videos', $videos);
    }

    public function add() {
        return view('video.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'url' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('add.video')->with('error','Something Went Wrong!!!');
        }
        else
        {
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
                
                $video = new Video;
                $video->name = $request->name;
                $video->url = $request->url;
                $video->date = $request->date;
                $video->time = $request->time;
                $video->image = $fileNameToStore;
                $video->save();
 
            }
            else {
                return redirect()->route('add.video')->with('error','Please upload valid image');
            }
            return redirect()->route('video')->with('success','Podcast Added Successfully.');
        }
    }

    public function edit($id) {
        $video = Video::find($id);
        return view('video.edit')->with('video', $video);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'url' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('video')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $video = Video::find($request->id);
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
                
                $video->image = $fileNameToStore;
            }
            $video->name = $request->name;
            $video->url = $request->url;
            $video->date = $request->date;
            $video->time = $request->time;
            $video->save();
            return redirect()->route('video')->with('success','Podcast Updated Successfully.');
        }
    }

    public function delete($id) {
        Video::find($id)->delete();
        return redirect()->route('video')->with('success','Podcast Deleted Successfully.');
    }
}
