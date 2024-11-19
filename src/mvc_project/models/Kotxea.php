<?php
require_once 'config.php';

class Kotxea {
    public static function getAllWithoutOwner() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM kotxeak WHERE jabea_id IS NULL");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function assignOwner($kotxeId, $jabeaId) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE kotxeak SET jabea_id = :jabea_id WHERE id = :id");
        $stmt->execute([':jabea_id' => $jabeaId, ':id' => $kotxeId]);
    }
}
?>
