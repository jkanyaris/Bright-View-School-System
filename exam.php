<?php
session_start();
error_reporting(0);
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{
require('connect.php');
if(!$_SESSION['exam_id']){
header('location:viewmarksheet.php');
}
else{
$exam_id=$_SESSION['exam_id'];
 $sq="select * from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
 $examtype=$ob->examtype;
 $year=$ob->year;
 $month=$ob->month;
 $form=$ob->form;
 $term=$ob->term;
?>
<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #eee no-repeat center 0px; padding-top:0px;}
		#body{background: #eee no-repeat center 0px; padding-top:0px;}
#links ul{ 
width:1100px;
height:40px;
margin:0 auto;
border-radius:7px;
list-style:none;}
#links div{
float:left;
border-right:1px solid grey;
width:170px;
height:30px;
margin-top:7px;
text-align:center;
}
#links li{
float:left;
width:170px;
margin-top:5px;
text-align:center;
}
#links a{text-decoration:none; color:#eee; }
#links div:hover{

background: #fcfff4;
background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(40%,#dfe5d7), color-stop(100%,#b3bead));
background: -webkit-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: -o-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: -ms-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );

}
#links a:hover{color:blue;}
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 
  <nav id="links">
<ul>
<a href="examdepartment.php">
<div>
<li>Exam department</li>
</div>
</a>
<a href="viewmarksheet.php">
<div>
<li>View mark sheet</li>
</div>
</a>
<a href="createmarksheet.php">
<div>
<li>New mark sheet</li>
</div>
</a>
<a href="examdepartment.php">
<div>

<li>Sort marks</li>
</div>
</a>
<a href="examdepartment.php">
<div>
<li>Rank</li>
</div>
</a>
<a href="examdepartment.php">
<div>
<li>Results</li>
</div>
</a>
</ul>
<nav>
 </section>

 </header>
  <style type="text/css">
 #heading{
 height:100px;
background: #fcfff4;
background: -moz-linear-gradient(top, #fcfff4 0%, #e9e9ce 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(100%,#e9e9ce));
background: -webkit-linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
background: -o-linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
background: -ms-linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
background: linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#e9e9ce',GradientType=0 );}

#fieldset{

background: #fcfff4;
background: -moz-linear-gradient(top, #fcfff4 0%, #e9e9ce 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(100%,#e9e9ce));
background: -webkit-linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
background: -o-linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
background: -ms-linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
background: linear-gradient(top, #fcfff4 0%,#e9e9ce 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#e9e9ce',GradientType=0 );
}
 </style>
 <fieldset id="fieldset" style="border-radius:10px; width:1120px; margin: 0 auto; margin-top:20px;">
 <section id="heading"> <center ><font color="black" size="4">BRIGHT VIEW SCHOOL<br/>
 TERM <?php echo '   '.$term; ?> - <?php echo $month.'    '; echo $year;?> <br/>
 FORM <?php echo '   '.$form.'   '; ?> EXAM</font></center></section>
 </section>
 </fieldset>
<div style="width: 1150px; margin: 0 auto; padding: 20px 0 40px;">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">English</a></li>
            <li><a href="#view2">Kiswahili</a></li>
            <li><a href="#view3">Mathematics</a></li>
			<li><a href="#view4">Biology</a></li>
			<li><a href="#view5">Chemistry</a></li>
			<li><a href="#view6">Physics</a></li>
			<li><a href="#view7">Geography</a></li>
			<li><a href="#view8">Business</a></li>
			<li><a href="#view9">Agriculture</a></li>
			<li><a href="#view10">Computer</a></li>
			<li><a href="#view11">History</a></li>
			<li><a href="#view12">CRE</a></li>
			
        </ul>
        <div class="tabcontents">
            <div id="view1">
			<center><font color="brown" size="4">Subject: English</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto; border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="engcat[]" value="<?php echo $res->engcat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="engend[]" value="<?php echo $res->engend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="engend[]" value="<?php echo $res->engend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subeng"></td></tr>

</form>

 </table>             
            </div>
            <div id="view2">
			<center><font color="brown" size="4">Subject: Kiswahili</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF; }
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="kiscat[]" value="<?php echo $res->kiscat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="kisend[]" value="<?php echo $res->kisend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="kisend[]" value="<?php echo $res->kisend;?>"></td>

 </tr>
 <?php }
}
 ?>


<tr><td  colspan="7" align="center"><input type="submit" name="subkis"></td></tr>

</form>

 </table>                              
            </div>
			<div id="view3">
                			<center><font color="brown" size="4">Subject: Mathematics</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="matcat[]" value="<?php echo $res->matcat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="matend[]" value="<?php echo $res->matend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="matend[]" value="<?php echo $res->matend;?>"></td>

 </tr>
 <?php }
}
 ?>


<tr><td  colspan="7" align="center"><input type="submit" name="submat"></td></tr>

</form>

 </table>                     
            </div>
            <div id="view4">
                             			<center><font color="brown" size="4">Subject: Biology</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 
<?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="biocat[]" value="<?php echo $res->biocat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="bioend[]" value="<?php echo $res->bioend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="bioend[]" value="<?php echo $res->bioend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subbio"></td></tr>

</form>

 </table>    
                 
            </div>
			<div id="view5">
                                           			<center><font color="brown" size="4">Subject: Chemistry</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="chemcat[]" value="<?php echo $res->chemcat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="chemend[]" value="<?php echo $res->chemend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="chemend[]" value="<?php echo $res->chemend;?>"></td>

 </tr>
 <?php }
}
 ?>


<tr><td  colspan="7" align="center"><input type="submit" name="subchem"></td></tr>

</form>

 </table> 
            </div>
			<div id="view6">
                                            			<center><font color="brown" size="4">Subject: Physics</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="phycat[]" value="<?php echo $res->phycat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="phyend[]" value="<?php echo $res->phyend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="phyend[]" value="<?php echo $res->phyend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subphy"></td></tr>

</form>

 </table>      
            </div>
						<div id="view7">

			<center><font color="brown" size="4">Subject: Geography</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="geocat[]" value="<?php echo $res->geocat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="geoend[]" value="<?php echo $res->geoend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="geoend[]" value="<?php echo $res->geoend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subgeo"></td></tr>

</form>

 </table> 
                
            </div>
			<div id="view8">
               			<center><font color="brown" size="4">Subject: Business Studies</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="bscat[]" value="<?php echo $res->bscat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="bsend[]" value="<?php echo $res->bsend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="bsend[]" value="<?php echo $res->bsend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subbs"></td></tr>

</form>

 </table>  			

            </div>
			<div id="view9">
                             			<center><font color="brown" size="4">Subject:Agriculture</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="agricat[]" value="<?php echo $res->agricat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="agriend[]" value="<?php echo $res->agriend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="agriend[]" value="<?php echo $res->agriend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subagri"></td></tr>

</form>

 </table>   
            </div>
			<div id="view10">
                                           			<center><font color="brown" size="4">Subject:Computer Studies</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="compcat[]" value="<?php echo $res->compcat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="compend[]" value="<?php echo $res->compend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="compend[]" value="<?php echo $res->compend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subcomp"></td></tr>

</form>

 </table>  
            </div>
			<div id="view11">
                                            			<center><font color="brown" size="4">Subject:History</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 <?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="histcat[]" value="<?php echo $res->histcat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="histend[]" value="<?php echo $res->histend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="histend[]" value="<?php echo $res->histend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subhist"></td></tr>

</form>

 </table>  
                
            </div>
			<div id="view12">
                                            			<center><font color="brown" size="4">Subject:CRE</font></center>
			<style type="text/css">
			#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
<table border="1px;" id="marksheet" style="width:1000px; margin:0 auto;border-spacing:0; ">

 <form action="marksedit.php" method="post">
 
<?php 
 
 require('connect.php');


$squ="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id'";
$run=mysql_query($squ);
 if($examtype=="Normal"){
 echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cat</th><th>End</th></tr>";
 }
 else{
  echo"<tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Mks</th></tr>";
}
 ?>
 
 <?php
 
 if($examtype=='Normal'){
 while($res=mysql_fetch_object($run)){
 
 ?>
 <tr>  
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="crecat[]" value="<?php echo $res->crecat;?>"></td>
 <td style="width:30px;"><input style="width:30px;" type="text" name="creend[]" value="<?php echo $res->creend;?>"></td>
 </tr>

 <?php }
}
else{
while($res=mysql_fetch_object($run)){
 
 
 ?>
 <tr>
   <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <td><?php echo $res->sname .'   '.$res->fname .'   '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->form;?></td>
 <td><?php echo $res->classname;?></td>
  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td style="width:30px;"><input type="text" style="width:30px;" name="creend[]" value="<?php echo $res->creend;?>"></td>

 </tr>
 <?php }
}
 ?>

<tr><td  colspan="7" align="center"><input type="submit" name="subcre"></td></tr>

</form>

 </table>  
            </div>
        </div>
    </div>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }} ?>
