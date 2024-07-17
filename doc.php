
<?php
ob_start();

session_start();

include 'files/ini.php';

  if (isset($_SESSION['username'])) {

    $do = isset($_GET['do']) ?  $_GET['do'] : 'manage';

    // START MANAGE page

     if ($do == 'manage'){

            // start manage items page

                             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                               if (isset($_POST['docadd'])) {

                                       $formErrors = array();

                                       $docname = $_POST['docname'];
                                       $phone = $_POST['phone'];
                                       $speciality = $_POST['speciality'];
                                       $userid = $_SESSION['userid'];


                                       if (empty($formErrors)) {

                                           $stmt = $con->prepare("INSERT INTO
                                                                     doctors(docname, speciality , phone , userid  )
                                                                 VALUES(:zdocname, :zspeciality , :zphone, :zuserid)");
                                           $stmt->execute(
                                             array(

                                               'zdocname' => $docname,
                                               'zspeciality' => $speciality,
                                               'zphone' => $phone,
                                               'zuserid' => $userid

                                           )
                                           );

                                           ?>
                                             <script type="text/javascript">
                                             Swal.fire({
                                               title: 'Doctor successfully added',
                                               icon: 'success',
                                               confirmButtonText: 'Ok',
                                             })
                                             </script>

                                             <?php
                                             header("refresh:3;url=".$_SERVER['PHP_SELF']);


                                       }
                                  }
                             }
                             
              $userid =  $_SESSION['userid'];


               $stmt = $con->prepare("SELECT
                                            *

                                            FROM doctors


                                              WHERE userid = :zid

                                           ORDER BY
                                                 docid
                                            DESC
                                             ");
               // execute the statement

               $stmt->execute(array('zid' => $userid));


               // assign to variable

               $items = $stmt->fetchall();

               if (! empty($items)) {





             ?>

             <!-- Header -->

             <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
             <link rel='stylesheet' href='assets/css/login.css'>


             <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
             <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet"> -->
             <link rel="stylesheet" href="assets/css/onclick-form-popup.css">

             <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
             <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
             <script src="assets/js/onclick-form-popup.js"></script>

             <div class="slider-area position-relative" style="background-image:none;">
                 <div class="slider-active">
                     <!-- Single Slider -->
                     <div class="single-slider  d-flex align-items-center">

             <div class="container">
                 <div class="row doc" style="width:50%; margin:auto; padding-top:30px;">
                     <div class="col-xl-12">
                         <div class="hero__caption">
                             <h1 class="cd-headline letters scale">
                                 <strong class="cd-words-wrapper">
                                     <b class="is-visible">Doctors</b>
                                 </strong>
                             </h1>
                             <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                                <strong>List your doctors</strong>
                                Keep a list of your Healthcare Providers to easly set appointment.</p>
                             <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s" id="get-started" style="margin-bottom:25px;">Add a doctor <i class="ti-arrow-right"></i></a>

                         </div>
                     </div>
                 </div>
             </div>

           </div>
         </div>
       </div>

           <div class="container"  >
                 <div class="table-responsive">
                       <table class="main-table text-center table table-borderd">
                             <tr>
                                 <td>DocName</td>
                                 <td>speciality</td>
                                 <td>phone</td>

                             </tr>

                             <?php

                                 foreach ($items as $item) {
                                       echo "<tr>";
                                             echo "<td>" . $item['docname'] . "</td>" ;
                                             echo "<td>" . $item['speciality'] . "</td>" ;
                                             echo "<td>" . $item['phone'] . "</td>" ;

                                       echo "</tr>";
                                 }

                              ?>

                       </table>
                 </div>
           </div>
           <!-- <div id="popup-container">
             <div id="popup-window">
               <div class="modal-content">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <a href="#" class="your-class"></a>
                 <div>
                   <div class="row text-center">
                     <h1>GET STARTED</h1>
                     <hr>
                     <p>Fill out the form below to get started today!</p>
                   </div>
                   <br>
                   <form action="" method="post" id="footer-form">
                     <div class="row">
                       <div class="col-md-6">
                         <input class="form-control" name="first_name" id="first_name" placeholder="First Name *" required>
                       </div>
                       <div class="col-md-6">
                         <input class="form-control" name="last_name" id="last_name" placeholder="Last Name *" required>
                       </div>
                     </div>
                     <br>
                     <div class="row">
                       <div class="col-md-6">
                         <input class="form-control" name="email" id="email" placeholder="Your Email *"required>
                       </div>
                       <div class="col-md-6">
                         <input class="form-control" name="phone" placeholder="Phone *" id="phone">
                         <br>
                       </div>
                     </div>
                     <center>
                       <input type="submit" class="btn btn-primary" value="Submit">
                     </center>
                   </form>
                   <br>
                 </div>
               </div>
             </div>
           </div> -->

           <div class="section ltrr"  >
         		<div class="container" >
         			<div class="row full-height justify-content-center" style=" min-height: auto;">

         				<div class="col-12 text-center align-self-center py-5" id="popup-container">
         					<div class="section pb-5 pt-5 pt-sm-2 text-center" id="popup-window">

         			          	<label for="reg-log"></label>
         						<div class="card-3d-wrap mx-auto" style=" border-radius: 8px;">

         							<div class="card-3d-wrapper">
         								<div class="card-front">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

         									<div class="center-wrap">

         										<form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
         											<h4 class="mb-4 pb-3 h2" style=" color:#ececec; font-size: 35px;">Add Doctor</h4>
         											<div class="form-group">
         												<input type="text" name="docname" class="form-style  " placeholder="Doctor Name" id="logemail" autocomplete="on">
         												<i class="input-icon uil uil-user"></i>
         			  								</div>
                                <div class="form-group mt-2">
                                  <input type="text" name="speciality" class="form-style  " placeholder="Speciality" id="logemail" autocomplete="on">
                                  <i class="input-icon uil uil-heart-medical"></i>
                                </div>
         											<div class="form-group mt-2">
         						 						<input type="number" name="phone" class="form-style" placeholder="Phone" id="logpass" autocomplete="on">
         												<i class="input-icon uil uil-phone-alt"></i>
         											</div>
                               <input type="submit" name="docadd" class="btn mt-4" style="border: solid 1px #fff;"  value="Add">

                             </form>
         			      					</div>
         			      				</div>
         			      			</div>
         			      		</div>
         			      	</div>
         		      	</div>

         	      	</div>
         	    </div>
         	</div>

        <?php   }else {?>
          <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
          <link rel='stylesheet' href='assets/css/login.css'>


          <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
          <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet"> -->
          <link rel="stylesheet" href="assets/css/onclick-form-popup.css">

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
          <script src="assets/js/onclick-form-popup.js"></script>

          <div class="slider-area position-relative" style="background-image:none;">
              <div class="slider-active">
                  <!-- Single Slider -->
                  <div class="single-slider  d-flex align-items-center">

          <div class="container">
              <div class="row doc" style="width:50%; margin:auto; padding-top:30px;">
                  <div class="col-xl-12">
                      <div class="hero__caption">
                          <h1 class="cd-headline letters scale">
                              <strong class="cd-words-wrapper">
                                  <b class="is-visible">Doctors</b>
                              </strong>
                          </h1>
                          <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                             <strong>List your doctors</strong>
                             Keep a list of your Healthcare Providers to easly set appointment.</p>
                          <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s" id="get-started" style="margin-bottom:25px;">Add a doctor <i class="ti-arrow-right"></i></a>
                          <h1 class="cd-headline letters scale" style="margin-top:40px;">
                              <strong class=" is-visible">
                                There is no data  to show
                              </strong>
                          </h1>
                      </div>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>

    <div class="section ltrr"  >
     <div class="container" >
       <div class="row full-height justify-content-center" style="min-height: auto;">

         <div class="col-12 text-center align-self-center py-5" id="popup-container">
           <div class="section pb-5 pt-5 pt-sm-2 text-center" id="popup-window">

                   <label for="reg-log"></label>
             <div class="card-3d-wrap mx-auto" style=" border-radius: 8px;">

               <div class="card-3d-wrapper">
                 <div class="card-front">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                   <div class="center-wrap">

                     <form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                       <h4 class="mb-4 pb-3 h2" style=" color:#ececec; font-size: 35px;">Add Doctor</h4>
                       <div class="form-group">
                         <input type="text" name="docname" class="form-style  " placeholder="Doctor Name" id="logemail" autocomplete="on">
                         <i class="input-icon uil uil-user"></i>
                         </div>
                         <div class="form-group mt-2">
                           <input type="text" name="speciality" class="form-style  " placeholder="Speciality" id="logemail" autocomplete="on">
                           <i class="input-icon uil uil-heart-medical"></i>
                         </div>
                       <div class="form-group mt-2">
                         <input type="number" name="phone" class="form-style" placeholder="Phone" id="logpass" autocomplete="on">
                         <i class="input-icon uil uil-phone-alt"></i>
                       </div>
                        <input type="submit" name="docadd" class="btn mt-4" style="border: solid 1px #fff;"  value="Add">

                      </form>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

           </div>
       </div>
   </div>

          <?php
         }
          // end manage items page


       }

     } else {

         header('Location: login.php');

         exit();
     }


?>
  <?php
		  include 'files/footer.php';
		  ob_end_flush();
		  ?>
