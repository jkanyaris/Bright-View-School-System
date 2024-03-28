<?php
require('connect.php');error_reporting(0);
//require_once 'connect.php';
if(isset($_POST['updatestud'])){
$target = "students/"; 
    if(!is_dir($target)) mkdir($target);
error_reporting (0);
$target = $target . basename( $_FILES['img']['name']);
$form=$_POST['form'];
$id=$_POST['id'];
$class=$_POST['classname'];
$adm=$_POST['adm'];
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$kcpe=$_POST['kcpe'];
$year=$_POST['year'];
$passport=$_POST['passport'];
$admvalidation=strlen($adm);
$img = addslashes (file_get_contents($_FILES['img']['tmp_name']));
$image = $_FILES['img']['tmp_name'];
$filesize = $_FILES['img']['size'];
$filetype = $_FILES['img']['type'];
$filename = $_FILES['img']['name'];
$fp      = fopen($image, 'r');
$content = fread($fp, filesize($image));
$content = addslashes($content);
fclose($fp);
$query="select * from students where id !='$id' and adm='$adm'";
$exe=mysql_query($query);

if(mysql_num_rows($exe)>0){

echo"<script>window.open('admission.php?error=Admission number already exists ','_self')</script>";
exit();
}

if($admvalidation !=6){

echo"<script>window.open('admission.php?error=Admission number entered is not Valid ','_self')</script>";
exit();
}

else{
if($filename==''){
$sql="update students set sname='$sname',fname='$fname',lname='$lname',adm='$adm',passport='$passport',form='$form',classname='$class',year='$year',age='$age',kcpe='$kcpe' where student_id='$id' ";
if(mysql_query($sql))
{
  echo"<script>window.open('admission.php?success=Record Successfully Updated ','_self')</script>";
}

else{
	echo"<script>window.open('admission.php?error=Unable to update the Student Record at this time','_self')</script>"; 
}
}
else{
$sql="update students set sname='$sname',fname='$fname',lname='$lname',adm='$adm',form='$form',classname='$class',year='$year', passport='$filename',age='$age',kcpe='$kcpe' where id='$id' ";
if(mysql_query($sql))
{
  echo"<script>window.open('admission.php?success=Record Successfully Updated ','_self')</script>";
}

else{
	echo"<script>window.open('admission.php?error=Unable to update the Student Record at this time','_self')</script>"; 
}

}
if(move_uploaded_file($_FILES['img']['tmp_name'], $target));
}
}
?>