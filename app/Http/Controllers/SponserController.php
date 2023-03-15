<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Sponsers;
use Validator;

class SponserController extends Controller
{
    //
    public function index(Request $request) {
        $sponsers = Sponsers::all();
        return view('sponsers.list')->with('sponsers', $sponsers);
    }

    public function add() {
        return view('sponsers.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'date_time' => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('add.sponser')->with('error','Something Went Wrong!!!');
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
                
                $sponsers = new Sponsers;
                $sponsers->name = $request->name;
                $sponsers->date_time = $request->date_time;
                $sponsers->description = $request->description;
                $sponsers->address = $request->address;
                $sponsers->image = $fileNameToStore;
                $sponsers->save();
 
            }
            else {
                return redirect()->route('add.sponser')->with('error','Please upload valid image');
            }
            return redirect()->route('sponser')->with('success','Sponser Added Successfully.');
        }
    }

    public function edit($id) {
        $sponsers = Sponsers::find($id);
        return view('sponsers.edit')->with('sponsers', $sponsers);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'date_time' => 'required',
            'description' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('sponser')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $sponsers = Sponsers::find($request->id);
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
                
                $sponsers->image = $fileNameToStore;
            }
            $sponsers->name = $request->name;
            $sponsers->date_time = $request->date_time;
            $sponsers->address = $request->address;
            $sponsers->description = $request->description;
            $sponsers->save();
            return redirect()->route('sponser')->with('success','Sponser Updated Successfully.');
        }
    }

    public function delete($id) {
        Sponsers::find($id)->delete();
        return redirect()->route('sponser')->with('success','Sponser Deleted Successfully.');
    }
}
