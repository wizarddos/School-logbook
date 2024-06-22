<?php
session_start();
require_once "../scripts/users/login.php";

$args = $_SERVER['REQUEST_METHOD'] === "GET" ? $_GET : $_POST;

$path = htmlentities($args['uri'], ENT_QUOTES, "UTF-8");

$route = explode("/", $path);

switch(end($route)){
    case "login.php": login(htmlentities($_POST['username'], ENT_QUOTES, "UTF-8"), htmlentities($_POST['password'], ENT_QUOTES ,"UTF-8")); break;
    
}