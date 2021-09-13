<?php

$db = new SQLite3("../db.sqlite3");

$id = uniqid();
                                    
$query = $db->prepare("DELETE FROM ports;");

$results = $query->execute();

if($results == false) {
    die($db->lastErrorMsg());
 } else {
    header("Location: ../index.php");
 }

?>