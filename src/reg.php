<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<h3>Регистрация</h3>

<form action="" method="POST">
    Логин<br>
    <input type="text" name="username" value="<?php if (isset($_REQUEST['username'])) {echo $_REQUEST['username'];} ?>"/><br>
    Пароль<br>
    <input type="password" name="password" value="<?php if (isset($_REQUEST['password'])) {echo $_REQUEST['password'];} ?>"/><br>
    Введите пароль еще раз<br>
    <input type="password" name="password2" value="<?php if (isset($_REQUEST['password2'])) {echo $_REQUEST['password2'];} ?>"/><br>
    Почта <br>
    <input type="text" name="email" value="<?php if (isset($_REQUEST['email'])) {echo $_REQUEST['email'];} ?>"/><br>

    <input type="submit" name="submit" value="Зарегистрироваться"/>
    <br>
    <a href="entrance.php">Вход</a>
    <br>
</body>
</html>