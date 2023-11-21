<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentApproved;
use App\Mail\ApplicationApproved;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Appointment;
use App\Models\Application;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

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
        if ($data->status != 'approved') {
            // Update the status to 'Approved'
            $data->status = 'approved';
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

        if($data->status != 'rejected') {
            
            $data->status = 'rejected';
            $data->save();

            return redirect()->back()->with('success', 'Appointment cancelled successfully');

        }
        return redirect()->back()->with('error', 'Appointment is already cancelled');
        
    }

    public function manage_user()
    {
        if (Auth::id()) {
            $user = Auth::user();
    
            if ($user->usertype == 1) {
                // Only retrieve and display records for usertype 0
                $data = User::where('usertype', 0)->get();
    
                return view('admin.manageuser', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }

    }


    public function searchusers(Request $request)
    {
        $search = $request->input('search');

        if (Auth::id() && Auth::user()->usertype == 1) {
            if (!empty($search)) {
                $data = User::where('usertype', 0)
                    ->where(function ($query) use ($search) {
                        $query->where('first_name', 'like', "%$search%")
                            ->orWhere('last_name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%")
                            ->orWhere('phone', 'like', "%$search%")
                            ->orWhere('address', 'like', "%$search%");
                    })
                    ->get();
            } else {
                // If search term is empty, fetch all records where usertype=0
                $data = User::where('usertype', 0)->get();
            }
    
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

    public function deleteUser($id)
    {
        // find the user id
        $user = User::find($id);

        if ($user) {
            //delete user
            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully');
        }
        
        return redirect()->back()->with('error', 'User not found.');
    }


    // fetch details using your controller
    public function getUserDetails($id)
    {
        $user = User::find($id);

        return response()->json([
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
        ]);
    }


    public function updateUser(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Fetch the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Populate the email field in the form
        $request->merge(['email' => $user->email]);
        $changes = false; // Initialize the $changes variable as false


        if (
            $user->first_name !== $request->input('first_name') ||
            $user->last_name !== $request->input('last_name') ||
            $user->phone !== $request->input('phone') ||
            $user->address !== $request->input('address')
        ) {
            $changes = true;
        }

        if ($changes) {
            // Create an array to store the updated data
            $updatedData = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
            ];

            $user->update($updatedData);


            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else 
        
        {
            return redirect()->back()->with('error', 'No changes were made to your profile.');
        }
    }
        

     
    public function showcharts()
    {
        if(Auth::id())

        {
            if(Auth::user()->usertype==1)
            {

                    // Get the first and last day of the current month
                $firstDayOfThisMonth = Carbon::now()->startOfMonth();
                $lastDayOfThisMonth = Carbon::now()->endOfMonth();

                // Query applicants with birth dates within the current month
                $applicants = Application::get(['dateofbirth']); // Only retrieve the 'dateofbirth' field

                error_log($applicants);
                // Calculate ages based on birth dates
                $ages = $applicants->map(function ($applicant) {

                    error_log(Carbon::parse($applicant->dateofbirth)->age);
                    return Carbon::parse($applicant->dateofbirth)->age;
                });

                $applicationCountByStatus = Application::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->get();

                $monthlyApplicationTrends = Application::selectRaw('YEAR(application_date) as year, MONTH(application_date) as month, COUNT(*) as count')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get();

                $data=[
                    'applicants' => $applicants,
                    'ages' => $ages,
                    'applicationCountByStatus' => $applicationCountByStatus,
                    'monthlyApplicationTrends' => $monthlyApplicationTrends
                ];

                return view('admin.charts',compact('data'));
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


    public function verification()
    {
        if (Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data=application::all();
                return view('admin.verification')->with('data', $data);
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

            
        
    public function detailApplication($id)
    {
        if(Auth::check()){
       
            $application = Application::find($id);

            if($application){

                $doc = Document::find($application->document_id);
                $user = User::find($application->user_id);
                $data = [
                    'application' => $application,
                    'document' => $doc,
                    'applicant' => $user
                ];
    
                return view('admin.application_detail',compact('data'));
            }
            return redirect('verification')->with('error','Application is not found');
        }

        return redirect('login');
        
    }


    public function updateApplicationStatus(Request $request, $id)
    {
        // Retrieve the application from the database
        $application = Application::findOrFail($id);
        $applicant = User::findOrFail($application->user_id);
        // Check which button was pressed
        $action = $request->input('action');

        // Update the application data based on the button pressed
        if ($action === 'approve') {
            $application->status = 'approved';
            $applicant->status = 1;
        } elseif ($action === 'reject') {
            $application->status = 'rejected';
            $applicant->status = 0;
        }

        // Save the changes
        $application->save();

        $applicant->app_no = $application->application_no;

        error_log($applicant);

        // You can add more logic based on your requirements
        Mail::to($applicant->email)->send(new ApplicationApproved($applicant));

        if ($action === 'approve') {
            return back()->with('success', 'Application Approved successfully!');
        }
        else{
            return redirect('verification')->with('success', 'Application updated successfully!');
        }
        
    }

    public function setPassportstatus(Request $request, $id)
    {
        if (Auth::id())
        {
            if(Auth::user()->usertype==1)
            {

                $application=application::find($id);

                $user = User::findOrFail($application->user_id);

                // $existingTracker = PassportTracker::where('application_id',$application->id)->first();

                // if($existingTracker){
                //     $existingTracker->$request->input('status');
                //     $existingTracker->save();
                // }
                // else{
                //         $passportTrack = new PassportTracker;
                //         $passportTrack->application_id = $application->id;
                //         $passportTrack->status = $request->input('status');
                //         $passportTrack->location =  $user->address;

                //         $passportTrack->save();
                // }



                return back()->with('success', 'Application updated successfully!');
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


}

