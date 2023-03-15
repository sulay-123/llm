<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderImages;

class SliderImagesController extends Controller
{
    //
    public function index(Request $request) {
        $slider_images = SliderImages::all();
        return view('slider_images.list')->with('slider_images', $slider_images);
    }

    public function add() {
        return view('slider_images.add');
    }

    public function save(Request $request) {
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
                
                $slider_images = new SliderImages;
                $slider_images->image = $fileNameToStore;
                $slider_images->save();
 
            }
            else {
                return redirect()->route('add.slider_images')->with('error','Please upload valid image');
            }
            return redirect()->route('slider_images')->with('success','Home Bottom Slider Added Successfully.');
        
    }

    public function edit($id) {
        $slider_images = SliderImages::find($id);
        return view('slider_images.edit ')->with('slider_images', $slider_images);
    }

    public function update(Request $request) {

            $slider_images = SliderImages::find($request->id);
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
                
                $slider_images->image = $fileNameToStore;
            }
            $slider_images->save();
            return redirect()->route('slider_images')->with('success','Home Bottom Slider Updated Successfully.');
    }

    public function delete($id) {
        SliderImages::find($id)->delete();
        return redirect()->route('slider_images')->with('success','Home Bottom Slider Deleted Successfully.');
    }
}
