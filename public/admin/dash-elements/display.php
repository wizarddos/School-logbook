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
    <h1><?= $lang['Dashboard']['frame-display'] ?></h1>
    <form action="" method="post">
        <input type="text" name = "table-name" class = "table-name" placeholder="<?= $lang['Dashboard']['table-name'] ?>">
        <input type="hidden" name="uri" value="<?php echo  $_SERVER['PHP_SELF']; ?>">
        <button type="submit"><?= $lang['Dashboard']['display-table'] ?></button>
    </form>   
    <?php
        if(isset($_SESSION['info'])){
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }

        require "../../../scripts/query.php";
        require "../../../scripts/table-gen.php";
        
        if(isset($_POST['table-name']))
        {
            $name = htmlentities($_POST['table-name'], ENT_QUOTES, "UTF-8");
            $sql = "SELECT * FROM `".$name."`";
            $tables = [
                'users',
                'config',
                'classes',
                'classStudents',
                'grades',
                'attendance',
                'messages',
                'announcments',
                'timetable',
                'tests',
                'homeworks',
                'subjects',
                'subjectnames'
            ];

            if(in_array($name, $tables)){
                $result = runQuery($sql);
        
                generateTable($result);
            }else{
                echo "<p class='error'>Table does not exist</p>";
            }
        }

        
    ?>
    <script src ="../../js/submitForm.js"></script>
</body>
</html>