<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
    @include('user.css')
    <style>
        .thumbnail {
        display: inline-block;
        width: 100px;
        height: 100px;
        object-fit: cover;
      }
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

                        
                      <!-- Tabs for Make userment and View userments -->
                      <ul class="nav nav-tabs" id="myTabs" role="tablist">
                      <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="make-users-tab" data-toggle="tab" href="#make-userment" role="tab" aria-controls="make-userment" aria-selected="true">Document view</a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" id="view-applications-tab" data-toggle="tab" href="#view-application" role="tab" aria-controls="view-application" aria-selected="false">Application</a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a class="nav-link" id="view-statuses-tab" data-toggle="tab" href="#view-status" role="tab" aria-controls="view-status" aria-selected="false">Status view</a>
                      </li>
                      </ul>
                      <!-- Tabs for Make userment and View userments -->

                      <div class="tab-content" id="myTabsContent">
                          <div class="tab-pane fade show active" id="make-userment" role="tabpanel" aria-labelledby="make-userment-tab">

                                <div class="card">
                                    <div class="card-header flex items-center justify-center"><strong>Submit the Documents</strong></div>
                                    <div class="card-body">
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

                                        <form action="{{ route('save_documents')}}" method="post" enctype="multipart/form-data" 
                                        class="p-5 bg-white rounded shadow-sm">
                                          @csrf

                                          <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Birth Certificate</label><br>
                                                <input class="form-control" name="birth_certificate" type="file" id="birth_certificate"><br>
                                                <span id="birth_certificate_name"></span>
                                                <!-- Get the document model for the current user -->
                                                  @php
                                                    $user = auth()->user();
                                                    $document = App\Models\document::where('user_id', $user->id)->first();
                                                  @endphp
                                                <!-- Display the image from the document model -->
                                                <img class="thumbnail mt-2" id="birth_certificate_image" src="{{ asset(optional($document)->birth_certificate) }}" alt="Birth certificate"><br>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>NIC copy</label><br>
                                                <input class="form-control" name="NIC" type="file" id="NIC" required>
                                                <span id="NIC_name"></span>
                                                <!-- Display the image from the document model -->
                                                <img class="thumbnail mt-2" id="NIC_image" src="{{ asset(optional($document)->NIC) }}" alt="NIC copy"><br>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>Medical Certificate</label><br>
                                                <input class="form-control" name="Medical_certificate" type="file" id="Medical_certificate" required>
                                                <span id="Medical_certificate_name"></span>
                                                <!-- Display the image from the document model -->
                                                <img class="thumbnail mt-2" id="Medical_certificate_image" src="{{ asset(optional($document)->Medical_certificate) }}" alt="Medical certificate"><br>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>Finger print</label><br>
                                                <input class="form-control" name="Fingerprint" type="file" id="Fingerprint">
                                                <span id="Fingerprint_name"></span>
                                                <!-- Display the image from the document model -->
                                                <img class="thumbnail mt-2" id="Fingerprint_image" src="{{ asset(optional($document)->Fingerprint) }}" alt="Finger print"><br>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>Digital photo</label><br>
                                                <input class="form-control" name="Digitalphoto" type="file" id="Digitalphoto">
                                                <span id="Digitalphoto_name"></span>
                                                <!-- Display the image from the document model -->
                                                <img class="thumbnail mt-2" id="Digitalphoto_image" src="{{ asset(optional($document)->Digitalphoto) }}" alt="Digital photo"><br>
                                            </div>  


                                            <div class="col-12">
                                            <button type="submit" class="btn" style="background-color: #333; color: #fff;">Save</button>
                                            </div>


                                          </div>    
                                        </form>

                                    </div>
                                </div>


                          </div>

                          <div class="tab-pane fade mb-4" id="view-application" role="tabpanel" aria-labelledby="view-applications-tab">
                                <div class="card">
                                    <div class="card-header flex items-center justify-center"><strong>Passport Application</strong></div>
                                    <div class="card-body">
                                    @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">
                                        x
                                        </button>
                                        {{ session()->get('success') }}
                                    </div>
                                    @endif
                                          @if ($errors->any())
                                              <div class="alert alert-danger">
                                                  <ul>
                                                      @foreach ($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                      @endforeach
                                                  </ul>
                                              </div>
                                          @endif
                                          <form class="main-form" method="POST" action="{{ route('new_application') }}">
                                            @csrf

                                            <div class="row mt-5">
                                              <!-- <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                                  <label>Document ID </label>
                                                  <input type="text" name="document_id" class="form-control" placeholder="Document ID" required>
                                              </div>

                                              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                                  <label>Application number</label>
                                                  <input type="text" name="application_no" class="form-control" placeholder="app number" readonly>
                                              </div> -->

                                              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms" >
                                                  <label>Application Date</label>
                                                  <input type="date" id="datePicker" name="application_date" class="form-control" readonly>
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
                                                  <input type="text" name="nic_no" class="form-control" placeholder="nic number" maxlength="12" required>
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
                                                  <input type="text" name="dual_citizenship_no" class="form-control" placeholder="Dual Citizenship no." >
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
                                                  <input type="text" name="applicant_signature" class="form-control" placeholder="Occupation" required>
                                              </div>

                                              <div class="col-12 col-sm-12 py-2 wow fadeInLeft">

                                                <button type="submit" class="btn btn-primary mt-3 wow w-62 zoomIn" style="color: black; width: 20%;">Submit</button>

                                              </div>
                                            </div>

                                          </form>

                                    </div>

                                </div>

                          </div>

                          <div class="tab-pane fade mb-4" id="view-status" role="tabpanel" aria-labelledby="view-statuses-tab">
                                      <div class="card">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Application No
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Service Type
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Date
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            
                                                        </th>
                                                    </tr>
                                                </thead>

                                                
                                                <tbody>
                                                  @foreach($applications as $application)
                                                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                                                    <td class="px-6 py-4">
                                                    {{ $application->application_no }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                        {{ $application->service_type }}
                                                            
                                                        </td>
                                                        <td class="px-6 py-4">
                                                        {{ $application->application_date }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                        {{ $application->status }}
                                                            
                                                        </td>
                                                        <td class="px-6 py-4">
                                                        @if($application->status == 'approved')
                                                            <a href="" class="font-medium text-red-600  hover:underline">Pay Now</a>
                                                        @else
                                                            <span class="font-medium text-red-600">Pay Now</span>
                                                        @endif
                                                          
                                                        </td>
                                                    </tr>
                                                  @endforeach  
                                                </tbody>
                                              
                                            </table>
                                        </div>
                                      </div>

                          </div>

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
          $(this).parent().fadeOut('fast'); // Hide the parent of the clicked button
        });

        $('#myTabs a').on('click', function (e) {
          e.preventDefault();
          $(this).tab('show');
        });
      });

      // This function will read the file and display the image
      function readURL(input, target) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $(target).attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

      $(document).ready(function() {
        $('#birth_certificate').change(function() {
          readURL(this, '#birth_certificate_image');
        });
        $('#NIC').change(function() {
          readURL(this, '#NIC_image');
        });
        $('#Medical_certificate').change(function() {
          readURL(this, '#Medical_certificate_image');
        });
        $('#Fingerprint').change(function() {
          readURL(this, '#Fingerprint_image');
        });
        $('#Digitalphoto').change(function() {
          readURL(this, '#Digitalphoto_image');
        });
      });

      document.getElementById('datePicker').valueAsDate = new Date();
    </script>
    
    <!-- End custom js for this page -->
  </body>
</html>