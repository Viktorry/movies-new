<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies-new/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies-new/Model/Model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/test-project/movies-new/Views/FightClub.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
    </script>
</head>
<body>
<!----------Navbar------------->
<nav class="navbar navbar-expand-md sticky-top">
    <div class="container-fluid">
        <a class="navbar-header" href="#"><img src="img/Vgr3.png"></p></a>
        <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " id="home" href="#">HD movies at the smallest file size.</a>
                </li>
            </ul>
            <ul class="navbar-nav" id="nav-left">
                <li class="nav-item active">
                    <a class="nav-link" id="home1" href="/test-project/movies_new3/index.php?page=showadminshomepage">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" id="home1" href="/test-project/movies_new3/index.php?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--=====JUMBOTRON-------------->
<div class="jumbotron" id="jumb0">
    <div class="container  padding">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-xl-2 text-left" >
                <?php
                $novi = new Controller();

                $novi1= new UploadPicture();
                $n1=$novi1->ShowPic();
                $n=$novi->showMovieHomePage();


                $movie=$novi->showActorMoviegenreTable();

                ?>
                <?php
                foreach ($n1 as $new) {
                    if(in_array("Fight Club.jpg",$new)){
                        echo "<div>";
                        echo "<img  src='img/" . $new['image'] . "'>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-xl-10 text-left" >
                <?php
                foreach ($n as $new) {
                    if(in_array("Fight Club",$new)){
                        echo '<h3 style="color: white">'.$new["movies_name"].'(1972)'.'</h3>';
                    }
                }
                ?>
                <hr class="my-1"><br>
                <?php
                foreach ($movie as $new) {
                    echo '<h6  style="color: white">'.$new["genre"].'</h6>'.' ';
                }
                ?>
                <br>
                <?php
                foreach ($movie as $new) {

                    echo '<h6  style="color: white">' . $new["movies_date"]. '</h6>' . ' ';

                }
                ?>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-xl-12 text-center" >
            <?php
            $nov= new UploadVideo();
            $n=$nov->ShowVid();
            foreach ($n as $item) {
                if(in_array("Praktikum - Internet i veb tehnologije - vežbe - 008 - (.htaccess) Priprema za rad sa rutama.mp4",$item)){

                    echo "<video  controls>
                        <source src='upload/" . $item['video'] . "'type='video/mp4'>
                    </video>";

                }
            }
            ?>
        </div>
    </div>



    <!--------------------------------------Footer----------------------------->
    <div class="jumbotron" id="jumb4">
        <div class="container padding">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-xl-12 text-center">
                    <ul class="list">
                        <li>V © 2018- </li>
                        <li>Blog</li>
                        <li>DMCA</li>
                        <li>API</li>
                        <li>RSS</li>
                        <li>Contact</li>
                        <li>Browse Movies</li>
                        <li>Requests</li>
                        <li>News</li>
                        <li>About us</li>
                        <li>Log in</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

