<?php

include 'koneksi.php';

session_start();


  if(isset($_SESSION['email_admin'])) {
    $isLoggedIn = true;
    $namaAdmin = $_SESSION['nama_admin']; // Ambil nama user dari session
  } else if(isset($_SESSION['email_pelanggan'])) {
    $isLoggedIn = true;
    $namaPelanggan = $_SESSION['nama_pelanggan']; // Ambil nama user dari session
  } 

  else {
      $isLoggedIn = false;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Reservasi Futsal</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/home/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/home/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Futsal</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="lapangan.php">Lapangan</a></li>
          <li><a href="rating.php">Rating</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <?php if($isLoggedIn): ?>

        <?php if(isset($_SESSION['email_admin'])): ?>
        <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="admin">Dashboard</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <?php else: ?>
          <nav id="navmenu" class="navmenu">
          <ul>
          <li class="dropdown"><a href="#"><span><?= $_SESSION['nama_pelanggan'] ?></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Booking</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
          </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
        <?php endif; ?>
      <?php else: ?>
      <a class="btn-getstarted" href="login.php">Login</a>
      <?php endif; ?>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Book Your Favorite<br>Futsal Field Now!</h1>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Book a Field</a>
              <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/home/img/futsal.avif" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->


  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/home/vendor/php-email-form/validate.js"></script>
  <script src="assets/home/vendor/aos/aos.js"></script>
  <script src="assets/home/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/home/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/home/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/home/js/main.js"></script>

</body>

</html>