
<?php
ob_start();
session_start();

  include 'files/ini.php';

if (isset($_SESSION['username'])) {
  header('Location: index.php');

  
  exit();
}

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['login'])) {

      $user = $_POST['username'];
      $pass = $_POST['password'];

      $stmt = $con->prepare("SELECT
                                          userid     ,username, password
                                   FROM
                                          users
                                   WHERE
                                          username = :zuser
                                   AND
                                          password = :zpass
                                        ");
      $stmt->execute(
        array(
          'zuser' => $user,
          'zpass' => $pass
        )
      );

      $get = $stmt->fetch();
      $count = $stmt->rowCount();

      if ($count > 0) {
        $_SESSION['username'] = $get['username']; // register session name
        $_SESSION['userid'] = $get['userid']; // register user id in session

        ?>
                 <script type="text/javascript">
                 Swal.fire({
                  icon: 'success',
                   title: 'Logged in successfully ',
                   showConfirmButton: false,
                   timer: 1950,
                 })

                 </script>
                 <?php
                 header("refresh:2;url=index.php");



      } else {

        $formErrors[] = 'The username or password is incorrect';

        ?>       <script type="text/javascript">
                       Swal.fire({
                        icon: 'error',
                         title: 'The username or password is incorrect',
                         showConfirmButton: false,
                         timer: 1950,
                       })

                       </script><?php
      }
    }

    if (isset($_POST['signup'])) {

      $formErrors = array();

      $user = $_POST['username'];
      $phone = $_POST['phone'];
      $pass = $_POST['password'];
      $email = $_POST['email'];

      if (isset($user)) {

        $filteruser = filter_var($user, FILTER_SANITIZE_STRING);

        if (strlen($filteruser) < 4) {

          $formErrors[] = 'Username must contain more than 5 characters';

        ?>       <script type="text/javascript">
                            Swal.fire({
                              icon: 'error',
                              title: 'Username must contain more than 5 characters',
                              showConfirmButton: false,
                              timer: 1950,
                            })

                          </script><?php

        }

      }

      if (empty($formErrors)) {


        $stmt = $con->prepare("SELECT
                                        userid
                                 FROM
                                        users
                                 WHERE
                                        username = :zuser
                          ");
        $stmt->execute(
          array(

            'zuser' => $user
          )
        );

        $get = $stmt->fetch();

        $count = $stmt->rowCount();


        if ($count == 1) {

          $formErrors[] = 'Please choose another username, the name you entered is already used';

                  ?>       <script type="text/javascript">
                       Swal.fire({
                        icon: 'error',
                         title: 'Please choose another username, the name you entered is already used',
                         showConfirmButton: false,
                         timer: 1950,
                       })

                       </script><?php

        } else {

          $stmt = $con->prepare("INSERT INTO
                                    users(username, password, email , phone , status )
                                VALUES(:zuser, :zpassword , :zemail , :zphone, 1)");
          $stmt->execute(
            array(

              'zuser' => $user,
              'zpassword' => $pass,
              'zemail' => $email,
              'zphone' => $phone

          )
          );

          ?>
            <script type="text/javascript">
            Swal.fire({
              title: 'Account successfully created',
              icon: 'success',
              confirmButtonText: 'Ok',
            })
            </script>

            <?php


        }

      }


    }




  }




  if (!empty($formErrors)) {
    foreach ($formErrors as $error) {
      echo '<div class="msg" >' . $error . '</div>';
    }
    header("refresh:3;url=login.php");
  }

  ?>

<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
<link rel='stylesheet' href='assets/css/login.css'>


	<div class="section ltrr">
		<div class="container">
			<div class="row full-height justify-content-center">

				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3  "><span>Login</span><span> Signup</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto" style=" border-radius: 8px;">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
											<h4 class="mb-4 pb-3 h2" style=" color:#ececec; font-size: 35px;">Login</h4>
											<div class="form-group">
												<input type="text" name="username" class="form-style  " placeholder="Username" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
			  								</div>
											<div class="form-group mt-2">
						 						<input type="password" name="password" class="form-style" placeholder="password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                      <input type="submit" name="login" class="btn mt-4" style="border: solid 1px #fff;"  value="login">

                    </form>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<form class="section text-center  " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
											<h4 class="mb-4 pb-3 h2" style="color:#ececec; font-size: 35px;">Signup</h4>
											<div class="form-group">
												<input type="text" name="username" class="form-style" placeholder="username" id="logname" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>

											<div class="form-group mt-2 ">
												<input type="email" name="email" class="form-style  " placeholder="Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>
                      <div class="form-group mt-2 ">
                        <input type="text" name="phone" class="form-style  " placeholder="Phone" id="logemail" autocomplete="off">
                        <i class="input-icon uil uil-phone"></i>
                      </div>
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                      <input type="submit" name="signup" class="btn mt-4" style="border: solid 1px #fff;" value="Signup">
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
  <!-- End Video -->


<?php




  include 'files/footer.php';
  ob_end_flush();
  ?>
