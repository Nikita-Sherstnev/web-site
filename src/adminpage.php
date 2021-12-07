<?php
require_once "functions.php";

if ($_REQUEST[session_name()] and $_REQUEST['username']) {
    session_start();
} else {
    printPageTitle("Страница администратора");
    echo "Вам недоступна эта страница<br>";
    echo "<a href='entrance.php'>Войти</a><br>";
    echo "<a href='index.php'>Зарегистрироваться</a>";
    exit();
}

echo '<div style="position: relative; text-align: right; margin-right:0;">';
echo $_COOKIE["username"]." | ";
echo "<a href=\"logout.php\">Выйти</a>";
echo "</div>";
printPageTitle("Страница администратора");

echo "Диагностическая информация";
echo "<br>Имя сеанса ".session_name();
echo "<br>Идентификатор сеанса ".session_id();
echo "<br>Путь сохранения сеанса ".session_save_path();
echo "<br>Закодированный сеанс ".session_encode();

echo "<div><br><a href='page1.php'>Первая страница</a></div>";
