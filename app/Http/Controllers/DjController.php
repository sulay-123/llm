<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dj;
use App\Songs;
use Validator;

class DjController extends Controller
{
    //
    public function index(Request $request) {
        $dj = Dj::all();
        return view('Dj.list')->with('dj', $dj);
    }

    public function add() {
        return view('Dj.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'bio' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('add.dj')->with('error','Something Went Wrong!!!');
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
                // Upload image
                $path = $request->file('image')->storeAs('public/image',$fileNameToStore);
                
                $dj = new Dj;
                $dj->name = $request->name;
                $dj->bio = $request->bio;
                $dj->image = $fileNameToStore;
                $dj->save();
 
            }
            else {
                return redirect()->route('add.dj')->with('error','Please upload valid image');
            }
            return redirect()->route('dj')->with('success','Dj Added Successfully.');
        }
    }

    public function edit($id) {
        $dj = Dj::find($id);
        return view('Dj.edit')->with('dj', $dj);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'bio' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('dj')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $dj = Dj::find($request->id);
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
                // Upload image
                $path = $request->file('image')->storeAs('public/image',$fileNameToStore);
                
                $dj->image = $fileNameToStore;
            }
            $dj->name = $request->name;
            $dj->bio = $request->bio;
            $dj->save();
            return redirect()->route('dj')->with('success','dj Updated Successfully.');
        }
    }

    public function delete($id) {
        Songs::where('dj_id', $id)->delete();
        Dj::find($id)->delete();
        return redirect()->route('dj')->with('success','dj Deleted Successfully.');
    }
}
