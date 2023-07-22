<?php

session_destroy();
setcookie('key', '');
setcookie('status_login', '');
session_start();
$_SESSION['message'] = "Berhasil Logout";
header("Location: login.php");

?>