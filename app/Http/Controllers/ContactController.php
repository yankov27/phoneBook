<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\EditRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(ContactRequest $request)
    {
        $id = auth()->id();
        $validated_request = $request->validated();
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
