<?php
require_once 'dbconfig.php';
require_once 'lklogic.php';
?>

<html>
<head>
    <title>������ �������</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<div style="position: absolute; text-align: right; margin-right:0; width:99%">
    <?php
    echo "<a href=\"logout.php\">�����</a>";
    ?>
</div>
<h2>������ ������� <?php echo $_REQUEST['username'] ?></h2>
���: <?= iconv("utf-8", "windows-1251", $named); ?><br>
�������: <?= iconv("utf-8", "windows-1251", $surname); ?><br>
���� ��������: <?= $birthday ?><br>
Email: <?= $email ?><br>

<h3>�������� ������</h3>
<form action="" method="POST">
    <table>
        <tr>
            <td>
                ���
            </td>
            <td>
                <input type="text" name="named" value="<?= iconv("utf-8", "windows-1251", $named) ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                �������
            </td>
            <td>
                <input type="text" name="surname" value="<?= iconv("utf-8", "windows-1251", $surname) ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                ���� ��������
            </td>
            <td>
                <input type="date" name="birthday" size="20" value="<?= $birthday ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <input type="text" name="email" value="<?= $email ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="���������"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>