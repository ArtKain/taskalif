<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Phone;
use App\Models\Email;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contacts = Contact::all();

        return view('pages.index' , compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:contacts',
            'phones' => 'required|array',
            'phones.*' => 'required|string|integer|unique:phones,title',
            'emails' => 'required|array',
            'emails.*' => 'required|email|string|unique:emails,title'
        ]);

        $contact = new Contact([
            'name' => $request->get('name'), 
        ]);
        
        $contact->save();
        
        foreach($request->get('emails') as $email) {
            $contact->emails()->createMany([
                ['title' => $email],
            ]);
        }
        foreach($request->get('phones') as $phone) {
            $contact->phones()->createMany([
                ['title' => $phone],
            ]);
        }

        return redirect('/contacts')->with('success' , 'Контакт успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        return view('pages.show' , compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('pages.edit' , compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phones' => 'required|array',
            'phones.*' => 'required|string',
            'emails' => 'required|array',
            'emails.*' => 'required|email|string'
        ]);
        
        $contact = Contact::find($id);
        $contact->name = $request->get('name');
        
        $contact->emails()->delete();
        $contact->phones()->delete();

        foreach($request->get('emails') as $email) {
            $contact->emails()->createMany([
                ['title' => $email],
            ]);
        }
        
        foreach($request->get('phones') as $phone) {
            $contact->phones()->createMany([
                ['title' => $phone],
            ]);
        }
        
        $contact->save();

        return redirect('/contacts')->with('success' , 'Контакт успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Контакт удален!');
    }
}
