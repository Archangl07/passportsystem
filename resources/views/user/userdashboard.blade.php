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


        @include('user.body')
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