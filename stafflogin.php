<?php 
require('connect.php');
if(isset($_POST['stafflogin'])){

$username=$_POST['username'];
$pass=$_POST['password'];
$sql="select * from staff where username='$username' and pass='$pass'";
$run=mysql_query($sql);
if(mysql_num_rows($run)>0){
session_start();

$obj=mysql_fetch_object($run);
$name=$obj->username;
$category=$obj->category;
$math=$obj->mathematics;
$languages=$obj->languages;
$sciences=$obj->sciences;
$nursing=$obj->nursing;
$humanities=$obj->humanities;
$technical=$obj->technical;
$catering=$obj->catering;
$boarding=$obj->boarding;
$accounts=$obj->accounts;
$library=$obj->library;
$schadmin=$obj->schadmin;
if($category=='teaching'){$_SESSION['teaching']=$name;}
if($category=='nonteaching'){$_SESSION['nonteaching']=$name;}
if($math=='member'){$_SESSION['math']=$name;}
if($languages=='member'){$_SESSION['languages']=$name;}
if($sciences=='member'){$_SESSION['sciences']=$name;}
if($nursing=='member'){$_SESSION['nursing']=$name;}
if($humanities=='member'){$_SESSION['humanities']=$name;}
if($technical=='member'){$_SESSION['technical']=$name;}
if($catering=='member'){$_SESSION['catering']=$name;}
if($boarding=='member'){$_SESSION['boarding']=$name;}
if($accounts=='member'){$_SESSION['accounts']=$name;}
if($library=='member'){$_SESSION['library']=$name;}
if($schadmin=='member'){$_SESSION['schadmin']=$name;}
$_SESSION['staff']=$name;
header('location:staffprofile.php');

}
else{
echo"<script>window.open('stafflogin.php?error=Wrong password or username','_self')</script>";

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
#main{width:600px; height:300px; margin:0 auto; background-color:#0000FF; 
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
	<li class="no-sub"><a class="top-heading" href="studentslogin.php">Student login</a></li>
	<li class="no-sub"><a class="top-heading" href="activateparents.php">Parents account activation</a></li>


                
</li>
</ul>
</nav>
 </section>
 </header>
<center><font color="red"><?php echo @$_GET['error']; ?></font><font color="green"><?php echo @$_GET['success']; ?></font></center>

<section id='login'>
<form action="stafflogin.php" method="post" ></br>
<fieldset style="margin-top:20px; width:400px;margin:0 auto; height:350px; border-radius:5px;">
<legend align="">
<font color="brown" size="4.5">Staff Login</font>
</legend><br/>


<input style="border-radius:4px; width:200px; height:22px;"type="text" name="username" placeholder="Enter username" required="required"/><br/><br/>
<input style="border-radius:4px;width:200px;height:22px;" type="password" name="password" placeholder="Enter password" required="required"/><br/><br/><br/><br/><br/>
<input style="width:80px; margin-right:40px;"type="reset" value="clear">
<input type="submit" style="width:80px;" name="stafflogin" value="Login">





</fieldset>
</form>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>