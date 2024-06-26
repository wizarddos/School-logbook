<?php

require_once "../scripts/query.php";

function changeConfig($args){
    $id = htmlentities($args['id'], ENT_QUOTES, "UTF-8");
    $value = htmlentities($args['value'], ENT_QUOTES, "UTF-8");

    $sql = "UPDATE `config` SET `conf_value` = ? WHERE `conf_id` = ?";

    runQuery($sql, [$value, $id]);
}