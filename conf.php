<?php

$db_dsn = "mysql:dbname=schooldiary;host=localhost";
$db_user = "root";
$db_pass = "";
define("DOMAIN", "http://localhost/School-logbook/");

$conn = new PDO($db_dsn, $db_user, $db_pass);
$sql = 'SELECT * FROM `config`';

$stmt = $conn->prepare($sql);
$stmt->execute();
$conf = $stmt->fetchAll(PDO::FETCH_ASSOC);

define("LANG", 0);