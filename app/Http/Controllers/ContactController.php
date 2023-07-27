<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['dashboard_index']]);
        $this->middleware('permission:contact-create', ['only' => ['create']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesInMenus = $this->categoriesInMenus();
        return view('contact',compact('categoriesInMenus'));
    }
    /**
     * Display a listing of the resource.
     */
    public function dashboard_index()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            $contacts = Contact::with(['user','supplier','product'])->latest()->get();
        }else{
            $contacts = Contact::where('user_id',$user->id)->with(['user','supplier','product'])->latest()->get();
        }
        foreach ($contacts as $contact){
            $date = new Carbon($contact->created_at);
            $contact->diff = $date->diffForHumans(Carbon::now());
        }

        return view('dashboard.contacts.index',compact('contacts'));
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
