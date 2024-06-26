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
    <h1><?= $lang['Dashboard']['frame-config'] ?></h1>
    <form action="../../../controlers/admin.php" method="post">
        <input type="number" name = "id" placeholder="<?= $lang['Dashboard']['id'] ?>">
        <input type="text" name = "value" placeholder="<?= $lang['Dashboard']['value'] ?>">
        <input type="hidden" name="uri" value="<?php echo  $_SERVER['PHP_SELF']; ?>">
        <button type="submit"><?= $lang['Dashboard']['change-config'] ?></button>
    </form>   
    <?php
        if(isset($_SESSION['info'])){
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }

        require "../../../scripts/query.php";
        require "../../../scripts/table-gen.php";

        $sql = "SELECT * FROM `config`";
        $result = runQuery($sql);

        generateTable($result);
        
    ?>
</body>
</html>