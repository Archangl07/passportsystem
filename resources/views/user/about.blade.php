<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Passportease - Home</title>

        <link rel="stylesheet" href="../assets/css/maicons.css">

        <link rel="stylesheet" href="../assets/css/bootstrap.css">

        <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

        <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

        <link rel="stylesheet" href="../assets/css/theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
        integrity="sha512-AvP9dhK2rL9OWlRc7ShK5QxUk56NI6bY/kGEX8peN4Cz9tW8+Xnu8GbeTpJpO8CtwgfHWNrNem2OLbZFY+r6Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        
</head>

<body>

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
            <a href="https://mail.google.com/" target="_blank"><span class="mai-mail text-primary"></span> mail@passportease.com</a>
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
              <a class="nav-link" href="{{('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{('about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{('services') }}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{('contactus') }}">Contact</a>
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

  <div class="page-section pb-0 pt-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>About Passportease</h1>
            <p class="text-grey mb-4">This is the work of a student under the BEng Hons Software engineering Degree program at London Metropolitan 
                 University.
                 The initial idea that lead to the creation of this Passport system web application was the difficulty that the people of srilanka 
                 suffered to allocate a slot and get their own national passports after the economy crysis post covid. <br>
                 This is a full prototype web application designed using the latest technologies to be more user friendly and more functional to ease
                process of getting a passport online.</p>
    
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

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="timeline">
        <li>
          <div class="timeline-badge bg-primary">2022</div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Project Initiation</h4>
            </div>
            <div class="timeline-body">
              <p>Started working on the Passportease project as part of the BEng Hons Software Engineering Degree program at London Metropolitan University.</p>
            </div>
          </div>
        </li>

        <li class="timeline-inverted">
          <div class="timeline-badge bg-primary">2023</div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Idea Development</h4>
            </div>
            <div class="timeline-body">
              <p>Formulated the initial idea for the Passport System web application in response to the difficulties faced by the people of Sri Lanka in obtaining national passports post-COVID economic crisis.</p>
            </div>
          </div>
        </li>

        <li>
          <div class="timeline-badge bg-primary">2024</div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Web Application Development</h4>
            </div>
            <div class="timeline-body">
              <p>Designed and developed the Passport System web application using the latest technologies to enhance user-friendliness and functionality, addressing the challenges in obtaining passports online.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>


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

</body>
</html>