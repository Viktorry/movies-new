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
                        if(jQuery.trim(output) == "User"){
                            window.location = '/test-project/movies_new3/Views/UsersPage.php';
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
                        if(jQuery.trim(output) == "Logedin") {
                            window.location = '/test-project/movies_new3/Views/UsersPage.php';

                        }else{
                            $("#result1").html('<h3>' + output + '</h3>');
                            $("#result1").show(1000);
                            setTimeout(function () {
                                $("#result1").hide(1000);
                            }, 500000000000);

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
                    <a class="nav-link " id="home" href="index.php?page=homepage">Home</a>
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
                    <a class="nav-link" href="/test-project/movies_new3/index.php?page=showadminspage">AdminsPage</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/test-project/movies_new3/index.php?page=logout">Logout</a>
                </li>
                <!-- <li class="nav-item active">
                     <button type="button" id="home1" class=" btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Log in</button>
                 </li>
                 <li class="nav-item">
                     <button type="button" id="home1" class=" btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Register</button>
                 </li>-->
            </ul>
        </div>
    </div>
</nav>
<!------------------- Courasel-------------------------->
<div class="container-fluid" id="csl">
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class=" carousel-item active">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-xl-12">
                        <img src="/test-project/movies_new3/Views/img/Joker3.jpg" class="Cour">
                        <div class="carousel-caption text-center">
                            <h1 class="display-4">Why so serious? <br>Don't worry little fella.</h1>
                            <h5 >Do i look like a guy with the plan?</h5><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" carousel-item ">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-xl-12">
                        <img src="/test-project/movies_new3/Views/img/inception-wallpapers-8.jpg" class="Cour">
                        <div class="carousel-caption text-center">
                            <h1 class="display-4">Dreams feel real while we're in them. </h1>
                            <h5 > It's only when we wake up that we realize something was actually strange. </h5><br>
                        </div>

                    </div>
                </div>
            </div>
            <div class=" carousel-item ">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-xl-12">
                        <img src="/test-project/movies_new3/Views/img/Peaky3.jpg" class="Cour">
                        <div class="carousel-caption text-center">
                            <h1 class="display-4">Brave is going where no man has gone before. </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<div class="container">
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