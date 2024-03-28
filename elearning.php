<?php 
require('connect.php');error_reporting(0);
session_start();
if(!($_SESSION['student'] or $_SESSION['teaching'])){
header("location:studentslogin.php");

}
else{
$adm=$_SESSION['student'];
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$fname=$obj->fname;
$image=$obj->passport;
?>


<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #999 center 0px; padding-top:0px;}
		#body{background: #ccc center 0px; padding-top:0px;}
		#book th{background:#AAD4FF;}
			#book tr:nth-child(odd) td{background:#eee;}
			#book1 th{background:#AAD4FF;}
			
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 
<center><font size="4"<left><a href="studentsprofile.php" style="color:#FFFFFF">Back</a><font color="white" size="5" style="margin-left:500px;margin-right:150px;">Elearning Dashboard </font> </font>
 <section id="settings" style="float:right; margin-right:60px;margin-top:0px;">
<ul id="dropnav">
<li><img src="students/<?php echo $image; ?>" height="40" width="40">
<ul><li><a href="myprofilestd.php" style="width:120px;">My Profile</a></li>
<li><a href="changepassstd.php" style="width:120px;">Change Password</a></li>
<li><a href="stdlogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $fname;?></font></li>
</ul>
</section></center>
 </section>
 </header>


 <section style="margin-left:500px;"><font color="green" size="4.5" ><?php echo @$_GET['success']; ?></font>
 <font color="red" size="4.5"><?php echo @$_GET['error']; ?></font>
 </section>
 <div id="tab"style="width: 1000px; margin: 0 auto; padding: 10px 0 40px;">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Form 1 </a></li>
            <li><a href="#view2">Form 2</a></li>
            <li><a href="#view3">Form 3</a></li>
		            <li><a href="#view4">Form 4</a></li>

        </ul>
        <div class="tabcontents">
		<div id="view1">
	<table border="1" id="book" style="border-spacing:0; width:900px;">
	<tr><th>Date</th><th>Term</th><th>Name</th><th>Subject</th><th>Form</th><th>Click to Download</th></tr>
<?php
$select=mysql_query("select * from upload where form='1'order by id desc");
while($row1=mysql_fetch_array($select)){
	$name=$row1['name'];
	$nam=$row1['nam'];
	$date=$row1['dyte'];
	$term=$row1['term'];
	$subject=$row1['subject'];
	$form=$row1['form'];
?><tr><td><?php echo $date; ?></td><td><?php echo $term ?></td><td><?php echo $nam?></td>
<td><?php echo $subject;?></td><td><?php echo $form;?></td><td><a href="download.php?filename=<?php echo $name;?>"><?php echo $nam ;?></a></td></tr>
<?php } ?>
</table>
            </div>
			
			
            <div id="view2">
			<table border="1" id="book" style="border-spacing:0; width:900px;">
	<tr><th>Date</th><th>Term</th><th>Name</th><th>Subject</th><th>Form</th><th>Click to Download</th></tr>
<?php
$select=mysql_query("select * from upload where form='2'order by id desc");
while($row1=mysql_fetch_array($select)){
	$name=$row1['name'];
	$nam=$row1['nam'];
	$date=$row1['dyte'];
	$term=$row1['term'];
	$subject=$row1['subject'];
	$form=$row1['form'];
?><tr><td><?php echo $date; ?></td><td><?php echo $term ?></td><td><?php echo $nam?></td>
<td><?php echo $subject;?></td><td><?php echo $form;?></td><td><a href="download.php?filename=<?php echo $name;?>"><?php echo $nam ;?></a></td></tr>
<?php } ?>
</table>
            </div>
			<div id="view3">
             <table border="1" id="book" style="border-spacing:0; width:900px;">
	<tr><th>Date</th><th>Term</th><th>Name</th><th>Subject</th><th>Form</th><th>Click to Download</th></tr>
<?php
$select=mysql_query("select * from upload where form='3'order by id desc");
while($row1=mysql_fetch_array($select)){
	$name=$row1['name'];
	$nam=$row1['nam'];
	$date=$row1['dyte'];
	$term=$row1['term'];
	$subject=$row1['subject'];
	$form=$row1['form'];
?><tr><td><?php echo $date; ?></td><td><?php echo $term ?></td><td><?php echo $nam?></td>
<td><?php echo $subject;?></td><td><?php echo $form;?></td><td><a href="download.php?filename=<?php echo $name;?>"><?php echo $nam ;?></a></td></tr>
<?php } ?>
</table>
            </div>
			<div id="view4">
             <table border="1" id="book" style="border-spacing:0; width:900px;">
	<tr><th>Date</th><th>Term</th><th>Name</th><th>Subject</th><th>Form</th><th>Click to Download</th></tr>
<?php
$select=mysql_query("select * from upload where form='4'order by id desc");
while($row1=mysql_fetch_array($select)){
	$name=$row1['name'];
	$nam=$row1['nam'];
	$date=$row1['dyte'];
	$term=$row1['term'];
	$subject=$row1['subject'];
	$form=$row1['form'];
?><tr><td><?php echo $date; ?></td><td><?php echo $term ?></td><td><?php echo $nam?></td>
<td><?php echo $subject;?></td><td><?php echo $form;?></td><td><a href="download.php?filename=<?php echo $name;?>"><?php echo $nam ;?></a></td></tr>
<?php } ?>
</table>
            </div>
        </div>
    </div>

<div id="footer" style="margin-top:300px;">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>