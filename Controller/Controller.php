<?php
require ("./Model/Model.php");
class Controller
{

    public function getAll()
    {
        $movie = new Model();
        $mov = $movie->getAllmoviesandActors();

       include ("./Views/UsersPage.php");
    }
     public function showInsertForm()
     {
         include("./Views/AddMovie.php");
     }
    public function showInsertForm2()
    {
        include("./Views/AddActors.php");
    }
    public function delete()
    {
        $movie_id=$_GET['movies_id'];

        $movie = new Model();

        $movie->deleteAllmoviesandActors($movie_id);

       //header("Location:index.php?page=all");
    }
    public function insertMovie()
    {

        $movie = $_POST['movie'];
        $date = $_POST['date'];
        $duration = $_POST['duration'];
        $ratings = $_POST['ratings'];
        $youtube = $_POST['youtube'];
        $imdb=$_POST['imdb'];
        $url = $_POST['url'];

        $moviee = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            if ($movie != "" && $date != "" && $duration != "" && $ratings != "" && $youtube != ""  && $imdb != "" && $url != "") {
                if (is_numeric($ratings)) {
                    $moviee->insertMovie($movie, $date, $duration, $ratings , $youtube ,$imdb, $url);

                    header("Location:index.php?page=user");

                } else {
                    $msg = "Ratings is not numeric!!!";
                    include "./Views/AddMovie.php";
                }
            } else {
                $msg = "You must insert all input fields!!!";
                include "./Views/AddMovie.php";
            }

        }else{
            $msg = "Movie successfully inserted!!!";
            include "./Views/AddMovie.php";
        }
    }
    public function insertActors()
    {
        $actor = $_POST['actor'];

        $actors = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            if ($actor !="") {
                if($actor)
                    $actors->insertActors($actor);
                    header("Location:index.php?page=user");
            } else {
                $msg = "You must insert actor!!!";
                include "./Views/AddActors.php";
            }

        }else{
            $msg = "Method is not right!!!";
            include "./Views/AddActors.php";
        }
    }
    public function showMovies()
    {
        $movie = new Model();
        $mov = $movie->getAllmovies();
            include './Views/AddMovie.php';
    }
    public function showActors()
    {
        $actor = new Model();
        $act = $actor->getAllactors();
        include './Views/AddActors.php';
    }
    public function deleteMovies()
        {
            $id=$_GET['id'];
            $movie = new Model();
                $movie->deleteMovie($id);
            include './Views/AddMovie.php';
    }
    public function deleteAct()
    {
        $actor_id=$_GET['id'];
        $actor = new Model();
        $actor->deleteActor($actor_id);
        include './Views/AddActors.php';
    }
    public function updateMovie()
    {
        $movie_id=$_POST['id'];
        $movie = $_POST['movie'];
        $date = $_POST['date'];
        $duration = $_POST['duration'];
        $ratings = $_POST['ratings'];
        $youtube = $_POST['youtube'];
        $imdb=$_POST['imdb'];
        $url = $_POST['url'];

        $moviee = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            if ($movie != "" && $date != "" && $duration != "" && $ratings != "" && $youtube != ""  && $imdb != "" && $url != "" && $movie_id !="") {
                if (is_numeric($ratings)) {
                    $moviee->updateMovies($movie_id,$movie, $date, $duration, $ratings , $youtube ,$imdb, $url);
                    header("Location:index.php?page=showmoviesform");

                } else {
                    $msg = "Ratings is not numeric!!!";
                    include "./Views/EditMovie.php";
                }
            } else {
                $msg = "You must insert all inputs!!!";
                include "./Views/EditMovie.php";
            }

        }else{
            $msg = "Method is wrong!!!";
            include "./Views/EditMovie.php";
        }
    }
    public function updateActor()
    {
        $actor_id=$_POST['id'];
        $actor = $_POST['actor'];

        $actore = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "POST") {
            if ($actor != ""&& $actor_id !="") {
                    $actore->updateActors($actor,$actor_id);
                    header("Location:index.php?page=showactorsform");

            } else {
                $msg = "You must insert all inputs!!!";
                include "./Views/EditActor.php";
            }

        }else{
            $msg = "Method is wrong!!!";
            include "./Edit/EditActor.php";
        }
    }
    public function editMovie()
    {
        $id=$_GET['id'];
        $movie = new Model();
        $mov = $movie->getmoviesbyid($id);

        include ("./Views/EditMovie.php");
    }

public function editActor()
{
    $id=$_GET['id'];
    $actor = new Model();
    $act = $actor->getactorsbyid($id);
                include("./Views/EditActor.php");

    }
    public function showPictupt()
    {
        include("./Views/UpdatePicture.php");
    }





    private $fileFornats=['image/png','image/jpeg','image/jpg','image/gif'];
    public function updatePict($file)
    {
            if(is_array($file)){

                    if(in_array($file['type'],$this->fileFornats)){
                                move_uploaded_file($file['tmp_name'],'Movies/'.$file['name']);
                    }else{
                        die("File is not supported!!!");
                    }
            }else{
                die('No file was uploaded!!!');
            }

    }
}
?>
