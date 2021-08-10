<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //

    public function AdminContact(){

        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact(){
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request){
        
        $validated = $request->validate([
            'phone' => 'required|unique:contacts|min:10',
            'email' => 'required|unique:contacts',
        ],
        [
            'phone.required' => 'Please Input Phone Number',
            'email.required' => 'Please Input Email',
        ]);

        Contact::insert([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact Add Successfully!');
    }

    public function Contact(){

        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('contact')->with('success', 'Message Sent Successfully!');
    }

    public function AdminMessage(Request $request){
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }
}
