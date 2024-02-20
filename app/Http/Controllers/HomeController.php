<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

use App\Models\Appointment; 

use App\Models\Updateprofile; 

use App\Models\Application; 

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

use App\Models\Document; 

use App\Models\Passporttracker;

use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

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
                $appointmentsCountByStatus = appointment::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->get();

                $inProgressAppointments = appointment::where('status', 'inprogress')->limit(5)->get();

                $appointmentsCountByBranch = Appointment::select('branch', DB::raw('count(*) as count'))
                ->groupBy('branch')
                ->get();
                
                $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth();

                $approvedAppointmentsCount = Appointment::where('status', 'approved')
                ->where('date', '>=', $firstDayOfLastMonth)
                ->count();
                $rejectedAppointmentsCount = Appointment::where('status', 'rejected')
                ->where('date', '>=', $firstDayOfLastMonth)
                ->count();
                $data = [
                    'key' => 'value',
                    'appointmentsCountByStatus' => $appointmentsCountByStatus,
                    'inProgressAppointments' => $inProgressAppointments,
                    'appointmentsCountByBranch' => $appointmentsCountByBranch,
                    'approvedAppointmentsCount' => $approvedAppointmentsCount,
                    'rejectedAppointmentsCount' => $rejectedAppointmentsCount
                ];
                return view('admin.home',compact('data'));
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
        $data->status='inprogress';

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

    public function publichome()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        return view('user.home', compact('user'));
    }

    public function services()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        return view('user.services', compact('user'));
    }

    public function about()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        return view('user.about', compact('user'));
    }

    public function contact()
    {
        // Retrieve the currently authenticated user
        $user = auth()->user();

        return view('user.contact', compact('user'));
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
            $applications = application::where('user_id', $user->id)->get();
            
            
            return view('user.myapplication',compact('user', 'applications'));
        }
        else{

            return redirect()->back()->with('error', 'User not authenticated.');
        }
        

    }

    public function myapplication(Request $request)
    {

       
        $validated = $request->validate([
            
            'application_date' => 'required',
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
            'applicant_signature' => 'required',
        ]);



        // Check if the user is authenticated
    if (auth()->check()) {
        // Create a new application instance
        try {
            $data = new Application;
    
            // Fill the attributes using mass assignment
            $data->fill($request->all());
    
            // Set additional attributes
            $data->user_id = auth()->id(); // Laravel provides auth()->id() for the authenticated user's id
    
            $document = Document::where('user_id', auth()->id())->first();
    
            if (!$document) {
                error_log('----Document inside-----');
                return redirect()->back()->with('error', 'Document Required');
            }
    
            $user = auth()->user();
    
            // Check if $user is not null before accessing its properties
            if ($user) {
                $data->document_id = $document->id;
                $data->dual_citizenship = 1;
            }
    
            $data->application_date = now();
            // Generate a unique application number starting with "APP" and followed by three random numbers
            $data->application_no = 'APP' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
            $data->status = 'pending';
    
            $data->save();
    
            // Any additional logic or redirection after a successful save
    
        } catch (QueryException $e) {
            // Handle database query exceptions
            return redirect()->back()->with('error', 'Error saving the application. '.$e->getMessage())->withInput();
        } catch (ValidationException $e) {
            // Handle validation exceptions
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Catch any other exceptions
            return redirect()->back()->with('error', 'An unexpected error occurred.');
        }

        
        error_log('Submitted successfully');
        return redirect()->back()->with('success', 'Application submitted successfully.');

        }
  
        // Handle the case where the user is not authenticated
        return redirect()->back()->with('error', 'User not authenticated.');
    }


    public function saveDocuments(Request $request)
    {

        $user = auth()->user();
        $requestData = $request->all();
        
        $fileName = time().$request->file('birth_certificate')->getClientOriginalName();
        $path = $request->file('birth_certificate')->storeAs('images', $fileName, 'public');
        $requestData["birth_certificate"] = '/storage/'.$path;

        $fileName = time().$request->file('NIC')->getClientOriginalName();
        $path = $request->file('NIC')->storeAs('images', $fileName, 'public');
        $requestData["NIC"] = '/storage/'.$path;

        $fileName = time().$request->file('Medical_certificate')->getClientOriginalName();
        $path = $request->file('Medical_certificate')->storeAs('images', $fileName, 'public');
        $requestData["Medical_certificate"] = '/storage/'.$path;

        $fileName = time().$request->file('Fingerprint')->getClientOriginalName();
        $path = $request->file('Fingerprint')->storeAs('images', $fileName, 'public');
        $requestData["Fingerprint"] = '/storage/'.$path;

        $fileName = time().$request->file('Digitalphoto')->getClientOriginalName();
        $path = $request->file('Digitalphoto')->storeAs('images', $fileName, 'public');
        $requestData["Digitalphoto"] = '/storage/'.$path;

        // Create a new document record for the user
        $document = new Document();
        $document->user_id = $user->id;
        $document->birth_certificate = $requestData["birth_certificate"];
        $document->NIC = $requestData["NIC"];
        $document->Medical_certificate = $requestData["Medical_certificate"];
        $document->Fingerprint = $requestData["Fingerprint"];
        $document->Digitalphoto = $requestData["Digitalphoto"];

        $document->save();

        // Redirect the user to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Your documents have been saved successfully.');
    }


    
    public function trackPassport()
    {
            // Retrieve the currently authenticated user
            $user = Auth::user();

            // Retrieve the status and id from the database
            $application = Application::where('user_id', $user->id)->first();

            if ($application) {
                // Retrieve the status and id from the database
                $passportTracker = Passporttracker::where('application_id', $application->id)->first();
                if ($passportTracker) {
                    $status = $passportTracker->status;
                    $trackingNumber = $passportTracker->id;
        
                    return view('user.tracking', compact(['status','trackingNumber']));
        
            } else {
                return redirect()->back()->with('error', 'No tracking information found');
            }
        } else {
            return redirect()->back()->with('error', 'No application found');
        }
    }


    public function sendContactForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Get the form data
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Send email
        try {
            Mail::to('azharazeez49@gmail.com')->send(new ContactFormMail($name, $email, $message));
            
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }



}    