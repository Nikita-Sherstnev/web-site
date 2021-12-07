<?php
require_once "functions.php";

if ($_REQUEST[session_name()] and $_REQUEST['username']) {
    session_start();
    $_SESSION['count']++;
    setcookie('count', isset($_COOKIE['count']) ? ++$_COOKIE['count'] : 1, time() + 60*60*24*365);
} else {
    printPageTitle("Первая страница");
    echo "Вам недоступна эта страница<br>";
    echo "<a href='entrance.php'>Войти</a><br>";
    echo "<a href='index.php'>Зарегистрироваться</a>";
    exit();
}
?>

<html>
<head>
    <title>Первая страница</title>
</head>
<body>
<div style="position: relative; text-align: right; margin-right:0;">
    <?php
    echo $_COOKIE["username"] . " | ";
    echo "<a href=\"logout.php\">Выйти</a>";
    printPageTitle("Первая страница");
    ?>
</div>

<div>Вы заходили на эту страницу <?php echo $_SESSION['count'] ?> раз за текущий сеанс</div>
<div>Всего вы заходили на эту страницу <?php echo $_COOKIE['count'] ?> раз</div>
<div><a href="<?php echo $_SERVER['PHP_SELF'] ?>">Обновить страницу</a></div>
<div><a href="page2.php">Вторая страница</a></div>
</body>
</html>
