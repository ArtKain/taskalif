<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Phone;
use App\Models\Email;

class SearchController extends Controller
{
    public function search(Request $request) {

        $search = $request->search;
        
        $contacts = Contact::where('name' , 'LIKE', '%'.$search.'%')->get();

        return view('pages.search' , compact('contacts'));

         
    }
}
