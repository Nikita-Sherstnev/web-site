<?php
require_once "functions.php";

if ($_REQUEST[session_name()] and $_REQUEST['username']) {
    session_start();
} else {
    printPageTitle("�������� ��������������");
    echo "��� ���������� ��� ��������<br>";
    echo "<a href='entrance.php'>�����</a><br>";
    echo "<a href='index.php'>������������������</a>";
    exit();
}

echo '<div style="position: relative; text-align: right; margin-right:0;">';
echo $_COOKIE["username"]." | ";
echo "<a href=\"logout.php\">�����</a>";
echo "</div>";
printPageTitle("�������� ��������������");

echo "��������������� ����������";
echo "<br>��� ������ ".session_name();
echo "<br>������������� ������ ".session_id();
echo "<br>���� ���������� ������ ".session_save_path();
echo "<br>�������������� ����� ".session_encode();

echo "<div><br><a href='page1.php'>������ ��������</a></div>";
