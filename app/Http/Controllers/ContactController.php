<?php

namespace App\Http\Controllers;

use App\Mail\ContactShipped;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactShow()
    {
        $contacts = Contact::all();

        return view('admin.contact.show', ['contacts' => $contacts]);
    }

    public function indexShow()
    {
        return view('index.contacts');
    }

    public function indexContactStore(Request $request, Contact $contact)
    {
        $data = $request->all();

        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->comment = $data['comment'];

        $contact->save();

        \Mail::to('andrewenot@gmail.com')->send(new ContactShipped($contact));

        return back();
    }
}
