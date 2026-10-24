<?php
    require "../dbCon.php"; 
    $stmtUsers = $conn->prepare("SELECT COUNT(*) FROM users");
    $stmtLabs = $conn->prepare("SELECT COUNT(*) FROM labs");
    $stmtReservations = $conn->prepare("SELECT COUNT(*) FROM reservations");
    $stmtStatus = $conn->prepare("SELECT COUNT(*) FROM reservations WHERE status");
    $stmtUsers->execute();
    $stmtLabs->execute();
    $stmtStatus->execute();
    $stmtReservations->execute();
    $user = $stmtUsers->fetchColumn();
    $lab =  $stmtLabs->fetchColumn();
    $res = $stmtReservations->fetchColumn();
    $stat = $stmtStatus->fetchColumn();
?>