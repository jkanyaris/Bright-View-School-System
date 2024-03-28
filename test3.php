<?php
require('connect.php');

$sql="select * from students";
$exe=mysql_query($sql);
$obj=mysql_fetch_object($exe);

$img=$obj->passport;
echo "<img id='new' src='students/".$img."' height='100px' width='100px'/>";



?>