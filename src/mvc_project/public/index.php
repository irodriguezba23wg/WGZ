<?php
require_once '../controllers/KotxeakController.php';

$action = $_GET['action'] ?? 'assignOwnerPage';

if ($action === 'assignOwnerPage') {
    KotxeakController::assignOwnerPage();
} elseif ($action === 'assignOwnerAction') {
    KotxeakController::assignOwnerAction();
}
?>
