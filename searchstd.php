<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['schadmin']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['schadmin'];?>
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
<header><font size="4"<left>
<section id="logo">
 <img src="images/log.jpg" id="log"><center><a href="admission.php" style="color:#FFFFFF">Back</a></center>
 </section>
 </header>
 <center><section style="margin-top:40px;"><font color="brown" size="4">Search Results</font></section></center>
 <style type="text/css">
	#res{width:1200px; margin-top:10px;margin-bottom:200px;}	
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
 <table id="res">
 <tr><th>Passport</th><th>Surname</th><th>Firstname</th><th>Lastname</th><th>Adm no.</th><th>form</th><th>Classname</th><th>Age</th><th>Kcpe</th><th>Edit</th><th>Delete</th></tr>
 <center><font size="4" color="red"><?php echo @$_GET['error']; ?></font></center>
<?php 
require("connect.php");
if(isset($_POST['search'])){
$searchq=$_POST['search'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM students WHERE( (sname LIKE '%$searchq%')OR (fname LIKE'%$searchq%')OR (lname LIKE'%$searchq%')OR (adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('searchstd.php?error=No search results were found','_self')</script>";
}
else{
while($row = mysql_fetch_object($query))
{

?>
<tr><td><img src="students/<?php echo $row->passport;?>" width="100" height="100"></td><td align="center"><?php echo $row->sname; ?></td><td align="center"><?php echo $row-> fname;?></td>
<td align="center"><?php echo $row->lname; ?></td><td align="center"><?php echo $row->adm; ?></td><td align="center"><?php echo $row->form; ?></td><td align="center"><?php echo $row->classname; ?></td>
<td align="center"><?php echo $row->age; ?></td><td align="center"><?php echo $row->kcpe; ?></td><td align="center"><a style="text-decoration:none;" href="editstd.php?id=<?php echo $row->student_id;?>"><img src="images/file_edit.png" width="30" height="30"></a></a></td><td><a style="text-decoration:none;" href="deletestd.php?del=<?php echo $row->student_id;?>" onClick="return confirm('Are you sure you want to delete this student record?')"><img src="images/file_delete.png" width="30" height="30"></a></a></td></tr>
<?php

}

}

}

?>
</table>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>