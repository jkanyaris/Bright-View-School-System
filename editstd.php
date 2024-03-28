<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['schadmin']){
header("location:stafflogin.php");

}
else{
if(isset($_GET['id'])){
$q="SELECT * FROM students WHERE student_id='$_GET[id]'";
$result=mysql_query($q);
$std=mysql_fetch_object($result);

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
        body { background: #999 no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc no-repeat center 0px; padding-top:0px;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log"><center><a href="searchstd.php" style="color:#FFFFFF">Back</a></center>
 </section>
 </header>
 <center><font size="4"<left><section style=" margin-top:40px;"><font color="brown" size="4">Edit Record</font></section></center>
 <style type="text/css">
	#res{width:1000px;margin-bottom:200px;}	
#res th{
height:30px;
color:black;
background: #fcfff4;
background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(40%,#dfe5d7), color-stop(100%,#b3bead));
background: -webkit-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: -o-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: -ms-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );

}
#res td {
background: #f2f9fe;
background: -moz-linear-gradient(top, #f2f9fe 0%, #d6f0fd 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f2f9fe), color-stop(100%,#d6f0fd));
background: -webkit-linear-gradient(top, #f2f9fe 0%,#d6f0fd 100%);
background: -o-linear-gradient(top, #f2f9fe 0%,#d6f0fd 100%);
background: -ms-linear-gradient(top, #f2f9fe 0%,#d6f0fd 100%);
background: linear-gradient(top, #f2f9fe 0%,#d6f0fd 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f9fe', endColorstr='#d6f0fd',GradientType=0 );

}
</style>
<form action="updatestd.php" method="post" enctype='multipart/form-data'>

 <center><table id="res">
 <tr><th >Passport</th><td><img src="students/<?php echo $std->passport;?>" width="100" height="100"> <input type="file" name="img" /></td></tr>
 <tr><th >Surname</th><td><input type="text" name="sname" value="<?php echo $std->sname ;?>"/></td></tr>
 <tr><th >Firstname</th><td><input type="text" name="fname" value="<?php echo $std->fname ;?>"/></td></tr>
 <tr><th >Lastname</th><td><input type="text" name="lname" value="<?php echo $std->lname ;?>"/></td></tr>
 <tr><th >Adm no.</th><td><input type="text" name="adm" value="<?php echo $std->adm ;?>"/></td></tr>
 <tr><th >form</th><td><input type="text" name="form" value="<?php echo $std->form ;?>"/></td></tr>
 <tr><th >Classname</th><td><input type="text"  name="classname" value="<?php echo $std->classname ;?>"/></td></tr>
 <tr><th >Year</th><td><input type="text"  name="year" value="<?php echo $std->year ;?>"/></td></tr> 
 <tr><th>Age</th><td><input type="text" name="age" value="<?php echo $std->age ;?>"/></td></tr>
 <tr><th >Kcpe</th><td><input type="text" name="kcpe" value="<?php echo $std->kcpe ;?>"/></td></tr>
<tr> <th colspan="2" style="height:100px;"><center><input type="image" src="images/Save.png" height="40" width="40" name="updatestud" value="Update">
</center></th></tr>
 </table>
 </center>
 <input type="hidden" name="passport" value="<?php echo $std->passport ;?>"/>
<input type="hidden" name="id"  value="<?php echo $_GET['id'];?>">
 </form>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>
