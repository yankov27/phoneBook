<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $validated_request = $request->validated();
        $username = explode('@', $validated_request['email'])[0];
        $validated_request['name'] = $username;

        $user = User::create($validated_request);
        auth()->login($user);

        return redirect('/home')->with('success', 'Account successfully registered!');
    }
}
