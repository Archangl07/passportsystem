
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
    <!-- partial -->
    
    <div class="container-fluid page-body-wrapper">
        
        <div class="content-wrapper">
            <div class="page-section">
                <div class="container">

                    <!-- Tabs for Make userment and View userments -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="make-users-tab" data-toggle="tab" href="#make-userment" role="tab" aria-controls="make-userment" aria-selected="true">User list</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="view-userments-tab" data-toggle="tab" href="#view-userments" role="tab" aria-controls="view-userments" aria-selected="false">User information</a>
                    </li>
                    </ul>

                    <div class="tab-content" id="myTabsContent">
                            <div class="tab-pane fade show active" id="make-userment" role="tabpanel" aria-labelledby="make-userment-tab">
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
                                <h1 class="text-center wow fadeInUp"><strong>Users List</strong></h1>

                                <!-- Search form -->
                                <form action="{{ route('search_users') }}" method="GET">
                                    <div class="mb-4">                                       
                                        <input type="text" name="search" id="search" placeholder="Search users..." class="border p-2 rounded-l-md" style="color:black;">
                                        <button type="submit" class="bg-secondary text-white p-2 rounded-r-md">Search</button>
                                    </div>
                                </form>
                                <!-- Search form -->

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        first_name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        last_name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        phone
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        address
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        
                                                    </th>
                                                    
                                                </tr>
                                            </thead>

                                            @foreach($data as $user)
                                            <tbody>
                                                <tr class="odd:bg-black  even:bg-gray-50  border-b ">
                                                <td class="px-6 py-4">
                                                        {{$user->first_name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$user->last_name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$user->email }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$user->phone }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{$user->address }}
                                                   
                                                    <td class="px-6 py-4">
                                                        <button type="button" class="edit-user-btn hover:underline" data-user-id="{{ $user->id }}">Edit</button>
                                                    </td> 
                                                    <td class="px-6 py-4">    
                                                        <a href="{{ route('delete_user', ['id' => $user->id]) }}" onclick="return confirm('Are you sure you want to delete?')" 
                                                        class="font-medium text-green-600  hover:underline mr-2">Delete</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                            
                                    </div> <!-- table -->



                            </div>

                            <div class="tab-pane fade mb-4" id="view-userments" role="tabpanel" aria-labelledby="view-userments-tab">

                                    <form class="main-form" action="{{ route('update_user', ['id' => $user->id, 'user' => $user->id]) }}" method="POST">
                                        @csrf
                                        <div class="row mt-5 ">

                                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                            <label>First Name</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="first_name" placeholder="Input first name" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                            <label>Last Name</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="last_name" placeholder="Input last name" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                            <label>Email</label>
                                            <input type="email" style="color:white; background-color:black;" class="form-control" name="email" placeholder="Input email address" required class="rounded-lg form-input" readonly>
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                                            <label>Phone</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="phone" placeholder="Input contact number" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                                            <label>Address</label>
                                            <textarea name="address" id="address" class="form-control" rows="5" placeholder="Type your Address.." required class="rounded-lg form-input"></textarea>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-success wow zoomIn" style="color: white;">Update</button>
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

      
      $('.edit-user-btn').on('click', function (e) {
        e.preventDefault(); // Prevent the default behavior of the button
        var userId = $(this).data('user-id');
        var form = $('#view-userments form');

        // Set the action attribute to the correct route
        form.attr('action', '/update/user/' + userId);

        $.ajax({
            url: '/get-user-details/' + userId,
            type: 'GET',
            success: function (data) {
                $('#view-userments [name="first_name"]').val(data.first_name);
                $('#view-userments [name="last_name"]').val(data.last_name);
                $('#view-userments [name="email"]').val(data.email);
                $('#view-userments [name="phone"]').val(data.phone);
                $('#view-userments [name="address"]').val(data.address);

                // Trigger a click event on the tab link to switch the tab
                $('#view-userments-tab').tab('show');
            },
            error: function (error) {
                console.error('Error fetching user details:', error);
            }
        });
    });
  

    </script>


   

    @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->


</div>   
  </body>
</html>
