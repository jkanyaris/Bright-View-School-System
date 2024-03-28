<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['student']){
header("location:studentslogin.php");

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
<li class="no-sub"><a class="top-heading" href="studentsprofile.php">Back</a></li>
   	<li class="no-sub"><a class="top-heading" href="stdlogout.php">Logout</a></li>               
</li>
</ul>
</nav>
<section id='main'>


<fieldset style="margin-top:20px; width:500px;margin:0 auto; height:350px; border-radius:5px;">
<legend>
<font color="brown" size="4.5" >My Profile</font>
</legend><br/>
<table border='1' style="width:350px;border-spacing:0;">

<?php
require('connect.php');
$adm=$_SESSION['student'];
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$student_id=$obj->student_id;
$dorm='';
$cubeno='';
$sq="select * from allocation inner join dorm on dorm.dorm_id=allocation.dorm_id where allocation.student_id='$student_id'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$res=mysql_fetch_object($ru);
$dorm=$res->house;
$cubeno=$res->cubeno;

}

?>
<tr><th>Name
<td><?php echo $obj->sname;?></td><td><?php echo $obj->fname;?></td><td><?php echo $obj->lname;?></td></tr>
<tr><th>Form</th><td colspan="3"><?php echo $obj->form .$obj->classname;?></td></tr>

<tr><th>Year of admission</th><td colspan="3"><?php echo $obj->year;?></td></tr>
<tr><th>Age</th><td colspan="3"><?php echo $obj->age;?></td></tr>
<tr><th>Kcpe </th><td colspan="3"><?php echo $obj->kcpe;?></td></tr>
<tr><th>House </th><td colspan="3"><?php echo $dorm;?></td></tr>
<tr><th>Kcpe </th><td colspan="3"><?php echo $cubeno;?></td></tr>

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