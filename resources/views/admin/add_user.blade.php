
<!DOCTYPE html>
<html lang="en">
  <head>

  <style type="text/css">
    label
    {
      display: inline-block;

      width: 200px;

    }
  </style>

  @include('admin.css')
   



  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- side bar -->
      @include('admin.sidebar')
      
      <!-- navigation bar -->
      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">


      <div class = "container" align="center" style="padding-top: 50px;">

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

      <form method="POST" action="{{ url('add_user') }}">
            @csrf
            <!-- Add the fields for user registration -->
            <div style="padding:10px;">
                <label>First Name</label>
                <input type="text" style="color:black;" name="first_name" placeholder="Input first name" value="{{ old('first_name') }}" required>
            </div>

            <div style="padding:10px;">
                <label>Last Name</label>
                <input type="text" style="color:black;" name="last_name" placeholder="Input last name" value="{{ old('last_name') }}" required>
            </div>

            <div style="padding:10px;">
                <label>Email</label>
                <input type="email" style="color:black;" name="email" placeholder="Input email address" value="{{ old('email') }}" required>
            </div>

            <div style="padding:10px;">
                <label>Phone</label>
                <input type="text" style="color:black;" name="phone" placeholder="Input contact number" value="{{ old('phone') }}" required>
            </div>

            <div style="padding:10px;">
                <!-- <label>Address</label>
                <textarea style="color:black; width: 200px;" name="address" placeholder="Input home address" required></textarea> -->
                <label style="display: inline-block; width: 200px; vertical-align: top;">Address</label>
                <textarea style="display: inline-block; width: 200px; color: black;" name="address" placeholder="Input home address" value="{{ old('address') }}" required></textarea>
            </div>

            <div style="padding:10px;">
                <label>Password</label>
                <input type="password" style="color:black;" name="password" placeholder="Input a password" required>
            </div>

            <div style="padding:10px;">
                <label>Confirm Password</label>
                <input type="password" style="color:black;" name="password_confirmation" placeholder="Retype password" required>
            </div>

            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div style="padding:18px;">
            <button type="submit" class="btn btn-success">Register User</button>
            </div>

        </form>
      </div>

</div>



    @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->
    
  </body>
</html>
