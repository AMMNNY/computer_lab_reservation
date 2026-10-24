<?php
    require "dbCon.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["reservation_id"];
        $stmt = $conn->prepare("DELETE  FROM reservations WHERE reservation_id=:reservation_id");
        $stmt->execute(["reservation_id" => $id]);
        header("Location: userPage.php");
    }
?>