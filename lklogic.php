<?php
include_once 'dbconfig.php';
include_once 'functions.php';

if ($_REQUEST[session_name()] and $_REQUEST['username']) {
    session_start();
} else {
    printPageTitle("Личный кабинет");
    echo "Вам недоступен личный кабинет<br>";
    echo "<a href='entrance.php'>Войти</a><br>";
    echo "<a href='index.php'>Зарегистрироваться</a>";
    exit();
}

if ($_REQUEST['submit']) {
    $named = $_REQUEST['named'];
    $surname = $_REQUEST['surname'];
    $birthday = $_REQUEST['birthday'];
    $email = $_REQUEST['email'];

    $update = $mysqli->prepare("UPDATE person SET name='".iconv(mb_detect_encoding($named, mb_detect_order(), true), "utf-8", $named)."', surname=?, birthday=?, email=? WHERE login=?");
    $update->bind_param("ssss",
        iconv(mb_detect_encoding($surname, mb_detect_order(), true), "utf-8", $surname),
        $birthday, $email, $_REQUEST['username']);

    if ($update->error) {
        echo "Ошибка: " . $update->error;
    }
    $update->close();
}

$select_row = $mysqli->prepare("SELECT name, surname, birthday, email FROM person WHERE login = ?")
or die($mysqli->error);
$select_row->bind_param("s", $_REQUEST['username']);
$select_row->execute();
$select_row->bind_result($named, $surname, $birthday, $email);
$select_row->fetch();
$select_row->close();

$mysqli->close();

