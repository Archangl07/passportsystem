<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('user.css')
  </head>
  <body>
    
      
      @include('user.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
      @include('user.sidebar')
      <div class="content-wrapper">

      <div class="page-section">
        <div class="container">

        <!-- Tabs for Make Appointment and View Appointments -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="make-appointment-tab" data-toggle="tab" href="#make-appointment" role="tab" aria-controls="make-appointment" aria-selected="true">Make an Appointment</a>
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
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" action="{{url('appointment')}}" method="POST">

            @csrf

            <div class="row mt-5 ">
            @auth
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" readonly>
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control" placeholder="Email address.." value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select name="branch" id="branch" class="custom-select" required>

                <option>---Select a Branch---</option>

                <option value="Kandy Branch">Kandy Branch</option>
                <option value="Matale branch">Matale branch</option>
                <option value="Colombo branch">Colombo branch</option>
                <option value="Negombo branch">Negombo branch</option>
                <option value="Trincomalee branch">Trincomalee branch</option>
                </select>
            </div>
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="Number.." value="{{ auth()->user()->phone }}" readonly>
            </div>
            @endauth
            <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <label>Message</label>
                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Type your message.." required></textarea>
            </div>
            
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="color: black;">Submit Request</button>
        </form>
  </div> <!-- close tab-pane -->

  <div class="tab-pane fade" id="view-appointments" role="tabpanel" aria-labelledby="view-appointments-tab">
    <div>
        <table class="table">
          <tr>
            <th>Branch</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
          </tr>
          <!-- Populate this section with appointment data -->
          <tr>
            <td>Branch Name</td>
            <td>Appointment Date</td>
            <td>Appointment Message</td>
            <td>Appointment Status</td>
          </tr>
        </table>
      </div>
  </div>    

        </div>
    </div> <!-- .page-section -->

    </div>
      </div>
      <div>
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
        $('#myTabs a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            // Get the target tab's ID
            var targetTabId = $(e.target).attr('href');
            
            if (targetTabId === '#make-appointment') {
                // This is the "Make an Appointment" tab, handle logic for this tab
                console.log('Switched to Make an Appointment Tab');
                // Add your logic for the "Make an Appointment" tab here
            } else if (targetTabId === '#view-appointments') {
                // This is the "View Appointments" tab, handle logic for this tab
                console.log('Switched to View Appointments Tab');
                // Add your logic for the "View Appointments" tab here
            }
        });
      });
    </script>
    <!-- End custom js for this page -->
  </body>
</html>