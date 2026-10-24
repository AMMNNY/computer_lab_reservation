<?php
    require "dbCon.php";
    $stmt=$conn->prepare("
            SELECT reservations.*, labs.lab_name
            FROM reservations
            JOIN labs ON reservations.lab_id = labs.lab_id
    ");
    $stmt->execute();
    $reg= $stmt->fetchAll(PDO::FETCH_ASSOC);
?>