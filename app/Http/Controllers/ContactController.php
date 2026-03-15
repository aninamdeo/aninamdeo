<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'budget'  => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $validated['ip_address'] = $request->ip();
        Contact::create($validated);

        return back()->with('success', 'Thank you! Your message has been received. I will get back to you soon.');
    }
}
