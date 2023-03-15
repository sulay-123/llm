<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
    //

    public function index() {
        $contact = ContactUs::all();
        return view('contactus')->with('contact',$contact);
    }

    public function delete($id) {
        ContactUs::find($id)->delete();
        return redirect()->route('contactus');
    }
}
