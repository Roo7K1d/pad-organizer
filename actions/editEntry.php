<?php

$db = new SQLite3("../db.sqlite3");

                                    
$query = $db->prepare("UPDATE ports SET port = :port, status = :status, service = :name, deviceip = :ip, devicename = :devicename, domain = :domain, domanprovider = :domainprovider, domainproviderlink = :domainproviderlink WHERE id = :id;");
$query->bindValue(':port', $_POST["inputPort"], SQLITE3_TEXT);
$query->bindValue(':status', $_POST["inputStatus"], SQLITE3_TEXT);
$query->bindValue(':name', $_POST["inputName"], SQLITE3_TEXT);
$query->bindValue(':ip', $_POST["inputIP"], SQLITE3_TEXT);
$query->bindValue(':devicename', $_POST["inputDevice"], SQLITE3_TEXT);
$query->bindValue(':domain', $_POST["inputDomain"], SQLITE3_TEXT);
$query->bindValue(':domainprovider', $_POST["inputProvider"], SQLITE3_TEXT);
$query->bindValue(':domainproviderlink', $_POST["inputProviderLink"], SQLITE3_TEXT);
$query->bindValue(':id', $_POST["id"], SQLITE3_TEXT);

$results = $query->execute();

if($results == false) {
    die($db->lastErrorMsg());
} else {
    header("Location: ../index.php");
}

?>