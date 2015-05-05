<?php
session_start();
unset($_SESSION['uname']);
unset($_SESSION['pw']);
header ('location: index.php');
?>