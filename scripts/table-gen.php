<?php

function generateTable($array) {
    if (empty($array)) {
        return;
    }

    $keys = array_keys(reset($array));

    echo '<table class="table">';

    echo '<thead><tr>';
    foreach ($keys as $key) {
        echo "<th>{$key}</th>";
    }
    echo '</tr></thead>';

    echo '<tbody>';
    foreach ($array as $row) {
        echo '<tr>';
        foreach ($keys as $key) {
            echo "<td>{$row[$key]}</td>";
        }
        echo '</tr>';
    }
    echo '</tbody>';

    echo '</table>';
}
