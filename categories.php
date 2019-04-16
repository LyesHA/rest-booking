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

    <title>Restaurants</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <?php
        include "includes/navbar.php";
        include "includes/search.php";
        include "includes/function.php";
    ?>   

<div class="container">
  <div class="row">
        <?php 
            include "model/Restaurant.php";

            if(isset($_GET["inputSearch"]) && !empty($_GET["inputSearch"])){
              $Restaurants=Restaurant::GetRestaurantbyName($_GET['inputSearch']);
          }            
          else if(isset($_GET['id'])){
              $Restaurants=Restaurant::ReadRestaurantByCategorie($_GET['id']);
          }else{
              $Restaurants=Restaurant::ReadRestaurants();
          }
          displayRestaurants($Restaurants);
        ?>
  </div>
</div>

    <?php
      include "includes/footer.php";
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>