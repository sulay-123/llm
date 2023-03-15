<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Validator;

class FanController extends Controller
{
    //
    function index(Request $request)
    {
        $fans = User::where('role', 2)->get();

        return view('fan.list')->with('fans', $fans);
    }

    function edit($id)
    {
        $fan = User::find($id);
        return view('fan.edit')->with('fan', $fan);
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit.fan', ['id' => $request->id])->with('error', 'Email can not be empty');
        } else {
            $idol_count = User::where('id', '!=', $request->id)->where('email', $request->email)->count();
            if ($idol_count == 0) {
                $idol = User::find($request->id);
                $idol->email = $request->email;
                $idol->save();

                return redirect()->route('fan')->with('success', 'Idol email updated successfully.');
            } else {
                return redirect()->route('edit.fan', ['id' => $request->id])->with('error', 'Email id already exists.');
            }
        }
    }
}
