<?php
// Cargar la clase de la base de datos
require_once '../config/config.php'; // Asegúrate de que la ruta sea correcta

use Config\Database;

try {
    // Intentar obtener la conexión a la base de datos
    $db = Database::getInstance();
    $connection = $db->getConnection();

    // Si la conexión es exitosa
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Si hay un error de conexión, se captura y se muestra el mensaje
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>
