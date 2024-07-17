<?php
ob_start();

session_start();

include 'files/ini.php';

if (isset($_SESSION['username'])) {


   

            ?>
            <!-- <div style="background-color: #f7fafd;;"> -->

            <!-- Header -->

            <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
            <link rel='stylesheet' href='assets/css/login.css'>

            <link rel="stylesheet" href="assets/css/onclick-form-popup.css">

            <script src="assets/js/onclick-form-popup.js"></script>

            <style>
                

/* Start Landing */
.landing {
  position: relative;
  padding: 40px;
}
.landing::before {
  content: "";
  position: absolute;
  left: 0;
  top: -40px;
  width: 100%;
  height: 100%;
  z-index: -1;
  transform: skewY(-6deg);
  transform-origin: top left;
}
.landing .containerr {
  min-height: calc(100vh - 72px);
  display: flex;
  align-items: center;
  padding-bottom: 20px;
}
.landing .text {
    padding-left: 35px;
  flex: 1;
}
@media (max-width: 991px) {
  .landing .text {
    text-align: center;
  }
}
.landing .text h1 {
  font-size: 40px;
  margin: 0;
  letter-spacing: -2px;
}
@media (max-width: 767px) {
  .landing .text h1 {
    font-size: 28px;
  }
}
.landing .text p {
  font-size: 23px;
  line-height: 1.7;
  margin: 5px 0 0;
  color: #666;
  max-width: 500px;
}
@media (max-width: 991px) {
  .landing .text p {
    margin: 10px auto;
  }
}
@media (max-width: 767px) {
  .landing .text p {
    font-size: 18px;
  }
}
.landing .image img {
  position: relative;
  width: 600px;
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
        border-radius: 13px;
}

/* End Landing */

#loader {
  position: absolute;
  left: 45%;
  top: 65%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
.hh{
    margin-left: 25px;
    font-weight: 600;
    font-size: 30px;
    color: #0f61ee;
    text-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

}
            </style>
            <body onload="myFunction()" style="margin:0;">
    <div class="landing">
      <div class="containerr">
        <div class="text">
              <h1 class="hh">Connect alarm to wear device </h1>
        <div id="loaderr">
                <p>Searching for nearby devices......</p>
            </div>


            <div id="loader"></div>

            <div style="display:none; padding: 35px; text-align:left;" id="myDiv" class="animate-bottom">
            <h2>Sorry!</h2>
            <p>There are no devices nearby, <br> please try again later..</p>
                <a href="watch.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s"
        style="margin-bottom:25px;">Try again <i
            class="ti-arrow-right"></i></a>
            </div>
            </div>
        <div class="image">
                        <img src="assets/img/gif.GIF"  class="custom-block-image img-fluid" alt="">
        </div>
      </div>

      </div>
            </body>


<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 8000);
  myVarr = setTimeout(showPage, 8000);

}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
    document.getElementById("loaderr").style.display = "none";
  document.getElementById("myDivr").style.display = "block";
}
</script>


                    

<?php 

} else {

    header('Location: login.php');

    exit();
}


?>
<?php
include 'files/footer.php';
ob_end_flush();
?>