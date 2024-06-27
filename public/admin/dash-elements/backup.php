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

    <h1><?= $lang['Dashboard']['frame-backup'] ?></h1>   
    <form action="" method="post">
        <select name="format" id="">
            <option value="0">JSON</option>
            <option value="1">XML</option>
            <option value="2">CSV</option>
        </select>
        <input type="hidden" name="uri" value = "<?= $_SERVER['PHP_SELF']; ?>">
        <button type="submit"><?= $lang['Dashboard']['export'] ?></button>
        <br/> <br/>
        <?php
            require_once "../../../scripts/query.php";
           if(!isset($_POST['format'])){
                die();
           }

           $sql = "SELECT * FROM `config`";
           $res = runQuery($sql);
           $format = $_POST['format'];

           if(!is_numeric($format)){
            echo "Invalid format";
            die();
           }

           $deafultPath = "exports/";

           switch($format){
            case 0: 
                file_put_contents($deafultPath."conf.json", json_encode($res)); 
                $filename = "conf.json";
            break;
            case 1: $xml = new SimpleXMLElement('<root/>');
                    array_walk_recursive($res, array ($xml, 'addChild'));
                    file_put_contents($deafultPath."conf.xml", $xml->asXML());
                    $filename = "conf.xml";
            break;
            case 2: $fp = fopen($deafultPath.'conf.csv', 'w');

                    foreach ($res as $fields) {
                        fputcsv($fp, $fields);
                    }
                    
                    fclose($fp);
                    $filename = "conf.csv";
            break;
           }

           echo "<a href = \"exports/$filename\" download>Exported to $filename</a>";
        ?> 
    </form>
</body>
</html>