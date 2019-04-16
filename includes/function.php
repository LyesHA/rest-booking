<?php

//Function that takes an array as argument and display its items
function displayCities($array){
  foreach($array as $key => $value) {
    //$id = $value['City_Id'];
    //$name = $value['Name'];
    //echo $id. " ". $name;
    echo"<div class=\"col-lg-3 col-md-3\">";
    echo"<a href=\"city.php?id=".$value["City_Id"]."\">";
    echo"<div class=\"card text-white\" style=\"	-webkit-box-shadow: 0 1px 2px #777;
    -moz-box-shadow: 0 2px 1px #777;
    box-shadow: 0 2px 1px #777;
  \">";
    echo"<img src=\"./images/".$value["Picture"]."\" class=\"card-img city-img\" alt=\"...\">";
    echo"<div class=\"card-img-overlay\">";
    echo"<h3 class=\"card-title\" style=\"text-align:center;\">".$value["Name"]."</h3>";
    echo"</div></div></a></div>";   
  }
}

//Function that takes an array as argument and display its items
function displayCategories($array){
  foreach($array as $key => $value) {
    echo"<div class=\"col-lg-3 col-md-3 \" style=\"margin-top:25px;\">";
    echo"<a href=\"categories.php?id=".$value["Id"]."\">";
    echo"<div class=\"card text-white \" style=\"-webkit-box-shadow: 0 7px 4px #777;
    -moz-box-shadow: 0 7px 4px #777;
    box-shadow: 0 7px 4px #777;\"> ";
    echo"<img src=\"./images/".$value["Picture"]."\" class=\"card-img cat-img\" alt=\"...\">";
    echo"<div class=\"card-img-overlay\">";
    echo"<h3 class=\"card-title\" style=\"text-align:center;  color: white; font-weight: bold;\">".$value["Name"]."</h3>";
    echo"</div></div></a></div>";   
  }
}


//Function that takes an array as argument and display its items
function displayRestaurants($array){
  foreach($array as $key => $value) {
          /*echo"<div class=\"col-lg-4 col-sm-6 portfolio-item\">";
          echo"<div class=\"card h-100\">";
          echo"<a href=\"#\"><img class=\"card-img-top img-style\" src=\"./images/".$value["Picture"]."\" /></a>";
          echo"<div class=\"card-body\">";
          echo"<h4 class=\"card-title\">";
          echo"<a href=\"#\">".$value["Name"]."</a></h4>";
          echo"<h5>Openning hours:</h5> <p class=\"card-text\">".$value["OpenningHours"]."</p>";
          echo"</div></div></div>";*/

      echo"<div class=\"col-lg-6 col-md-6\">";
      echo"<div class=\"card mb-3\" style=\"max-width: 540px;-webkit-box-shadow:0 0 10px rgba(0, 0, 0, 0.5);
      -moz-box-shadow:0 0 10px rgba(0, 0, 0, 0.5);
      box-shadow:0 0 10px rgba(232, 48, 5, 0.4);\">";
      echo"<div class=\"row no-gutters\">";
      echo"<div class=\"col-md-4\">";
      echo"<img src=\"./images/".$value["Picture"]."\" class=\"img-fluid rounded\" alt=\"...\"></div>";
      echo"<div class=\"col-md-8\"><div class=\"card-body\">";
      echo"<h2 class=\"card-title\">".$value["Name"]."</h2>";
      echo"<p class=\"card-text\">".$value["Address"]."</p>";
      echo"<p class=\"card-text\">".$value["OpenningHours"]."</p>";
      echo"<a href=\"restaurant.php?id=".$value["Restaurant_Id"]."\" class=\"btn btn-primary\">View restaurant</a>
              </div>
            </div>
          </div>
        </div>
    </div>";



  }
}



?>