<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['parents']){
header("location:parentslogin.php");

}
else{
$username=$_SESSION['parents'];
$sql1="select * from parents inner join students on students.student_id=parents.student_id where parents.username='$username'";
$run1=mysql_query($sql1);
$obj1=mysql_fetch_object($run1);
$student_id=$obj1->student_id;
$adm1=$obj1->adm;
?>


<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #999  no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc
  no-repeat center 0px; padding-top:0px;}
#main{width:600px; height:400px; margin:0 auto; 
background: #f5f6f6;
background: -moz-linear-gradient(top, #f5f6f6 0%, #dbdce2 21%, #b8bac6 49%, #dddfe3 80%, #f5f6f6 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f6f6), color-stop(21%,#dbdce2), color-stop(49%,#b8bac6), color-stop(80%,#dddfe3), color-stop(100%,#f5f6f6));
background: -webkit-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%);
background: -o-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%);
background: -ms-linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%);
background: linear-gradient(top, #f5f6f6 0%,#dbdce2 21%,#b8bac6 49%,#dddfe3 80%,#f5f6f6 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#f5f6f6',GradientType=0 );
margin-top:20px;
margin-bottom:100px;
border:1px solid grey;
padding-top:20px;
box-shadow:rgba(0, 0, 0 ,0.6) 0px  5px 5px;
}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 </section>
 </header>
 <nav id="ddmenu">
<ul>
<li class="full-width">
<li class="no-sub"><a class="top-heading" href="parents.php">Back </a></li>
   	<li class="no-sub"><a class="top-heading" href="parentslogout.php">Logout</a></li>

	

                
</li>
</ul>
</nav>
<section id='main'>
<center><font color="red"><?php echo @$_GET['error']; ?></font><font color="green"><?php echo @$_GET['success']; ?></font></center>

<form action="" method="post">
<fieldset style="margin-top:20px; width:500px;margin:0 auto; height:350px; border-radius:5px;">
<legend>
<font color="brown" size="4.5" >Change password</font>
</legend><br/>

<fieldset style="border-radius:5px;width:180px;">
<legend><font color="red">Security question</font></legend>
<input style="border-radius:4px; width:200px; height:22px;"type="text" name="adm" placeholder="What is your son admission number ?"/><br/>
</fieldset>
<br/><br/>
<input style="border-radius:4px;width:200px;height:22px;" type="password" name="pass1" placeholder="Enter current password"/><br/><br/>
<input style="border-radius:4px;width:200px;height:22px;" type="password" name="pass2" placeholder="Enter new password"/><br/><br/>
<input style="border-radius:4px;width:200px;height:22px;" type="password" name="pass3" placeholder="Confirm new password"/><br/><br/>
<input style="width:80px; margin-right:40px;"type="reset" value="clear">
<input type="submit" style="width:150px;" name="changepass" value="Change password">
<br/><br/><br/>
</fieldset>
</form>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php 
require('connect.php');
if(isset($_POST['changepass'])){
$adm=$_POST['adm'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$pass3=$_POST['pass3'];

if($adm !=$adm1){
echo"<script>window.open('changepassparents.php?error=Wrong admission number','_self')</script>";


}
else{
$sql="select * from parents where student_id='$student_id' and pass='$pass1'";
$run=mysql_query($sql);

if(mysql_num_rows($run)>0){
if($pass2 != $pass3){
echo"<script>window.open('changepassparents.php?error=New passwords entered are not matching','_self')</script>";

}
else{
$obj=mysql_fetch_object($run);
$id=$obj->student_id;
$sql="update parents set pass='$pass2' where student_id='$id'";
$ru=mysql_query($sql);
if($ru){
echo"<script>window.open('changepassparents.php?success=You have changed your password successfully','_self')</script>";

}
else{
echo"<script>window.open('changepassparents.php?error=Cannot change password at this time','_self')</script>";

}
}

}
else{
echo"<script>window.open('changepassparents.php?error=Current password is wrong','_self')</script>";

}


}
}

}?>