<?php
require_once "functions.php";

if ($_REQUEST[session_name()] and $_REQUEST['username']) {
    session_start();
    $_SESSION['count']++;
    setcookie('count', isset($_COOKIE['count']) ? ++$_COOKIE['count'] : 1, time() + 60*60*24*365);
} else {
    printPageTitle("������ ��������");
    echo "��� ���������� ��� ��������<br>";
    echo "<a href='entrance.php'>�����</a><br>";
    echo "<a href='index.php'>������������������</a>";
    exit();
}
?>

<html>
<head>
    <title>������ ��������</title>
</head>
<body>
<div style="position: relative; text-align: right; margin-right:0;">
    <?php
    echo $_COOKIE["username"] . " | ";
    echo "<a href=\"logout.php\">�����</a>";
    printPageTitle("������ ��������");
    ?>
</div>

<div>�� �������� �� ��� �������� <?php echo $_SESSION['count'] ?> ��� �� ������� �����</div>
<div>����� �� �������� �� ��� �������� <?php echo $_COOKIE['count'] ?> ���</div>
<div><a href="<?php echo $_SERVER['PHP_SELF'] ?>">�������� ��������</a></div>
<div><a href="page2.php">������ ��������</a></div>
</body>
</html>
