<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact_us');
    }

    public function store(Request $request)
    {
        // Data Validation => return errors
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required']
        ]);

        // Save the data in the database

        // return thank you message
//        return redirect('/contact-us');
//        return redirect()->route('contact_us');
//        return to_route('contact_us');

        return back()->with('success_message', 'Thank you! your message has been sent');
    }
}
