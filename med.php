<?php
ob_start();

session_start();

include 'files/ini.php';

if (isset($_SESSION['username'])) {


    // end alarm code 

    $userid = $_SESSION['userid'];
    $stmtalarm = $con->prepare("SELECT 
                                            *

                                              FROM medicine

                                              WHERE userid = :zid


                                             ");
    // execute the statement
    $stmtalarm->execute(array('zid' => $userid));

    $itemsalarm = $stmtalarm->fetchall();
    // strat alarm code 

    if (!empty($itemsalarm)) {
        foreach ($itemsalarm as $ite) {


            
            $time = $ite['1time'];

            $user_time = substr($time, 0, 5);
            // Get the user input for the time
            $user_time = substr($time, 0, 5);
            // Validate the user input and convert it to a valid date object
            if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $user_time)) {
                $user_date = new DateTime($user_time);
            } else {
                echo "Invalid time format. Please enter HH:MM.";
                exit;
            }
            // Use the setInterval() function in JavaScript to check the current time every second
            echo "<script>
var user_time = '$user_time';
setInterval(function() {
  // Get the current time as a date object
  var now = new Date();
  // Format the current time as HH:MM
  var now_time = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2);
  // Compare the current time with the user input
  if (now_time == user_time) {
    // Do something when the time matches, such as playing an audio file or popping an alert message box
    ringtone = new Audio('./files/ringtone.mp3');
    ringtone.play();
  ringtone.loop = true;

  }
}, 1000);
</script>";



            $time2 = $ite['2time'];

            // Get the user input for the time
            $user_time2 = substr($time2, 0, 5);
            // Validate the user input and convert it to a valid date object
            if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $user_time2)) {
                $user_date = new DateTime($user_time2);
            } else {
                echo "Invalid time format. Please enter HH:MM.";
                exit;
            }
            // Use the setInterval() function in JavaScript to check the current time every second
            echo "<script>
var user_time2 = '$user_time2';
setInterval(function() {
  // Get the current time as a date object
  var now = new Date();
  // Format the current time as HH:MM
  var now_time = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2);
  // Compare the current time with the user input
  if (now_time == user_time2) {
    // Do something when the time matches, such as playing an audio file or popping an alert message box
    ringtone = new Audio('./files/ringtone.mp3');
    ringtone.play();
  ringtone.loop = true;

  }
}, 1000);
</script>";




            $time3 = $ite['3time'];

            // Get the user input for the time
            $user_time3 = substr($time3, 0, 5);
            // Validate the user input and convert it to a valid date object
            if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $user_time3)) {
                $user_date = new DateTime($user_time3);
            } else {
                echo "Invalid time format. Please enter HH:MM.";
                exit;
            }
            // Use the setInterval() function in JavaScript to check the current time every second
            echo "<script>
var user_time3 = '$user_time3';
setInterval(function() {
  // Get the current time as a date object
  var now = new Date();
  // Format the current time as HH:MM
  var now_time = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2);
  // Compare the current time with the user input
  if (now_time == user_time3) {
    // Do something when the time matches, such as playing an audio file or popping an alert message box
    ringtone = new Audio('./files/ringtone.mp3');
    ringtone.play();
  ringtone.loop = true;

  }
}, 1000);
</script>";



        }
        // end alarm code 


    }




    $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

    // START MANAGE page

    if ($do == 'manage') {

        // start manage items page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['docadd'])) {

                $formErrors = array();

                $medname = $_POST['medname'];
                $medtype = $_POST['medtype'];
                $Condition = $_POST['Condition'];

                $firsttime = $_POST['1sttime'];
                $secondtime = $_POST['2sttime'];
                $thirdtime = $_POST['3sttime'];


                $userid = $_SESSION['userid'];


                if (empty($formErrors)) {

                    $stmt = $con->prepare("INSERT INTO
                                         medicine(medname, medtype , HealthCondition, 1time , 2time ,  3time , userid )
                                    VALUES(:zmedname, :zmedtype , :zHealthCondition, :z1time , :z2time, :z3time ,:zuserid)");
                    $stmt->execute(
                        array(

                            'zmedname' => $medname,
                            'zmedtype' => $medtype,
                            'zHealthCondition' => $Condition,
                            'z1time' => $firsttime,
                            'z2time' => $secondtime,
                            'z3time' => $thirdtime ,
                            'zuserid' => $userid


                        )
                    );

                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                            title: 'Medicine successfully added',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                        })
                    </script>

                    <?php
                    header("refresh:3;url=" . $_SERVER['PHP_SELF']);


                }
            }
        }

        $userid = $_SESSION['userid'];


        $stmt = $con->prepare("SELECT 
                                            *

                                            FROM medicine


                                              WHERE userid = :zid

                                           ORDER BY
                                                 medid

                                             ");
        // execute the statement

        $stmt->execute(array('zid' => $userid));



        $items = $stmt->fetchall();

        if (!empty($items)) {

   

            ?>
            <!-- <div style="background-color: #f7fafd;;"> -->

            <!-- Header -->

            <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
            <link rel='stylesheet' href='assets/css/login.css'>

            <link rel="stylesheet" href="assets/css/onclick-form-popup.css">

            <script src="assets/js/onclick-form-popup.js"></script>

            <style>

                .option {
            padding: 13px 20px;
                padding-left: 55px;
                height: 48px;
                width: 300px;
            font-weight: 500;
            border-radius: 4px;
            font-size: 14px;
            line-height: 22px;
            letter-spacing: 0.5px;
            outline: none;
            color: #fff;
            background-color: #5fb2f1f5;
            border: none;
            -webkit-transition: all 200ms linear;
            transition: all 200ms linear;
            box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);


            }
    </style>



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
                                                    <b class="is-visible">Medicine</b>
                                                </strong>
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                                                <strong>Manage and List your Medicine</strong>
                                                add your Medicine to be reminded on time and track your health.
                                            </p>
                                            <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s"
                                                id="get-started" style="margin-bottom:25px;">Add a Medicine <i
                                                    class="ti-arrow-right"></i></a>
                                           <a href="watch.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s"
                                               style="margin-bottom:25px;">Connect alarm <i
                                                    class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="table-responsive">
                        <table class="main-table text-center table table-borderd">
                            <tr>
                                <td>medname</td>
                                <td>type</td>
                                <td>Condition</td>
                                <td>1time</td>
                                <td>2time</td>
                                <td>3time</td>
                            </tr>

                    <?php

                    foreach ($items as $item) {
                        echo "<tr>";
                        echo "<td>" . $item['medname'] . "</td>";
                        echo "<td>" . $item['medtype'] . "</td>";
                        echo "<td>" . $item['HealthCondition'] . "</td>";
                        echo "<td>" . $item['1time'] . "</td>";
                        echo "<td>" . $item['2time'] . "</td>";
                        echo "<td>" . $item['3time'] . "</td>";
                        echo "</tr>";
                    }

                    ?>

                </table>


                        </div>
                    </div>

                <div class="section ltrr">
                    <div class="container">
                        <div class="row full-height justify-content-center" style=" min-height: auto;">

                            <div class="col-12 text-center align-self-center py-5" id="popup-container">
                                <div class="section pb-5 pt-5 pt-sm-2 text-center" id="popup-window">

                                    <div class="card-3d-wrap mx-auto" style=" border-radius: 8px; height:640px;">

                                        <div class="card-3d-wrapper" style=" top: -70px;">
                                            <div class="card-front">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>

                                                <div class="center-wrap">

                                            <form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                            method="post">
                                            <h4 class="mb-4 pb-3 h2" style=" color:#ececec; font-size: 35px;">Add Medicine
                                            </h4>

                                            <div class="form-group  mt-2">
                                                <input type="text" name="medname" class="form-style  "
                                                    placeholder="Medicine name" id="medname" autocomplete="on">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>

                                            <div class="form-group  mt-2">
                                                <input type="text" name="medtype" class="form-style  "
                                                    placeholder="Medicine form or type" id="medtype" autocomplete="on">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>

                                            <div class="form-group  mt-2">
                                                <input type="text" name="Condition" class="form-style  "
                                                    placeholder="Health Condition " id="Condition" autocomplete="on">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            
                                            <h5  style=" color:#ececec; font-size: 18px; margin-bottom:0; padding-bottom: 0; margin-top:15px;" 
                                            class="h2">1st alarm per day
                                            </h5>

                                            <div class="form-group mt-2">
                                                <input type="time" name="1sttime" class="form-style" 
                                                    id="1sttime" autocomplete="on">
                                            </div>

                                          <h5  style=" color:#ececec; font-size: 18px; margin-bottom:0; padding-bottom: 0; margin-top:15px;" 
                                            class="h2">2st alarm per day
                                            </h5>

                                            <div class="form-group mt-2">
                                                <input type="time" name="2sttime" class="form-style" 
                                                    id="2sttime" autocomplete="on">
                                            </div>


                                            
                                          <h5  style=" color:#ececec; font-size: 18px; margin-bottom:0; padding-bottom: 0; margin-top:15px;" 
                                            class="h2">3st alarm per day
                                            </h5>

                                            <div class="form-group mt-2">
                                                <input type="time" name="3sttime" class="form-style" 
                                                    id="2sttime" autocomplete="on">
                                            </div>



                                            <input type="submit" name="docadd" class="btn mt-4"
                                                style="border: solid 1px #fff;" value="Add">

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

<?php } else { ?>
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
                                <h1 class="cd-headline letters scale" >
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">Medicine</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                                    <strong>Manage and List your Medicine</strong>
                                    add your Medicine to be reminded on time and track your health.
                                </p>


                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s"
                                    id="get-started" style="margin-bottom:25px;">Add a Medicine <i
                                        class="ti-arrow-right"></i></a>
                                <h1 class="cd-headline letters scale" style="margin-top:40px;">
                                    <strong class=" is-visible">
                                        There is no data to show
                                    </strong>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<div class="section ltrr">
    <div class="container">
        <div class="row full-height justify-content-center" style=" min-height: auto;">

            <div class="col-12 text-center align-self-center py-5" id="popup-container">
                <div class="section pb-5 pt-5 pt-sm-2 text-center" id="popup-window">

                    <div class="card-3d-wrap mx-auto" style=" border-radius: 8px; height:640px;">

                        <div class="card-3d-wrapper" style=" top: -70px;">
                            <div class="card-front">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>

                                <div class="center-wrap">

                            <form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                                    method="post">
                                                    <h4 class="mb-4 pb-3 h2" style=" color:#ececec; font-size: 35px;">Add
                                                        Appointment
                                                    </h4>

                                                    <div class="form-group  mt-2">
                                                        <input type="text" name="medname" class="form-style  "
                                                            placeholder="Medicine name" id="medname" autocomplete="on">
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>

                                                    <div class="form-group  mt-2">
                                                        <input type="text" name="medtype" class="form-style  "
                                                            placeholder="Medicine form or type" id="medtype" autocomplete="on">
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>

                                                    <div class="form-group  mt-2">
                                                        <input type="text" name="Condition" class="form-style  "
                                                            placeholder="Health Condition " id="Condition" autocomplete="on">
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>

                                                    <h5 style=" color:#ececec; font-size: 18px; margin-bottom:0; padding-bottom: 0; margin-top:15px;"
                                                        class="h2">1st alarm per day
                                                    </h5>

                                                    <div class="form-group mt-2">
                                                        <input type="time" name="1sttime" class="form-style" id="1sttime"
                                                            autocomplete="on">
                                                    </div>

                                                    <h5 style=" color:#ececec; font-size: 18px; margin-bottom:0; padding-bottom: 0; margin-top:15px;"
                                                        class="h2">2st alarm per day
                                                    </h5>

                                                    <div class="form-group mt-2">
                                                        <input type="time" name="2sttime" class="form-style" id="2sttime"
                                                            autocomplete="on">
                                                    </div>



                                                    <h5 style=" color:#ececec; font-size: 18px; margin-bottom:0; padding-bottom: 0; margin-top:15px;"
                                                        class="h2">3st alarm per day
                                                    </h5>

                                                    <div class="form-group mt-2">
                                                        <input type="time" name="3sttime" class="form-style" id="2sttime"
                                                            autocomplete="on">
                                                    </div>



                                                    <input type="submit" name="docadd" class="btn mt-4"
                                                        style="border: solid 1px #fff;" value="Add">

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