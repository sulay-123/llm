<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{
    //
    public function index(Request $request) {
        $promotion = Promotion::all();
        return view('promotion.list')->with('promotion', $promotion);
    }

    public function add() {
        return view('promotion.add');
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
                
                $promotion = new Promotion;
                $promotion->image = $fileNameToStore;
                $promotion->save();
 
            }
            else {
                return redirect()->route('add.promotion')->with('error','Please upload valid image');
            }
            return redirect()->route('promotion')->with('success','Home Page Slider Added Successfully.');
        
    }

    public function edit($id) {
        $promotion = Promotion::find($id);
        return view('promotion.edit ')->with('promotion', $promotion);
    }

    public function update(Request $request) {

            $promotion = Promotion::find($request->id);
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
                
                $promotion->image = $fileNameToStore;
            }
            $promotion->save();
            return redirect()->route('promotion')->with('success','Home Page Slider Updated Successfully.');
    }

    public function delete($id) {
        Promotion::find($id)->delete();
        return redirect()->route('promotion')->with('success','Home Page Slider Deleted Successfully.');
    }
}
