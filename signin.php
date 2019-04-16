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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet" />
  </head>

  <body>
  <?php 
    include "model/Member.php";
  ?>
    <div class="container-fluid">
      <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
          <div class="login d-flex align-items-center py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                  <h3 class="login-heading mb-4">Welcome back!</h3>

                  <?php 
                  $summaryError ="";
                    if(isset($_POST["submit"])){
                      $id = Member::Login($_POST["inputPassword"], $_POST["inputEmail"]);	
                          if($id == null){
                            $summaryError = "*The email or password is incorrect";
                          }
                          else {
                            $_SESSION["userId"] = $id;
                            header('location: index.php');
                          }
                    }                  
                  ?>
                  <form method="POST">
                    <div class="form-label-group">
                      <input
                        type="email"
                        id="inputEmail"
                        name="inputEmail"
                        class="form-control"
                        placeholder="Email address"
                        required
                        autofocus
                      />
                      <label for="inputEmail">Email address</label>
                    </div>

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

                    <div class="custom-control custom-checkbox mb-3">
                      <input
                        type="checkbox"
                        class="custom-control-input"
                        id="customCheck1"
                      />
                      <label class="custom-control-label" for="customCheck1"
                        >Remember password</label
                      >
                    </div>
                    <p style="color:red;"><?php echo $summaryError; ?></p>
                    <button
                      class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                      type="submit"
                      name="submit"
                    >
                      Sign in
                    </button>
                    <div class="text-center">
                      <a class="small" href="#">Forgot password?</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
