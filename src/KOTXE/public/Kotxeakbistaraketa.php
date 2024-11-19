<?php
    require_once '../config/config.php';

    require_once '../models/Kotxeak.php';
    require_once '../models/Jabeak.php';

    require_once '../controllers/KotxeakControllers.php';

    use Controllers\KotxeakControllers;
    
        $herriaController= new KotxeakControllers();
        $herriaController->listAll();
?>