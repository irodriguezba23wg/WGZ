<?php

namespace Controllers;

use Models\Herria;
use Models\IragarpenEguna;

class IragarpenEgunaController {

    // herri bateko iragarpenak zerrendatu
    public function list($herria_id) {
        $iragarpenEguna = new IragarpenEguna();
        $egunak = $iragarpenEguna->getAllbyHerriaId($herria_id);
        //var_dump($egunak);
        // herriaren izena lortu. (SQL bidez ere egin daiteke)
        $herriaModel = new Herria();
        $herria = $herriaModel->get($herria_id);
        // view
        require_once __DIR__ . '/../views/iragaren-egunak-zerrenda.php';        
    }  

    // herri guztietako iragarpen egun guztiak
    public function listAll() {
        $iragarpenEguna = new IragarpenEguna();
        $egunak = $iragarpenEguna->getAll();
        $herria = "Herri guztiak";
        // view
        require_once __DIR__ . '/../views/iragaren-egunak-zerrenda.php';        
    }    

    // iragarpena kudeatu
    public function kudeatu($herria_id) {
        $iragarpenEguna = new IragarpenEguna();
        $egunak = $iragarpenEguna->getAllbyHerriaId($herria_id);
        // herriaren izena lortu. (SQL bidez ere egin daiteke)
        $herriaModel = new Herria();
        $herria = $herriaModel->get($herria_id);    
        // view
        require_once __DIR__ . '/../views/iragaren-egunak-kudeaketa.php';
    }

    public function iragarpenaGehitu($herria_id, $eguna, $iragarpen_testua, $eguraldia, $tenperatura_minimoa, $tenperatura_maximoa) {
        // balioak check!!
        $iragarpenEguna = new IragarpenEguna();
        $iragarpenEguna->createHerriaId($herria_id, $eguna, $iragarpen_testua, $eguraldia, $tenperatura_minimoa, $tenperatura_maximoa);
        //
        $this->kudeatu($herria_id);
    }

    public function iragarpenaEzabatu($id) {
        // balioak check!!
        $iragarpenEguna = new IragarpenEguna();
        // ezabatu aurretik herriaren id-a lortu
        $herria_id = $iragarpenEguna->getHerriaId($id);
        $iragarpenEguna->delete($id);
        $this->kudeatu($herria_id);
    }

}