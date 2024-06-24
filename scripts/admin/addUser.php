<?php
require_once "../scripts/query.php";

function addUser($args){
    $sql = "INSERT INTO `users` VALUES(???????)";

    $clean = [];
    foreach($args as $arg){
        array_push($clean, htmlentities($arg, ENT_QUOTES, "UTF-8"));
    }

    $clean[2] = password_hash($clean[2], PASSWORD_DEFAULT);
    array_unshift($clean, NULL);

    runQuery($sql, $clean);
}