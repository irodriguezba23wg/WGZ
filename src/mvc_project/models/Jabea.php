<?php

namespace Models;
use Config\Database;

class Jabea {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM jabeak");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
