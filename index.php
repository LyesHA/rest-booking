<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Choose your Restuarant" />
    <meta name="author" content="Lyes Hadj Aissa" />

    <title>Resuturant Reservation</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <?php
        include "includes/navbar.php";
        include "model/City.php";
        include "includes/function.php";
    ?>

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('https://images.pexels.com/photos/941861/pexels-photo-941861.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')">
                    <div style="position: absolute;
              top:20px;" class="carousel-caption d-none d-md-block">
                        <h1 style="color:white;">Book Table</h1>
                        <p>Book table in the Restaurant you want!</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('https://images.pexels.com/photos/313700/pexels-photo-313700.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container-fluid jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-11">
                <h1 class="my-4" style="text-shadow: 0 0 3px #FF0000;margin-top:20px;">Categories</h1>
            </div>
            <div class="col-lg-1 col-md-1">
                <h5 class="my-4" style="padding-top: 15px;"><a href="city.php">View all</a></h6>
            </div>
        </div>
        <!-- Marketing Icons Section -->
        <div class="row">    
            <?php 
                include "model/Category.php";
                $Categories=Category::ReadCategoriesLIMIT();
                displayCategories($Categories);

            ?>
        </div>
        <!-- /.row -->
    </div>
    </div>
    <div class="container">
        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-11 col-md-11">
                <h1 class="my-4" style="text-shadow: 0 0 3px #FF0000;margin-top:20px;">Restaurant</h1>
            </div>
            <div class="col-lg-1 col-md-1">
                <h5 class="my-4" style="padding-top: 15px;"><a href="#">View all</a></h6>
            </div>
        </div>

        <div class="row">
            <?php
            include "model/Restaurant.php";
            $Restaurants = Restaurant::ReadRestaurantsLIMIT();
            displayRestaurants($Restaurants);            
            ?>
        </div>
        <hr />
        <div class="row">
            <div class="col-lg-11 col-md-11">
                <h1 class="my-4" style="text-shadow: 0 0 3px #FF0000;margin-top:20px;">City</h1>
            </div>
            <div class="col-lg-1 col-md-1">
                <h5 class="my-4" style="padding-top: 15px;"><a href="#">View all</a></h6>
            </div>
        </div>
        <div class="row">
            <?php
            //using the static method of City class to get the data from the database 
            $Cities = City::ReadCities();
            //Displaying the cities
            displayCities($Cities);            
            ?>
        </div>


        <hr />

    </div>
    <?php
      include "includes/footer.php";
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>