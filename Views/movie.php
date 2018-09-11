<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Model/Movie.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="/test-project/movies_new3/Views/wpresscss.css" rel="stylesheet">
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
<!--=====JUMBOTRON-------------->
<div class="container">
    <div class="row">
        <?php
        $movie = new Movie($_GET['id']);
      //  $actors = $movie->getActors();
        $genres = $movie->getGenres();
        $movie1= new Controller();
        $actors= $movie1->selectActorsinmoviesbyId();
        $genres= $movie1->selectGenresinmoviesbyId();
        ?>
    </div>
        <div class="row">
           <h2><?php echo $movie->movies_name ?></h2>
        </div>
        <br>
        <div class="row">

            <h2>Actors:</h2>
            <h2><?php
                foreach ($actors as $actor) {


                echo $actor['actor'].",";
                }
                ?></h2>

        </div>
    <div class="row">
        <h2>Genres:</h2>
        <h2><?php
            foreach ($genres as $genre) {
            echo $genre['genre'];
            }
            ?></h2>
    </div>
    <div class="row">
            <?php
            $nov= new UploadVideo();
            $n=$nov->ShowVid();
            foreach ($n as $item) {

                    echo "<video  controls>
                        <source src='/test-project/movies_new3/Views/img/" . $item['video'] . "'type='video/mp4'>
                    </video>";
            }
            ?>
        </div>
    </div>


</div>

</body>
</html>