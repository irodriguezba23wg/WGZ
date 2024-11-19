<?php

namespace Models;

use PDO;
use Config\Database;

class Kotxea {
    private $db;
        
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM kotxeak");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function jabeaUpdate($id, $jabea_id) {
        $query = "UPDATE kotxeak SET jabea_id = :jabea_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":jabea_id", $jabea_id, PDO::PARAM_INT);
        return $stmt->execute();
    }  
}