<?php
    session_start();
    require_once "../lang/en.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>LogBook - login page</title>
</head>
<body>
    
    <form action="../controlers/user.php" method = "POST" class = "method">
        <h1><?= $lang['Login']['heading'] ?></h1>
        <label class = "label"><?= $lang['Login']['username'] ?></label><br/>
        <input type="text" placeholder="<?= $lang['Login']['username'] ?> " name="username" required><br><br>

        <label class = "label"><?= $lang['Login']['password'] ?></label><br/>
        <input type="password" placeholder="<?= $lang['Login']['password'] ?> " name="password" required><br><br>
        
        <button type="submit" class = "login-button"><?= $lang['Login']['submit'] ?></button>
    </form>
</body>
</html>