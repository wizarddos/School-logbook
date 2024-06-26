<?php
require_once "../scripts/query.php";

function addUser($args){
    $sql = "INSERT INTO `users` VALUES(?, ?, ?, ?, ?, ?, ?)";

    $clean = [];
    foreach($args as $arg){
        array_push($clean, htmlentities($arg, ENT_QUOTES, "UTF-8"));
    }

    $clean[1] = password_hash($clean[1], PASSWORD_DEFAULT);
    array_unshift($clean, NULL);
    array_pop($clean);

    print_r($clean);
    echo $clean[1];
    runQuery($sql, $clean);
}