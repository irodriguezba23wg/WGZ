<?php
require_once 'db_config.php';

class MovieModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getMovies() {
        $stmt = $this->pdo->query("SELECT * FROM movies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMovie($title, $genre, $releaseYear) {
        $stmt = $this->pdo->prepare("INSERT INTO movies (title, genre, release_year) VALUES (:title, :genre, :release_year)");
        $stmt->execute([
            ':title' => $title,
            ':genre' => $genre,
            ':release_year' => $releaseYear
        ]);
    }
}
?>

