<?php

$db = new SQLite3("../db.sqlite3");

$id = uniqid();
                                    
$query = $db->prepare("DELETE FROM ports WHERE id = :id;");
$query->bindValue(':id', $_POST["id"], SQLITE3_TEXT);

$results = $query->execute();

if($results == false) {
    die($db->lastErrorMsg());
 } else {
    header("Location: ../index.php");
 }

?>