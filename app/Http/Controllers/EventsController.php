<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Events;
use Validator;

class EventsController extends Controller
{
    //
    public function index(Request $request) {
        $events = Events::all();
        return view('events.list')->with('events', $events);
    }

    public function add() {
        return view('events.add');
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
            return redirect()->route('add.events')->with('error','Something Went Wrong!!!');
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
                
                $events = new events;
                $events->name = $request->name;
                $events->date_time = $request->date_time;
                $events->description = $request->description;
                $events->address = $request->address;
                $events->image = $fileNameToStore;
                $events->save();
 
            }
            else {
                return redirect()->route('add.events')->with('error','Please upload valid image');
            }
            return redirect()->route('events')->with('success','events Added Successfully.');
        }
    }

    public function edit($id) {
        $events = Events::find($id);
        return view('events.edit')->with('events', $events);
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
            return redirect()->route('events')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $events = Events::find($request->id);
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
                
                $events->image = $fileNameToStore;
            }
            $events->name = $request->name;
            $events->date_time = $request->date_time;
            $events->address = $request->address;
            $events->description = $request->description;
            $events->save();
            return redirect()->route('events')->with('success','events Updated Successfully.');
        }
    }

    public function delete($id) {
        Events::find($id)->delete();
        return redirect()->route('events')->with('success','events Deleted Successfully.');
    }
}
