<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['schadmin']){
header("location:stafflogin.php");

}
else{
if(isset($_POST['transition'])){

$yr=$_POST['year'];
$trans=$_POST['form'];

$sql="select * from students where  year='$yr' and form='$trans' ";
$run=mysql_query($sql);
	
if($run && $trans==1){
while($row=mysql_fetch_object($run)){
$sname=$row->sname;
$fname=$row->fname;
$lname=$row->lname;
$adm=$row->adm;
$passport=$row->passport;
$form=($row->form) + 1;
$classname=$row->classname;
$year=($row->year)+1;
$age=($row->age)+1;
$kcpe=$row->kcpe;
$sql2="select * from students where form='$form' and adm='$adm'";
$run2=mysql_query($sql2);
if(mysql_num_rows($run2)>0){ 

echo"<script>window.open('admission.php?error=selected class already exist','_self');</script>";
}
else{
$sq="insert into students(sname,fname,lname,adm,passport,form,classname,year,age,kcpe) values('$sname','$fname','$lname','$adm','$passport','$form','$classname','$year','$age','$kcpe')";
$ru=mysql_query($sq);
}
}
echo"<script>window.open('admission.php?success=Selected Class Transition Successful','_self');</script>";
}



}
 
}
			?>