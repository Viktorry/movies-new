<?php
/*require_once './Configuration/DB.php';*/
require_once $_SERVER['DOCUMENT_ROOT'].'/test-project/movies_new3/Configuration/DB.php';
class Model {
    /**
     * @var PDO
     */
    protected $db;
    //Get all upiti
    protected $getallmovies="SELECT * FROM movies";
    protected $getallactors="SELECT * FROM actors";
    protected $getallvideos="SELECT * FROM videos";
    protected $getallpictures="SELECT * FROM pictures";
    protected $getallgenres="SELECT * FROM genres";
    protected $getallusers="SELECT * FROM users";
    protected $getallnews="SELECT * FROM movie";
    protected $getpicturesbyid="SELECT * FROM pictures WHERE id=?";
    protected $getactorbyid="SELECT * FROM actors WHERE actor_id=?";
    protected $getgenrebyid="SELECT * FROM genres WHERE genres_id=?";
    protected $selectuserbyusername = "SELECT * FROM users WHERE username= ?";
    protected $selectuserbyuseremail = "SELECT * FROM users WHERE email= ?";
    protected $userexistbyusername = "SELECT count(*) FROM users WHERE username = ?";
    protected $userexistbyemail = "SELECT count(*) FROM users WHERE email = ?";
    protected $getvideosbyid="SELECT * FROM videos WHERE id=?";
    protected $selectuserbypasswordandusername = "SELECT * FROM users WHERE username = ? AND pass = ?";
    // Insert upiti
    protected $insertmovie="INSERT INTO movies(movies_name, movies_date, duration_time,ratings,youtube,imdb, url) VALUES (?,?,?,?,?,?,?)";
    protected $insertActorsinMovies= "INSERT INTO actorsinmovies (actor_id,movies_id) VALUES (?,?)";
    protected $insertGenresinMovies= "INSERT INTO genresinmovies (genres_id,movies_id) VALUES (?,?)";
    protected $insertactor="INSERT INTO actors(actor) VALUES (?)";
    protected $insertgenre="INSERT INTO genres(genre) VALUES (?)";
    protected $insertuser = "INSERT INTO users(username, email, pass) VALUES (?, ?, ?)";
    protected $insertpictures="INSERT INTO pictures (image) VALUES (?)";
    protected $insertvideos="INSERT INTO videos (video,url) VALUES (?,?)";
    // protected $insertactorifexist="INSERT INTO actors(actor) SELECT ? FROM actors WHERE NOT EXIST(SELECT actor FROM actors WHERE actor=?) LIMIT 1";
    protected $insertnews="INSERT INTO news(user_id, description) VALUES (?,?)";
    protected $insertComment="INSERT INTO comment(comment,movie_id,user_id) VALUES (?,?,?)";
    // Delete upiti
    protected $deleteMovie="DELETE FROM movies WHERE movies_id=?";
    protected $deleteComment="DELETE FROM comment WHERE  comm_id=?";
    protected $deleteActor="DELETE FROM actors WHERE actor_id = ?";
    protected $deleteNews="DELETE FROM news WHERE news_id =?";
    protected $deleteGenres="DELETE FROM genres WHERE genres_id =?";

    //Update upiti
    protected $updateComment="UPDATE comments SET comments = ?, movie_id = ?, user_id = ? WHERE  comm_id = ?";
    protected $updateNews="UPDATE news SET description=?, user_id = ? WHERE  news_id = ?";
    protected $updateMovies="UPDATE movies SET movies_name=?, movies_date= ?,duration_time= ?,ratings=?,youtube=?,imdb=?,url=? WHERE  movies.movies_id = ?";
    protected $updateActors="UPDATE actors SET actor=? WHERE  actor_id = ?";
    protected $updateGenres="UPDATE genres SET genre=?  WHERE genres_id =?";

    //------------------UPITI NAD VISE TABELA------------------------//
    protected $selectMoviesandGenres= "SELECT genres.* FROM movies JOIN genresinmovies ON movies.movies_id = genresinmovies.movies_id JOIN genres ON genresinmovies.genres_id = genres.genres_id WHERE movies.movies_id=?";
    protected $selectMoviesandActors= "SELECT actors.* FROM  movies JOIN actorsinmovies ON movies.movies_id = actorsinmovies.movies_id JOIN actors ON actorsinmovies.actor_id = actors.actor_id  WHERE movies.movies_id=?";
    protected $deleteMoviesandActors="DELETE FROM actorsinmovies WHERE movies_id=? AND actors_id=?";
    protected $selectallmoviesactorsandgenres="SELECT movies.*, actors.*, genres.* FROM movies  JOIN actorsgenresinmovies ON movies.movies_id = actorsgenresinmovies.movie_id JOIN actors ON actors.actor_id=actorsgenresinmovies.actor_id JOIN genres ON genres.genres_id = actorsgenresinmovies.genre_id";


    //Conn established
    public function __construct()
    {
        $this->db = DB::createInstance();
    }
    //Upiti nad vise tabela
    /*public function getAllmoviesandActors()
    {
        $stm = $this->db->prepare($this->selectMoviesandActors);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }*/
    public function deleteAllmoviesandActors($movie_id)
    {
        $statement = $this->db->prepare($this->deleteMoviesandActors);
        $statement->bindValue(1,$movie_id);
        $statement->execute();
    }

    public function getpicturesbyid($pic_id)
    {
        $stm = $this->db->prepare($this->getpicturesbyid);
        $stm->bindValue(1,$pic_id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetch();
        }
        return $rr;
    }
    public function getUserByUsernameAndPassword($username,$pass)
    {
        $statement = $this->db->prepare($this->selectuserbypasswordandusername);
        $statement->bindValue(1, $username);
        $statement->bindValue(2, $pass);
        $result=$statement->execute();
        $rr=NULL;
        if($result){
            $rr = $statement->fetch();
        }
        return $rr;
    }
    public function getUserByUsername($username)
    {
        $statement = $this->db->prepare($this->selectuserbyusername);
        $statement->bindValue(1, $username);
        $result=$statement->execute();
        $rr=NULL;
        if($result){
            $rr = $statement->fetch();
        }
        return $rr;
    }
    public function getUserByEmail($email)
    {
        $statement = $this->db->prepare($this->selectuserbyuseremail);
        $statement->bindValue(1, $email);
        $result=$statement->execute();
        $rr=NULL;
        if($result){
            $rr = $statement->fetch();
        }
        return $rr;
    }

    public function userExistByUsername($username)
    {
        $statement = $this->db->prepare($this->userexistbyusername);
        $statement->bindValue(1, $username);
        $result=$statement->execute();
        $rr=NULL;
        if($result){
            $rr = $statement->fetch();
        }
        return $rr;
    }
    public function userExistByEmail($email)
    {
        $statement = $this->db->prepare($this->userexistbyusername);
        $statement->bindValue(1, $email);
        $result=$statement->execute();
        $rr=NULL;
        if($result){
            $rr = $statement->fetch();
        }
        return $rr;
    }

    public function selectUserById($user_id)
    {
        $statement = $this->db->prepare($this->selectuserbyid);
        $statement->bindValue(1, $user_id);
        $result=$statement->execute();
        $rr=NULL;
        if($result){
            $rr = $statement->fetch();
        }
        return $rr;
    }

    public function getactorsbyid($id)
    {
        $stm = $this->db->prepare($this->getactorbyid);
        $stm->bindValue(1,$id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetch();
        }
        return $rr;
    }
    public function getactorsinmoviesbyid($id)
    {
        $stm = $this->db->prepare($this->selectMoviesandActors);
        $stm->bindValue(1,$id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchall();
        }
        return $rr;
    }
    public function getgenresinmoviesbyid($id)
    {
        $stm = $this->db->prepare($this->selectMoviesandGenres);
        $stm->bindValue(1,$id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchall();
        }
        return $rr;
    }
    public function getgenresbyid($id)
    {
        $stm = $this->db->prepare($this->getgenrebyid);
        $stm->bindValue(1,$id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetch();
        }
        return $rr;
    }
    public function getAllmovies()
    {
        $stm = $this->db->prepare($this->getallmovies);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rr;
    }
    public function getAllpictures()
    {
        $stm = $this->db->prepare($this->getallpictures);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }
    public function getAllvideos($id)
    {
        $stm = $this->db->prepare($this->getallvideos);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }
    public function getVideosbyid($id)
    {
        $stm = $this->db->prepare($this->getvideosbyid);
        $stm->bindValue(1,$id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchall();
        }
        return $rr;
    }
    public function getAllactors()
    {
        $stm = $this->db->prepare($this->getallactors);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }
    public function getAllGenres()
    {
        $stm = $this->db->prepare($this->getallgenres);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }
    public function getAllnews()
    {
        $stm = $this->db->prepare($this->getallnews);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }
    public function getAllUsers()
    {
        $stm = $this->db->prepare($this->getallusers);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }


    //Insert Methods

    public function insertMovie($movie_name,$movie_re_date,$duration_time,$ratings,$youtube,$imdb,$url)
    {
        $statement = $this->db->prepare($this->insertmovie);
        $statement->bindValue(1,$movie_name);
        $statement->bindValue(2,$movie_re_date);
        $statement->bindValue(3,$duration_time);
        $statement->bindValue(4,$ratings);
        $statement->bindValue(5,$youtube);
        $statement->bindValue(6,$imdb);
        $statement->bindValue(7,$url);
        $statement->execute();
    }

    public function insertActors($actor_name)
    {
        $statement = $this->db->prepare($this->insertactor);
        $statement->bindValue(1, $actor_name);
        $statement->execute();
    }

    public function insertGenres($genres)
    {
        $statement=$this->db->prepare($this->insertgenre);
        $statement->bindValue(1,$genres);
        $statement->execute();
    }
    public function insertPictures($picture)
    {
        $statement=$this->db->prepare($this->insertpictures);
        $statement->bindValue(1,$picture);
        $statement->execute();
    }
    public function insertUsers($username, $email, $pass)
    {
        $statement = $this->db->prepare($this->insertuser);
        $statement->bindValue(1, $username);
        $statement->bindValue(2, $email);
        $statement->bindValue(3, $pass);
        $statement->execute();
    }

    public function insertNews($user_id,$description)
    {
        $statement=$this->db->prepare($this->insertnews);
        $statement->bindValue(1,$user_id);
        $statement->bindValue(2,$description);
        $statement->execute();
    }
    public function inserVideos($video,$url)
    {
        $statement=$this->db->prepare($this->insertvideos);
        $statement->bindValue(1,$video);
        $statement->bindValue(2,$url);
        $statement->execute();
    }
    public function insertComment($comment,$movie_id,$user_id)
    {
        $statement=$this->db->prepare($this->insertComment);
        $statement->bindValue(1,$comment);
        $statement->bindValue(2,$movie_id);
        $statement->bindValue(3,$user_id);
        $statement->execute();
    }
    public function insertActorsinMovies($act,$mov)
    {
        $statement=$this->db->prepare($this->insertActorsinMovies);
        $statement->bindValue(1,$act);
        $statement->bindValue(2,$mov);
        $statement->execute();
    }
    public function insertGenresinMovies($gen,$mov)
    {
        $statement=$this->db->prepare($this->insertGenresinMovies);
        $statement->bindValue(1,$gen);
        $statement->bindValue(2,$mov);
        $statement->execute();
    }


    //Delete methods

    public function deleteMovie($movie_id)
    {
        $statement = $this->db->prepare($this->deleteMovie);
        $statement->bindValue(1,$movie_id);
        $statement->execute();
    }
    public function deleteComment($comment_id)
    {
        $statement = $this->db->prepare($this->deleteComment);
        $statement->bindValue(1,$comment_id);
        $statement->execute();
    }
    public function deleteActor($actor_id)
    {
        $statement = $this->db->prepare($this->deleteActor);
        $statement->bindValue(1,$actor_id);
        $statement->execute();
    }
    public function deleteNews($news_id)
    {
        $statement = $this->db->prepare($this->deleteNews);
        $statement->bindValue(1,$news_id);
        $statement->execute();
    }
    public function deleteGenres($genres_id)
    {
        $statement = $this->db->prepare($this->deleteGenres);
        $statement->bindValue(1,$genres_id);
        $statement->execute();
    }


    //Edit methods

    public function updateComment($comment,$movie_id,$user_id,$comm_id)
    {
        $statement=$this->db->prepare($this->updateComment);
        $statement->bindValue(1,$comment);
        $statement->bindValue(2,$movie_id);
        $statement->bindValue(3,$user_id);
        $statement->bindValue(4,$comm_id);
        $statement->execute();
    }
    public function updateNews($description,$user_id,$news_id)
    {
        $statement=$this->db->prepare($this->updateNews);
        $statement->bindValue(1,$description);
        $statement->bindValue(2,$user_id);
        $statement->bindValue(3,$news_id);
        $statement->execute();
    }
    public function updateMovies($movie_id,$movie_name,$movie_re_date,$duration_time,$ratings,$youtube,$imdb,$url)
    {
        $statement=$this->db->prepare($this->updateMovies);
        $statement->bindValue(1,$movie_name);
        $statement->bindValue(2,$movie_re_date);
        $statement->bindValue(3,$duration_time);
        $statement->bindValue(4,$ratings);
        $statement->bindValue(5,$youtube);
        $statement->bindValue(6,$imdb);
        $statement->bindValue(7,$url);
        $statement->bindValue(8,$movie_id);
        $statement->execute();
    }
    public function updateActors($actor,$actor_id)
    {
        $statement = $this->db->prepare($this->updateActors);
        $statement->bindValue(1, $actor);
        $statement->bindValue(2, $actor_id);
        $statement->execute();
    }
    public function updateGenres($genre,$genres_id)
    {
        $statement = $this->db->prepare($this->updateGenres);
        $statement->bindValue(1, $genre);
        $statement->bindValue(2, $genres_id);
        $statement->execute();
    }

}
?>

