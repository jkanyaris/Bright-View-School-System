<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['schadmin']){
header("location:stafflogin.php");

}
else{
if(isset($_POST['submit'])){
$target = "students/"; 
    if(!is_dir($target)) mkdir($target);
error_reporting (0);
$target = $target . basename( $_FILES['img']['name']);

error_reporting (0);
$form=$_POST['form'];
$class=$_POST['classname'];
$admyear=$_POST['admyear'];
$adm1=$_POST['year'];
$adm2=$_POST['number'];
$adm=$adm1.$adm2;
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$kcpe=$_POST['kcpe'];
$img = addslashes (file_get_contents($_FILES['img']['tmp_name']));
$image = $_FILES['img']['tmp_name'];
$filesize = $_FILES['img']['size'];
$filetype = $_FILES['img']['type'];
$filename = $_FILES['img']['name'];

$fp      = fopen($image, 'r');
$content = fread($fp, filesize($image));
$content = addslashes($content);
fclose($fp);
$query="select * from students where((adm='$adm') and (form='$form'))";
$exe=mysql_query($query);
if(mysql_num_rows($exe)>0){
echo"<script>window.open('admission.php?exist=Admission number already exists ','_self')</script>";
exit();
}
if($form==""){
echo"<script>window.open('admission.php?form=Please select form in the  class category','_self')</script>";
exit();
}
if($class==""){
echo"<script>window.open('admission.php?class=Please select form in the  class category ','_self')</script>";
exit();
}
if($admyear==""){
echo"<script>window.open('admission.php?admyear=Please select year of admission  ','_self')</script>";
exit();
}
if($adm1==""){
echo"<script>window.open('admission.php?adm1=Please select admission in the admission section ','_self')</script>";
exit();
}
if($adm2==""){
echo"<script>window.open('admission.php?adm2=Please select admission number ','_self')</script>";
exit();
}
if($img==""){
echo"<script>window.open('admission.php?image=Please select student passport','_self')</script>";
exit();
}

else{
$sql="insert into students(sname,fname,lname,adm,passport,form,classname,year,age,kcpe) 
		values('$sname','$fname','$lname','$adm','$filename','$form','$class','$admyear','$age','$kcpe')";
if(mysql_query($sql))
{
  echo"<script>window.open('admission.php?success=Student Successfully Registered ','_self')</script>";
}else{
	echo"<script>window.open('admission.php?error=Unable to Register the Student','_self')</script>"; 
}

if(move_uploaded_file($_FILES['img']['tmp_name'], $target));
}
}
}
?>