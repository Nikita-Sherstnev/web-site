<?php
require_once 'reg.php';
include_once "dbconfig.php";
require_once 'fieldsChecker.php';

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];
    $email = $_REQUEST['email'];

    $username = str_replace(' ', '', $username);

    $dataCheck = true;

    $dataCheck &= checkField($username,
        "имя",
        "#\b[a-z0-9]+\b#i",
        "Логин может состоять только из латинских букв и цифр.");

    $dataCheck &= checkField($password,
        "пароль",
        "#\b[a-z0-9-_]{6,20}\b\w?#i",
        "Пароль не менее 6 и не более 20 символов. Может содержать символы английского алфавита и цифры."
    );

    if ($password !== $password2) {
        echo("Введите пароль повторно.<br>");
        $dataCheck = false;
    }

    $dataCheck &= checkField($email,
        "e-mail",
        "#\b[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}\b#i",
        "Email введен некорректно."
    );

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM person WHERE login=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    if ($count > 0) {
        $dataCheck = false;
        echo "<br>Пользователь с таким логином уже существует!";
    }
    $stmt->close();

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM person WHERE email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    if ($count > 0) {
        $dataCheck = false;
        echo "<br>Пользователь с таким email уже существует!";
    }
    $stmt->close();

    if ($dataCheck) {
        $username = '"' . $mysqli->real_escape_string($username) . '"';
        $password = '"' . $mysqli->real_escape_string($password) . '"';
        $email = '"' . $mysqli->real_escape_string($email) . '"';

        $insert_row = $mysqli->query("INSERT INTO person (login, password, email) 
                                            VALUES($username, $password, $email)");

        if ($insert_row) {
            echo "<br>Вы успешно зарегистрировались!";
        } else {
            die('Ошибка: (' . $mysqli->errno . ') ' . $mysqli->error);
        }
    }

    $mysqli->close();
}
