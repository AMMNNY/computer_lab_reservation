<?php
    require('dbCon.php');
    $stmt = $conn->prepare("SELECT * FROM labs");
    $stmt->execute();
    $lab = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>