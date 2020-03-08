<?php
require_once 'reg.php';
include_once "dbconfig.php";
require_once 'fieldsChecker.php';

if ($_REQUEST['submit']) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];
    $email = $_REQUEST['email'];

    $username = str_replace(' ', '', $username);

    $dataCheck = true;

    $dataCheck &= checkField($username,
        "���",
        "#\b[a-z0-9]+\b#i",
        "����� ����� �������� ������ �� ��������� ���� � ����.");

    $dataCheck &= checkField($password,
        "������",
        "#\b[a-z0-9-_]{6,20}\b\w?#i",
        "������ �� ����� 6 � �� ����� 20 ��������. ����� ��������� ������� ����������� �������� � �����."
    );

    if ($password !== $password2) {
        echo("������� ������ ��������.<br>");
        $dataCheck = false;
    }

    $dataCheck &= checkField($email,
        "e-mail",
        "#\b[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}\b#i",
        "Email ������ �����������."
    );

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM person WHERE login=?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    if ($count > 0) {
        $dataCheck = false;
        echo "<br>������������ � ����� ������� ��� ����������!";
    }
    $stmt->close();

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM person WHERE email=?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    if ($count > 0) {
        $dataCheck = false;
        echo "<br>������������ � ����� email ��� ����������!";
    }
    $stmt->close();

    if ($dataCheck) {
        $username = '"' . $mysqli->real_escape_string($username) . '"';
        $password = '"' . $mysqli->real_escape_string($password) . '"';
        $email = '"' . $mysqli->real_escape_string($email) . '"';

        $insert_row = $mysqli->query("INSERT INTO person (login, password, email) 
                                            VALUES($username, $password, $email)");

        if ($insert_row) {
            echo "<br>�� ������� ������������������!";
        } else {
            die('������: (' . $mysqli->errno . ') ' . $mysqli->error);
        }
    }

    $mysqli->close();
}
