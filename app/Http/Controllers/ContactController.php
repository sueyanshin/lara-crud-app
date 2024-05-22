<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts =  Contact::all();
        return view("contact.index", compact('contacts'));
    }
    public function create()
    {
        return view('contact.create');
    }
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->description = $request->description;

        $contact->save();

        return redirect()->route('contact.index')->with('status', 'New contact is created.');
    }
    public function edit(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);

        return view('contact.edit', compact('contact'));
    }

    // use route model binding without using $id
    public function update(Contact $contact, Request $request)
    {
        // $contact = Contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->description = $request->description;
        $contact->update();

        return redirect()->route('contact.index')->with('status', $contact->name . ' is updaded.  ');
    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.index')->with('delete', $contact->name . " is deleted.");
    }
}