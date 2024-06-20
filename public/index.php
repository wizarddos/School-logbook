<?php
    session_start();
    require "../lang/en.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogBook - login page</title>
</head>
<body>
    <h1><?= $lang['Login']['heading'] ?></h1>
    <form action="../controlers/user.php" method = "POST">
        <label><?= $lang['Login']['username'] ?></label>
        <input type="text" placeholder="<?= $lang['Login']['username'] ?> " name="username" required><br><br>

        <label><?= $lang['Login']['password'] ?></label>
        <input type="password" placeholder="<?= $lang['Login']['password'] ?> " name="password" required><br><br>
        
        <button type="submit"><?= $lang['Login']['submit'] ?></button>
    </form>
</body>
</html>