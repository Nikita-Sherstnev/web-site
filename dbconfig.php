<?php
$server = "localhost";
$dbusername = "root";
$password = "";
$database = "book";
$mysqli = new mysqli($server, $dbusername, $password, $database);

if (mysqli_connect_errno()) {
    echo "������ ����������� � ��. �������� ������: " . mysqli_connect_error();
    exit();
}

$mysqli->set_charset('utf8');
