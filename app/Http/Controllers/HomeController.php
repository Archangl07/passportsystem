<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Appointment; 

use App\Models\Updateprofile; 

use App\Models\Application; 

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
            'password' => 'nullable|string|max:255',
            'new_password' => 'nullable|string|max:255', // The new password is optional
        ]);
        
        // Validate the form data and update the user's profile
        $user = auth()->user();
        $changes = false; // Initialize the $changes variable as false

        if (
            $user->first_name !== $request->input('first_name') ||
            $user->last_name !== $request->input('last_name') ||
            $user->email !== $request->input('email') ||
            $user->phone !== $request->input('phone') ||
            $user->address !== $request->input('address') ||
            $request->input('new_password') !== null /// Check if a new password is provided
        ) {
            $changes = true;
        }

        if ($changes) {
            // Create an array to store the updated data
            $updatedData = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ];

            // Check if a new password is provided
            if (!empty($request->input('new_password'))) {
                $updatedData['password'] = bcrypt($request->input('new_password'));
            }

            $user->update($updatedData);


            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else 
        
        {
            return redirect()->back()->with('error', 'No changes were made to your profile.');
        }
    }

    public function myappointment()
    {
        // // Retrieve the currently authenticated user
        // $user = auth()->user();

        // return view('user.myappointment', compact('user'));
        if (Auth::id()) 
            {
                if(Auth::user()->usertype==0)
                {
                    $userid=Auth::user()->id;

                    $appoint=appointment::where('user_id',$userid)->get();

                    return view('user.myappointment',compact('appoint'));
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

    public function cancel_appoint($id)
    {
        $data=appointment::find($id);

        $data->delete();

        return redirect()->back();

    }

    public function application_form()
    {
        if (auth()->check()){

            $user = Auth::user();
       
            return view('user.myapplication',compact('user'));
        }
        else{

            return redirect()->back()->with('error', 'User not authenticated.');
        }
        

    }

    public function myapplication(Request $request)
    {


        // Validate the input data
        $request->validate([
            'document_id' => 'required',
            'application_date' => 'required',
            'application_no' => 'required',
            'allocated_passport_number' => 'required',
            'service_type' => 'required',
            'traveldocument_type' => 'required',
            'present_traveldocument_no' => 'required',
            'nmrp_no' => 'required',
            'nic_no' => 'required',
            // 'surname' => 'required',
            // 'other_names' => 'required',
            // 'Permanent_address' => 'required',
            'district' => 'required',
            'dateofbirth' => 'required|date',
            'bc_number' => 'required',
            'bc_district' => 'required',
            'birth_place' => 'required',
            'sex' => 'required',
            'occupation' => 'required',
            'dual_citizenship' => 'required',
            'dual_citizenship_no' => 'required',
            // 'mobile_no' => 'required',
            // 'email' => 'required|email',
            'applicant_signature' => 'required',
        ]);

        // Check if the user is authenticated
    if (auth()->check()) {
        // Create a new application instance
        $data = new application;

        // Fill the attributes using mass assignment
        $data->fill($request->all());

        // Set additional attributes
        $data->user_id = auth()->id(); // Laravel provides auth()->id() for the authenticated user's id

        // Retrieve user details and populate corresponding fields
        
        $user = auth()->user();

        // Check if $user is not null before accessing its properties
        if ($user) {
            $data->surname = $user->last_name;
            $data->other_names = $user->first_name;
            $data->permanent_address = $user->address;
            $data->mobile_no = $user->phone;
            $data->email = $user->email;
        }

        $data->application_date = now();
        // Generate a unique application number starting with "APP" and followed by three random numbers
        $data->application_no = 'APP' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
        $data->status = 'Pending';

        $data->save();

        return redirect()->back()->with('message', 'Application submitted successfully.');

        }

    // Handle the case where the user is not authenticated
    return redirect()->back()->with('error', 'User not authenticated.');
    }


}