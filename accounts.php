<?php
session_start();
error_reporting(0);
if(!$_SESSION['accounts'])
{
header("location: stafflogin.php");
}else{
$username=$_SESSION['accounts'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
 <link href="css/drop.css" rel="stylesheet" type="text/css" />

  <style>
        body { background: #999  no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc  no-repeat center 0px; padding-top:0px;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
  <form action="accounts.php" method="post">
  <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a>

<font color="white" size="5" style="margin-left:150px;margin-right:150px;">Welcome to accounts Department </font>
<input  style=" border-radius:5px;margin-left:10px;margin-top:0px;" type="text" name="adm" size="20" placeholder="Enter Admission no." required="required" >
<input id="button"  style="" type="submit" name="search" value="Search">
<input id="button"  style="" type="submit" name="import" value="Import">
</form> 
 <section id="settings" style="float:right; margin-right:60px;margin-top:0px;">
<ul id="dropnav">
<li><img src="images/profile.png" height="40" width="40">
<ul><li><a href="myprofilestaff.php" style="width:120px;">My Profile</a></li>
<li><a href="changepassstaff.php" style="width:120px;">Change Password</a></li>
<li><a href="stafflogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $username;?></font></li>
</ul>
</section></center>
 </section>
 </header>
<style type="text/css">
#top{ height:50px;
background: #eeeeee;
background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc));
background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -o-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -ms-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: linear-gradient(top, #eeeeee 0%,#cccccc 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 );
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
border-bottom:1px solid black;
}
#main{width:900px;height:760px; background:white;
margin-top:5px;
margin-bottom:30px;
overflow-x:hidden;overflow-y:scroll;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
margin-left:5px;
}
#aside{width:275px;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
border-left:1px solid black;
border-bottom:1px solid black;
float:right;
margin-top:-795px;
background: #eeeeee;
background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc));
background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -o-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -ms-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: linear-gradient(top, #eeeeee 0%,#cccccc 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 );

}
#option{background:blue;}
#button:hover{background-color:#AAD4FF;}
	#results{width:100%; margin-top:10px; border-spacing:0px;}	
#results{background:white;}
		#results th{background: #e4efc0;
background: -moz-linear-gradient(top, #e4efc0 0%, #abbd73 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e4efc0), color-stop(100%,#abbd73));
background: -webkit-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: -o-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: -ms-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: linear-gradient(top, #e4efc0 0%,#abbd73 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4efc0', endColorstr='#abbd73',GradientType=0 );}
			#results tr:nth-child(odd) td{background:#eee;}
}
#tdform{

background: -moz-linear-gradient(top, rgba(30,87,153,1) 0%, rgba(125,185,232,0) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,0)));
background: -webkit-linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: -o-linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: -ms-linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#007db9e8',GradientType=0 );
}
</style>
<form action="feesubmit.php" method="post">
 <nav id="top">
 
 <div style=" margin-top:10px;">
<?php 
error_reporting(0);
require('connect.php');
if(isset($_POST['creditac'])){
$form=$_POST['form'];
$year=$_POST['year'];
$term=$_POST['term'];
$amt=$_POST['amount'];
$feedesc=$_POST['feedesc'];
$sql="select * from students where ((form='$form') and (year='$year'))";
$exe=mysql_query($sql);
if(mysql_num_rows($exe)>0){
$image='<input type="image"  name="save" value="save" src="images/Save.png" height="40" width="40">';
echo '<table>
<tr><td style="width:100px;">'.$image.'</td><td style="width:100px;"></td><td></td>
</table>';
}
}
if(isset($_POST['view'])){
$form=$_POST['form'];
$year=$_POST['year'];
$term=$_POST['term'];
$feedesc=$_POST['feedesc'];
$sql="select * from fee inner join students on students.adm=fee.adm where ((students.form='$form') and (fee.term='$term') and (fee.feedesc='$feedesc') and (fee.year='$year'))";
$exe=mysql_query($sql);
if(mysql_num_rows($exe)>0){

?>
<table>
<tr><td style="width:100px;"><input type="image" value="delete"src="images/file_delete.png" name="multipledeletion" height="40" width="40" onClick="return confirm('Sure you want to delete this record ?')"></td></tr>
<?php
}
}
 if(isset($_POST['debitac'])){
 $form=$_POST['form'];
$year=$_POST['year'];
$term=$_POST['term'];
$mode=$_POST['mode'];
$sql="select * from students where ((form='$form') and (year='$year'))";
$exe=mysql_query($sql);
if(mysql_num_rows($exe)>0){
$image='<input type="image"  name="savedb" value="save" src="images/Save.png" height="40" width="40">';
echo '<table>
<tr><td style="width:100px;">'.$image.'</td><td style="width:100px;"></td><td></td>
';
}

}
 if(isset($_POST['search']))
 {
 
 $adm=$_POST['adm'];
$sql="select * from fee where adm='$adm'";
$run=mysql_query($sql);
$sq="select * from fee where adm='$adm'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
 $image='<input type="image"  name="update" value="update" src="images/Save.png" height="40" width="40">';
$imag='<input type="image" name="download" value="download" src="images/dl_icon.png" height="40" width="40">';
$image2='<input type="image" value="delete"src="images/file_delete.png" name="deleterecord" height="40" width="40" ';
?>
<table>
<tr><td style="width:100px;"><input type="image"  name="update" value="update" src="images/Save.png" height="40" width="40"><td style="width:100px;"><input type="image" name="download" value="download" src="images/dl_icon.png" height="40" width="40"></td><td style="width:100px;"><input type="image" value="delete"src="images/file_delete.png" name="deleterecord" height="40" width="40" onClick="return confirm('Sure you want to delete this record ?')"></td></tr>
<?php
}}
?>

</table>
</div>
 </nav>
 <section id="main">
 <center><font color="red" size="4"><?php echo @$_GET['error']; ?></font><font color="green" size="4"><?php echo @$_GET['success']; ?></font></center>

 <?php 
 
require('connect.php');

if(isset($_POST['import'])){
$adm=$_POST['adm'];
$sq="select * from students where adm='$adm'";
$ex=mysql_query($sq);
if(mysql_num_rows($ex)>0){
$obj=mysql_fetch_object($ex);
$sname=$obj->sname;
$fname=$obj->fname;
$lname=$obj->lname;

$name=$sname.'  '.$fname.'  '.$lname;
$adm=$obj->adm;
$form=$obj->form;
$classname=$obj->classname;
$year=$obj->year;

echo'<fieldset style="width:800px; border-radius:5px; margin:0 auto;  margin-top:50px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
background: rgb(243,226,199);
background: -moz-linear-gradient(top, rgba(243,226,199,1) 0%, rgba(193,158,103,1) 50%, rgba(182,141,76,1) 51%, rgba(233,212,179,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(243,226,199,1)), color-stop(50%,rgba(193,158,103,1)), color-stop(51%,rgba(182,141,76,1)), color-stop(100%,rgba(233,212,179,1)));
background: -webkit-linear-gradient(top, rgba(243,226,199,1) 0%,rgba(193,158,103,1) 50%,rgba(182,141,76,1) 51%,rgba(233,212,179,1) 100%);
background: -o-linear-gradient(top, rgba(243,226,199,1) 0%,rgba(193,158,103,1) 50%,rgba(182,141,76,1) 51%,rgba(233,212,179,1) 100%);
background: -ms-linear-gradient(top, rgba(243,226,199,1) 0%,rgba(193,158,103,1) 50%,rgba(182,141,76,1) 51%,rgba(233,212,179,1) 100%);
background: linear-gradient(top, rgba(243,226,199,1) 0%,rgba(193,158,103,1) 50%,rgba(182,141,76,1) 51%,rgba(233,212,179,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#f3e2c7", endColorstr="#e9d4b3",GradientType=0 )

">
<legend style="background:white; border:1px solid grey; border-radius:5px; width:300px;"><center><font size="4"><b>Results found matching</b></font></center></legend>
<table border="1" style="border-spacing:0; background:white;height:300px;">
<tr><th>Name</th><td style="width:210px;" align="center" >'.$name.'</td><td rowspan="5" style="width:500px;
background: rgb(238,238,238);
background: -moz-linear-gradient(top, rgba(238,238,238,1) 0%, rgba(238,238,238,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(238,238,238,1)), color-stop(100%,rgba(238,238,238,1)));
background: -webkit-linear-gradient(top, rgba(238,238,238,1) 0%,rgba(238,238,238,1) 100%);
background: -o-linear-gradient(top, rgba(238,238,238,1) 0%,rgba(238,238,238,1) 100%);
background: -ms-linear-gradient(top, rgba(238,238,238,1) 0%,rgba(238,238,238,1) 100%);
background: linear-gradient(top, rgba(238,238,238,1) 0%,rgba(238,238,238,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#eeeeee", endColorstr="#eeeeee",GradientType=0 )"> 
<fieldset style="width:200px;margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;">
<legend><font size="4" color="blue">Term</font></legend>
<select name="term" required="required">
<option value=""><i>Term</i></option>
<option value="1">Term 1</option>
<option value="2">Term 2</option>
<option value="3">Term 3</option>
</select>
</fieldset>
<br/>
<fieldset style="width:200px;margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;">
<legend><font size="4" color="blue">Fee Amount</font></legend>
<input style="margin:0 auto; border-radius:3px;" type="text" name="amount" placeholder="fee amount">
</fieldset>
<br/>
<fieldset style="width:200px; margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="blue">Fee Description</font></legend>
<div style="overflow-x:hidden; overflow-y:scroll; height:80px;">
<input type="radio" name="feedesc" value="Tuition fee" required="required"/> Tuition<br />
<input type="radio" name="feedesc" value="Boarding fee" required="required"/> Boarding fee<br />
<input type="radio" name="feedesc" value=" Co-curriculum activity fee" required="required"/> Co-curriculum<br />
<input type="radio" name="feedesc" value="Development fee"required="required" /> Development<br />
<input type="radio" name="feedesc" value="Medical fee" required="required"/> Medical<br />
<input type="radio" name="feedesc" value="Transport fee" required="required"/> Transport<br />
<input type="radio" name="feedesc" value="Maintenance fee" required="required"/> Maintenance<br />
<input type="radio" name="feedesc" value="Caution money" required="required"/> Caution<br />
</fieldset>
</div>
</fieldset>
<br/>
<center><input type="image"  name="save1" value="save1" src="images/Save.png" height="40" width="40"></center>
</td></tr>';
?>
<tr><th>Adm No.</th><td align="center"><?php echo $adm;?><input type="hidden" name="adm" value="<?php echo $adm; ?>"></td></tr>
<tr><th>Form</th><td align="center"><?php echo $form; ?><input type="hidden" name="form" value="<?php echo $form; ?>"></td></td></tr>
<tr><th>Classname</th><td align="center"><?php echo $classname;?></td></tr>
<tr><th>Year</th><td align="center"><?php echo $year;?><input type="hidden" name="year" value="<?php echo $year; ?>"></td></td></tr>
</table>
</fieldset>
<?php
}
else{

echo"<script>window.open('accounts.php?error=No student record was found matching the admission no.','_self')</script>";

}
}
if(isset($_POST['search'])){
$adm=$_POST['adm'];
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);

if($cur=mysql_num_rows($run)>0){
$name=mysql_fetch_array($run);
$date=date("d/m/Y");
echo "<table border='1' style='border-spacing:0px;'><tr><td style='border-right:0px;'><img src='images/techhigh.jpg' height='120' width='120'>
</td><td style='width:1000px;border-left:0px;' colspan='6'><section style='background:#eee;height:120px;'><center><font size='5'><b>BRIGHT VIEW SCHOOL</b></font>
<br/><font size='4'>STUDENT FEES STATEMENT AS AT  ".$date."</font></center><br/>
Registration No.".$name['adm'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:".$name['sname']."   ".$name['fname']."   ".$name['lname']."<br/>
Form: ".$name['form']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Classname: ". $name['classname' ]."
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
Group: ".$name['year']."</section></td></tr>

<tr><th>Receipt No.</th><th>Date</th><th>Description</th><th>Credit</th><th>Debit</th><th>Balance</th><th>Option</th></tr>";

?>
<?php
$sq="select * from fee where adm='$adm'";
$ru=mysql_query($sq);
$count=mysql_num_rows($ru);
?>
<input type="hidden" name="adm" value="<?php echo $adm;?>">
<?php
while($res=mysql_fetch_object($ru)){
if($res->credit ==''){
?>

<tr><td><input type="text" name="receipt" value="<?php echo $res->receipt;?>"></td>
<td><?php echo $res->dayt;?></td>
<td><input type="text" name="feedesc" value="<?php echo $res->feedesc;?>"></td>
<td><?php echo $res->credit;?></td>
<td><input type="text" name="amt" value="<?php echo $res->debit;?>"></td>
<td><?php echo $res->balance;?></td>
<td align="center"><input type="radio" name='id' value="<?php echo $res->fee_id;?>"></td></tr>

<?php 
}
else{
?>

<tr><td></td>
<td><?php echo $res->dayt;?></td>
<td><?php echo $res->feedesc;?></td>
<td><?php echo $res->credit;?></td>
<td><?php echo $res->debit;?></td>
<td><?php echo $res->balance;?></td>
<td align="center"><input type="radio" name='id' value="<?php echo $res->fee_id;?>"></td></tr>

<?php
}

}

echo"<center><input type='reset' value='Clear'></center></table>";
}
else{

echo "<script>window.open('accounts.php?error=No record of students was found matching the admission number','_self')</script>";
}
}
if(isset($_POST['creditac'])){
error_reporting(0);
$form=$_POST['form'];
$year=$_POST['year'];
$term=$_POST['term'];
$amt=$_POST['amount'];
$feedesc=$_POST['feedesc'];
if($form==''){
echo "<script>window.open('accounts.php?error=Please select form','_self')</script>";
exit();
}
if($year==''){
echo "<script>window.open('accounts.php?error=Please select year (Group)','_self')</script>";
exit();
}
if($term==''){
echo "<script>window.open('accounts.php?error=Please select term','_self')</script>";
exit();
}
if($feedesc==''){
echo "<script>window.open('accounts.php?error=Please select fee description','_self')</script>";
exit();
}
if($amt==''){
echo "<script>window.open('accounts.php?error=Please select amount to be credited','_self')</script>";
exit();
}
else{


$sql="select * from students where ((form='$form') and (year='$year'))";
$exe=mysql_query($sql);
if(mysql_num_rows($exe)>0){
$count=mysql_num_rows($exe);
echo ' <table id="results" border="1">';
echo '<tr><th>Name</th><th>Adm</th><th>Form</th><th>Class</th><th>Term</th><th>Year</th><th>Fee description</th><th>Credit</th></tr>';
?>
<input type="hidden" name='count' value='<?php echo $count; ?>'>
<?php
while($res=mysql_fetch_object($exe)){
$fname=$res->fname;
$sname=$res->sname;
$lname=$res->lname;
$name=$sname.'  '.$fname.'  '.$lname;
?>

<tr><td><?php echo $name; ?></td>
<td><?php echo $res->adm;?><input type="hidden" name='adm[]' value='<?php echo $res->adm;?>'></td>
<td><?php echo $res->form;?></td>
<td><?php echo $res->classname;?><input type="hidden" name='classname[]' value='<?php echo $res->classname;?>'></td>
<td><?php echo $term;?><input type="hidden" name='term' value='<?php echo $term;?>'></td>
<input type="hidden" name='f' value='<?php echo $form;?>'>
<td><?php echo $year;?><input type="hidden" name='year' value='<?php echo $year;?>'></td>
<td><?php echo $feedesc ;?><input type="hidden" name='feedesc' value='<?php echo $feedesc ;?>'></td>
<td><?php echo $amt;?><input type="hidden" name='amt[]' value='<?php echo $amt;?>'></td>


</tr>



<?php
}

echo '</table>
';
}
else{
echo "<script>window.open('accounts.php?error=No record of students was found matching the form and year','_self')</script>";

}
}
}
if(isset($_POST['view'])){
error_reporting(0);
$form=$_POST['form'];
$year=$_POST['year'];
$term=$_POST['term'];
$amt=$_POST['amount'];
$feedesc=$_POST['feedesc'];
if($form==''){
echo "<script>window.open('accounts.php?error=Please select form','_self')</script>";
exit();
}
if($year==''){
echo "<script>window.open('accounts.php?error=Please select year (Group)','_self')</script>";
exit();
}
if($term==''){
echo "<script>window.open('accounts.php?error=Please select term','_self')</script>";
exit();
}
if($feedesc==''){
echo "<script>window.open('accounts.php?error=Please select fee description','_self')</script>";
exit();
}
else{
$sql="select * from fee inner join students on students.adm=fee.adm where ((students.form='$form') and (fee.term='$term') and (fee.feedesc='$feedesc') and (fee.year='$year'))";

$exe=mysql_query($sql);
if(mysql_num_rows($exe)>0){
$count=mysql_num_rows($exe);
echo ' <table id="results" border="1">';
echo '<tr><th>Name</th><th>Adm</th><th>Form</th><th>Class</th><th>Term</th><th>Year</th><th>Fee description</th><th>Credit</th></tr>';
?>
<input type="hidden" name='count' value='<?php echo $count; ?>'>
<?php
while($res=mysql_fetch_object($exe)){
?>

<tr><td><?php echo $res->sname .'  '.$res->fname .'  '.$res->lname ; ?></td>
<td><?php echo $res->adm;?></td>
<td><?php echo $res->form;?></td>
<td><?php echo $res->classname;?></td>
<td><?php echo $res->term;?></td>
<input type="hidden" name='id[]' value='<?php echo $res->fee_id;?>'>
<td><?php echo $res->year;?></td>
<td><?php echo $res->feedesc;?></td>
<td><?php echo $res->credit;?>

</tr>



<?php
}


echo '</table>
';
}
else{echo "<script>window.open('accounts.php?error=No record of students was found matching the form and year','_self')</script>";
}
}
}

if(isset($_POST['debitac'])){
error_reporting(0);
$form=$_POST['form'];
$year=$_POST['year'];
$term=$_POST['term'];
$date=date("d/m/Y");
$mode=$_POST['mode'];
if($form==''){
echo "<script>window.open('accounts.php?error=Please select form','_self')</script>";
exit();
}
if($year==''){
echo "<script>window.open('accounts.php?error=Please select year (Group)','_self')</script>";
exit();
}
if($term==''){
echo "<script>window.open('accounts.php?error=Please select term','_self')</script>";
exit();
}
if($mode==''){
echo "<script>window.open('accounts.php?error=Please select mode of payment','_self')</script>";
exit();
}
else{

$sql="select * from students where ((form='$form') and (year='$year'))";
$exe=mysql_query($sql);
if(mysql_num_rows($exe)>0){
$count=mysql_num_rows($exe);
echo ' <table id="results" border="1">';
echo '<tr><th>Name</th><th>Adm</th><th>Form</th><th>C</th><th>Term</th><th>Year</th><th>Date</th><th>Fee</th><th>Receipt</th><th>Amount</th></tr>';
?>
<input type="hidden" name='count' value='<?php echo $count; ?>'>
<?php
while($res=mysql_fetch_object($exe)){
$fname=$res->fname;
$sname=$res->sname;
$lname=$res->lname;
$name=$sname.'  '.$fname.'  '.$lname;
?>

<tr><td><?php echo $name; ?></td>
<td><?php echo $res->adm;?><input type="hidden" name='adm[]' value='<?php echo $res->adm;?>'></td>
<td><?php echo $res->form;?></td>
<td><?php echo $res->classname;?></td>
<td><?php echo $term;?><input type="hidden" name='term[]' value='<?php echo $term;?>'></td>
<td><?php echo $year;?><input type="hidden" name='year[]' value='<?php echo $year;?>'></td>
<td><?php echo $date;?><input type="hidden" name='date[]' value='<?php echo $date;?>'></td>
<td><?php echo $mode;?><input type="hidden" name='mode[]' value='<?php echo $mode;?>'></td>
<td><input type="text" name='receipt[]' size="10" placeholder="Receipt no." ></td>
<td><input type="text" size="10" name='amt[]' placeholder="Amount"></td>

</tr>



<?php
}


echo '</table>
';
}
else{echo "<script>window.open('accounts.php?error=No record of students was found matching the form and year','_self')</script>";
}
}
}
?>
 
 </section>
 </form>
 <aside id="aside">
 <form action="accounts.php" method="post">
 <center><section><font size="4" color="brown">Multiple Accounts</font></section></center>

<fieldset style="width:200px;margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="blue">Form</font></legend>
<input type="radio" name="form" value="1" /> Form 1<br />
<input type="radio" name="form" value="2" /> Form 2<br />
<input type="radio" name="form" value="3" /> Form 3<br />
<input type="radio" name="form" value="4" /> Form 4<br />

</fieldset>
<br/>
<fieldset style="width:200px; margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="blue">Year</font></legend>
<div style="overflow-x:hidden; overflow-y:scroll; height:80px;">
<input type="radio" name="year" value="2012" /> 2012<br />
<input type="radio" name="year" value="2013" /> 2013<br />
<input type="radio" name="year" value="2014" /> 2014<br />
<input type="radio" name="year" value="2015" /> 2015<br />
<input type="radio" name="year" value="2016" /> 2016<br />
<input type="radio" name="year" value="2017" /> 2017<br />
<input type="radio" name="year" value="2018" /> 2018<br />
<input type="radio" name="year" value="2019" /> 2019<br />
<input type="radio" name="year" value="2020" /> 2020<br />
</div>
</fieldset>
<br/>
<fieldset style="width:200px;margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="blue">Term</font></legend>
<input type="radio" name="term" value="1" />Term 1<br />
<input type="radio" name="term" value="2" /> Term 2<br />
<input type="radio" name="term" value="3" /> Term 3<br />
</fieldset>
<br/>
<fieldset style="width:200px;margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;">
<legend><font size="4" color="blue">Fee Amount</font></legend>
<input style="margin:0 auto; border-radius:3px;" type="text" name="amount" placeholder="fee amount">
</fieldset>
<br/>

<fieldset style="width:200px; margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="blue">Fee Description</font></legend>
<div style="overflow-x:hidden; overflow-y:scroll; height:80px;">
<input type="radio" name="feedesc" value="Tuition fee" /> Tuition<br />
<input type="radio" name="feedesc" value="Boarding fee" /> Boarding fee<br />
<input type="radio" name="feedesc" value=" Co-curriculum activity fee" /> Co-curriculum<br />
<input type="radio" name="feedesc" value="Development fee" /> Development<br />
<input type="radio" name="feedesc" value="Medical fee" /> Medical<br />
<input type="radio" name="feedesc" value="Transport fee" /> Transport<br />
<input type="radio" name="feedesc" value="Maintenance fee" /> Maintenance<br />
<input type="radio" name="feedesc" value="Caution money" /> Caution<br />

</div>
</fieldset>
<br/>

<fieldset style="width:200px; margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 "><legend><font size="4" color="blue">Payment mode</font></legend>
<input type="radio" name="mode" value="Deposit slip" />Bank deposit slip<br />
<input type="radio" name="mode" value="cheque" /> Cheque <br />
<input type="radio" name="mode" value="Bursary" /> Bursary<br />
</fieldset>
<br/>

 <center><input type="submit"  value="Credit a/c" name="creditac">
  <input type="submit" value="Debit a/c" name="debitac">
 <input type="submit"  value="View" name="view">
 <input type="reset" value="clear" >
</center>

 </form>
 </aside>
<div id="footer">
<center><footer>Bright View School Copyright 2015.&nbsp;&nbsp;|&nbsp;&nbsp;<a href="feestructure.php">Fee structure</a></footer></center>
</div>
</div>
</body>
</html>
<?php } ?>