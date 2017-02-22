<?php

namespace App\Http\Controllers;


use App\Mail\UserContact;
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
        $this->validate(request(), [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'comment' => 'required|min:10'

        ]);

        $data = $request->all();

        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->comment = $data['comment'];

        $contact->save();

        /*\Mail::to('andrewenot@gmail.com')->send(new UserContact($contact));*/

        return back()->with('message', 'Ваше сообщение успешно отпрвлено. В ближайшее время мы Вам ответим');
    }
}
