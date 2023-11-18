
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

        <!-- table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Branch
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Message
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                @foreach($data as $appoint)
                <tbody>
                    <tr class="odd:bg-black  even:bg-gray-50  border-b ">
                    <td class="px-6 py-4">
                            {{$appoint->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appoint->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appoint->phone}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appoint->branch}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appoint->date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appoint->message}}
                        </td>
                        <td class="px-6 py-4">
                            {{$appoint->status}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{url('approved',$appoint->id)}}" 
                            class="font-medium text-green-600  hover:underline mr-2">Approve</a>
                            <a href="{{url('cancelled',$appoint->id)}}" onclick="return confirm('Are you sure you want to cancel the appointment?')" 
                            class="font-medium text-red-600  hover:underline">Cancel</a>
                        
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div> <!-- table -->



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
