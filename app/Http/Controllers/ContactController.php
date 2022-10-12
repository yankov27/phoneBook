<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\EditRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        $id = auth()->id();
        $validated_request = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email:rfc,dns|max:50',
            'email' => 'unique:contacts,email,NULL,id,user_id,' . $id,
            'phone' => 'regex:/^(\+|0)[0-9]+$/',
            'phone' => 'required|min:3|max:20',
            'phone' => 'unique:contacts,phone,NULL,id,user_id,' . $id, 
        ]);
        $validated_request['user_id'] = $id;

        Contact::create($validated_request);

        return redirect('home'); 
    }

    public function show($id)
    {   
        $contact = Contact::where('id', '=', $id)
        ->get()
        ->toArray();

        return view('edit', ['contact' => $contact]);
    }

    public function edit(EditRequest $request, $id)
    {

        Contact::where('id', '=', $id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone']
        ]);

        return redirect('home');
    }

    public function delete($id)
    {
        Contact::where('id', '=', $id)->delete();

        return redirect(('home'));
    }
}
