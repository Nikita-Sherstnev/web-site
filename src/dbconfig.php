<?php
$server = "db";
$dbusername = "root";
$password = "1234";
$database = "book";
$mysqli = new mysqli($server, $dbusername, $password, $database);

if (mysqli_connect_errno()) {
    echo "Ошибка подключения к БД. Описание ошибки: " . mysqli_connect_error();
    exit();
}

$mysqli->set_charset('utf8');
