<?php
require_once './Configuration/DB.php';

class Model {
    private $db;
    //Get all upiti
    private $getallmovies="SELECT * FROM movies";
    private $getallactors="SELECT * FROM actors";
    private $getallnews="SELECT * FROM movie";
    private $getmoviebyid="SELECT * FROM movies WHERE movies_id=?";
    private $getactorbyid="SELECT * FROM actors WHERE actor_id=?";
    // Insert upiti
    private $insertmovie="INSERT INTO movies(movies_name, movies_date, duration_time,ratings,youtube,imdb, url) VALUES (?,?,?,?,?,?,?)";
    private $insertactor="INSERT INTO actors(actor) VALUES (?)";
    // private $insertactorifexist="INSERT INTO actors(actor) SELECT ? FROM actors WHERE NOT EXIST(SELECT actor FROM actors WHERE actor=?) LIMIT 1";
    private $insertgenrese="INSERT INTO genres(genres) VALUES (?)";
    private $insertnews="INSERT INTO news(user_id, description) VALUES (?,?)";
    private $insertComment="INSERT INTO comment(comment,movie_id,user_id) VALUES (?,?,?)";
    // Delete upiti
    private $deleteMovie="DELETE FROM movies WHERE movies_id=?";
    private $deleteComment="DELETE FROM comment WHERE  comm_id=?";
    private $deleteActor="DELETE FROM actors WHERE actor_id = ?";
    private $deleteNews="DELETE FROM news WHERE news_id =?";
    private $deleteGenres="DELETE FROM genres WHERE genres_id =?";

    //Update upiti
    private $updateComment="UPDATE comments SET comments = ?, movie_id = ?, user_id = ? WHERE  comm_id = ?";
    private $updateNews="UPDATE news SET description=?, user_id = ? WHERE  news_id = ?";
    private $updateMovies="UPDATE movies SET movies_name=?, movies_date= ?,duration_time= ?,ratings=?,youtube=?,imdb=?,url=? WHERE  movies_id = ?";
    private $updateActors="UPDATE actors SET actor=? WHERE  actor_id = ?";
    private $updateGenres="UPDATE genres SET genre=?  WHERE genres_id =?";

    //------------------UPITI NAD VISE TABELA------------------------//
    private $selectMoviesandActors= "SELECT actors.*, movies.* FROM actors JOIN actorsinmovies ON actors.actor_id = actorsinmovies.actor_id JOIN movies ON actorsinmovies.movies_id = movies.movies_id";
    private $deleteMoviesandActors="DELETE FROM actorsinmovies WHERE movies_id=? AND actors_id=?";



    //Conn established
    public function __construct()
    {
        $this->db = DB::createInstance();
    }
    //Upiti nad vise tabela
    public function getAllmoviesandActors()
    {
        $stm = $this->db->prepare($this->selectMoviesandActors);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetchAll();
        }
        return $rr;
    }
    public function deleteAllmoviesandActors($movie_id)
    {
        $statement = $this->db->prepare($this->deleteMoviesandActors);
        $statement->bindValue(1,$movie_id);
        $statement->execute();
    }



    //SELECT all methods
    public function getmoviesbyid($id)
    {
        $stm = $this->db->prepare($this->getmoviebyid);
        $stm->bindValue(1,$id);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
            $rr = $stm->fetch();
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
    public function getAllmovies()
    {
        $stm = $this->db->prepare($this->getallmovies);
        $result=$stm->execute();
        $rr=NULL;
        if($result){
                $rr = $stm->fetchAll();
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
        $statement=$this->db->prepare($this->insertgenrese);
        $statement->bindValue(1,$genres);
        $statement->execute();
    }
    public function insertNews($user_id,$description)
    {
        $statement=$this->db->prepare($this->insertnews);
        $statement->bindValue(1,$user_id);
        $statement->bindValue(2,$description);
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
