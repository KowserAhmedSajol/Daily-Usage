<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at','DESC')->get();
        return view('blog.backend.contacts.index',compact(
            'contacts',
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $contact = Contact::create([
            'uuid' => Str::uuid(),
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message, 
            'status' => '0',
        ]);
        
        return back()->withSuccess('Blog Post has been Created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $contact->status = 1;
        $contact->update();
        return view('blog.backend.contacts.view',compact(
            'contact',
            ));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function aboutUs()
    {
        return view('blog.frontend.about');
    }
    public function contuctUs()
    {
        return view('blog.frontend.contact');
    }
}
