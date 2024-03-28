<?php 
require('connect.php');
error_reporting(0);
if(isset($_POST['activate'])){
$sname=$_POST['sname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$adm=$_POST['adm'];
$username=$_POST['username'];
$form=$_POST['form'];
$email=$_POST['email'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
if($pass1 != $pass2){
echo"<script>alert('Passwords entered are not matching try again')</script>";

}
else{
$query="select * from parents inner join students on students.student_id=parents.student_id where students.adm='$adm'";
$run=mysql_query($query);
if(mysql_num_rows($run)>0){

echo"<script>window.open('activateparents.php?error=Your account is already activated','_self')</script>";

}
else{
$query="select * from parents where username='$username'";
$exec=mysql_query($query);
if(mysql_num_rows($exec)>0){
echo"<script>window.open('activateparents.php?error=Username entered is in use choose another one','_self')</script>";


}
else{
$sq="select * from students where ((sname='$sname') and(fname='$fname') and(lname='$lname')and(adm='$adm') and (form='$form'))";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$res=mysql_fetch_object($ru);
$id=$res->student_id;
$sql="insert into parents(username,student_id,email,pass) values('$username','$id','$email','$pass1')";
$exe=mysql_query($sql);
if($exe){
echo"<script>window.open('activateparents.php?success=Your have successfully activated your account you can now login','_self')</script>";

}
else{echo"<script>window.open('activateparents.php?error=Unable to activate your account at this time','_self')</script>";
}

}
}
}
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #999999  no-repeat center 0px; padding-top:0px;}
		#body{background: #cccccc
  no-repeat center 0px; padding-top:0px;}
#main{width:900px; height:400px; margin:0 auto; 
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

 <nav id="ddmenu">
<ul>
<li class="full-width">
<li class="no-sub"><a class="top-heading" href="index.php">Home</a></li>
   	<li class="no-sub"><a class="top-heading" href="admin.php">Admin login</a></li>

	<li class="no-sub"><a class="top-heading" href="stafflogin.php">Staff login</a></li>
	<li class="no-sub"><a class="top-heading" href="studentslogin.php">Student login</a></li>
		<li class="no-sub"><a class="top-heading" href="parentslogin.php">Parent Login</a></li>

	

                
</li>
</ul>
</nav>
 </section>
 </header>
<section id='main'>
<center><font color="red"><?php echo @$_GET['error']; ?></font><font color="green"><?php echo @$_GET['success']; ?></font></center>
<form action="" method="post">
<fieldset style="margin-top:20px; width:650px;margin:0 auto; height:350px; border-radius:5px;">
<legend>
<font color="brown" size="4.5" >Parents Account activation</font>
</legend><br/>
Names:&nbsp
<input style="border-radius:4px; width:150px; height:22px;"type="text" name="sname" placeholder="Enter your son surname" required="required"/>&nbsp;&nbsp;&nbsp;
<input style="border-radius:4px; width:150px; height:22px;"type="text" name="fname" placeholder="Enter your son middle name" required="required"/>&nbsp;&nbsp;&nbsp;
<input style="border-radius:4px; width:150px; height:22px;"type="text" name="lname" placeholder="Enter your son lastname" required="required"/><br/><br/>
Reg.No:&nbsp;<input style="border-radius:4px; width:150px; height:22px;"type="text" name="adm" placeholder="Enter son's adm no e.g 012001" required="required"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;Class:<select style="width:150px; border:1px solid grey;border-radius:3px; margin-left:50px;height:25px;"name="form" required="required">
<option value=''>Form</option>
<option value="1">Form 1</option>
<option value="2">Form 2</option>
<option value="3">Form 3</option>
<option value="4">Form 4</option>

</select><br/><br/>

User Name:&nbsp;<input style="border-radius:4px; width:200px; height:22px;"type="text" name="username" placeholder="Enter your Username" required="required"/>&nbsp;&nbsp;&nbsp;&nbsp;
Password&nbsp;&nbsp;&nbsp;&nbsp;<input style="border-radius:4px; width:150px; height:22px;"type="password" name="pass1" placeholder="Enter password" required="required"/><br/><br/>
Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="border-radius:4px; width:200px; height:22px;"type="email" name="email" placeholder="Enter your Email" required="required"/>&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="border-radius:4px;width:150px;height:22px;" type="password" name="pass2" placeholder="Confirm password" required="required"/><br/><br/><br/>
<input style="width:80px; margin-right:40px;"type="reset" value="clear">
<input type="submit" style="width:80px;" name="activate" value="Activate">
<br/><br/>
</fieldset>
</form>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>