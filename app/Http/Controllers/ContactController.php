<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email',
            'message'=>'required|max:1000',
        ]);

        Mail::to('support@example.com')->send(new ContactMail($request->all()));

        return back()->with('success','Message sent!');
    }
}
