<?php
$mysql_host = "localhost";
$mysql_database = "reservation";
$mysql_user = "root";
$mysql_password = "";

$server = mysql_connect($mysql_host, $mysql_user ,$mysql_password);
mysql_select_db($mysql_database, $server);
?>