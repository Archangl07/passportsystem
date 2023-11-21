
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

            <!-- body -->
            <div class="container-fluid page-body-wrapper">

            

                    <div class="content-wrapper">

                            <!-- messagebox condition -->
                            @if(session()->has('error'))

                                    <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">
                                            x
                                    </button>  

                                    {{session()->get('error')}}


                                    </div>

                            @endif

                            @if(session()->has('success'))

                                    <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">
                                            x
                                    </button>  

                                    {{session()->get('success')}}


                                    </div>

                            @endif

                            <div class="page-section">
                                    <div class="container">                                                   
                                                        <div class="card">
                                                                <div class="card-header flex items-center justify-center"><strong>Application verification</strong></div>
                                                                <div class="card-body">
                                                                    <div class="relative overflow-auto shadow-md sm:rounded-lg mt-4" style="height: 50vh;">
                                                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                                                                <tr>
                                                                                    <th scope="col" class="px-6 py-3">Select</th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        User id
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Document id
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Application Date
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Application no.
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Allocated Password no.
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Service type
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Travel Document type
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Present travel document no.
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        NMRP no.
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        NIC no.
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        District
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        DOB
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        BC no.
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        BC District
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Birth Place
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        sex
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Occupation
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        dual_citizenship
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Applicant Signature
                                                                                    </th>
                                                                                    <th scope="col" class="px-6 py-3">
                                                                                        Status
                                                                                    </th>
                                                                                    
                                                                                </tr>
                                                                            </thead>

                                                                            
                                                                            <tbody>
                                                                            @foreach($data as $application)
                                                                            <a href="{{'/detail-application/'.$application->id}}">
                                                                                <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                                                                                    <td class="px-6 py-4">
                                                                                    <input type="checkbox" name="selected[]" value="{{ $application->id }}">
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->user_id }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->document_id}}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->application_date }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    <a href="{{'/detail-application/'.$application->id}}">
                                                                                        {{ $application->application_no }}</a>
                                                                                    
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->allocated_passport_number }}
                                                                                    </td>                                                                           
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->service_type }}                                                                                        
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->traveldocument_type }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->present_traveldocument_no}}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->nmrp_no }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->nic_no }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->district }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->dateofbirth }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->bc_number }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->bc_district }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->birth_place }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->sex }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->occupation }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->dual_citizenship }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->applicant_signature }}
                                                                                    </td>
                                                                                    <td class="px-6 py-4">
                                                                                    {{ $application->status }}                                                                                        
                                                                                    </td>
                                                                                    
                                                                                </tr>
                                                                            @endforeach  
                                                                            </tbody>
                                                                        
                                                                        </table>

                                                                        <button type = "submit "class="btn-primary"></button>
                                                                    </div>
                                                                    
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <!-- tab2 -->

                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>

    @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->

    <!-- <script>


      $(document).ready(function () {
        $('.alert button.close').on('click', function () {
          $(this).parent().fadeOut('fast'); // Hide the parent of the clicked button
        });

        $('#myTabs a').on('click', function (e) {
          e.preventDefault();
          $(this).tab('show');
        });
      });


    </script> -->
    
  </body>
</html>
