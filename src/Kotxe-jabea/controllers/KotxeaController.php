<?php

namespace Controllers;

use Models\Jabea;
use Models\kotxea;

class KotxeakController {

    public function listAll(){
        $kotxea = new Kotxea();
        $kotxeak = $kotxea->getall();
        $jabea = new Jabea();
        $jabeak = $jabea->getAll();
        require_once '../views/kotxe-zerrenda.php';
    }

    public function jabeaAldatu($id, $jabea_id){
        if ($jabea_id == 'NULL') {
            $jabea_id = NULL;
        }        
        $kotxea = new kotxea();
        $kotxea->jabeaUpdate($id, $jabea_id);
        $this->listAll();
    }    
}