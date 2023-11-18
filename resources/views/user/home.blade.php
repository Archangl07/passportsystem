<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Passportease - Home</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

  <style>
    .page-hero.bg-image {
      position: relative;
      background-position: center center;
      background-size: cover;
      background-repeat: no-repeat;
      height: 500px; /* Set the height as needed */
    }

    .page-hero.bg-image::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.7;
      background-color: #343531;
    }
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: #FFFFFF;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 100;
    }

    #preloader img {
      width: 150px; /* Adjust the width and height as needed */
      height: 150px;
    }
    
  </style>
</head>
<body>

<!-- preloader -->
<div id="preloader">
  <img src="../assets/img/passportloader1.gif" alt="Loading...">
</div>


  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 text-sm">
          <div class="site-info">
            <a href="#"><span class="mai-call text-primary"></span> +94 777777888</a>
            <span class="divider">|</span>
            <a href="#"><span class="mai-mail text-primary"></span> mail@passportease.com</a>
          </div>
        </div>
        <div class="col-sm-8 text-right text-sm">
          <div class="social-mini-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-dribbble"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
          </div>
        </div>
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="../assets/img/passportease.png" alt="Logo">
        </a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
        
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>

            @if(Route::has('login'))

            @auth
            
            <x-app-layout>

            </x-app-layout>
            
            @else

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3 btn-3d" href="{{('login')}}">Login</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3 btn-3d" href="{{('register')}}">Signup</a>
            </li>

            @endauth

            @endif
          



          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <!-- messagebox condition -->
  @if(session()->has('message'))

  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">
      x
    </button>  

    {{session()->get('message')}}


  </div>

  @endif

  <div class="page-hero bg-image overlay-dark" id="custom-background">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">The all New Srilanka Passport Online system</span>
        <h1 class="display-4">PASSPORT-EASE</h1>

        <a href="{{('login')}}" class="btn btn-primary btn-3d">New Passport</a>
        <a href="{{('login')}}" class="btn btn-primary btn-3d">Passport Renewal</a>
        <a href="{{('appointment') }}#appointment-form" class="btn btn-primary btn-3d">Appointment</a>
        <a href="{{('login')}}" class="btn btn-primary btn-3d">Passport-status</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-3 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-laptop-outline"></span>
              </div>
              <p><span>Application</span> Online</p>
            </div>
          </div>
          <div class="col-md-3 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-scan"></span>
              </div>
              <p><span>Easy</span> Verification</p>
            </div>
          </div>
          <div class="col-md-3 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-location"></span>
              </div>
              <p><span>Track the</span> Process</p>
            </div>
          </div>
          <div class="col-md-3 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                  <span class="mai-documents"></span>
              </div>
              <p><span>Receive</span> Passport</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Passportease <br> Online</h1>
            <p class="text-grey mb-4">Your Gateway to Effortless Passport Services. Embark on a seamless journey with PassportEase - 
              your one-stop solution for swift and hassle-free passport services. 
              Our mission is to simplify the passport application and renewal process, 
              ensuring a stress-free experience for you</p>
            <a href="about.html" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/A350 XWB transparent.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  @include('user.service')

  @include('user.news')

  @include('user.appointment')

  <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/dragon-scales.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../assets/img/mobile_app copy.png" alt="mobileapp">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using PASSPORTEASE Application</h1>
          <a href="#" class="ml-2"><img src="../assets/img/coming_soon.png" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as member</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">SL-immigration</a></li>
            <li><a href="#">SL-MTV</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Main Street Kandy, CP 20000</p>
          <a href="#" class="footer-link">+94 777777888</a>
          <a href="#" class="footer-link">mail@passportease.com</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="" target="_blank">azharazeez</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

<script>
  $(document).ready(function () {
    // Set the background image dynamically
    $('#custom-background').css('background-image', 'url(../assets/img/test1.png)');
  });

  $(window).on('load', function () {
    $('#preloader').delay(2000).fadeOut('slow', function () {
      $(this).remove();
    });
  });
</script>
  
</body>
</html>
