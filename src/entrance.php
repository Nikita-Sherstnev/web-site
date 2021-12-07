<?php
require_once 'login.php';
?>

<html>
<head>
    <title>Вход</title>
</head>
<body>
<h3>Вход</h3>

<form action="" method="POST">
    Логин<br>
    <input type="text" name="username" value="<?php echo isset($_REQUEST['username']) ?>"/><br>
    Пароль<br>
    <input type="text" name="password" value="<?php echo isset($_REQUEST['password']) ?>"/><br>

    <input type="submit" name="submit" value="Войти"/>
    <br>
    <a href="index.php">Регистрация</a>
</body>
</html>
