<?php

class Movie
{
    /**
     * @var PDO
     */
    protected $db;

    protected $getMovieById = "SELECT * FROM movies WHERE movies_id = ?";
    protected $actorsQuery = "SELECT actors.* FROM movies  JOIN actorsgenresinmovies ON movies.movies_id = actorsgenresinmovies.movie_id JOIN actors ON actors.actor_id=actorsgenresinmovies.actor_id WHERE movies.movies_id = ?";
    protected $genresQuery = "SELECT genres.* FROM movies  JOIN actorsgenresinmovies ON movies.movies_id = actorsgenresinmovies.movie_id JOIN genres ON genres.genres_id=actorsgenresinmovies.genre_id WHERE movies.movies_id = ?";
    protected $genresactorsmoviesQuery = "SELECT movies.*, actors.*, genres.* FROM movies  JOIN actorsgenresinmovies ON movies.movies_id = actorsgenresinmovies.movie_id JOIN actors ON actors.actor_id=actorsgenresinmovies.actor_id JOIN genres ON genres.genres_id = actorsgenresinmovies.genre_id WHERE movies.movies_id = ?";

    public function __construct($id)
    {
        $this->db = DB::createInstance();

        $movie = $this->getMovieById($id);

        $this->movies_id = $movie['movies_id'];
        $this->movies_name = $movie['movies_name'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMovieById($id)
    {
        $stm = $this->db->prepare($this->getMovieById);
        $stm->bindValue(1,$id);
        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function getActors()
    {
        $stm = $this->db->prepare($this->actorsQuery);
        $stm->bindValue(1, $this->movies_id);
        $stm->execute();

        return $stm->fetchAll();
    }

    /**
     * @return array
     */
    public function getGenres()
    {
        $stm = $this->db->prepare($this->genresQuery);
        $stm->bindValue(1, $this->movies_id);
        $stm->execute();

        return $stm->fetchAll();
    }
}