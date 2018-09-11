<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Model/Model.php';
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
<div class="container padding">
        <?php
        $movie = new Model();
        $videos = $movie->getAllmovies();
       /* $actors= $mov->getAllpictures();*/

        ?>
        <div class="row">
            <?php foreach ($videos as $video) { ?>
                <div class="col-xs-12 col-sm-4 col-lg-2">
                    <a href="/test-project/movies_new3/index.php?page=showmovie&id=<?php echo $video['movies_id'] ?>"><?php echo $video['movies_name'] ?></a>
                </div>
            <?php } ?>
        </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="result" style="display:none;"></div>
                <form class="form-horizontal" id="form">
                    <fieldset>
                        <legend class="text-left header">Log in</legend>
                        <div class="form-group">
                            <div class="col-md-8">
                                Username: <br>
                                <input id="fname" name="username" type="text" placeholder="InsertUsername" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                Password: <br>
                                <input id="fname" name="password" type="password" placeholder="InsertPassword" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="reset" id="btnInsert" value="login" class="btn btn-primary btn-lg" style="background: 	#100b0a;border-color: 	#100b0a">Log in</button>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" value="login" name="page">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="result1" style="display:none;"></div>
                <form class="form-horizontal" id="form1">
                    <fieldset>
                        <legend class="text-left header">Register</legend>
                        <div class="form-group">
                            <div class="col-md-8">
                                Username: <br>
                                <input id="fname" name="username1" type="text" placeholder="InsertUsername" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                Email: <br>
                                <input id="fname" name="email" type="text" placeholder="InsertEmail" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                Password: <br>
                                <input id="fname" name="password_1" type="password" placeholder="InsertPassword" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                ConfirmPassword: <br>
                                <input id="fname" name="password_2" type="password" placeholder="ConfirmPassword" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="reset" id="btnInsert1" value="register" class="btn btn-primary btn-lg" style="background: 	#100b0a;border-color: 	#100b0a">Register</button>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" value="register" name="page">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</div>
</body>
</html>