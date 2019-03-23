<?php

   if (isset ( $_POST ["continue"] )) {
	header ( "location: index.php" );
	exit ();
} 




?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Pound Ridge Mechanic</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS-files -->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- JS-files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/js.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="logopicture" alt="" src="img/logo.png">
        </a>
            <div class="d-block d-sm-block d-md-block d-lg-none">
                <button class="navbar-toggler" onclick="openNav()">
<i class="fa fa-navicon"></i>
  </button>
            </div>
            <div class="d-none d-sm-none d-md-none d-lg-block ml-auto">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="color: #363237;" href="#">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">SERVICES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">General Services</a>
                            <a class="dropdown-item" href="#">Engine Services</a>
                            <a class="dropdown-item" href="#">Electrical Services</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #363237;" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #363237;" href="#yhteys">RESERVATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #363237;" href="#yhteys">CHARACTERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #363237;" href="#yhteys">SETTINGS</a>
                    </li>

                </ul>
            </div>
            <div id="myNav" class="kokonaytto">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="kokonaytto-sisalto">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" style="color: #F1F1F2;" href="#">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: #F1F1F2;">SERVICES</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" style="color: #F1F1F2;" href="#">General Services</a>
                                <a class="dropdown-item" style="color: #F1F1F2;" href="#">Engine Services</a>
                                <a class="dropdown-item" style="color: #F1F1F2;" href="#">Electrical Services</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #F1F1F2;" href="#">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #F1F1F2;" href="#yhteys">RESERVATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #F1F1F2;" href="#yhteys">CHARACTERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #F1F1F2;" href="#yhteys">SETTINGS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="ilmoitusviesti" style="background-color: #4c4e50; height: 1000px;">
            <h5 style="color: #F1F1F2;">Your reservation information has been now saved!</h5>
            <br>
            <h5 style="color: #F1F1F2;">Thank you for your reservation.</h5>

            <form action="kiitoslomake.php" method="post">
                <input name="continue" type="submit" class="buttoni2" value="Click here to continue" />
            </form>


        </div>
    </body>

    </html>
