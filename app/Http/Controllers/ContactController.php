<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::find(1);

        return view('contact.index', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $attr = $request->validate([
            'addres' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'maps' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $contact->update($attr);

            DB::commit();

            return redirect()->route('contact.index')->with('success', 'Contact page successfully updated');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
