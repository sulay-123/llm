<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    //
    public function index(Request $request) {
        $gallery = Gallery::all();
        return view('gallery.list')->with('gallery', $gallery);
    }

    public function add() {
        return view('gallery.add');
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
                
                $gallery = new Gallery;
                $gallery->image = $fileNameToStore;
                $gallery->save();
 
            }
            else {
                return redirect()->route('add.gallery')->with('error','Please upload valid image');
            }
            return redirect()->route('gallery')->with('success','gallery Added Successfully.');
        
    }

    public function edit($id) {
        $gallery = Gallery::find($id);
        return view('gallery.edit ')->with('gallery', $gallery);
    }

    public function update(Request $request) {

            $gallery = Gallery::find($request->id);
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
                
                $gallery->image = $fileNameToStore;
            }
            $gallery->save();
            return redirect()->route('gallery')->with('success','gallery Updated Successfully.');
    }

    public function delete($id) {
        Gallery::find($id)->delete();
        return redirect()->route('gallery')->with('success','gallery Deleted Successfully.');
    }
}
