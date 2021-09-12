<?php

$db = new SQLite3("../db.sqlite3");

$id = uniqid();
                                    
$results = $db->exec("INSERT INTO ports SELECT * FROM ports WHERE id = '{$_POST["id"]}';");

if($results == false) {

    die($db->lastErrorMsg());

} else {
    $result = $db->exec("UPDATE ports SET id = '{$id}' WHERE id = '{$_POST["id"]}' AND ROWID = (SELECT ROWID FROM ports WHERE id = '{$_POST["id"]}')");

    if($result == false) {

        die($db->lastErrorMsg());

    } else {

        header("Location: ../index.php");
    }

}
?>