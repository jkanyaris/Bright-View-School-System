<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['staff']){
header("location:stafflogin.php");

}
else{

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
#main{width:600px; height:450px; margin:0 auto; 
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
<li class="no-sub"><a class="top-heading" href="staffprofile.php">Back</a></li>
   	<li class="no-sub"><a class="top-heading" href="stafflogout.php">Logout</a></li>

	

                
</li>
</ul>
</nav>
<section id='main'>


<fieldset style="margin-top:20px; width:500px;margin:0 auto; height:400px; border-radius:5px;">
<legend>
<font color="brown" size="4.5" >My Profile</font>
</legend><br/>
<table border='1' style="width:350px;border-spacing:0;">

<?php
require('connect.php');
$username=$_SESSION['staff'];
$sql="select * from staff where username='$username'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$mathematics=$obj->mathematics;
$languages=$obj->languages;
$sciences=$obj->sciences;
$catering=$obj->catering;
$boarding=$obj->boarding;
$library=$obj->library;
$schadmin=$obj->schadmin;
$accounts=$obj->accounts;
$technical=$obj->technical;
$nursing=$obj->nursing;
$humanities=$obj->humanities;



?>
<tr><th>Username</th>
<td><?php echo $obj->username;?></td></tr>
<tr><th>Email</th><td ><?php echo $obj->email;?></td></tr>
<tr><th>Category</th><td><?php echo $obj->category;?></td></tr>
<tr><th colspan="2">Department(s)</th></tr>
<?php 
if($mathematics=='member'){
echo '<tr ><td colspan="2">Mathematics</td></tr>';

}
if($languages=='member'){
echo '<tr><td colspan="2">Languages</td></tr>';

}
if($sciences=='member'){
echo '<tr><td colspan="2">Sciences</td></tr>';

}
if($humanities=='member'){
echo '<tr><td colspan="2">Humanities</td></tr>';

}
if($technical=='member'){
echo '<tr><td colspan="2">Technical</td></tr>';

}
if($catering=='member'){
echo '<tr><td colspan="2">Catering</td></tr>';

}
if($boarding=='member'){
echo '<tr><td colspan="2">Boarding</td></tr>';

}
if($schadmin=='member'){
echo '<tr><td colspan="2">School Admin</td></tr>';

}
if($nursing=='member'){
echo '<tr><td colspan="2">Nursing</td></tr>';

}
if($accounts=='member'){
echo '<tr><td colspan="2">Fee accounts</td></tr>';

}
if($library=='library'){
echo '<tr><td colspan="2">Library</td></tr>';

}

?>
</section>


</table>
</fieldset>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>