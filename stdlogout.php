<?php

session_start();
unset($_SESSION['student']);
session_destroy();

header("location:studentslogin.php");
 ?>