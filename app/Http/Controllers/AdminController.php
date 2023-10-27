<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminController extends Controller
{
    public function addview()
    {

        return view('admin.add_user');

    }

    public function adduser(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed', // This ensures password and password_confirmation match
        ]);

        // Create a new User instance
        $user = new user;

        // Set the attributes of the User model with data from the request
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->password = Hash::make($request->input('password')); // Hash the password

        // Save the user to the database
        $user->save();

        // Redirect or do something else after successful user creation
        return redirect()->back()->with('message', 'User added successfully'); // Change this to the appropriate route
    }

}

