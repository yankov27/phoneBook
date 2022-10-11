<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function home()
    {   
        $id = auth()->id();
        $contacts = Contact::where('user_id', '=', $id)
            ->orderBy('name', 'ASC')
            ->get()
            ->toArray();
        
        $contact_length = count($contacts);

        return view('homepage', ['contacts' => $contacts, 'contact_length' => $contact_length]);
    }

    public function search(Request $request)
    {
        
        $contacts_search = Contact::where('name', 'like', '%' . $request['search'] . '%')
        ->get()
        ->toArray();

        $id = auth()->id();
        $contacts = Contact::where('user_id', '=', $id)
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();

        $contact_length = count($contacts);
        return view('homepage', ['contacts' => $contacts_search, 'contact_length' => $contact_length]);
    }

}
