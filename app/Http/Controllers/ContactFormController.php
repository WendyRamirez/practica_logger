<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactFormController extends Controller
{
    public function form(){

        return view('contact.form');
    }

    public function send(Request $request){

    $data = $request->validate([
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required',
    'subject' => 'required',
    'message' => 'required'
    ]);

    Mail::to('santander2001-@hotmail.com')->send(new ContactForm($data));

    return back()->with('data', $data)->with('message', ['success', 'Message sent succesfully']);
    }
}