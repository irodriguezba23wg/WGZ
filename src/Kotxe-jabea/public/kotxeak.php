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
$kotxeController->listAll();