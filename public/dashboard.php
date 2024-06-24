<?php
    session_start();
    if(!isset($_SESSION['SESS_ID'])){
        header("Location: login.php");
        die();
    }

    $id = $_SESSION['SESS_ID'];
    $role = $_SESSION['role'];

    switch($role){
        case 0: 
        case 1: header("Location: admin"); break;
        case 2: header("Location: teacher"); break;
        case 3: header("Location: student"); break;
        case 4: header("Location: parent"); break;
    }