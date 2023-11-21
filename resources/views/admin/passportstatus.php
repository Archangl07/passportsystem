
<!DOCTYPE html>
<html lang="en">
  <head>

  @include('admin.css')
   

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

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

        
                        <div class="card">
                                <div class="card-header flex items-center justify-center"><strong>All appointment requests</strong></div>
                                <form class="main-form" action="" method="POST">
                                <!-- {{ route('update_user', ['id' => $user->id, 'user' => $user->id]) }} -->
                                        @csrf
                                        <div class="row mt-5 ">

                                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                                            <label>Estimated delivery</label>
                                            <input type="Date" style="color:white; background-color:black;" class="form-control" name="estdelivery" placeholder="estimated date" required class="rounded-lg form-input">
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                                            <select name="status" id="status" class="custom-select" required>

                                            <option>---Select Status---</option>

                                            <option value="submitted">Submitted</option>
                                            <option value="processing">Processing</option>
                                            <option value="completed">Completed</option>
                                            <option value="issued">Issued</option>
                                            </select>
                                        </div>

                                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                                            <label>Location</label>
                                            <input type="text" style="color:white; background-color:black;" class="form-control" name="location" placeholder="user address" required class="rounded-lg form-input" readonly>
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

    @include('admin.script')
    <!-- container-scroller -->
    <!-- plugins:js -->
    
  </body>
</html>
