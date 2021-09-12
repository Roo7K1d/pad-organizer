<?php

$db = new SQLite3("../db.sqlite3");

                                    
$results = $db->exec("UPDATE ports SET port = '{$_POST["inputPort"]}', status = '{$_POST["inputStatus"]}', service = '{$_POST["inputName"]}', deviceip = '{$_POST["inputIP"]}', devicename = '{$_POST["inputDevice"]}', domain = '{$_POST["inputDomain"]}', domanprovider = '{$_POST["inputProvider"]}', domainproviderlink = '{$_POST["inputProviderLink"]}' WHERE id = '{$_POST["id"]}';");

if($results == false) {
    die($db->lastErrorMsg());
} else {
    header("Location: ../index.php");
}

?>