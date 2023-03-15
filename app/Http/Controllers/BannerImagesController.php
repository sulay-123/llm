<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BannerImages;

class BannerImagesController extends Controller
{
    //
    public function index(Request $request) {
        $banner_images = BannerImages::all();
        return view('banner_images.list')->with('banner_images', $banner_images);
    }

    public function add() {
        return view('banner_images.add');
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
                
                $banner_images = new BannerImages;
                $banner_images->image = $fileNameToStore;
                $banner_images->link = $request->link;
                $banner_images->save();
 
            }
            else {
                return redirect()->route('add.banner_images')->with('error','Please upload valid image');
            }
            return redirect()->route('banner_images')->with('success','banner_images Added Successfully.');
        
    }

    public function edit($id) {
        $banner_images = BannerImages::find($id);
        return view('banner_images.edit ')->with('banner_images', $banner_images);
    }

    public function update(Request $request) {

            $banner_images = BannerImages::find($request->id);
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
                
                $banner_images->image = $fileNameToStore;
            }
            $banner_images->link = $request->link;
            $banner_images->save();
            return redirect()->route('banner_images')->with('success','banner_images Updated Successfully.');
    }

    public function delete($id) {
        BannerImages::find($id)->delete();
        return redirect()->route('banner_images')->with('success','banner_images Deleted Successfully.');
    }
}
