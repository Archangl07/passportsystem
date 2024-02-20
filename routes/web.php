<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Log;

use App\Models\Application;
use App\Models\document;

//Indexpage route
Route::get('/', [HomeController::class,'index']);

Route::get('/test', function(){

    return view('test');

});


Route::get('/home', [HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class,'redirect'])->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return view('dashboard'); 
    // })->name('dashboard');
});

Route::get('/about', [HomeController::class, 'about'])->name('about.view');

Route::get('/services', [HomeController::class, 'services'])->name('services.view');

Route::get('/home', [HomeController::class, 'publichome'])->name('home.view');

Route::get('/contactus', [HomeController::class, 'contact'])->name('contact.view');

Route::post('/contact', [HomeController::class, 'sendContactForm'])->name('contact.submit');

Route::get('/add_user_view', [AdminController::class,'addview']);

Route::post('/add_user', [AdminController::class,'adduser']);

Route::post('/appointment', [HomeController::class,'appointment']);

Route::get('/profile_view', [HomeController::class, 'profileview'])->name('profile.view');
Route::post('/profile_update', [HomeController::class, 'updateProfile'])->name('profile.update');

Route::get('/my_appointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/showappointment', [AdminController::class, 'showappointment']);
Route::get('/charts', [AdminController::class, 'showcharts']);

Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);


Route::post('/my_application', [HomeController::class, 'myapplication'])->name('new_application');

Route::get('/my_application', [HomeController::class, 'application_form'])->name('application_form');


Route::get('/manageuser', [AdminController::class, 'manage_user'])->name('manage_users');

// Route::get('/showusers', [AdminController::class, 'showusers'])->name('show_users');
Route::get('/searchusers', [AdminController::class, 'searchusers'])->name('search_users');

Route::get('/delete/user/{id}', [AdminController::class, 'deleteUser'])->name('delete_user');

// Route::get('/edit/user/{id}', [AdminController::class, 'editUser'])->name('edit_user');
Route::post('/update/user/{id}', [AdminController::class, 'updateUser'])->name('update_user');

//Controller Method for Fetching User Details:
Route::get('/get-user-details/{id}', [AdminController::class, 'getUserDetails'])->name('getuser_details');


Route::post('/save-documents', [HomeController::class, 'saveDocuments'])->name('save_documents');

Route::get('/verification', [AdminController::class, 'verification'])->name('verification_page');

Route::get('/detail-application/{id}', [AdminController::class, 'detailApplication'])->name('detail_application')->middleware(['auth']);

Route::post('/update-application-status/{id}', [AdminController::class, 'updateApplicationStatus'])->name('update_application_status');

Route::post('/set-passport-status/{id}', [AdminController::class, 'setPassportstatus'])->name('set_passport_status');

Route::get('/track-passport', [HomeController::class, 'trackPassport'])->name('trackpass_page');

Route::post('pay', [PaymentController::class, 'pay'])->name('payment');

Route::get('success', [PaymentController::class, 'error']);