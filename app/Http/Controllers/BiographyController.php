<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biography;

class BiographyController extends Controller
{
    //
    function biography() {
        $biography = Biography::find(1);
        return view('biography')->with('biography',$biography);
    }

    function save_biography(Request $request) {
        $biography = Biography::find(1);
        $biography->description = $request->description;
        $biography->save();

        return redirect()->route('biography')->with('success','Biography updated successfully');
    }
}
