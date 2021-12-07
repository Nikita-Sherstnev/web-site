<?php
require_once "functions.php";

if ($_REQUEST[session_name()] and $_REQUEST['username']) {
    session_start();
    $_SESSION['count2']++;
    setcookie('count2', isset($_COOKIE['count2']) ? ++$_COOKIE['count2'] : 1, time() + 60*60*24*365);
} else {
    printPageTitle("Вторая страница");
    echo "Вам недоступна эта страница<br>";
    echo "<a href='entrance.php'>Войти</a><br>";
    echo "<a href='index.php'>Зарегистрироваться</a>";
    exit();
}
?>

<html>
<head>
    <title>Вторая страница</title>
</head>
<body>
<div style="position: relative; text-align: right; margin-right:0;">
    <?php
    echo $_COOKIE['username'] . " | ";
    echo "<a href=\"logout.php\">Выйти</a>";
    printPageTitle("Вторая страница");
    ?>
</div>
<div>Вы заходили на эту страницу <?php echo $_SESSION['count2'] ?> раз за текущий сеанс</div>
<div>Всего вы заходили на эту страницу <?php echo $_COOKIE['count2'] ?> раз</div>
<div><a href="<?php echo $_SERVER['PHP_SELF'] ?>">Обновить страницу</a></div>
<div><a href="page1.php">Первая страница</a></div>
</body>
</html>