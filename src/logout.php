<?php
if ($_REQUEST[session_name()]) {
    session_start();
}

session_destroy();
$_SESSION = array();
$_REQUEST = array();
unset($_COOKIE[session_name()]);

setcookie("username", null, time()-1);
header("location:index.php");
