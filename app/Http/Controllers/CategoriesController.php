<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Songs;
use Validator;

class CategoriesController extends Controller
{
    //
    public function index(Request $request) {
        $category = Category::all();
        return view('categories.list')->with('category', $category);
    }

    public function add() {
        return view('categories.add');
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->route('add.category')->with('error','Something Went Wrong!!!');
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
                
                $category = new Category;
                $category->name = $request->name;
                $category->image = $fileNameToStore;
                $category->save();
 
            }
            else {
                return redirect()->route('add.category')->with('error','Please upload valid image');
            }
            return redirect()->route('category')->with('success','category Added Successfully.');
        }
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->route('category')->with('error','Something Went Wrong!!!');
        }
        else
        {
            $category = Category::find($request->id);
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
                
                $category->image = $fileNameToStore;
            }
            $category->name = $request->name;
            $category->save();
            return redirect()->route('category')->with('success','category Updated Successfully.');
        }
    }

    public function delete($id) {
        Songs::where('category_id', $id)->delete();
        Category::find($id)->delete();
        return redirect()->route('category')->with('success','category Deleted Successfully.');
    }
}
