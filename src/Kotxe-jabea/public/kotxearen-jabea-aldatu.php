<?php
// config
require_once '../config/config.php';
// models
require_once '../models/Kotxea.php';
require_once '../models/Jabea.php';
// controllers
require_once '../controllers/KotxeaController.php';

use Controllers\KotxeakController;

$kotxeController = new KotxeakController();
$id = $_REQUEST["id"];
$jabea_id = $_REQUEST["jabea_id"];
$kotxeController->jabeaAldatu($id, $jabea_id);