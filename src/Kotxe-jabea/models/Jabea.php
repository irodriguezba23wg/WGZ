<?php

namespace Models;

use PDO;
use Config\Database;

class Jabea {
    private $db;
        
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM jabeak");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}