<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>AgroTech</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home_style.css">
  </head>

  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-default bootsnav fixed-top";>
      <div class="container">
        <a class="navbar-brand" href="index.php"><span class="text-warning">Agro<span class="text-white">Tech</span></a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"> <a class="nav-link" href="login.php"><span class="text-white">Login</span></a> </li>
            <li class="nav-item"> <a class="nav-link" href="#about"><span class="text-white">About Us</span></a> </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Navbar ends-->

    <!--Carousel-->
    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
      <div class="carousel-indicators">
        <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active c-image">
          <img alt="..." class="d-block w-100" src="images/cr01.jpg">
          <div class="carousel-caption">
            <h5>Smart Agriculture</h5>
            <p>Now at your fingertips for an affordable price!</p>
            <p><a class="btn btn-warning mt-3" href="signup.php">Start Farming today!</a></p>
          </div>
        </div>
        <div class="carousel-item c-image">
          <img alt="..." class="d-block w-100" src="images/cr02.jpg">
          <div class="carousel-caption">
            <h5>Increase your yield</h5>
            <p>Take important decisions related to crop health without any uncertainty.</p>
            <p><a class="btn btn-warning mt-3" href="signup.php">Start Farming today!</a></p>
          </div>
        </div>
        <div class="carousel-item c-image">
          <img alt="..." class="d-block w-100" src="images/cr03.jpg">
          <div class="carousel-caption">
            <h5>Stop worrying about crop diseases</h5>
            <p>Contact with professionals on our platform with ease.</p>
            <p><a class="btn btn-warning mt-3" data-aos="fade-up" href="signup.php">Start Farming today!</a></p>
          </div>
        </div>
      </div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
    </div>
    <!--Carousel ends-->

    <div class="container">
        <p class="text-center fs-1 pt-4 pl-4 pr-4" data-aos="fade-up">Our services</p>
    </div>


    <div class="container text-center p-4">
      <div class="row align-items-start">
        <div class="col">
          <div class="card shadow" data-aos="zoom-in" style="width: 18rem;">
            <div class="text-center p-4"><img src="images/service01.jpg" class="card-img-top rounded-circle" style="height:200px; width: 200px;" alt="..."></div>
            <div class="card-body">
              <h5 class="card-title">Remote Monitoring</h5>
              <p class="card-text">Constantly monitor crop health from anywhere in the world and receive actionable insights.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow" data-aos="zoom-in" style="width: 18rem;">
            <div class="text-center p-4"><img src="images/service02.jpg" class="card-img-top rounded-circle" style="height:200px; width: 200px;" alt="..."></div>
            <div class="card-body">
              <h5 class="card-title">Danger Alerts</h5>
              <p class="card-text">Whenever crop health is threatened, receive instant alerts through real-time monitoring by sensors.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow" data-aos="zoom-in" style="width: 18rem;">
            <div class="text-center p-4"><img src="images/service03.jpg" class="card-img-top rounded-circle" style="height:200px; width: 200px;" alt="..."></div>
            <div class="card-body">
              <h5 class="card-title">Contact Experts</h5>
              <p class="card-text">Contact local experts easily whenever you face any issues related to your farm.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4"> <i class="fas fa-gem me-3"></i><span class="text-warning">Agro</span>Tech </h6>
              <p> Bringing smart farming to your hands. </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase fw-bold mb-4">Contact Us</h6>
              <p><i class="fas fa-home me-3"></i> Plot 16 Aftab Uddin Ahmed Rd, Dhaka 1229</p>
              <p><i class="fas fa-envelope me-3"></i>info@example.com</p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-reset fw-bold" href="index.php">Group 10</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>                                          
    <script src="js/app.js"></script>
  </body>
</html>