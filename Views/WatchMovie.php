<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complete Bootstrap 4 Website Layout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="/test-project/movies_new3/Views/wpresscss.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $("#btnInsert").click(function(){
                var dataForm = $("#form").serialize();
                $.ajax({
                    type: "GET",
                    url: '/test-project/movies_new3/index.php',
                    data: dataForm,
                    success: function(output) {
                        if(jQuery.trim(output) == "Admin") {
                            window.location = '/test-project/movies_new3/index.php?page=showadminspage';
                        }else if(jQuery.trim(output) == "User"){
                            window.location = '/test-project/movies_new3/index.php?page=user';
                        }else{
                            $("#result").html('<h3>' + output + '</h3>');
                            $("#result").show(1000);
                            setTimeout(function () {
                                $("#result").hide(1000);
                            }, 5000);

                        }
                    }
                });
            });
            $("#btnInsert1").click(function(){
                var dataForm = $("#form1").serialize();
                $.ajax({
                    type: "GET",
                    url: '/test-project/movies_new3/index.php',
                    data: dataForm,
                    success: function(output) {
                        if(jQuery.trim(output) == "Register") {
                            window.location = '/test-project/movies_new3/index.php?page=user';
                        }else {
                            $("#result1").html('<h3>' + output + '</h3>');
                            $("#result1").show(1000);
                            setTimeout(function () {
                                $("#result1").hide(1000);
                            }, 5000);
                        }

                    }
                });
            });
        });
    </script>



</head>
<title>Word Press site</title>
<body>
<!----------Navbar------------->
<nav class="navbar navbar-expand-md sticky-top">
    <div class="container-fluid">
        <a class="navbar-header" href="index.php?page=homepage"><img src="/test-project/movies_new3/Views/img/Vgr3.png"></p></a>
        <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " id="home" href="/test-project/movies_new3/index.php?page=showhomepage">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">New Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Top Movies</a>
                </li>
            </ul>
            <ul class="navbar-nav" id="nav-left">
                <li class="nav-item active">
                    <button type="button" id="home1" class=" btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Log in</button>
                </li>
                <li class="nav-item">
                    <button type="button" id="home1" class=" btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Register</button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--- One Column Section -->
<div class="container  padding">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-xl-12 text-center" >
            <h2 class="titlec">Follow us on social media</h2>

        </div>
    </div>
    <div class="row text-center padding">
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4" id="1">Facebook</button>
        </div>

        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Tweeter</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Pintester</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Gmails</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Linkedin</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Mssangr</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Tumblr</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Digging</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Google+</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Whatsup</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Vrathking</button>
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-1">
            <button type="button" class="btn btn-md  btn4">Xiiing</button>
        </div>

    </div>
</div>
<!--- Jumbotron1 -->
<div class="jumbotron" id="jumb0">
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h5 id="jumb2" class="lader" >MOVIES</h5><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" class="t14" >New Releases</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1" >
                <h6 id="jumb2"  >Last aded</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >Top 10 today</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >Visitor last watched</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2018</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2017</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2016</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2015</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2014</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2013</h6><br>
            </div>
            <div class="col-xs-3 col-sm-3 col-lg-1">
                <h6 id="jumb2" >2012</h6><br>
            </div>


        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-lg-2" style="text-align:center">
                <img src="/test-project/movies_new3/Views/img/index.jpeg" href="" class="img-thumbnail">
                <?php
                $novi = new Controller();
                $n=$novi->showMovieHomePage();
                ?>
                <?php
                if($n["movies_name"] = "The Shawshank Redemption"){
                    echo '<h5 style="color: white">'.$n["movies_name"].'(1994)'.'</h5>';
                }
                ?>
            </div>


            <div class="col-xs-12 col-sm-4 col-lg-2" style="text-align:center">
                <img src="/test-project/movies_new3/Views/img/gf3.jpeg" class="img-thumbnail">
                <?php
                if($n["movies_name"] = "The Godfather"){
                    echo '<h5 style="color: white">'.$n["movies_name"].'(1972)'.'</h5>';
                }
                ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2" style="text-align:center">
                <img src="/test-project/movies_new3/Views/img/index.jpg" class="img-thumbnail">

                <?php
                if($n["movies_name"] = "The Dark Knight"){
                    echo '<h5 style="color: white">'.$n["movies_name"].'(1994)'.'</h5>';
                }
                ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2" style="text-align:center">
                <img src="/test-project/movies_new3/Views/img/Inception.jpeg" class="img-thumbnail">

                <?php
                if($n["movies_name"] = "Inception"){
                    echo '<h5 style="color: white">'.$n["movies_name"].'(1994)'.'</h5>';
                }
                ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2" style="text-align:center">
                <img src="/test-project/movies_new3/Views/img/fc1.jpeg" class="img-thumbnail">

                <?php
                if($n["movies_name"] = "Fight Club"){
                    echo '<h5 style="color: white">'.$n["movies_name"].'(1994)'.'</h5>';
                }
                ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2" style="text-align:center">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">

                <?php
                if($n["movies_name"] = "The Shawshank Redemption"){
                    echo '<h5 style="color: white">'.$n["movies_name"].'(1994)'.'</h5>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2">
                <img src="/test-project/movies_new3/Views/img/Sl2.jpg" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>
<!--- Jumbotron4 -->
<div class="jumbotron" id="jumb4">
    <div class="container padding">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-xl-12 text-center">
                <ul class="list">
                    <li>Themes</li>
                    <li>Features</li>
                    <li>Blog</li>
                    <li>Status</li>
                    <li>VIP</li>
                    <li>Terms of Service</li>
                    <li>Privacy Policy</li>
                    <li>Language:EN</li>

                </ul>
                <div class="col-xs-6 col-sm-6 col-md-6 col-xl-12">
                    <ul class="list1">
                        <li>An</li>
                        <li><a href="#">AUTHOMATIC</a></li>
                        <li>mambo</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>