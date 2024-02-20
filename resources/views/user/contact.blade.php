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
      <div class="row">
        <div class="col-md-6 mx-auto">
          <h2 class="text-center mb-4">Contact Us</h2>

          <form action="{{ route('contact.submit') }}" method="post">
            @csrf
          
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
              <label for="email">Your Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
              <label for="message">Your Message:</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <div class="mt-4">
            <p>Contact Information:</p>
            <p>Email: <a href="mailto:azharazeez49@gmail.com" target="_blank">info@passportease.com</a></p>
            <p>Phone: +123 456 7890</p>
          </div>
        </div>
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

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rTBZkWWuUHNahSjQZtmeoQYjMvmHe1WYuCTH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-U7U5Jbe5/JB3tbuZ3InWRRKbwe5FdjCJ7/YlInlXnI2KxG5mXQCv1/fRoh5b0Miv" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>