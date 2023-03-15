<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Validator;

class IdolController extends Controller
{
    //
    function index(Request $request)
    {
        $idols = User::where('role', 1)->get();

        return view('idol.list')->with('idols', $idols);
    }

    function edit($id)
    {
        $data['idol'] = User::find($id);
        $data['categories'] = Category::all();
        return view('idol.edit')->with($data);
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit.idol', ['id' => $request->id])->with('error', 'Email can not be empty');
        } else {
            $idol_count = User::where('id', '!=', $request->id)->where('email', $request->email)->count();
            if ($idol_count == 0) {
                $idol = User::find($request->id);
                $idol->email = $request->email;
                $idol->save();

                return redirect()->route('idol')->with('success', 'Idol email updated successfully.');
            } else {
                return redirect()->route('edit.idol', ['id' => $request->id])->with('error', 'Email id already exists.');
            }
        }
    }
}
