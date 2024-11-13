<?php
require_once 'db_config.php';
require_once 'MovieController.php';

$controller = new MovieController($pdo);
$controller->handleRequest();
?>
