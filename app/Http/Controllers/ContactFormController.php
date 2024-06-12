<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactForm::create($request->all());

        // You can add mail sending functionality here if needed

        return redirect()->route('contact.create')->with('success', 'Message sent successfully.');
    }

        public function index()
    {
        $contactForms = ContactForm::all();
        return view('contact.index', compact('contactForms'));
    }

}

