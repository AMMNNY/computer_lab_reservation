<?php
    session_start();
    require "dbCon.php";
    $stmt=$conn->prepare("
            SELECT reservations.*, labs.lab_name
            FROM reservations
            JOIN labs ON reservations.lab_id = labs.lab_id
            WHERE reservations.user_id = :user_id
    ");
    $stmt->execute([
        "user_id" => $_SESSION["user_id"]
    ]);
    $reg= $stmt->fetchAll(PDO::FETCH_ASSOC);
?>