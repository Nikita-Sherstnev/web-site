<?php
require_once 'dbconfig.php';
require_once 'lklogic.php';
?>

<html>
<head>
    <title>Личный кабинет</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<div style="position: absolute; text-align: right; margin-right:0; width:99%">
    <?php
    echo "<a href=\"logout.php\">Выйти</a>";
    ?>
</div>
<h2>Личный кабинет <?php echo $_REQUEST['username'] ?></h2>
Имя: <?= iconv("utf-8", "windows-1251", $named); ?><br>
Фамилия: <?= iconv("utf-8", "windows-1251", $surname); ?><br>
День рождения: <?= $birthday ?><br>
Email: <?= $email ?><br>

<h3>Изменить данные</h3>
<form action="" method="POST">
    <table>
        <tr>
            <td>
                Имя
            </td>
            <td>
                <input type="text" name="named" value="<?= iconv("utf-8", "windows-1251", $named) ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                Фамилия
            </td>
            <td>
                <input type="text" name="surname" value="<?= iconv("utf-8", "windows-1251", $surname) ?>"/>
            </td>
        </tr>
        <tr>
            <td>
                День рождения
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
                <input type="submit" name="submit" value="Сохранить"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>