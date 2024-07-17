<?php
ob_start();

session_start();

include 'files/ini.php';

if (isset($_SESSION['username'])) {


    // end alarm code 

    $userid = $_SESSION['userid'];
    $stmtalarm = $con->prepare("SELECT 
                                            *

                                            FROM appointment


                                              WHERE userid = :zid


                                             ");
    // execute the statement
    $stmtalarm->execute(array('zid' => $userid));

    $itemsalarm = $stmtalarm->fetchall();
    // strat alarm code 

    if (!empty($itemsalarm)) {
        foreach ($itemsalarm as $ite) {
            $time = $ite['apptime'];

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

                $title = $_POST['Title'];
                $time = $_POST['time'];
                $date = $_POST['date'];
                $doctor = $_POST['doctor'];


                $userid = $_SESSION['userid'];

                // echo $date . '  ' . $time . '  ' . $doctor . ' ' . $userid . '  ' . $title  ;

                if (empty($formErrors)) {

                    $stmt = $con->prepare("INSERT INTO
                                        appointment(title, appdate , apptime , docid ,  userid  )
                                    VALUES(:ztitle, :zappdate , :zapptime, :zdocid , :zuserid)");
                    $stmt->execute(
                        array(

                            'ztitle' => $title,
                            'zappdate' => $date,
                            'zapptime' => $time,
                            'zdocid' => $doctor,
                            'zuserid' => $userid

                        )
                    );

                    ?>
                    <script type="text/javascript">
                        Swal.fire({
                            title: 'Appointment successfully added',
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
                                 appointment.* ,
                                 doctors.docname  ,
                                 doctors.speciality

                                 FROM appointment

                                 INNER JOIN
                                     doctors
                                 ON
                                     doctors.docid = appointment.docid
                                
                                 WHERE appointment.userid= :zid
                                
                                ORDER BY
                                                 appoint_id
                                            DESC

                                             ");
        // execute the statement

        $stmt->execute(array('zid' => $userid));

        



        $items = $stmt->fetchall();

        if (!empty($items)) {



                        $stmt3 = $con->prepare("SELECT
                                        *
                                 FROM
                                        doctors
                                 WHERE
                                        userid = :zuserid

                                        ");
            $stmt3->execute(
                array(


                    'zuserid' => $userid

                )
            );

            $gets = $stmt3->fetchall();

            


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
                                <div class="row doc" style="width:65%; margin:auto; padding-top:30px;">
                                    <div class="col-xl-12">
                                        <div class="hero__caption">
                                            <h1 class="cd-headline letters scale" >
                                                <strong class="cd-words-wrapper">
                                                    <b class="is-visible">Appointment</b>
                                                </strong>
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                                                <strong>Manage and List your appointment</strong>
                                                and get a reminder before time.
                                            </p>
                                            <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s"
                                                id="get-started" style="margin-bottom:25px;">Add a appointment <i
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
                                <td>Title</td>
                                <td>DocName</td>
                                <td>speciality</td>
                                <td>Date</td>
                                <td>Time</td>
                            </tr>

                    <?php

                    foreach ($items as $item) {
                        echo "<tr>";
                        echo "<td>" . $item['title'] . "</td>";
                        echo "<td>" . $item['docname'] . "</td>";
                        echo "<td>" . $item['speciality'] . "</td>";
                        echo "<td>" . $item['appdate'] . "</td>";
                        echo "<td>" . $item['apptime'] . "</td>";
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

                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto" style=" border-radius: 8px;">

                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>

                                        <div class="center-wrap">

                                    <form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                    method="post">
                                    <h4 class="mb-4 pb-3 h2" style=" color:#ececec; font-size: 35px;">Add Appointment
                                    </h4>

                                    <div class="form-group  mt-2">
                                        <input type="text" name="Title" class="form-style  "
                                            placeholder="Title" id="Title" autocomplete="on">
                                        <i class="input-icon uil uil-user"></i>
                                    </div>

                                    <div class="form-group mt-2">
                                    <input type="date" name="date" class="form-style" 
                                            id="logpass" autocomplete="on">
                                    </div>


                                    <div class="form-group mt-2">
                                        <input type="time" name="time" class="form-style" 
                                            id="logpass" autocomplete="on">
                                    </div>

                                    
                                    <div class="form-group mt-2">

                                            <select name="doctor" class="form-style"   style="font-weight:600;   border:solid 2px #5995fd;  cursor: pointer; letter-spacing:1px;disply:block;" required name="doctors">

                                                            <option class="form-style" value=""> Doctor name </option>
                                                            <?php

                                                         foreach ($gets as $get) {
                                                                ?>
                                                                <option class="form-style" style="background:black;"
                                                                    value="<?php echo $get['docid']; ?>"> <?php echo $get['docname']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
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
                                                    <b class="is-visible">Appointment</b>
                                                </strong>
                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay="0.1s" style="margin-bottom:5px;">
                                                <strong>Manage and List your appointment</strong>
                                                and get a reminder before time.
                                            </p>

                                <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s"
                                    id="get-started" style="margin-bottom:25px;">Add a appointment <i
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

                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto" style=" border-radius: 8px;">

                        <div class="card-3d-wrapper">
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
                                                        <input type="text" name="Title" class="form-style  " placeholder="Title"
                                                            id="Title" autocomplete="on">
                                                        <i class="input-icon uil uil-user"></i>
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <input type="date" name="date" class="form-style" id="logpass"
                                                            autocomplete="on">
                                                    </div>


                                                    <div class="form-group mt-2">
                                                        <input type="time" name="time" class="form-style" id="logpass"
                                                            autocomplete="on">
                                                    </div>


                                                    <div class="form-group mt-2">

                                            <select name="doctor" class="form-style"   style="font-weight:600;   border:solid 2px #5995fd;  cursor: pointer; letter-spacing:1px;disply:block;" required name="doctors">

                                                            <option class="form-style" value=""> Doctor name </option>
                                                            <?php

                                                             $stmt3 = $con->prepare("SELECT  *   FROM doctors   WHERE  userid = :zuserid ");
                                                                        $stmt3->execute(
                                                                            array(
                                                                                'zuserid' => $userid

                                                                            )
                                                                        );

                                                                        $gets = $stmt3->fetchall();

                                                         foreach ($gets as $get) {
                                                                ?>
                                                                <option class="form-style" style="background:black;"
                                                                    value="<?php echo $get['docid']; ?>"> <?php echo $get['docname']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
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