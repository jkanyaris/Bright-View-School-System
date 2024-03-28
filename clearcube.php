<?php 
error_reporting(0);
require('connect.php');
session_start();
if(!$_SESSION['sess_clear']){
header('location: cubeclearanceform.php');
}
else{
$studentid=$_SESSION['sess_clear'];
$query="select * from dorm where occupant1='$studentid'";
$exe=mysql_query($query);
$query1="select * from dorm where occupant2='$studentid'";
$exe1=mysql_query($query1);
if(mysql_num_rows($exe)>0){
$obj=mysql_fetch_object($exe);
$id=$obj->dorm_id;
$sq="update dorm set space=space+1, occupant1='' where dorm_id='$id' ";
$ex=mysql_query($sq);
$sq1="delete  from allocation where student_id='$studentid'";
$ex1=mysql_query($sq1);
if($ex && $ex1){

echo"<script>window.open('cubeclearanceform.php?success=The Student is successfully cleared','_self');</script>";
exit();
}
else{
echo"<script>window.open('cubeclearanceform.php?error=Sorry could not clear the student at this time','_self');</script>";
exit();}
}

if(mysql_num_rows($exe1)>0){
$obj=mysql_fetch_object($exe1);
$id=$obj->dorm_id;
$sq="update dorm set space=space+1, occupant2='' where dorm_id='$id' ";
$ex=mysql_query($sq);
$sq1="delete  from allocation where student_id='$studentid'";$ex1=mysql_query($sq1);
if($ex && $ex1){

echo"<script>window.open('cubeclearanceform.php?success=The Student is successfully cleared','_self');</script>";
exit();
}
else{
echo"<script>window.open('cubeclearanceform.php?error=Sorry could not clear the student','_self');</script>";
exit();}
}
else{
echo"<script>window.open('cubeclearanceform.php?error=The student is not allocated to any cube','_self');</script>";
exit();
}
}


?>