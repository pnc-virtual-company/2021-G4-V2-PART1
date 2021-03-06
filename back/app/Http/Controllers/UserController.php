<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // signup function
    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'], 
            'lastname' => ['required', 'string', 'max:255'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'imageprofile'=>'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);

        $request->file('imageprofile')->store('public/UserProfile');

        $user = new User();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->imageprofile = $request->file('imageprofile')->hashName();

        $user->save();


        return response()->json([
            'user' => $user,
        ]);
    }

    // signout function
    public function signout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'signout']);
    }

    // singin function
    public function signin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
