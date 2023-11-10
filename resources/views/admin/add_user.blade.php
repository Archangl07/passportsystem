
<!DOCTYPE html>
<html lang="en">
  <head>


  @include('admin.css')

  </head>
  <body>
<div class="container-scroller">
      
      <!-- side bar -->
      @include('admin.sidebar')
      
      <!-- navigation bar -->
      @include('admin.navbar')

<div class="container-fluid page-body-wrapper">

  <div class="content-wrapper">

    <div class="page-section">
      <div class="container">

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

          <form class="main-form" action="{{ url('add_user') }}" method="POST">
            @csrf
            <div class="row mt-5 ">

              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                  <label>Full Name</label>
                  <input type="text" style="color: black;" class="form-control" name="first_name" placeholder="Input first name" value="{{ old('first_name') }}" required class="rounded-lg form-input">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                  <label>Last Name</label>
                  <input type="text" style="color: black;" class="form-control" name="last_name" placeholder="Input last name" value="{{ old('last_name') }}" required class="rounded-lg form-input">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                  <label>Email</label>
                  <input type="email" style="color: black;" class="form-control" name="email" placeholder="Input email address" value="{{ old('email') }}" required class="rounded-lg form-input">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                  <label>Phone</label>
                  <input type="text" style="color: black;" class="form-control" name="phone" placeholder="Input contact number" value="{{ old('phone') }}" required class="rounded-lg form-input">
              </div>

              <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <label>Address</label>
                <textarea name="Address" id="Address" class="form-control" rows="5" placeholder="Type your Address.." required class="rounded-lg form-input"></textarea>
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInUp">
                  <label>Password</label>
                  <input type="password" style="color: black;" class="form-control" name="password" placeholder="Input a password" required class="rounded-lg form-input">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInUp">
                  <label>Confirm Password</label>
                  <input type="password" style="color: black;" class="form-control" name="password_confirmation" placeholder="Retype password" required class="rounded-lg form-input">
              </div>

              @error('password')
              <span class="text-danger col-12 wow fadeInUp">{{ $message }}</span>
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



    @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->
</div>   
  </body>
</html>
