<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesInMenus = $this->categoriesInMenus();

        return view('contact',compact('categoriesInMenus'));
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
    public function store(StoreContactRequest $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'message' => 'required|min:10'
            ]);

            $contact = Contact::create($request->all());

            activity('Contact form added')
                ->performedOn($contact)
                ->log($contact->name . ' added a new contact request by ' . $contact->email);
            return redirect(url()->previous() . '#contact')->with('success', 'Contact form sent successfully');
        }catch(\Exception $e){
            return redirect(url()->previous() . '#contact')->with('error','Something goes wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
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
}
