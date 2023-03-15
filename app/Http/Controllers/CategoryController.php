<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\VideoPlayer;
use Validator;
class CategoryController extends Controller
{
    //
    function index(Request $request)
    {
        $player = VideoPlayer::find(1);
        
        return view('category.add')->with('player',$player);
    }

    function add(Request $request)
    {
        return view('category.add');
    }

    function save(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'link' => 'required',
            'status' => 'required',
            'donation_url' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('player')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $category = VideoPlayer::find(1);
            $category->link = $request->link;
            $category->donation_url = $request->donation_url;
            $category->status = $request->status;
            $category->save();

            return redirect()->route('player')->with('success','Video Player Added Successfully!!!');
        }
    }

    function radio_index(Request $request)
    {
        $player = PLayer::find(1);
        
        return view('category.add_radio')->with('player',$player);
    }

    function radio_save(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'radio1_url' => 'required',
            'radio2_url' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('radio')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $category = PLayer::find(1);
            $category->radio1_url = $request->radio1_url;
            $category->radio2_url = $request->radio2_url;
            $category->radio1_name = $request->radio1_name;
            $category->radio2_name = $request->radio2_name;
            if($request->hasFile('radio1')){

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $request->file('radio1')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('radio1')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload radio1
                $path = $request->file('radio1')->storeAs('public/image',$fileNameToStore);
                
                $category->radio1_image = $fileNameToStore;
            }

            if($request->hasFile('radio2')){

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $request->file('radio2')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('radio2')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload radio2
                $path = $request->file('radio2')->storeAs('public/image',$fileNameToStore);
                
                $category->radio2_image = $fileNameToStore;
            }
            $category->save();

            return redirect()->route('radio')->with('success','Radio Player Added Successfully!!!');
        }
    }

    function edit($id)
    {
        $category = Player::find($id);
        return view('category.edit')->with('category',$category);
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->route('category')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $category = Player::find($request->id);
            $category->name = $request->name;
            $category->save();

            return redirect()->route('category')->with('success','Category Updated Successfully!!!');
        }
    }

    function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category')->with('success','Category Deleted Successfully!!!');
    }
}
