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
              {{ session()->get('message') }}
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

          <h1 class="text-center wow fadeInUp">New Passport Application</h1>


          <!-- document popup btn -->
          <button id="openPopupBtn">+</button>
          <!-- document popup btn -->

            <form class="main-form" method="POST" action="{{ url('my_application') }}">
              @csrf

              <div class="row mt-5">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Document ID </label>
                    <input type="text" name="document_id" class="form-control" placeholder="Document ID" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Application number</label>
                    <input type="text" name="application_no" class="form-control" placeholder="app number" readonly>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms" >
                    <label>Application Date</label>
                    <input type="date" name="application_date" class="form-control" readonly>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Allocated passport number</label>
                    <input type="text" name="allocated_passport_number" class="form-control" placeholder="passport number" >
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms" required>
                    <label>Service type</label></br>
                    <select name="service_type" id="service_type" class="custom-select">

                        <option>---Select service type---</option>

                        <option value="Normal Service">Normal Service 5000 LKR</option>
                        <option value="One-day Service">Urgent Service 15000 LKR</option>
                        
                    </select>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                  <label>Travel Document Type</label>
                  <input type="text" name="traveldocument_type" class="form-control" placeholder="traveldocument type">
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Present Traveldocument no</label>
                    <input type="text" name="present_traveldocument_no" class="form-control" placeholder="present_traveldocument_no" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>NMRP number</label>
                    <input type="text" name="nmrp_no" class="form-control" placeholder=" nmrp number" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>NIC</label>
                    <input type="text" name="nic_no" class="form-control" placeholder="nic number" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Surname</label>
                    <input type="text" name="surname" class="form-control" value="{{ $user->last_name }}" placeholder="Surname" required readonly>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Other Names</label>
                    <input type="text" name="other_names" class="form-control" value="{{ $user->first_name }}" placeholder="other_names" required readonly> 
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Permanent Address</label>
                    <input type="text" name="permanent_address" class="form-control" value="{{ $user->address }}" placeholder="Permanent_address" required readonly>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>District</label>
                    <input type="text" name="district" class="form-control" placeholder="district" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <label>Date of Birth</label>
                    <input type="date" name="dateofbirth" class="form-control" placeholder="DOB" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Birth certificate number</label>
                    <input type="text" name="bc_number" class="form-control" placeholder="BC Certificate" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Birth District</label>
                    <input type="text" name="bc_district" class="form-control" placeholder="BC District" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Birth Place</label>
                    <input type="text" name="birth_place" class="form-control" placeholder="birth place" required>
                </div>
                
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                  <label>Sex</label>
                  <div>
                    <label><input type="radio" name="sex" value="male" required> Male</label>
                    <label><input type="radio" name="sex" value="female" required> Female</label>
                  </div>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Occupation</label>
                    <input type="text" name="occupation" class="form-control" placeholder="Occupation" required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Dual Citizenship</label>
                    <div>
                        <input type="radio" id="dualCitizenshipYes" name="dual_citizenship" value="1">
                        <label for="dualCitizenshipYes">Yes</label>
                    </div>
                    <div>
                        <input type="radio" id="dualCitizenshipNo" name="dual_citizenship" value="0" checked>
                        <label for="dualCitizenshipNo">No</label>
                    </div>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Dual Citizenship number</label>
                    <input type="text" name="dual_citizenship_no" class="form-control" placeholder="Dual Citizenship no." required>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Mobile No.</label>
                    <input type="text" name="mobile_no" class="form-control" value="{{ $user->phone }}" placeholder="077#######" required readonly>
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label>Email address</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="user@example.com" required readonly>
                </div>


                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <label>Applicant signature</label>
                    <input type="text" name="occupation" class="form-control" placeholder="Occupation" required>
                </div>

                <div class="col-12 col-sm-12 py-2 wow fadeInLeft">

                  <button type="submit" class="btn btn-primary mt-3 wow w-62 zoomIn" style="color: black; width: 20%;">Submit</button>

                </div>
              </div>

            </form>
            
            <!-- hidden form popup -->
            <div id="documentPopup" style="display: none;">
                <form id="documentForm">
                    <!-- Add your form fields to select documents here -->
                    <input type="file" name="birth_certificate">
                    <!-- Add more file inputs for other documents -->
                    <button type="submit">Save Documents</button>
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
    
    
    <!-- End custom js for this page -->
  </body>
</html>