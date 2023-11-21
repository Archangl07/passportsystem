<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('user.css')

<!-- Add this to your HTML head to include FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">

    <style>
    .status-list {
        list-style: none;
        padding: 0;
        display: flex;
    }

    .status-list li {
        margin: 0 10px;
        cursor: pointer;
    }

    .status-list li i {
        margin-right: 5px;
    }

    .status-list li.active {
        color: #007bff; /* Change the color as needed */
        font-weight: bold;
    }
</style>
  </head>
  <body>
    
      
      @include('user.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
      @include('user.sidebar')


       <!-- partial -->
<div class="main-panel">

<div class="container-fluid page-body-wrapper">

        <div class="content-wrapper"> 
              
                  <div class="page-section">

                        <div class="container">
                              <div class="card">
                                    <div class="card-header flex items-center justify-center"><strong>Instructions</strong></div>
                                          <div class="card-body">
                                            <h2 style="font-size: 20px; text-align: center;">Track to your Application</h2><br>
                                            <!-- Start Div -->

                                            <div>
                                                <h1>Postal Tracking</h1>
                                                <ul class="status-list">
                                                    <li class="{{ $status === 'submitted' ? 'active' : '' }}">
                                                    <i class="fa-regular fa-file"></i>
                                                        <div>
                                                            Submitted
                                                        </div>
                                                    </li>
                                                    <li class="{{ $status === 'processing' ? 'active' : '' }}">
                                                        <i class="fas fa-sync-alt"></i> Processing
                                                    </li>
                                                    <li class="{{ $status === 'completed' ? 'active' : '' }}">
                                                        <i class="fas fa-check-circle"></i> Completed
                                                    </li>
                                                    <li class="{{ $status === 'issued' ? 'active' : '' }}">
                                                        <i class="fas fa-flag"></i> Issued
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Div -->
                                          </div>
                                          
                                    </div>
                              </div>
                        </div>

                  </div>
        </div>

</div>

</div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
    </div>
        <!-- main-panel ends -->
  
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('user.script')
    <!-- End custom js for this page -->
  </body>
</html>