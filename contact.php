<?php
ob_start();
session_start();

  include 'files/ini.php';
?>



                        <div class="slider-area position-relative" style="background-image:none;">
                    <div class="slider-active">
                        <!-- Single Slider -->
                        <div class="single-slider  d-flex align-items-center">

                            <div class="container">
                                <div class="row doc" style="width:50%; margin:auto; padding-top:30px;">
                                    <div class="col-xl-12">
                                        <div class="hero__caption">
                                            <h1 class="cd-headline letters scale" >
                                                <strong class="cd-words-wrapper">
                                                    <b class="is-visible">Connect us</b>
                                                </strong>
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                                                <strong>Connect us or send any question anytime .</strong>
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
  <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="https://formspree.io/f/moqzzjvb" method="post" id="" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">


                        <a href="mailto:medicineguidee@gmail.com">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>medicineguidee@gmail.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>  
                        </div></a>



                     
                        <a  href="https://instagram.com/medicineguidee?igshid=NTc4MTIwNjQ2YQ==">
                        <div class="media contact-info">
                            <span class="contact-info__icon">
                            <i class="fab fa-instagram"></i>
                        </span>
                           <div class="media-body">
                                <h3>@medicineguidee</h3>
                            </div>
                           </div>
                        </a>

                       <a  href="https://twitter.com/medicineguidee">
                        <div class="media contact-info">
                            <span class="contact-info__icon">
                            <i class="fab fa-twitter"></i>
                        </span>
                          <div class="media-body">
                                <h3>@medicineguidee</h3>
                            </div>
                            
                           </div></a> 
                <a href="https://wa.me/+966536343796">
                     <div class="media contact-info">
                            <span class="contact-info__icon"> <i class="fab fa-whatsapp"></i></span>
                            <div class="media-body">
                             <h3><span>+966 </span>53 634 3796 </h3> 
                            </div>
                        </div>
                    </a>
                   </div>
                </div>
            </div>
        </section>

        




<?php
include 'files/footer.php';
ob_end_flush();
?>
