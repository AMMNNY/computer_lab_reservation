<?php
    require "../dbCon.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $reservation_id = $_POST["reservation_id"];
        $status = $_POST["status"];
        if($status == "approved"){
            $status = 1;
            $stmt = $conn->prepare("UPDATE reservations SET status = :status WHERE reservation_id=:reservation_id");
            $stmt->execute([
                "status" => $status,
                "reservation_id" => $reservation_id
            ]);
            header("Location: getAdminReservations.php");
            exit;
        }else{
            $status = 0;
            $stmt = $conn->prepare("UPDATE reservations SET status = :status WHERE reservation_id=:reservation_id");
            $stmt->execute([
                "status" => $status,
                "reservation_id" => $reservation_id
            ]);
            header("Location: getAdminReservations.php");
            exit;
        }

    }
?>