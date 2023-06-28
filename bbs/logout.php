<?php
session_start();

//$_SESSIONに値がない時がログアウト状態のため
//$_SESSIONの値をリセットする
unset($_SESSION['id']);
unset($_SESSION['name']);

header('Location: login.php'); exit();
?>
