<?php
session_start();
require_once "../scripts/admin/addUser.php";
require_once "../scripts/admin/delUser.php";
require_once "../scripts/admin/changeConfig.php";

$args = $_SERVER['REQUEST_METHOD'] === "GET" ? $_GET : $_POST;

$path = htmlentities($args['uri'], ENT_QUOTES, "UTF-8");

$route = explode("/", $path);

switch(end($route)){
    case "users.php": 
        addUser($args); 
        header("Location: ../public/admin/dash-elements/users.php"); 
        break;
    case "del-user.php":
        deleteUser($args);
        header("Location: ../public/admin/dash-elements/users.php");
        break;

    case "config.php":
        changeConfig($args);
        header("Location: ../public/admin/dash-elements/config.php");
    default: echo "No route specified"; break;
}