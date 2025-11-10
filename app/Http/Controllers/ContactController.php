<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'nullable|integer|exists:properties,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'contact_method' => 'nullable|string|in:whatsapp,email',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Tu mensaje se envió correctamente. Pronto te contactaremos.');
    }
}
