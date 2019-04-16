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

    <title>Categories</title>

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

    <!-- Page Content -->
    <div class="container" style="margin-bottom:10px;">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="my-4">Categories</h1>
            </div>
        </div>
        <!-- Marketing Icons Section -->
        <div class="row">

        <?php 
            include "model/Category.php";
            if(isset($_GET["inputSearch"]) && !empty($_GET["inputSearch"])){
                $Categories=Category::GetCategoriesByName($_GET['inputSearch']);
            }            
            else if(isset($_GET['id'])){
                $Categories=Category::ReadCategoriesById($_GET['id']);
            }else{
                $Categories=Category::ReadCategories();
            }
            displayCategories($Categories);
        ?>
        </div>
        <!-- /.row -->
    </div>


    <?php
      include "includes/footer.php";
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>