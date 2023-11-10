<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Appointment; 

use App\Models\Updateprofile; 

class HomeController extends Controller
{
    public function redirect() 
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                return view('user.userdashboard');
            }
            else
            {
                return view('admin.home');
            }

        }
        else 
        {
            return redirect()->back();

        }
    }

    public function index() 
    {
        return view('user.home');
    }

    public function appointment(Request $request)
    {
        $data = new appointment;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->branch=$request->branch;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->status='In progress';

        if (Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', '   Appointment request successful. We will contact you soon');
    }

    public function profileview()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        return view('user.profile_view', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the input data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        
        // Validate the form data and update the user's profile
        $user = auth()->user();
        $changes = false; // Initialize the $changes variable as false

        if (
            $user->first_name !== $request->input('first_name') ||
            $user->last_name !== $request->input('last_name') ||
            $user->email !== $request->input('email') ||
            $user->phone !== $request->input('phone') ||
            $user->address !== $request->input('address')
        ) {
            $changes = true;
        }

        if ($changes) {
            // Update the user's profile with the input data
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address')
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No changes were made to your profile.');
        }
    }

    public function myappointment()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();
        

        return view('user.myappointment', compact('user'));
    }

}
