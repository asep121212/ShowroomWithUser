<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.index',compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'number' => $request->number,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Contact $contact)
    {
        return view('dashboard.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
        ]);

        $contact->update([
            'name' => $request->name,
            'number' => $request->number,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Data berhasil diupdate');
    }
    
    public function destroy(Contact $contact)
    {
        $contact->delete();
        
        return redirect()->route('contacts.index')->with('success', 'Data berhasil dihapus');
    }
}
