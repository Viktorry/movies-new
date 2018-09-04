<?php
/*require ("./Model/Model.php");*/
require $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Model/Model.php';
class Controller
{
        //Function for input validation!!!
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function getAll()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include ("./Views/UsersPage.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showInsertForm()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AddMovie.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showActorTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $actors = new Model();
            $act = $actors->getAllactors();
            include("./Views/ShowActors.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showActorMoviegenreTable()
    {
            $all = new Model();
            $mga = $all->getActorsGenresMovies();
           return $mga;
    }
    public function showUsersTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $users = new Model();
            $user = $users->getAllUsers();
            include("./Views/ShowUsers.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showGenreTable()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            $genres = new Model();
            $gen= $genres->getAllGenres();
            include("./Views/ShowGenres.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showMovieTable()
    {
        session_start();
        if(isset($_SESSION['Loged in'])){
            $movies = new Model();
            $mov= $movies->getAllmovies();
            include("./Views/ShowMovies.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showMovieHomePage()
    {
            $movies = new Model();
            $mov= $movies->getAllmovies();
            return $mov;
    }
    public function showHomePage()
    {
        session_start();
        if(!isset($_SESSION['Loged in'])){
            include("./Views/HomePage.php");
        }else{
            header("Location:/test-project/movies_new3/Views/UsersHomePage.php");
        }
    }
    public function showUsersHomePage()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/UsersHomePage.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showAdminsHomePage()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AdminsHomePage.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showAdminPage()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AdminsPage.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showActorsInsertForm()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AddActors.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function showGenresForm()
    {
        session_start();
        if (isset($_SESSION['Loged in'])) {
            include("./Views/AddGenre.php");
        }else{
            header("Location: /test-project/movies_new3/Views/HomePage.php");
        }
    }
    public function deleteMovie()
    {
        $movie_id=$this->test_input($_GET['movies_id']);
        $movie = new Model();
        $movie->deleteAllmoviesandActors($movie_id);
        //header("Location:index.php?page=all");
    }
    public function deleteActor()
    {
        $actor_id=$this->test_input($_GET['id']);
        $actor = new Model();
        $actor->deleteActor($actor_id);
        include ('./Views/ShowActors.php');
    }
    public function insertMovie()
    {
        $movie = $this->test_input($_GET['movie']);
        $date =$this->test_input($_GET['date']);
        $duration =$this->test_input($_GET['duration']);
        $ratings =$this->test_input($_GET['ratings']);
        $youtube =$this->test_input($_GET['youtube']);
        $imdb=$this->test_input($_GET['imdb']);
        $url =$this->test_input($_GET['url']);
        $moviee = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($movie != "" && $date != "" && $duration != "" && $ratings != "" && $youtube != ""  && $imdb != "" && $url != "") {
                if (is_numeric($ratings)) {
                    $moviee->insertMovie($movie, $date, $duration, $ratings , $youtube ,$imdb, $url);
                    $msg = "Insert successfull";
                    echo $msg;
                } else {
                    $msg = "Ratings is not numeric!!!";
                    echo $msg;
                }
            } else {
                $msg = "You must insert all input fields!!!";
                echo $msg;
            }
        }else{
            $msg = "Movie successfully inserted!!!";
            echo $msg;
        }
    }
    public function insertActors()
    {
        $actor =$this->test_input($_GET['actor']);
        $actors = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($actor !="") {
                if($actor)
                    $actors->insertActors($actor);
                $msg = "Insert successfull";
                echo $msg;
            } else {
                $msg = "You must insert actor!!!";
                echo $msg;
            }
        }else{
            $msg = "Method is not right!!!";
            echo $msg;
        }
    }
    public function insertGenre()
    {
        $genre =$this->test_input($_GET['genre']);
        $genres = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($genre !="") {
                if($genre)
                    $genres->insertGenres($genre);
                $msg = "Insert successfull";
                echo $msg;
            } else {
                $msg = "You must insert genre!!!";
                echo $msg;
            }
        }else{
            $msg = "Method is not right!!!";
            echo $msg;
        }
    }
    public function showMoviesJson()
    {
        $movie = new Model();
        $mov = $movie->getAllmovies();
        echo json_encode($mov);
    }
    public function showUsersJson()
    {
        $user = new Model();
        $use = $user->getAllUsers();
        echo json_encode($use);
    }
    public function showActorsJson()
    {
        $actor = new Model();
        $act = $actor->getAllactors();
        echo json_encode($act);
    }
    public function showGenresJson()
    {
        $genre = new Model();
        $gen = $genre->getAllGenres();
        echo json_encode($gen);
    }
    public function deleteMovies()
    {
        $id=$this->test_input($_GET['id']);
        $movie = new Model();
        $movie->deleteMovie($id);
        include './Views/ShowMovies.php';
    }
    public function deleteAct()
    {
        $actor_id=$this->test_input($_GET['id']);
        $actor = new Model();
        $actor->deleteActor($actor_id);
        //include './Views/AddActors.php';
    }
    public function updateMovie()
    {
        $movie_id=$this->test_input($_GET['id']);
        $movie =$this->test_input($_GET['movie']);
        $date = $this->test_input($_GET['date']);
        $duration =$this->test_input($_GET['duration']);
        $ratings =$this->test_input($_GET['ratings']);
        $youtube = $this->test_input($_GET['youtube']);
        $imdb=$this->test_input($_GET['imdb']);
        $url =$this->test_input($_GET['url']);
        $moviee = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($movie != "" && $date != "" && $duration != "" && $ratings != "" && $youtube != ""  && $imdb != "" && $url != "" && $movie_id !="") {
                if (is_numeric($ratings)) {
                    $moviee->updateMovies($movie_id,$movie, $date, $duration, $ratings , $youtube ,$imdb, $url);
                    $msg = "Edit Succsessfull!!!";
                    echo $msg;
                } else {
                    $msg = "Ratings is not numeric!!!";
                    echo $msg;
                }
            }else {
                $msg = "You must insert all inputs!!!";
                echo $msg;
            }
        }else{
            $msg = "Method is wrong!!!";
            echo $msg;
        }
    }
    public function updateActor()
    {
        $actor_id=$this->test_input($_GET['id']);
        $actor =$this->test_input($_GET['actor']);
        $actors = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($actor != ""&& $actor_id !="") {
                $actors->updateActors($actor,$actor_id);
                $msg="Edit Succsessfull";
                echo $msg;
            } else {
                $msg = "You must insert all inputs!!!";
                echo $msg;
            }
        }else{
            $msg = "Method is wrong!!!";
            echo $msg;
        }
    }
    public function updateGenres()
    {
        $genre_id=$this->test_input($_GET['id']);
        $genre =$this->test_input($_GET['genres']);
        $genres = new Model();
        if ($_SERVER ["REQUEST_METHOD"] == "GET") {
            if ($genre != "" && $genre_id !="") {
                $genres->updateGenres($genre,$genre_id);
                $msg="Edit Succsessfull";
                echo $msg;
            } else {
                $msg = "You must insert all inputs!!!";
                echo $msg;
            }
        }else{
            $msg = "Method is wrong!!!";
            echo $msg;
        }
    }
    public function editMovie()
    {
        $id=$this->test_input($_GET['id']);
        $movie = new Model();
        $mov = $movie->getmoviesbyid($id);
        include ("./Views/EditMovie.php");
    }
    public function editGenre()
    {
        $id=$this->test_input($_GET['id']);
        $genre = new Model();
        $gen = $genre->getgenresbyid($id);
        include ("./Views/EditGenres.php");
    }


    public function editActor()
    {
        $id=$this->test_input($_GET['id']);
        $actor = new Model();
        $act = $actor->getactorsbyid($id);
        include("./Views/EditActor.php");
    }
    public function showPictupt()
    {
        include("./Views/UpdatePicture.php");
    }
    public function insertagm()
    {
        $movie_id =$this->test_input($_GET['movies']);
        if (isset($_GET['actors']) && isset($_GET['genres']) && $movie_id != "") {
            $actor_id = $_GET['actors'];
            $genre_id = $_GET['genres'];
            if (count($actor_id) > 0 && count($genre_id) > 0) {
                foreach ($actor_id as $act) {
                    foreach ($genre_id as $gen) {
                        $object = new Model();
                        $object->insertActorsGenresMovies($act, $gen, $movie_id);
                        $msg = "Insert successfull";
                        echo $msg;
                    }
                }
            } else {
                $msg = 'There is no actors selected!!!';
                echo $msg;
            }
        } else {
            $msg = 'You must chose all !!!';
            echo $msg;
        }
    }
    public function Login(){
        $username =$this->test_input($_GET['username']);
        $password =$this->test_input($_GET['password']);
        // $admin= $_GET['Admin'];
        if(!empty($username) && !empty($password)){
            $useri = new Model();
            $users = $useri->getUserByUsernameAndPassword($username,$password);
            //var_dump($users);
            if ($users){
                session_start();
                $_SESSION['Loged in'] = serialize($users);
                // var_dump($s);
                if($users['Admin']==1){
                    $msg="Admin";
                    echo $msg;
                }else{
                    $msg="User";
                    echo $msg;
                }
            }else{
                // LogIN ERROR
                $msg = 'Wrong parameters!!!';
                echo $msg;
            }
        }else{
            $msg = 'You must insert all fields!!!';
            echo $msg;
        }
    }
    public function Register()
    {
        $username = $this->test_input($_GET['username1']);
        $email = $this->test_input($_GET['email']);
        $password1 =$this->test_input($_GET['password_1']);
        $password2 =$this->test_input($_GET['password_2']);
        $model1= new Model();
        $m=$model1->getUserByUsername($username);
        $model2= new Model();
        $m1=$model2->getUserByEmail($email);
        if (!empty($username) && !empty($email) && !empty($password1) && !empty($password2)) {
                if (preg_match("/^[a-zA-Z ]*$/",$username)){
                     if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if ($m['username'] == $username || $m1['email'] == $email) {
                        $msg = 'Selected username or email already exist!!!';
                        echo $msg;
                    } else {
                        if ($password1 === $password2) {
                            $user = new Model();
                            $users = $user->getUserByUsernameAndPassword($username, $password1);
                            session_start();
                            $_SESSION['Loged in'] = serialize($users);
                            $user = new Model();
                            $users = $user->insertUsers($username, $email, $password1);
                            $msg = 'Register';
                            echo $msg;
                        } else {
                            $msg = "Passwords are not matching!!!";
                            echo $msg;
                        }
                    }
                }else{
                        $msg='Invalid email format!!!';
                        echo $msg;
                    }
                }else{
                    $msg='Only letters and white space allowed!!!';
                    echo $msg;
                }
        } else {
            $msg = "You must fill all fields!!!";
            echo $msg;
        }
    }
    public function Logout(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: /test-project/movies_new3/Views/HomePage.php");
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
