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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <?php
                if($_SESSION['role'] == 0){
                    echo '<li><button class="tab-el logs">'.$lang['Dashboard']['logs'].'</button></li>';
                }
            ?>
        </ul>

        <a href = "../logout.php">Log out</a>
    </nav>
    <main>
        <?php
            $tab = isset($_GET['tab']) ? htmlentities( $_GET['tab'] ) : 'users';

            echo "<iframe src=\"dash-elements/$tab.php\" frameborder=\"0\" class = \"frame\"></iframe>";
        ?>
    </main>
    <script src="../js/change-tabs.js"></script>
</body>
</html>