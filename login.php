<?php
include_once "dbconfig.php";
require_once "fieldsChecker.php";

if ($_REQUEST['submit']) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $dataCheck = true;

    $dataCheck &= validateField($username, "логин");
    $dataCheck &= validateField($password, "пароль");

    if ($dataCheck) {
        $select_row = $mysqli->prepare("SELECT COUNT(*) FROM person WHERE login=? AND password=?")
        or die($mysqli->error);
        $select_row->bind_param("ss",  $username, $password);
        $select_row->execute();
        $select_row->bind_result($count);
        $select_row->fetch();
        $select_row->close();
        $mysqli->close();

        if ($count > 0 ? true : false) {
            session_start();

            $_SESSION["username"] = $username;
            setcookie("username", $username, time()+600);

            checkSpecialRole($username);

            header('Location: lk.php');
        } else {
            echo "<br>Ќеверный логин или пароль!";
        }
    }
}
