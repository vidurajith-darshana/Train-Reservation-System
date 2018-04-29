<?php

session_start();

?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{

            background-image: url("image/wall2.jpg");

            background-attachment: fixed;
            background-repeat: no-repeat;

        }

    </style>
</head>
<body>

    <div  class="row" style="background-color:white;opacity: 0.8">


        <div style="height:40%;opacity: 0.8;background-color: blue;" class=col-sm-4>

            <div >
                <img id="gov-icon" style="margin-left: 30%;margin-top: 10%" width="30%" height="30%" src="image/340px-Ceylon_Government_Railways_logo.gif">
            </div>
            <div style="margin-top:15%;margin-left: 5%">
                <p style="color: white;font-family: 'Times New Roman';font: bold;font-size: 30px ">Sri Lanka Railway Departement</p>
            </div>

        </div>


        <div class=col-sm-8 style="margin-top: 5%">
            <img class="gallery-img" src="image/railwaytrainbeauty03.jpg" style="height: 40%;width: 30%">
            <img class="gallery-img"src="image/private-first-class-sri-lanka-trains.jpg-nggid045661-ngg0dyn-720x640x100-00f0w011c010r110f110r010t010.jpg" style="height:40%;width: 30%">
            <img class="gallery-img"src="image/train-tours-10-sri-lanka.jpg" style="height: 40%;width: 30%">
            <img class="gallery-img"src="image/SriLanka-classic-2nd.jpg" style="height: 40%;width: 30%;margin-top: .3%">
            <img class="gallery-img"src="image/9-arch.jpg" style="height:40%;width: 30%;margin-top: .3%">
            <img class="gallery-img"src="image/train-tours-2-sri-lanka.jpg" style="height: 40%;width: 30%;margin-top: .3%">
        </div>

        <div  id="menu-bar" style="margin-left: 10%;margin-top:0%;width:80%;opacity:0;border-radius: 10px;height:60px;position: fixed">
            <nav style="border-radius: 10px" class="navbar navbar-expand-lg navbar-light bg-white">
                <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span  class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="image/340px-Ceylon_Government_Railways_logo.gif" width="40px" height="40px"></a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active" style="margin-right: 20px;margin-left: 40px;margin-bottom: 5px">
                            <div class="row" style="margin-top: 5%">
                                <img src="image/rail-home.png" width="20%" height="50%" >
                                <a id="a1" class="nav-link" href="index.php" >Home <span class="sr-only">(current)</span></a>
                            </div>

                        </li>
                        <li class="nav-item active" style="margin-right: 20px;margin-left: 40px">
                            <div class="row">
                                <img src="image/booking.png" width="20%" height="60%">
                                <a id="a2" class="nav-link" href="reservation.php">Reservation<span class="sr-only">(current)</span></a>
                            </div>
                        </li>

                        <li class="nav-item active" style="margin-right: 20px;margin-left: 40px">
                            <div class="row">
                                <img src="image/rail-schdule.png" width="20%" height="60%">
                                <a id="a3" class="nav-link" href="schedule.php">Train Schedule<span class="sr-only">(current)</span></a>
                            </div>
                        </li>
                        <li class="nav-item active" style="margin-right: 20px;margin-left: 40px">
                            <div class="row">
                                <img src="image/rail-detail.png" width="20%" height="60%">
                                <a id="a4" class="nav-link" href="detail.php">Details<span class="sr-only">(current)</span></a>
                            </div>
                        </li>
                        <li class="nav-item active" style="margin-right:20px;margin-left: 40px">
                            <div class="row">
                                <img src="image/gallery.png" width="20%" height="60%">
                                <a id="a5" class="nav-link" href="luggage.php">Luggage<span class="sr-only">(current)</span></a>
                            </div>
                        </li>
                        <li class="nav-item active" style="margin-right: 20px;margin-left: 40px">
                            <div class="row">
                                <img src="image/rail-us.png" width="15%" height="40%">
                                <a id="a6" class="nav-link" href="about.php">About Us<span class="sr-only">(current)</span></a>
                            </div>
                        </li>
                        <li class="nav-item active" style="margin-right:0px;margin-left: 80px">

                            <button type="button" class="btn btn-outline-danger">L O G I N</button>
                        </li>

                    </ul>
                </div>
            </nav>

        </div>

        <div style="margin-left: 30%" class="col-sm-6">
            <div class="sp-content">
                <div class="sp-globe"></div>
                <h2 class="frame-1">Our Service Your Journey</h2>
                <h2 class="frame-3">Join With Us</h2>
                <h2 class="frame-4">Welcome!</h2>
                <h2 class="frame-5">
                    <span>TRAVELING,</span>
                    <span>ENJOYING,</span>
                    <span>AROUND SRI LANKA.</span>
                </h2>
                <a class="sp-circle-link" href="http://www.railway.gov.lk/">by Railway Srilanka</a>
            </div>
        </div>

        <div id="tags" class="col-sm-4" style="margin-top: 20.2%;">

            <a href="https://www.facebook.com/ExpoRail.LK/" target="_blank" class="fa fa-facebook"></a>
            <a href="https://twitter.com/slrailwayforum?lang=en" target="_blank" class="fa fa-twitter"></a>
            <a href="https://plus.google.com/102716191795300634699" target="_blank" class="fa fa-google"></a>
            <a href="http://www.dailynews.lk/2017/11/24/features/135448/sri-lanka-railways" target="_blank" class="fa fa-linkedin"></a>
            <a href="https://www.youtube.com/watch?v=p0Dol321PJ4" target="_blank" class="fa fa-youtube"></a>

        </div>
        <div class="col-sm-2" style="margin-top: 25%;margin-left:20%;">
            <a href="register.php" role="button" style="margin-right: 5%" class="btn btn-outline-primary">S I G N  U P</a>
            <button type="button" class="btn btn-outline-success">L O G I N</button>
            <div id="pic" style="background-color: black;width:auto;opacity: <?php

            if(isset($_SESSION['user-pic'])){
                echo 1;
            }else{
                echo 0;
            }

                ?>">
                <img src="<?php

                    if(isset($_SESSION['user-pic'])){
                        echo 'image/user/'.$_SESSION['user-pic'];
                    }else{
                        echo 'image/user/user.png';
                    }
                 ?>"
                 style="width: 35%;height: 35%;">
                <p style="color: white;font-size: 18px;margin-left: 25%;"><?php

                    if(isset($_SESSION['user-name'])){
                        echo $_SESSION['user-name'];
                    }

                    ?></p>
            </div>



        </div>
    </div>