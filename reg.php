<html>
<head>
    <title>�����������</title>
</head>
<body>
<h3>�����������</h3>

<form action="" method="POST">
    �����<br>
    <input type="text" name="username" value="<?php echo $_REQUEST['username'] ?>"/><br>
    ������<br>
    <input type="password" name="password" value="<?php echo $_REQUEST['password'] ?>"/><br>
    ������� ������ ��� ���<br>
    <input type="password" name="password2" value="<?php echo $_REQUEST['password2'] ?>"/><br>
    ����� <br>
    <input type="text" name="email" value="<?php echo $_REQUEST['email'] ?>"/><br>

    <input type="submit" name="submit" value="������������������"/>
    <br>
    <a href="entrance.php">����</a>
    <br>
</body>
</html>