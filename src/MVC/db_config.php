<?php

$zerbitzaria = "db"; 
$erabiltzailea = "root"; 
$pasahitza = "root"; 
$db_izena = "MVC";

try {
    $conn = new PDO("mysql:host=$zerbitzaria;dbname=$db_izena", $erabiltzailea, $pasahitza);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errorea konexioan: " . $e->getMessage());
}
?>



