<?php

function deleteUser($args){
    if(!is_numeric($args['id'])){
        return 0;
    }

    $sql = "DELETE FROM `users` WHERE id = ?";

    $id = htmlentities($args['id'], ENT_QUOTES, "UTF-8");
    runQuery($sql, [$id]);
}