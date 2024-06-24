<?php
    session_start();
    if($_SESSION['role'] != 0){
        header("Location: ../login.php");
        die();
    }
    require "../../conf.php";

    require "../../lang/".$conf[constant("LANG")]['conf_value'].".php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin Panel</title>
</head>
<body class = "content">
    <nav class = "sidenav">
        <ul>
            <li><button class = "tab-el users"><?= $lang['Dashboard']['users'] ?></button></li>
            <li><button class = "tab-el config"><?= $lang['Dashboard']['config'] ?></button></li>
            <li><button class = "tab-el classes"><?= $lang['Dashboard']['classes'] ?></button></li>
            <li><button class = "tab-el display"><?= $lang['Dashboard']['tables'] ?></button></li>
            <li><button class = "tab-el backup"><?= $lang['Dashboard']['backup'] ?></button></li>
            <li><button class = "tab-el report"><?= $lang['Dashboard']['report'] ?></button></li>
        </ul>

        <a href = "../logout.php">Log out</a>
    </nav>
    <main>
        <iframe src="dash-elements/users.php" frameborder="0" class = "frame"></iframe>
    </main>
    <script src="../js/change-tabs.js"></script>
</body>
</html>