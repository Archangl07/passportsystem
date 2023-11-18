<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentApproved;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())

        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_user');
            }

            else
            {
                return redirect()->back();
            }
        }

        else
        {
            return redirect('login');
        }

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

        // Fire the event to send the verification email
        event(new Registered($user));

        // Redirect or do something else after successful user creation
        return redirect()->back()->with('message', 'User added successfully'); // Change this to the appropriate route
    }

    public function showappointment()
    {
        if(Auth::id())

        {
            if(Auth::user()->usertype==1)
            {
                $data=appointment::all();
                return view('admin.showappointment',compact('data'));
            }

            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function approved($id)
    {
        $data = appointment::find($id);

        // Check if the appointment is not already approved
        if ($data->status != 'Approved') {
            // Update the status to 'Approved'
            $data->status = 'Approved';
            $data->save();

            // Send an email to the user regarding the approved appointment
            Mail::to($data->email)->send(new AppointmentApproved($data));

            return redirect()->back()->with('success', 'Appointment approved and email sent.');
        }

    return redirect()->back()->with('error', 'Appointment is already approved.');
    }

    public function cancelled($id)
    {
        $data=appointment::find($id);

        if($data->status != 'cancelled') {
            
            $data->status = 'cancelled';
            $data->save();

            return redirect()->back()->with('success', 'Appointment cancelled successfully');

        }
        return redirect()->back()->with('error', 'Appointment is already cancelled');
        
    }

    public function manage_user()
    {
        if(Auth::id())

        {
            if(Auth::user()->usertype==1)
            {
                $data=user::all();
                return view('admin.manageuser', compact('data'));
            }

            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }

    }


    public function searchusers(Request $request)
    {
        $search = $request->input('search');

        if (Auth::id() && Auth::user()->usertype == 1)
        {
            $data = User::where('first_name', 'like', "%$search%")
                        ->orWhere('last_name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('phone', 'like', "%$search%")
                        ->orWhere('address', 'like', "%$search%")
                        ->get();
            return view('admin.manageuser', compact('data'));
        } else {
            return redirect()->back();
        }

    }

    // public function showusers()
    // {
    //     if(Auth::id())

    //     {
    //         if(Auth::user()->usertype==1)
    //         {
    //             $data=user::all();
    //             return view('admin.manageuser', compact('data'));
    //         }

    //         else
    //         {
    //             return redirect()->back();
    //         }
    //     }
    //     else
    //     {
    //         return redirect('login');
    //     }
    // }





}

