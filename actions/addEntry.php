<?php

$db = new SQLite3("../db.sqlite3");

$id = uniqid();
                                    
$results = $db->exec("INSERT INTO ports (id, port, status, service, deviceip, devicename, domain, domanprovider, domainproviderlink) VALUES ('{$id}', '{$_POST['inputPort']}', '{$_POST['inputStatus']}', '{$_POST['inputName']}', '{$_POST['inputIP']}', '{$_POST['inputDevice']}', '{$_POST['inputDomain']}', '{$_POST['inputProvider']}', '{$_POST['inputProviderLink']}');");

if($results == false) {
    die($db->lastErrorMsg());
} else {
    header("Location: ../index.php");
}

?>