<?php
$server = "localhost";
$dbusername = "root";
$password = "";
$database = "book";
$mysqli = new mysqli($server, $dbusername, $password, $database);

if (mysqli_connect_errno()) {
    echo "Îøèáêà ïîäêëş÷åíèÿ ê ÁÄ. Îïèñàíèå îøèáêè: " . mysqli_connect_error();
    exit();
}

$mysqli->set_charset('utf8');
