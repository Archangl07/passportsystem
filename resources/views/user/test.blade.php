
<!DOCTYPE html>
<html lang="en">
  <head>

  @include('admin.css')
   



  </head>
  <body>
    
      
      
      <!-- side bar -->
      @include('admin.sidebar')
      
      <!-- navigation bar -->
      @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        
        <div class="content-wrapper">
            <div class="page-section">
                <div class="container">

                    <!-- Tabs for Make Appointment and View Appointments -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="make-users-tab" data-toggle="tab" href="#make-appointment" role="tab" aria-controls="make-appointment" aria-selected="true">User list</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="view-appointments-tab" data-toggle="tab" href="#view-appointments" role="tab" aria-controls="view-appointments" aria-selected="false">View Appointments</a>
                    </li>
                    </ul>

                    <div class="tab-content" id="myTabsContent">
                            <div class="tab-pane fade show active" id="make-appointment" role="tabpanel" aria-labelledby="make-appointment-tab">
                            <!-- messagebox condition -->
                                @if(session()->has('message'))

                                    <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>  

                                    {{session()->get('message')}}


                                    </div>

                                @endif
                            <!-- messagebox condition end -->
                                <h1 class="text-center wow fadeInUp">Users List</h1>


                                        <form class="main-form" action="{{ url('add_user') }}" method="POST">
                                        @csrf
                                        <div class="row mt-5 ">

                                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                            <label>Full Name</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="first_name" placeholder="Input first name" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                            <label>Last Name</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="last_name" placeholder="Input last name" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                            <label>Email</label>
                                            <input type="email" style="color:white; background-color:black;" class="form-control" name="email" placeholder="Input email address" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                            <label>Phone</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="phone" placeholder="Input contact number" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                            <label>Address</label>
                                            <textarea name="Address" id="Address" class="form-control" rows="5" placeholder="Type your Address.." required class="rounded-lg form-input"></textarea>
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInUp">
                                            <label>Password</label>
                                            <input type="password" style="color:white; background-color:black;" class="form-control" name="password" placeholder="Input a password" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInUp">
                                            <label>Confirm Password</label>
                                            <input type="password" style="color:white; background-color:black;" class="form-control" name="password_confirmation" placeholder="Retype password" required class="rounded-lg form-input">
                                        </div>

                                        @error('password')
                                        <span class="text-danger col-12 wow fadeInUp" style="color:white;">{{ $message }}</span>
                                        @enderror

                                        <div>
                                            <button type="submit" class="btn btn-success wow zoomIn" style="color: white;">Register User</button>
                                        </div>
                                        </div>
                                    </form>



                            </div>

                            <div class="tab-pane fade mb-4" id="view-appointments" role="tabpanel" aria-labelledby="view-appointments-tab">

                                    <form class="main-form" action="{{ url('add_user') }}" method="POST">
                                    @csrf
                                    <div class="row mt-5 ">

                                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                        <label>Full Name</label>
                                        <input type="text" style="color:white; background-color:black;" class="form-control" name="first_name" placeholder="Input first name" required class="rounded-lg form-input">
                                    </div>

                                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                        <label>Last Name</label>
                                        <input type="text" style="color:white; background-color:black;" class="form-control" name="last_name" placeholder="Input last name" required class="rounded-lg form-input">
                                    </div>

                                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                        <label>Email</label>
                                        <input type="email" style="color:white; background-color:black;" class="form-control" name="email" placeholder="Input email address" required class="rounded-lg form-input">
                                    </div>

                                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                        <label>Phone</label>
                                        <input type="text" style="color:white; background-color:black;" class="form-control" name="phone" placeholder="Input contact number" required class="rounded-lg form-input">
                                    </div>

                                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                        <label>Address</label>
                                        <textarea name="Address" id="Address" class="form-control" rows="5" placeholder="Type your Address.." required class="rounded-lg form-input"></textarea>
                                    </div>

                                    <div class="col-12 col-sm-6 py-2 wow fadeInUp">
                                        <label>Password</label>
                                        <input type="password" style="color:white; background-color:black;" class="form-control" name="password" placeholder="Input a password" required class="rounded-lg form-input">
                                    </div>

                                    <div class="col-12 col-sm-6 py-2 wow fadeInUp">
                                        <label>Confirm Password</label>
                                        <input type="password" style="color:white; background-color:black;" class="form-control" name="password_confirmation" placeholder="Retype password" required class="rounded-lg form-input">
                                    </div>

                                    @error('password')
                                    <span class="text-danger col-12 wow fadeInUp" style="color:white;">{{ $message }}</span>
                                    @enderror

                                    <div>
                                        <button type="submit" class="btn btn-success wow zoomIn" style="color: white;">Register User</button>
                                    </div>
                                    </div>
                                </form>

                            </div>


                        
                    </div>

            


                </div>
            </div>
        </div>
    </div>
        <!-- body -->
    
   

    @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->






<!-- myapplication.blade -->




<!-- myapplication.blade -->

    <script>
      $(document).ready(function () {
        $('.alert button.close').on('click', function () {
          $(this).parent().fadeOut('fast'); // Hide the parent of the clicked button
        });

        $('#myTabs a').on('click', function (e) {
          e.preventDefault();
          $(this).tab('show');
        });
      });
    </script>
    
  </body>
</html>








