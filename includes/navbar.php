
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top bg-primary">
        <div class="container">
            <a class="navbar-brand" href="./index.php">Choose Your Restaurant</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="./index.php" class="" style="color:white;">Home</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                <?php 
                if(!isset($_SESSION["userId"])){
                    echo" <button style=\"margin-right: 10px;\" type=\"button\" class=\"btn btn-secondary\">";
                    echo"<a href=\"signin.php\">Sign in</a>";
                    echo"</button><button type=\"button\" class=\"btn btn-primary\">";
                    echo"<a style=\"color:white;\" href=\"register.php\">Sign up</a></button>";
                }
                else{
                    echo"</button><button type=\"button\" class=\"btn btn-primary\">";
                    echo"<a style=\"color:white;\" href=\"logout.php\">Log out</a></button>";
                }
                ?>                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Language </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">French</a>
                            <a class="dropdown-item active" href="#">English</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>