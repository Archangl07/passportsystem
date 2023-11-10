<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('user.css')

    </style>
  </head>
  <body>
    
      
      @include('user.navbar')

     


      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      
      @include('user.sidebar')

        <div class="content-wrapper"> 
        <div class="page-section">
          <div class="container">

          <!-- messagebox condition -->
          @if(session()->has('success'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">
                x
              </button>
              {{ session()->get('success') }}
            </div>
          @endif

          @if(session()->has('error'))
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">
                x
              </button>
              {{ session()->get('error') }}
            </div>
          @endif 
          <!-- messagebox condition end -->

          <h1 class="text-center wow fadeInUp">Personal Information</h1>

            <form method="POST" action="{{ url('profile_update') }}">
              @csrf

              <div class="row mt-5">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" placeholder="First Name">
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" placeholder="Last Name">
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Phone">
                </div>

                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control" value="{{ $user->address }}" placeholder="Address">
                </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="color: black;">Update</button>
            

            </form>
            </div>
          </div>
        </div>
        </div>  
      </div>
        <!-- main-panel ends -->

        

    
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('user.script')

    <script>
      $(document).ready(function () {
        $('.alert button.close').on('click', function () {
          $(this).parent().fadeOut('fast'); // Hide the parent of the clicked button (the message box)
        });
      });
    </script>
    <!-- End custom js for this page -->
  </body>
</html>