<?php
session_start();
unset($_SESSION['parents']);
session_destroy();
header('location:parentslogin.php');


 ?>