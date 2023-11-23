<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('user.css')

<!-- Add this to your HTML head to include FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    .status-list {
        font-size: 24px; /* Adjust the size as needed */
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        list-style: none;
        padding: 5;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .status-list li {
        color: grey;
        margin: 0 10px;
        cursor: pointer;
    }

    .status-list li i {
        margin-right: 20;
    }

    .status-list li.active {
        color: #007bff; /* Change the color as needed */
        font-weight: bold;

    /* CSS for smaller screens */
    @media (max-width: 600px) {
    .status-list {
        flex-direction: column; /* Stack the list items vertically */
    }
    }
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
                                                
                                                <ul class="status-list">
                                                    <li class="{{ $status === 'submitted' ? 'active' : '' }}">
                                                    <i class="far fa-file"></i>
                                                        <div>
                                                            Submitted
                                                        </div>
                                                    </li>
                                                    <li class="{{ $status === 'processing' ? 'active' : '' }}">
                                                        <i class="fas fa-sync-alt"></i> 
                                                        <div>
                                                            Processing
                                                        </div>
                                                    </li>
                                                    <li class="{{ $status === 'completed' ? 'active' : '' }}">
                                                        <i class="fas fa-check-circle"></i> 
                                                        <div>
                                                            Completed
                                                        </div>
                                                    </li>
                                                    <li class="{{ $status === 'issued' ? 'active' : '' }}">
                                                        <i class="fas fa-flag"></i> 
                                                        <div>
                                                            Issued
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div ><br>
                                            <p style="text-align: center;">1. Submitted -> Administrator has approved the application, forwarded to immigration 
                                                        department <br>
                                                        2. Processing -> The materials is being prepared and have reached 1st stage <br>
                                                        3. Completed -> The passport has been printed <br>
                                                        4. Issued -> The passport is destributed to the delivery company

                                                    </p>
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