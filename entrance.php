<?php
require_once 'login.php';
?>

<html>
<head>
    <title>����</title>
</head>
<body>
<h3>����</h3>

<form action="" method="POST">
    �����<br>
    <input type="text" name="username" value="<?php echo $_REQUEST['username'] ?>"/><br>
    ������<br>
    <input type="text" name="password" value="<?php echo $_REQUEST['password'] ?>"/><br>

    <input type="submit" name="submit" value="�����"/>
    <br>
    <a href="index.php">�����������</a>
</body>
</html>
