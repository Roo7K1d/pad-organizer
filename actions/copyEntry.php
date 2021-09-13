<?php

$db = new SQLite3("../db.sqlite3");

$newid = uniqid();
                               

$query = $db->prepare("INSERT INTO ports SELECT * FROM ports WHERE id = :id;");
$query->bindValue(':id', $_POST["id"], SQLITE3_TEXT);


$results = $query->execute();

if($results == false) {

    die($db->lastErrorMsg());

} else {

    $query = $db->prepare("UPDATE ports SET id = :newid WHERE id = :id AND ROWID = (SELECT ROWID FROM ports WHERE id = :id)");
    $query->bindValue(':newid', $newid, SQLITE3_TEXT);
    $query->bindValue(':id', $_POST["id"], SQLITE3_TEXT);

    $result = $query->execute();

    if($result == false) {

        die($db->lastErrorMsg());

    } else {

        header("Location: ../index.php");
    }

}
?>