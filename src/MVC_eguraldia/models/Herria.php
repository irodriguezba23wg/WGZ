<?php

namespace Models;

use PDO;
use Config\Database;

class Herria {
    private $db;

  
    public function getId($izena) {
        $query = "SELECT id FROM herria WHERE izena = :izena";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":izena", $izena, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['id'];
        }

        // Si no se encuentra el herria, puedes decidir qué hacer:
        // - Lanzar una excepción
        // - Devolver null o false
        throw new \Exception("Ez da herririk aurkitu izenarekin: $izena");
    }
        
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM herria ORDER BY izena");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($izena) {
        $query = "INSERT INTO herria SET izena = :izena";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":izena", $izena, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM herria WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id, $izenBerria) {
        $query = "UPDATE herria SET izena = :izenBerria WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":izenBerria", $izenBerria, PDO::PARAM_STR);
        return $stmt->execute();
    }         

    // herria lortu id erabiliz
    public function get($id) {
        $query = "SELECT izena FROM herria WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        //return $stmt->fetchAll();
        $herria = $stmt->fetchAll();
        //var_dump($herria);
        return $herria[0]["izena"];
    }    
}