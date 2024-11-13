<?php
class MovieView {
    public function render($movies) {
        echo "<h1>Lista de Películas</h1>";
        echo "<ul>";
        foreach ($movies as $movie) {
            echo "<li>{$movie['title']} - Género: {$movie['genre']} - Año: {$movie['release_year']}</li>";
        }
        echo "</ul>";
        echo "<h2>Añadir Nueva Película</h2>";
        echo "<form method='POST' action='index.php'>
                <input type='text' name='title' placeholder='Título' required>
                <input type='text' name='genre' placeholder='Género' required>
                <input type='number' name='release_year' placeholder='Año de lanzamiento' required>
                <button type='submit'>Añadir</button>
              </form>";
    }
}
?>
