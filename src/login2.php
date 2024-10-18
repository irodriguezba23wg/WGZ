<?php
$servidor = "localhost"; // Cambia esto si es otro servidor
$usuario = "root";       // Usuario de MySQL
$contrasena = "";        // Contraseña de MySQL

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contrasena);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
echo "Conexión establecida exitosamente.<br>";

// Crear una base de datos llamada "ikerDB"
$sql = "CREATE DATABASE ikerDB";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Base de datos 'ikerDB' creada exitosamente.<br>";
} else {
    echo "Error al crear la base de datos: " . $conexion->error . "<br>";
}

// Cerrar la conexión
$conexion->close();
?>
