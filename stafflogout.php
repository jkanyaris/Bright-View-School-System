<?php
session_start();
unset($_SESSION['staff']);
session_destroy();

header("location:stafflogin.php");
?>