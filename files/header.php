<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Medicine Guide </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/loderr.png">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.css">
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <!-- <link rel="stylesheet" href="assets/css/gijgo.css"> -->
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/animated-headline.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/all.css">

	<link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style media="screen">
  #ii{
    font-size: 20px;
    position: inherit;
    left: 0;
    font-weight: normal;
  }
</style>
</head>

<!-- ? Preloader Start -->
<!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/loderr.png" alt="">
            </div>
        </div>
    </div>
</div> -->
<!-- Preloader Start -->

<header>
<!--? Header Start -->
<div class="header-area">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2 col-md-1">
                    <div class="logo">
                        <a href="index.php"><img src="assets/img/logo/logo22.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="menu-main d-flex align-items-center justify-content-end">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="med.php">Medication</a></li>
                                    <li><a href="appointment.php">Appointment</a></li>
                                    <li><a href="doc.php">Doctors</a></li>
                                    <li><a href="contact.php">Contact</a></li>

                                </ul>
                            </nav>
                        </div>
                        
                        <div class="header-right-btn f-right d-none d-lg-block ml-30">
                            <?php if (!isset($_SESSION['username'])) { ?>
                                     <a href="login.php" class="btn header-btn">
                                         Login</a>
                            <?php } else { ?>
                                     <a href="logout.php" class="btn header-btn" >Logout |
                                     <?php echo $_SESSION['username']; ?>    <i class="fa-solid fa-circle-user " id="ii"></i>
                                         </a>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                
                <!-- Mobile Menu -->

                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
</header>
