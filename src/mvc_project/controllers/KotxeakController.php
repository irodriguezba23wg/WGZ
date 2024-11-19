<?php
use Models\Jabea;
use Models\Kotxea;
class KotxeakController {
    public static function assignOwnerPage() {
        $jabeak = Jabea::getAll();
        $kotxeak = Kotxea::getAllWithoutOwner();
        require 'views/assign_owner.php';
    }

    public static function assignOwnerAction() {
        $kotxeId = $_POST['kotxe_id'];
        $jabeaId = $_POST['jabea_id'];
        Kotxea::assignOwner($kotxeId, $jabeaId);
        header("Location: /index.php");
    }
}
?>
