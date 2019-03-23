<?php
require_once "tarkistus.php";

session_start();


 
if (isset ( $_POST ["submit"] )) {
    
 $ilmoitus = new ilmoitus($_POST["registration"], $_POST["kello"], $_POST["paivamaara"], $_POST["email"], $_POST["information"] );
    
    $_SESSION["ilmoitus"] = $ilmoitus;
 session_write_close();
    
    
    
    $registrationVirhe = $ilmoitus->checkRegistration();
     $kelloVirhe = $ilmoitus->checkKello();
    $paivamaaraVirhe = $ilmoitus->checkPaivamaara();
    $emailVirhe = $ilmoitus->checkEmail();
    $informationVirhe = $ilmoitus->checkInformation();
    
      if ($registrationVirhe == 0 && $kelloVirhe == 0 && $paivamaaraVirhe == 0 && $emailVirhe == 0 && $informationVirhe == 0) {
          
          
        header("location: ilmoitusnaytto.php");
        exit();
    }
       
} 
elseif (isset ( $_POST ["cancel"] )) {
     unset($_SESSION["ilmoitus"]);
	header ( "location: index.php" );
	exit ();
} 
else {
    if (isset($_SESSION["ilmoitus"])) {
        $ilmoitus = $_SESSION["ilmoitus"];
        $registrationVirhe = $ilmoitus->checkRegistration();
     $kelloVirhe = $ilmoitus->checkKello();
    $paivamaaraVirhe = $ilmoitus->checkPaivamaara();
    $emailVirhe = $ilmoitus->checkEmail();
    $informationVirhe = $ilmoitus->checkInformation();
        
    } 
    
    else {
    $ilmoitus = new Ilmoitus();
    $registrationVirhe = 0;
    $kelloVirhe = 0;
    $paivamaaraVirhe = 0;
    $emailVirhe = 0;
    $informationVirhe = 0;
        }
    
} 

if (isset($_COOKIE["registration"])) { 
    $uusinimi = "Tervetuloa takaisin " . $_COOKIE["registration"];
}else {
    $uusinimi = "";
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
            <a class="navbar-brand" href="index.php"><img class="logopicture" alt="" src="img/logo.png">
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
                        <a class="nav-link" style="color: #363237;" href="listaa.php">CHARACTERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #363237;" href="asetukset.php">SETTINGS</a>
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
        <div class="section1" id="slideshow">

            <div>
                <div class="kuvateksti">
                    <h1 class="landingarticle">QUALITY CAR</h1>
                    <h1 class="landingarticle2">MAINTENANCE</h1>
                    <span class="frontpagebutton">Read More</span>
                    <a class="keskitys" href="#"><i class="fa fa-angle-down"></i></a>
                </div>
                <img alt="" src="img/optimized2.jpg">
            </div>
            <div>
                <div class="kuvateksti">
                    <h1 class="landingarticle">YOUR ONE STOP
                    </h1>
                    <h1 class="landingarticle2">CAR CARE SERVICES</h1>
                    <span class="frontpagebutton">Read More</span>
                    <a class="keskitys" href="#"><i class="fa fa-angle-down"></i></a>
                </div>
                <img alt="" src="img/optimizedphoto.jpg">
            </div>
            <div>
                <div class="kuvateksti">
                    <h1 class="landingarticle">COMPLETE
                    </h1>
                    <h1 class="landingarticle2">AUTO SERVICE</h1>
                    <span class="frontpagebutton">Read More</span>
                    <a class="keskitys" href="#"><i class="fa fa-angle-down"></i></a>
                </div>
                <img alt="" src="img/optimizedphoto2.jpg">
            </div>
        </div>

        <div class="section2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1">
                    <h1 class="titlearticle" style="color: white">FAIR FRIENDLY</h1>
                    <h1 class="titlearticle2" style=" color: #c40079">SERVICE</h1>
                    <p style="color: white">LOREM IPSUM DOLOR SIT AMET CONSE CTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA. UT ENIM AD MINIM VENIAM, QUIS NOSTRUD EXERCITATION ULLAMCO LABORIS NISI UT ALIQUIP EX EA COMMODO CONSEQUAT. DUIS AUTE IRURE DOLOR IN REPREHENDERIT IN VOLUPTATE VELIT ESSE CILLUM DOLORE EU FUGIAT NULLA PARIATUR. EXCEPTEUR SINT OCCAECAT.</p>
                </div>
            </div>

        </div>
        <div class="section3">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 section3image" style="padding-right: inherit; padding-left: inherit;">
                    <img alt="" style="width: 100%; height: auto;" src="img/test3.jpg">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clolummtext2" style="background: -webkit-linear-gradient(45deg, #c40079 0%, #363237 100%);
    background: linear-gradient(45deg, #c40079 0%, #363237 100%); ">
                    <h1 class="titlearticle" style="color: white">BEST</h1>
                    <h1 class="titlearticle2" style="color: white">SERVICES</h1>
                    <p style="color: white">LOREM IPSUM DOLOR SIT AMET CONSE CTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA. UT ENIM AD MINIM VENIAM, QUIS NOSTRUD EXERCITATION ULLAMCO LABORIS NISI UT ALIQUIP EX EA COMMODO CONSEQUAT. DUIS AUTE IRURE DOLOR IN REPREHENDERIT IN VOLUPTATE VELIT ESSE CILLUM DOLORE EU FUGIAT NULLA PARIATUR. EXCEPTEUR SINT OCCAECAT.</p>
                    <span class="columbutton" style="color: white">Read more</span>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 section3image-mobile" style="padding-right: inherit; padding-left: inherit;">
                    <img alt="" style="width: 100%; height: auto;" src="img/optimized_lbr-13.jpg">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 clolummtext2" style="background-color: #4c4e50;">
                    <h1 class="titlearticle" style="color: white">PRO</h1>
                    <h1 class="titlearticle2" style="color: white">SOLUTIONS</h1>
                    <p style="color: white">LOREM IPSUM DOLOR SIT AMET CONSE CTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA. UT ENIM AD MINIM VENIAM, QUIS NOSTRUD EXERCITATION ULLAMCO LABORIS NISI UT ALIQUIP EX EA COMMODO CONSEQUAT. DUIS AUTE IRURE DOLOR IN REPREHENDERIT IN VOLUPTATE VELIT ESSE CILLUM DOLORE EU FUGIAT NULLA PARIATUR. EXCEPTEUR SINT OCCAECAT.</p>
                    <span class="columbutton" style="color: white">Read more</span>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 section3image" style="padding-right: inherit; padding-left: inherit;">
                    <img alt="" style="width: 100%; height: auto;" src="img/test4.jpg">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 section3image-mobile" style="padding-right: inherit; padding-left: inherit;">
                    <img alt="" style="width: 100%; height: auto;" src="img/repairing2.jpg">
                </div>
            </div>
        </div>
        <div class="section4">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1" style="padding-bottom: 100px;">
                    <h1 class="titlearticle">OUR</h1>
                    <h1 class="titlearticle2">SERVICES</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 servicestocenter">
                    <div class="card">
                        <div class="hovereffect">
                            <img class="card-img-top" src="img/aa3.jpg" alt="Card image cap">
                            <div class="overlay">
                                <h2>
                                    <a href="#">Book a Service</a>
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 style="font-weight: 800;">General Services</h5>
                            <p class="card-text">LOREM IPSUM DOLOR SIT AMET CONSE CTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 servicestocenter">
                    <div class="card">
                        <div class="hovereffect">
                            <img class="card-img-top" src="img/aa3.jpg" alt="Card image cap">
                            <div class="overlay">

                                <h2>
                                    <a href="#">Book a Service</a>
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 style="font-weight: 800;">Engine Services</h5>
                            <p class="card-text">LOREM IPSUM DOLOR SIT AMET CONSE CTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 servicestocenter">
                    <div class="card">
                        <div class="hovereffect">
                            <img class="card-img-top" src="img/aa3.jpg" alt="Card image cap">
                            <div class="overlay">


                                <h2>
                                    <a href="#">Book a Service</a>
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 style="font-weight: 800;">Electrical Services</h5>
                            <p class="card-text">LOREM IPSUM DOLOR SIT AMET CONSE CTETUR ADIPISICING ELIT, SED DO EIUSMOD TEMPOR INCIDIDUNT UT LABORE ET DOLORE MAGNA ALIQUA.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1">
                        <h1 class="titlearticle2">ABOUT <span class="thin">US</span></h1>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1">
                        <p>Pound Ridge Mechanic Offers Auto Repair Services You Can Count On!
                            <br>
                            <br> Pound Ridge Mechanic is your trusted, honest auto repair shop in Vantaa, Finland. We have provided our customers with expert, professional auto repairs since 1976 to keep their vehicles operating smoothly and safely. Our friendly staff members provide the best customer experience possible while performing knowledgeable auto repairs for every client. Whether your vehicle needs a minor tune-up to a major overhaul, our trained service technicians are skilled at quickly diagnosing and pinpointing solutions to problems, which can save valuable time and money.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section6" id="yhteys">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1">
                    <h1 class="titlearticle2" style="color: white">CAR REPAIR</h1>
                    <h1 class="titlearticle2" style="color: white">RESERVATION</h1>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1">
                    <?php print("<span class='valkonen'>" . "" . $uusinimi. "</span>")?>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 clolummtext1">
                    <form action="index.php" method="post" id="my-form">


                        <p style="color: white;">Put your car license plate number:</p>
                        <input name="registration" type="text" class="feedback-input" placeholder="ABC-123*" value="<?php print(htmlentities($ilmoitus->getRegistration(), ENT_QUOTES, 'UTF-8'))?>" />

                        <?php print("<span class='punainen'>" . $ilmoitus->getError($registrationVirhe) . "</span>")?>

                        <p style="color: white;">Put time for reservation:</p>
                        <input name="kello" type="text" class="feedback-input" placeholder="Between 08:00 - 15:59*" value="<?php print(htmlentities($ilmoitus->getKello(), ENT_QUOTES, 'UTF-8'))?>" />

                        <?php print("<span class='punainen'>" . $ilmoitus->getError($kelloVirhe) . "</span>")?>

                        <p style="color: white;">Put date for reservation:</p>
                        <input name="paivamaara" type="text" class="feedback-input" placeholder="DD.MM.YYYY*" value="<?php print(htmlentities($ilmoitus->getPaivamaara(), ENT_QUOTES, 'UTF-8'))?>" />

                        <?php print("<span class='punainen'>" . $ilmoitus->getError($paivamaaraVirhe) . "</span>")?>

                        <p style="color: white;">Put your email:</p>
                        <input name="email" type="text" class="feedback-input" placeholder="Your-Email*" value="<?php print(htmlentities($ilmoitus->getEmail(), ENT_QUOTES, 'UTF-8'))?>" />

                        <?php print("<span class='punainen'>" . $ilmoitus->getError($emailVirhe) . "</span>")?>

                        <p style="color: white;">Tell us about your reservation reason:</p>
                        <textarea name="information" class="feedback-input" placeholder="Reservation-information*" id="information"><?php if(isset($_POST['information'])) { 
         echo htmlentities ($_POST['information']); }?></textarea>



                        <?php print("<span class='punainen'>" . $ilmoitus->getError($informationVirhe) . "</span>")?>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <input name="submit" type="submit" class="buttoni" value="SUBMIT" />
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <input name="cancel" type="submit" class="buttoni" value="CANCEL" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

    </html>
