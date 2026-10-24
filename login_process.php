<?php
    require('dbCon.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $conn->prepare("
            SELECT * FROM users WHERE email =:email
        ");
        $stmt->execute([
            "email" =>$email
        ]);
        session_start();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user !== false){
            if(password_verify($password, $user["password"])){
                $_SESSION["user_id"] =$user["user_id"];
                if($user["role"] == "admin"){
                        header("Location: /computer_lab_reservation/AdminFolder/adminPage.php");
                        exit;
                }else{
                        header("Location: userPage.php");
                        exit;
                }
            }
            else{
                echo "Error";
            }
        }
    }
?>