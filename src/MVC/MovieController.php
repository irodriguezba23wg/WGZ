<?php
require_once 'MovieModel.php';
require_once 'MovieView.php';

class MovieController {
    private $model;
    private $view;

    public function __construct($pdo) {
        $this->model = new MovieModel($pdo);
        $this->view = new MovieView();
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $genre = $_POST['genre'] ?? '';
            $releaseYear = $_POST['release_year'] ?? '';
            $this->model->addMovie($title, $genre, $releaseYear);
        }

        $movies = $this->model->getMovies();
        $this->view->render($movies);
    }
}
?>
