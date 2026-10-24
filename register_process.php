<?php
    require('dbCon.php') ;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST["full_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("
            INSERT INTO users(full_name , email, password)
            VALUES(:username,:email,:password)
        ");
        $stmt->execute([
            "username" =>$username,
            "email"=>$email,
            "password"=>$password
        ]);
    }
?>