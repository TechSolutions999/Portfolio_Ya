<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'message' => 'required|string|max:2000',
        ]);

        return back()->with('ok', 'Thank you, '.$data['name'].'. Your message is received.');
    }
}
