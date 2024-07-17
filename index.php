<?php
ob_start();
session_start();

  include 'files/ini.php';
?>

<style>
    .md-20{
        margin-top: 20px;
    }
</style>


<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span>Medicine Guide</span>
                                <h1 class="cd-headline letters scale">We care about your
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">Medication</b>
                                        <b>Health</b>
                                        <b>Appointment</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">The site is a reminder of the dates of taking medication so as not to miss it, as well as taking care of your health in the best and latest available ways.</p>
                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Start Now <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- slider Area End-->


    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2 class="h2">Our Services</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="assets/img/1.png"  class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body">
                              <h5 class="mb-3 h5">Manage your Medicine</h5>

                                <p>Add your medicine to be reminded on time and track your health</p>


                            </div>

                            <a href="./med.php" class="custom-btn btn">Add a Medicine</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                      <img src="assets/img/2.png"
                            class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body">
                              <h5 class="mb-3 h5">Manage your Appointment</h5>

                                <p>List your appointment and get a reminder before time.</p>


                            </div>

                            <a href="./appointment.php" class="custom-btn btn">Add an appointment</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="custom-block-wrap">
                      <img src="assets/img/3.png"
                            class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body">
                                <h5 class="mb-3 h5">Healthcare Providers</h5>

                                <p>Keep a list of your Healthcare Providers to easly set appointment.
                                </p>


                            </div>

                            <a href="./doc.php" class="custom-btn btn">Add a doctor</a>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-4 col-md-6 col-12">

                </div>

                <div class="col-lg-4 col-md-6 col-12  md-20">
                    <div class="custom-block-wrap">


                        <div class="custom-block">
                            <div class="custom-block-body">
                                <h5 class="mb-3 h5">Simple Guide</h5>

                                <p>THE NORMAL RANGE OF VITAL SIGNS.
                                </p>


                            </div>

                            <a href="./files/SIMPLE_GUIDE.pdf" class="custom-btn btn">download & show</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




<?php
include 'files/footer.php';
ob_end_flush();
?>
