<?php

$db = new SQLite3("../db.sqlite3");

$id = uniqid();
                                    
$results = $db->exec("DELETE FROM ports WHERE id = '{$_POST["id"]}';");

if($results == false) {
    die($db->lastErrorMsg());
 } else {
    header("Location: ../index.php");
 }

?>