<?php

$db = new SQLite3("../db.sqlite3");

$id = uniqid();

$query = $db->prepare("INSERT INTO ports (id, port, status, service, deviceip, devicename, domain, domanprovider, domainproviderlink) VALUES (:id, :port, :status, :name, :ip, :devicename, :domain, :domainprovider, :domainproviderlink);");
$query->bindValue(':id', $id, SQLITE3_TEXT);
$query->bindValue(':port', $_POST['inputPort'], SQLITE3_TEXT);
$query->bindValue(':status', $_POST['inputStatus'], SQLITE3_TEXT);
$query->bindValue(':name', $_POST['inputName'], SQLITE3_TEXT);
$query->bindValue(':ip', $_POST['inputIP'], SQLITE3_TEXT);
$query->bindValue(':devicename', $_POST['inputDevice'], SQLITE3_TEXT);
$query->bindValue(':domain', $_POST['inputDomain'], SQLITE3_TEXT);
$query->bindValue(':domainprovider', $_POST['inputProvider'], SQLITE3_TEXT);
$query->bindValue(':domainprproviderlink', $_POST['inputProviderLink'], SQLITE3_TEXT);

$results = $query->execute();

if($results == false) {
    die($db->lastErrorMsg());
} else {
    header("Location: ../index.php");
}

?>