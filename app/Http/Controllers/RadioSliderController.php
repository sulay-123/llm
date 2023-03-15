<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RadioSlider;

class RadioSliderController extends Controller
{
    //
    public function index(Request $request) {
        $radio_slider = RadioSlider::all();
        return view('radio_slider.list')->with('radio_slider', $radio_slider);
    }

    public function add() {
        return view('radio_slider.add');
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
                
                $radio_slider = new RadioSlider;
                $radio_slider->type = $request->type;
                $radio_slider->image = $fileNameToStore;
                $radio_slider->save();
 
            }
            else {
                return redirect()->route('add.radio_slider')->with('error','Please upload valid image');
            }
            return redirect()->route('radio_slider')->with('success','radio_slider Added Successfully.');
        
    }

    public function edit($id) {
        $radio_slider = RadioSlider::find($id);
        return view('radio_slider.edit ')->with('radio_slider', $radio_slider);
    }

    public function update(Request $request) {

            $radio_slider = RadioSlider::find($request->id);
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
                
                $radio_slider->image = $fileNameToStore;
            }
            $radio_slider->save();
            return redirect()->route('radio_slider')->with('success','radio_slider Updated Successfully.');
    }

    public function delete($id) {
        RadioSlider::find($id)->delete();
        return redirect()->route('radio_slider')->with('success','radio_slider Deleted Successfully.');
    }
}
