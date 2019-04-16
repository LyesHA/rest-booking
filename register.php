<?php 
  session_start();
  if(isset($_SESSION["userId"])){
    header('location: index.php');
  }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="Lyes Hadj Aissa" />
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/register.css" rel="stylesheet" />
  </head>
  <body>
    <body>
    <?php
      include "model/Member.php";
      $summaryError ="";
                  if(isset($_POST["submit"])){
                    if($_POST["inputPassword"]==$_POST["inputConfirmPassword"]){   
                        if(Member::UserExist($_POST["inputUsername"],$_POST["inputEmail"])){
                          $summaryError = "*The user already exist";
                        }
                        else{
                          $username = $_POST["inputUsername"];
                          $email = $_POST["inputEmail"];
                          $password = $_POST["inputPassword"];
                          $memberObj = new Member(null,$username,$email, $password);
                          $id = $memberObj->Create();
                          
                          $_SESSION["userId"] = $id;
                          header('location: index.php');
                        }
                    }else{
                      $summaryError = "*The passwords don't match";
                    }
                  }
                ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
              <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
              </div>
              <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <form class="form-signin" method="POST">
                  <div class="form-label-group">
                    <input
                      type="text"
                      id="inputUsername"
                      name="inputUsername"
                      class="form-control"
                      placeholder="Username"
                      required
                      autofocus
                    />
                    <label for="inputUsername">Username</label>
                  </div>

                  <div class="form-label-group">
                    <input
                      type="email"
                      id="inputEmail"
                      name="inputEmail"
                      class="form-control"
                      placeholder="Email address"
                      required
                    />
                    <label for="inputEmail">Email address</label>
                  </div>

                  <hr />

                  <div class="form-label-group">
                    <input
                      type="password"
                      id="inputPassword"
                      name="inputPassword"
                      class="form-control"
                      placeholder="Password"
                      required
                    />
                    <label for="inputPassword">Password</label>
                  </div>

                  <div class="form-label-group">
                    <input
                      type="password"
                      id="inputConfirmPassword"       
                      name="inputConfirmPassword"
                      class="form-control"
                      placeholder="Password"
                      required
                    />
                    <label for="inputConfirmPassword">Confirm password</label>
                    
                  </div>
                  <p style="color:red;"><?php echo $summaryError; ?></p>

                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">
                    Register
                  </button>
                  <a class="d-block text-center mt-2 small" href="signin.php">Sign In</a>
                  <hr class="my-4" />
                  <button
                    class="btn btn-lg btn-google btn-block text-uppercase"
                    type="submit"
                  >
                    <i class="fab fa-google mr-2"></i> Sign up with Google
                  </button>
                  <button
                    class="btn btn-lg btn-facebook btn-block text-uppercase"
                    type="submit"
                  >
                    <i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook
                  </button>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
