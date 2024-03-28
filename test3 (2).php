<?php 
require('connect.php');
session_start();
if(isset($_GET['id'])){
$id=$_GET['id'];
$adm=$_SESSION['student'];
$sql="select * from dorm where id='$id'";
$run=mysql_query($sql);
$row=mysql_fetch_object($run);
$space=$row->space;
$house=$row->house;
$cube=$row->cubeno;
$available=$row->space-1;
if($space==0){
echo"<script>window.open('test.php?message=The cube is fully occupied','_self')</script>";
}
if($space==1){
 $sql2="update dorm set space=0 where id='$id'";
 $run2=mysql_query($sql2);
 $query="update form1 set house='$house',room='$cube' where admission='$adm'";
 $exe=mysql_query($query);
 if($run2 && $exe){
 
 echo"<script>window.open('test.php?message=The cube allocated successfully','_self')</script>";
 }
 else{echo"<script>window.open('test.php?message=sorry could not allocate room','_self')</script>";}
}
if($space==2){
 $sql2="update dorm set space='$available' where id='$id'";
 $run2=mysql_query($sql2);
 $query="update form1 set house='$house',room='$cube' where admission='$adm'";
  $exe=mysql_query($query);
 if($run2 && $exe){
 
 echo"<script>window.open('test.php?message=The cube allocated successfully','_self')</script>";
 }
 else{echo"<script>window.open('test.php?message=sorry could not allocate room','_self')</script>";}
}
else{
echo"<script>window.open('test.php?message=problem with cube allocation','_self')</script>";

}

}
?>