<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Choose your Restuarant" />
    <meta name="author" content="Lyes Hadj Aissa" />

    <title>Restaurant</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation -->
    <?php
        include "includes/navbar.php";
        include "includes/function.php";
        include "model/Restaurant.php";
        include "model/Table.php";
        $restaurant;
        if(isset($_GET["id"])){
            $restaurant = Restaurant::GetRestaurantById($_GET["id"]);
        }
    ?>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('images/<?php echo $restaurant["Picture"];?>')">
                </div>
            </div>
    </div>
    <div class="container-fluid" style="margin-top:30px;margin-bottom:100px;">
        <div class="container" style="">
             
            <h1 class="text-info text-center shadow-sm p-3 mb-5 bg-white rounded" ><i class="fas fa-utensils"></i> <?php echo $restaurant["Name"]; ?> </h1>       
        </div>
        <div class="container">
            <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active lg" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent" style="margin-top:20px;">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                            <i class="fas fa-map-marker-alt" style="color:blue;font-size:20px;"></i>
                            <h3>Address</h3>
                            <p class="font-weight-light"><?php echo $restaurant["Address"]; ?></p>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <i class="fas fa-clock" style="color:blue;font-size:20px;"></i><h3>Openning Hours</h3>
                                
                                <p class="font-weight-light"><?php echo $restaurant["OpenningHours"];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <table class="table">
                            <thead class="thead-dark" >
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Number of people</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $tables = Table::GetRestaurantsTables($restaurant["Restaurant_Id"]);
                                    if(count($tables)== 0){
                                        echo "<tr><td colspan=\"4\">There are no tables in this restaurant.</td></tr>";
                                    }else{              
                                        $num =1;              
                                        foreach($tables as $key => $value){
                                            echo "<tr><td>". ($num++)."</td>";
                                            echo "<td>".$value["NumberOfPeople"]."</td>";     
                                            echo "<td>".$value["Status"]."</td>";
                                            if($value["Status"]=="Available"){
                                            echo "<td>
                                            <button class=\"btn btn-outline-info\"data-toggle=\"modal\" data-target=\"#ModalReservation\" data-whatever=\"".$value["Table_Id"]."\">
                                            Make a reservation</button></td></tr>";
                                            }else{
                                            echo "<td><button class=\"btn btn-outline-info\" disabled>Make a reservation</button></td></tr>";
                                            }
                                        }   
                                    }
                                ?>                                
                            </tbody>
                        </table>  
                        <!-- modal --> 
                        <?php   
                        if(isset($_SESSION["userId"])) { ?>         
                        <div class="modal fade" id="ModalReservation" tabindex="-1" role="dialog" aria-labelledby="ModalReservationLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalReservationLabel">New Reservation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button> 
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                    <div class="form-group">
                                        <input type="text" style="visibility: hidden;" class="form-control" id="TableId" name="TableId" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="ClientName" class="col-form-label">Client name :</label>
                                        <input type="text" class="form-control" id="ClientName" name="ClientName" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="nbrPeople" class="col-form-label">Number of people : </label>
                                        <select class="form-control" id="nbrPeople" name="nbrPeople">
                                        <?php
                                            for($i =1 ;$i<9;$i++){
                                                echo"<option value =".$i.">".$i."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ReservationTime" class="col-form-label">Reservation date :</label>
                                        <input type="datetime-local" class="form-control" id="ReservationTime" name="ReservationTime"/>
                                    </div>

                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submitReservation" class="btn btn-primary">Confirm reservation</button>
                                </div>
                                </form>
                            </div>
                            </div>
                            <?php 
                            
                            }else{?>
                                <div class="modal fade" id="ModalReservation" tabindex="-1" role="dialog" aria-labelledby="ModalReservationLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalReservationLabel">Informations</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button> 
                                </div>
                                <div class="modal-body">
                                    <p>You have to login in order to make a reservation!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="signin.php" class="btn btn-primary">Login</a>
                                </div>
                            </div>
                            </div>

                            <?php    
                            }?>
                            <!-- End modal -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "model/Reservation.php";
    if(isset($_POST["submitReservation"])){
        $ClientName= $_POST["ClientName"];
        $ReservationTime = $_POST["ReservationTime"];
        $NumberOfPeople = $_POST["nbrPeople"];
        $TableId = $_POST["TableId"];
        $MemberId= $_SESSION["userId"];
        $restaurant = new Reservation(null,$ClientName,$ReservationTime, $NumberOfPeople,$TableId,$MemberId);
        $id = $restaurant->Create();

        echo"<div class=\"modal fade\" id=\"ModalReservation\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"ModalReservationLabel\" aria-hidden=\"true\">
                            <div class=\"modal-dialog\" role=\"document\">
                                <div class=\"modal-content\">
                                <div class=\"modal-header\">
                                    <h5 class=\"modal-title\" id=\"ModalReservationLabel\">Informations</h5>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                    </button> 
                                </div>
                                <div class=\"modal-body\">
                                    <p>Your reservation is confirmed!</p>
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-success\" data-dismiss=\"modal\">OK</button>
                                </div>
                            </div>
                            </div>";
    }
      include "includes/footer.php";
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jscript.js"></script>
</body>

</html>