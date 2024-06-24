<?php
    session_start();
    require "../../../conf.php";
    require "../../../lang/".$conf[constant("LANG")]['conf_value'].".php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/frame.css">
</head>
<body>

    <h1><?= $lang['Dashboard']['frame-users'] ?></h1>   
    <form action="../../../controlers/admin.php" method="post">
        <input type="text" name = "username" placeholder="<?= $lang['Login']['username'] ?>">
        <input type="password" name = "password" placeholder="<?= $lang['Login']['password'] ?>">
        <select name="role" id="">
            <option value="0"><?= $lang['Dashboard']['Admin'] ?></option>
            <option value="1"><?= $lang['Dashboard']['Principal'] ?></option>
            <option value="2"><?= $lang['Dashboard']['Teacher'] ?></option>
            <option value="3"><?= $lang['Dashboard']['Student'] ?></option>
            <option value="4"><?= $lang['Dashboard']['Parent'] ?></option>
        </select>
        <input type="text" name = "name" placeholder="<?= $lang['Dashboard']['name'] ?>">
        <input type="text" name = "surname" placeholder="<?= $lang['Dashboard']['surname'] ?>">
        <input type="date" name="birth" id="">
        <input type="hidden" name="uri" value="<?php echo  $_SERVER['PHP_SELF']; ?>">
        <button type="submit"><?= $lang['Dashboard']['add-user'] ?></button>
    </form>
    <?php
        if(isset($_SESSION['info'])){
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }

        require "../../../scripts/query.php";
        require "../../../scripts/table-gen.php";

        $sql = "SELECT * FROM `users`";
        $result = runQuery($sql);

        generateTable($result);
        
    ?>
</body>
</html>