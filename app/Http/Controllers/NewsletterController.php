<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreNewsletterRequest $request)
    {

        try {
            $request->validate([
                'emails' => [
                    'required',
                    'emails',
                    'unique:newsletters,emails',
                ],
            ]);

            $newsletter = Newsletter::create($request->all());

            activity('Newsletter added')
                ->performedOn($newsletter)
                ->log($newsletter->email . ' added to newsletter list.');
            return redirect(url()->previous() . '#newsletter')->with('success', 'Your emails added to newsletter list successfully.');
        } catch (\Exception $e) {
            return redirect(url()->previous() . '#newsletter')->with('error','Your emails is already registered!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsletterRequest $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
