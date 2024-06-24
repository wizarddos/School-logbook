<?php
session_start();

if(isset($_SESSION['SESS_ID'])){
    header("Location: public/dashboard.php");
}else{
    header("Location: public/login.php");
}