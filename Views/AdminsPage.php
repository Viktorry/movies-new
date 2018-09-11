<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Model/Model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/test-project/movies_new3/Views/userpage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function () {

        console.log('ggg');
        myTable = $('#myTable').DataTable();

        $.ajax({
            type: "GET",
            url: '/test-project/movies_new3/index.php',
            data: {page: 'jsonActors'},
            success: function (output) {
                var obj = $.parseJSON(output);
                var result = obj.map(function (item) {
                    var result = [];
                    result.push(item.actor_id);
                    result.push(item.actor);
                    return result;
                });
                myTable.rows.add(result); // add to DataTable instance
                myTable.draw(); // always redraw
            }
        });
          myTableact = $('#myTableact1').DataTable();

          $.ajax({
              type: "GET",
              url: '/test-project/movies_new3/index.php',
              data: {page: 'jsonUsers'},
              success: function (output) {
                  var obj = $.parseJSON(output);
                  var result = obj.map(function (item) {
                      var result = [];
                      result.push(item.user_id);
                      result.push(item.email);
                      return result;
                  });
                  myTableact.rows.add(result); // add to DataTable instance
                  myTableact.draw(); // always redraw
              }
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
                    <a class="nav-link" id="home1" href="/test-project/movies_new3/index.php?page=showadminshomepage">Home</a>
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
                <h5 id="jumb2"  >LoginUser</h5><br>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <h6 id="jumb2" class="t14" > <button value="InsertMovie" id="btn" class="btn btn-primary btn-lg">Edit</button>
                </h6><br>
            </div>
        </div>
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-4 col-lg-4 text-center">
            </div>
            <br>
            <div class="col-xs-12 col-sm-4 col-lg-4 text-center">

                <div>
                    <?php
                    $novi = new UploadPicture();
                    $n=$novi->ShowPic();
                        foreach ($n as $new) {

                                echo "<div>";
                                echo "<img src='/test-project/movies_new3/Views/img/" . $new['image'] . "' >";
                                echo "</div>";

                        }
                              ?>
                        <form method="POST" action="index.php?page=uploadpicture" enctype="multipart/form-data">
                        <input type="hidden" name="size" value="1000000">
                        <div>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <button type="submit" name="upload">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-4 text-center" id="formAddMovie">
                <div id="result4" style="display:none;"></div>
                <table>
                    <tr align="center">
                        <td>
                            <h1>Insert:</h1>
                        </td>
                        <td>
                            <h1>ShowAll:</h1>
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                Actors:
                <a href="/test-project/movies_new3/index.php?page=showactorsform" ><button type="button" class="btn btn-secondary">AddActor</button></a><br>
                        </td>
                        <td>
                            <a href="/test-project/movies_new3/index.php?page=showActors" ><button type="button" class="btn btn-secondary">Actors list</button><br>
                                <a href="/test-project/movies_new3/index.php?page=showUsers" ><button type="button" class="btn btn-secondary">Users list</button><br>
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                Movie:
                <a href="/test-project/movies_new3/index.php?page=showmoviesform" ><button type="button" class="btn btn-secondary">AddMovie</button></a><br>
                        </td>
                        <td>
                            <a href="/test-project/movies_new3/index.php?page=showMovies" ><button type="button" class="btn btn-secondary">Movies list</button><br>

                        </td>

                    </tr>
                    <tr align="center">
                        <td>
                Genres:
                <a href="/test-project/movies_new3/index.php?page=showgenresform" ><button type="button" class="btn btn-secondary">AddGenre</button></a>
                        </td>
                        <td>
                            <a href="/test-project/movies_new3/index.php?page=showGenres" ><button type="button" class="btn btn-secondary">Genres list</button><br>
                                <a href="/test-project/movies_new3/index.php?page=updatepicture" ><button type="button" class="btn btn-secondary">Update</button><br>
                        </td>

                    </tr>

                    <form action="index.php?page=uplvideo" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" />
                        <input type="submit" name="submit" value="Upload" />
                    </form>
                </table>
            </div>


        </div>
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
<!--
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