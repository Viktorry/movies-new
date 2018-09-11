<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/test-project/movies_new3/Views/userpage.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <script>
        $(document).ready(function() {

            //REGION :: SELECT2 JQUERY PLUGIN ::
            //THIS IS SELECT 2 JQUERY PLUGIN FOR DROPDOWS WITH MOVIES
            $('.js-example-basic-single').select2({
                placeholder: "Select Movies",
                allowClear: true
            });
            //THIS IS SELECT 2 JQUERY PLUGIN FOR DROPDOWS WITH ACTORS
            $('.js-example-basic-single2').select2({
                placeholder: "Select Actors",
                allowClear: true,
                multiple:true
            });
            //THIS IS SELECT 2 JQUERY PLUGIN FOR DROPDOWS WITH GENRES
            $('.js-example-basic-single3').select2({
                placeholder: "Select Genres",
                allowClear: true,
                multiple:true
            });
            //ENDREGION :: SELECT2 JQUERY PLUGIN ::

            //REGION :: AJAX ::
            //THIS IS AJAX FUNCTION FOR TAKING ALL MOVIES FROM DATABASE AND APPEND DROPDOWN
            $.ajax({
                type: "GET",
                url: '/test-project/movies_new3/index.php',
                data: {page: 'jsonMovies'},
                success: function(output) {
                var obj = $.parseJSON(output);
                $.each(obj, function () {
                    $('.js-example-basic-single').append($("<option></option>").val(this['movies_id']).html(this['movies_name']));
                });
                }
            });

            //THIS IS AJAX FUNCTION FOR TAKING ALL ACTORS FROM DATABASE AND APPEND DROPDOWN
            $.ajax({
                type: "GET",
                url: '/test-project/movies_new3/index.php',
                data: {page: 'jsonActors'},
                success: function(output) {
                    var obj = $.parseJSON(output);
                    $.each(obj, function () {
                        $('.js-example-basic-single2').append($("<option></option>").val(this['actor_id']).html(this['actor']));
                    });
                }
            });

            //THIS IS AJAX FUNCTION FOR TAKING ALL GENRES FROM DATABASE AND APPEND DROPDOWN
            $.ajax({
                type: "GET",
                url: '/test-project/movies_new3/index.php',
                data: {page: 'jsonGenres'},
                success: function(output) {
                    var obj = $.parseJSON(output);
                    $.each(obj, function () {
                        $('.js-example-basic-single3').append($("<option></option>").val(this['genres_id']).html(this['genre']));
                    });
                }
            });
            //ENDREGOIN :: AJAX::

            //REGION :: .CLICK FUNCTIONS JQUERY ::
            //INSERTING IN TABLE GENRES, ACTORS AND MOVIES - ALL IN ONE TABLE - RELATIONSHIPS
            $("#btnInsertall").click(function(){
                var dataForm = $("#insertAllForm").serialize();
                $.ajax({
                    type: "GET",
                    url: '/test-project/movies_new3/index.php',
                    data: dataForm,
                    success: function(output) {
                        $("#result4").html('<h6>' + output + '</h6>');
                        $("#result4").show(1000);
                        setTimeout(function () {
                            $("#result4").hide(1000);
                        }, 5000);
                    }
                });

            });
            //ENDREGION :: .CLICK FUNCTIONS JQUERY::
            $("#btnInsertall1").click(function(){
                var dataForm = $("#insertAllForm1").serialize();
                $.ajax({
                    type: "GET",
                    url: '/test-project/movies_new3/index.php',
                    data: dataForm,
                    success: function(output) {
                        $("#result41").html('<h6>' + output + '</h6>');
                        $("#result41").show(1000);
                        setTimeout(function () {
                            $("#result41").hide(1000);
                        }, 5000);
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
        <a class="navbar-header" href="#"><img src="/test-project/movies_new3/Views/img/Vgr3.png"></p></a>
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
                    <a class="nav-link" id="home1" href="/test-project/movies_new3/index.php?page=usershomepage">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" id="home1" href="/test-project/movies_new3/index.php?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron" id="jumb0">
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-6 col-lg-6" id="user">
                <h5 id="jumb2">LoginUser</h5><br>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <h6 id="jumb2" class="t14" > <button value="InsertMovie" id="btn" class="btn btn-primary btn-lg">Edit</button>
                </h6><br>
            </div>
        </div>
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-4 col-lg-3 text-center" >

                <ul id="userList">
                    <li><h4>User id:User</h4></li>
                    <li><h4>User id:User</h4></li>
                    <li><h4>User id:User</h4></li>
                    <li><h4>User id:User</h4></li>
                    <li><h4>User id:User</h4></li>
                </ul>
            </div>
                <br>
            <div class="col-xs-12 col-sm-4 col-lg-3 text-center">
                <img src="/test-project/movies_new3/Views/img/default_avatar.jpg">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-3 text-center" id="formAddMovie">
                <div id="result4" style="display:none;"></div>

<!----------------------------------ACTORSINMOVIES---------------------------------->
                <form  id="insertAllForm">
                <h4>Add:</h4>
                Select Movie:<br>
                <select class="js-example-basic-single" name='movies' style="width: 300px">
                    <option></option>
                </select><br>
                Select Actor:<br>
                <select class="js-example-basic-single2" name="actors[]" style="width: 300px">

                </select><br>
            <!--    Select Genres:<br>
                <select class="js-example-basic-single3" name="genres[]" style="width: 300px">

                </select><br>-->
                    <button type="reset" id="btnInsertall" value="insertactorsinmovies" class="btn btn-primary btn-lg">Insert</button>

                    <input type="hidden" value="insertactorsinmovies" name="page">

                </form>
            </div>

            <!----------------------------------GENRESINMOVIES---------------------------------->

                <div class="col-xs-12 col-sm-4 col-lg-3 text-center" id="formAddMovie">
                    <div id="result41" style="display:none;"></div>
                <form  id="insertAllForm1">
                    <h4>Add:</h4>
                    Select Movie:<br>
                    <select class="js-example-basic-single" name='movies' style="width: 300px">
                        <option></option>
                    </select><br>
                 <!--   Select Actor:<br>
                    <select class="js-example-basic-single2" name="actors[]" style="width: 300px">

                    </select><br>-->
                        Select Genres:<br>
                        <select class="js-example-basic-single3" name="genres[]" style="width: 300px">

                        </select><br>
                    <button type="reset" id="btnInsertall1" value="insertgenresinmovies" class="btn btn-primary btn-lg">Insert</button>

                    <input type="hidden" value="insertgenresinmovies" name="page">
                </form>

                </div>






                </body>
                </html>

            </div>
        </div>
    </div>
</div>
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

<!--    <table border="2">-->
<!--        <tr>-->
<!--            <th>Actor</th>-->
<!--            <th>Movie</th>-->
<!--            <th>Realise date</th>-->
<!--            <th>Duration time</th>-->
<!--            <th>Ratings</th>-->
<!--            <th>Youtube</th>-->
<!--            <th>Imdb</th>-->
<!--            <th>Url</th>-->
<!--            <th>Update time</th>-->
<!---->
<!--        </tr>
        <?php
/*
        foreach($mov as $row) {
            echo "
        <tr>
            <td>".$row['actor'] ."</td>
            <td>".$row['movies_name'] ."</td>
            <td>".$row['movies_date'] ."</td>
            <td>".$row['duration_time'] ."</td>
            <td>".$row['ratings'] ."</td>
            <td>".$row['youtube'] ."</td>
            <td>".$row['imdb'] ."</td>
            <td>".$row['url'] ."</td>
            <td>".$row['updated_at'] ."</td>
        </tr>";
        }

        if(isset($msg)) {
            echo $msg;
        }

        */?>

    </table>

</body>
</html>