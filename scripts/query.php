<?php

function runQuery(string $query, array $arg = []){
    $sql = $query;

    $db_dsn = "mysql:dbname=schooldiary;host=localhost";
    $db_user = "root";
    $db_pass = "";

    try{
        $db = new PDO($db_dsn, $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare($sql);
        $stmt->execute($arg);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        return $result;
    }catch(PDOException $e){
        return ['error' => $e->getMessage()];
    }
}