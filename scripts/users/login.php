<?php

session_start();

function login($a_username, $a_password){

    require_once "../conf.php";


    $login = htmlentities($a_username, ENT_QUOTES, "UTF-8");
    $password = htmlentities($a_password, ENT_QUOTES, "UTF-8");
    $isValid = true;
    $errorMsg = "";

    if(empty($login) || empty($password)){
        $isValid = false;
        $errorMsg = "Login and/or Password can't be empty";
    }

    if(!$isValid){
        $_SESSION['errorMsg'] = $errorMsg;
        exit();
    }

    $db = new PDO($db_dsn, $db_user, $db_pass);
    $sql = "SELECT * FROM `users` WHERE `username`=?";

    $stmt = $db->prepare($sql);
    $stmt->execute([$login]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$stmt->rowCount()){
        $isValid = false;
        $errorMsg = "Incorrect username or password";
    }else{
        if(!password_verify($password, $result['password'])){
            $isValid = false;
            $errorMsg = 'Incorrect username or password';
        }
    }

    if(!$isValid){
        return 0;
        exit();
    }

    $_SESSION['SESS_ID'] = random_bytes(32);
    $_SESSION['role'] = $result['role'];
    return 1;

}