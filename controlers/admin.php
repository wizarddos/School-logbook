<?php
session_start();
require_once "../scripts/admin/addUser.php";

$args = $_SERVER['REQUEST_METHOD'] === "GET" ? $_GET : $_POST;

$path = htmlentities($args['uri'], ENT_QUOTES, "UTF-8");

$route = explode("/", $path);

switch(end($route)){
    case "user.php": 
        addUser($args); 
        //TODO: Fix that
        break;
}