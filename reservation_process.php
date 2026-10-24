<?php
    session_start();
    require "dbCon.php";
    if($_SERVER["REQUEST_METHOD"] =="POST"){
        $reservation_date = $_POST["reservation_date"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $lab_id = $_POST["lab_id"];
        $user_id =  $_SESSION["user_id"];
        $stmt = $conn->prepare("
            INSERT INTO reservations (lab_id,user_id,reservation_date,start_time,end_time)
            VALUES(:lab_id,:user_id,:reservation_date,:start_time,:end_time)
        ");
        $stmt->execute([
            "lab_id"=>$lab_id,
            "user_id"=>$user_id,
            "reservation_date"=>$reservation_date,
            "start_time"=>$start_time,
            "end_time"=>$end_time
        ]);
        header("Location: userPage.php");
        exit;
    }
?>