<?php
    require "../dbCon.php";
    $stmt = $conn->prepare("
SELECT reservations.reservation_id, reservations.status,
       users.full_name, labs.lab_name,
       reservations.reservation_date,
       reservations.start_time, reservations.end_time
FROM reservations
JOIN users ON reservations.user_id = users.user_id
JOIN labs ON reservations.lab_id = labs.lab_id
    ");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>