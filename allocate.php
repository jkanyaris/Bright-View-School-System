<?php
session_start();
error_reporting(0);
if(!($_SESSION['boarding'] && $_SESSION['sess_allocation']))
{
header("location: allocationdetails.php");
}
else{


?>

<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #999 url center 0px; padding-top:0px;}
		#body{background: #ccc  center 0px; padding-top:0px;}
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font color="white" size="5" style="margin-left:350px;">Cube Space Allocation</font> <section id="settings" style="float:right; margin-right:60px; padding-bottom:30px;">
<ul id="drop-nav">
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
 <center><div style=" padding-top:80px;"><font size="4" color="brown" >Available cubes and space</font></div></center>
<div style="width: 1000px; margin: 0 auto;">

        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Dorm A</a></li>
            <li><a href="#view2">Dorm B</a></li>
            <li><a href="#view3">Dorm C</a></li>
			<li><a href="#view4">Dorm D</a></li>
			<li><a href="#view5">Dorm E</a></li>
        </ul>
        <div class="tabcontents">
            <div id="view1">
			<?php 
			require('connect.php');
			$query5="select * from dorm where house='alpha'";
			$run5=mysql_query($query5);
			$alphat=mysql_num_rows($run5)*2;
			$query6="select * from dorm where ((house='alpha')and(space >= 1))";
			$run6=mysql_query($query6);
			$free=0;
			while($avail=mysql_fetch_object($run6)){
			$sp=$avail->space;
			$free=$free+$sp;
			}
			$alphap=round(($free/$alphat)*100,2);
			?>
			<style type="text/css">
			#alphaO{height:20px;
			background-color:white;
			border:1px solid black;
			width:200px;}
			#alphaI{height:20px;
			background: rgb(180,227,145);
background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1)));
background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
			border-right:1px solid black;
			width:<?php echo $alphap; ?>%;}
			#prog{width:300px;}
			#prog th{
background: rgb(245,246,246);
background: -moz-linear-gradient(top, rgba(245,246,246,1) 0%, rgba(219,220,226,1) 21%, rgba(184,186,198,1) 49%, rgba(221,223,227,1) 80%, rgba(245,246,246,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(245,246,246,1)), color-stop(21%,rgba(219,220,226,1)), color-stop(49%,rgba(184,186,198,1)), color-stop(80%,rgba(221,223,227,1)), color-stop(100%,rgba(245,246,246,1)));
background: -webkit-linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 49%,rgba(221,223,227,1) 80%,rgba(245,246,246,1) 100%);
background: -o-linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 49%,rgba(221,223,227,1) 80%,rgba(245,246,246,1) 100%);
background: -ms-linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 49%,rgba(221,223,227,1) 80%,rgba(245,246,246,1) 100%);
background: linear-gradient(top, rgba(245,246,246,1) 0%,rgba(219,220,226,1) 21%,rgba(184,186,198,1) 49%,rgba(221,223,227,1) 80%,rgba(245,246,246,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f6f6', endColorstr='#f5f6f6',GradientType=0 );
}
			</style>
			<style type="text/css">
#cube{width:900px;}			
#cube th{
height:30px;
color:white;
background: rgb(208,228,247);
background: -moz-linear-gradient(top, rgba(208,228,247,1) 0%, rgba(115,177,231,1) 24%, rgba(10,119,213,1) 50%, rgba(83,159,225,1) 79%, rgba(135,188,234,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(208,228,247,1)), color-stop(24%,rgba(115,177,231,1)), color-stop(50%,rgba(10,119,213,1)), color-stop(79%,rgba(83,159,225,1)), color-stop(100%,rgba(135,188,234,1)));
background: -webkit-linear-gradient(top, rgba(208,228,247,1) 0%,rgba(115,177,231,1) 24%,rgba(10,119,213,1) 50%,rgba(83,159,225,1) 79%,rgba(135,188,234,1) 100%);
background: -o-linear-gradient(top, rgba(208,228,247,1) 0%,rgba(115,177,231,1) 24%,rgba(10,119,213,1) 50%,rgba(83,159,225,1) 79%,rgba(135,188,234,1) 100%);
background: -ms-linear-gradient(top, rgba(208,228,247,1) 0%,rgba(115,177,231,1) 24%,rgba(10,119,213,1) 50%,rgba(83,159,225,1) 79%,rgba(135,188,234,1) 100%);
background: linear-gradient(top, rgba(208,228,247,1) 0%,rgba(115,177,231,1) 24%,rgba(10,119,213,1) 50%,rgba(83,159,225,1) 79%,rgba(135,188,234,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d0e4f7', endColorstr='#87bcea',GradientType=0 );

}
#cube td {
background: rgb(242,245,246);
background: -moz-linear-gradient(top, rgba(242,245,246,1) 0%, rgba(227,234,237,1) 37%, rgba(200,215,220,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,245,246,1)), color-stop(37%,rgba(227,234,237,1)), color-stop(100%,rgba(200,215,220,1)));
background: -webkit-linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%);
background: -o-linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%);
background: -ms-linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%);
background: linear-gradient(top, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=0 );

}
</style>
			<table id="prog" border="1px">
			<tr><th colspan="4">Available space</th></tr>
			<tr><td><div id="alphaO"><div id="alphaI"></div></div></td><td><?php echo $alphap.'% of '.$alphat;?></td></tr>
			</table>
			<table id="cube">
			<tr><th>Dormitory</th><th>Cube No.</th><th>Available Space</th><th>First Occupant</th><th>Second Occupant</th><th>Option</th></tr>

<?php
require('connect.php');
$query="select * from dorm where ((house='alpha')and(space >= 1))";
$run=mysql_query($query);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php echo $res->house;?></td><td><?php echo $res->cubeno;?></td><td><?php echo $res->space;?></td>
<?php 
$id1=$res->occupant1;
$sq="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id1'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$obj=mysql_fetch_object($ru);
echo '<td>'.$obj->sname .'   '.$obj->fname . '   '.$obj->lname .'</td>';
}
else{
echo'<td></td>';}

$id2=$res->occupant2;
$sq2="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id2'";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)){
$obj2=mysql_fetch_object($ru2);
echo '<td>'.$obj2->sname .'   '.$obj2->fname . '   '.$obj2->lname .'</td>';
}
else{
echo'<td></td>';}
?>
<td><a href="allocate.php?id=<?php echo $res->dorm_id; ?>">Allocate</a></td></tr>

<?php
} 
?>
			</table>
			
            </div>
            <div id="view2">
			<?php 
			require('connect.php');
			$query5="select * from dorm where house='theta'";
			$run5=mysql_query($query5);
			$thetat=mysql_num_rows($run5)*2;
			$query6="select * from dorm where ((house='theta')and(space >= 1))";
			$run6=mysql_query($query6);
			$free=0;
			while($avail=mysql_fetch_object($run6)){
			$sp=$avail->space;
			$free=$free+$sp;
			}
			$thetap=round(($free/$thetat)*100,2);
			?>
			<style type="text/css">
			#thetaO{height:20px;
			background-color:white;
			border:1px solid black;
			width:200px;}
			#thetaI{height:20px;
			background: rgb(180,227,145);
background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1)));
background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
			border-right:1px solid black;
			width:<?php echo $thetap; ?>%;}
			</style>
            <table id="prog" border="1px">
			<tr><th colspan="4">Available space</th></tr>
			<tr><td><div id="thetaO"><div id="thetaI"></div></div></td><td><?php echo $thetap.'% of '.$thetat;?></td></tr>
			</table>
			<table id="cube">
			<tr><th>Dormitory</th><th>Cube No.</th><th>Available Space</th><th>First Occupant</th><th>Second Occupant</th><th>
			Option</th></tr>
<?php
require('connect.php');
$query="select * from dorm where ((house='theta')and(space >= 1))";
$run=mysql_query($query);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php echo $res->house;?></td><td><?php echo $res->cubeno;?></td><td><?php echo $res->space;?></td>
<?php 
$id1=$res->occupant1;
$sq="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id1'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$obj=mysql_fetch_object($ru);
echo '<td>'.$obj->sname .'   '.$obj->fname . '   '.$obj->lname .'</td>';
}
else{
echo'<td></td>';}

$id2=$res->occupant2;
$sq2="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id2'";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)){
$obj2=mysql_fetch_object($ru2);
echo '<td>'.$obj2->sname .'   '.$obj2->fname . '   '.$obj2->lname .'</td>';
}
else{
echo'<td></td>';}
?>
<td><a href="allocate.php?id=<?php echo $res->dorm_id; ?>">Allocate</a></td></tr>

<?php
} 
?>
			</table>             
            </div>
			<div id="view3">
			<?php 
			require('connect.php');
			$query5="select * from dorm where house='omega'";
			$run5=mysql_query($query5);
			$omegat=mysql_num_rows($run5)*2;
			$query6="select * from dorm where ((house='omega')and(space >= 1))";
			$run6=mysql_query($query6);
			$free=0;
			while($avail=mysql_fetch_object($run6)){
			$sp=$avail->space;
			$free=$free+$sp;
			}
			$omegap=round(($free/$omegat)*100,2);
			?>
			<style type="text/css">
			#omegaO{height:20px;
			background-color:white;
			border:1px solid black;
			width:200px;}
			#omegaI{height:20px;
			background: rgb(180,227,145);
background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1)));
background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
			border-right:1px solid black;
			width:<?php echo $omegap; ?>%;}
			</style>
			<table id="prog" border="1px">
			<tr><th colspan="4">Available space</th></tr>
			<tr><td><div id="omegaO"><div id="omegaI"></div></div></td><td><?php echo $omegap.'% of '.$omegat;?></td></tr>
			</table>
			<table id="cube">
			<tr><th>Dormitory</th><th>Cube No.</th><th>Available Space</th><th>First Occupant</th><th>Second Occupant</th><th>Option</th></tr>

<?php
require('connect.php');
$query="select * from dorm where ((house='omega')and(space >= 1))";
$run=mysql_query($query);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php echo $res->house;?></td><td><?php echo $res->cubeno;?></td><td><?php echo $res->space;?></td>
<?php 
$id1=$res->occupant1;
$sq="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id1'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$obj=mysql_fetch_object($ru);
echo '<td>'.$obj->sname .'   '.$obj->fname . '   '.$obj->lname .'</td>';
}
else{
echo'<td></td>';}

$id2=$res->occupant2;
$sq2="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id2'";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)){
$obj2=mysql_fetch_object($ru2);
echo '<td>'.$obj2->sname .'   '.$obj2->fname . '   '.$obj2->lname .'</td>';
}
else{
echo'<td></td>';}
?>
<td><a href="allocate.php?id=<?php echo $res->dorm_id; ?>">Allocate</a></td></tr>

<?php
} 
?>
			</table>                
            </div>
            <div id="view4">
			<?php 
			require('connect.php');
			$query5="select * from dorm where house='sigma'";
			$run5=mysql_query($query5);
			$sigmat=mysql_num_rows($run5)*2;
			$query6="select * from dorm where ((house='sigma')and(space >= 1))";
			$run6=mysql_query($query6);
			$free=0;
			while($avail=mysql_fetch_object($run6)){
			$sp=$avail->space;
			$free=$free+$sp;
			}
			$sigmap=round(($free/$sigmat)*100,2);
			?>
			<style type="text/css">
			#sigmaO{height:20px;
			background-color:white;
			border:1px solid black;
			width:200px;}
			#sigmaI{height:20px;
			background: rgb(180,227,145);
background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1)));
background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
			border-right:1px solid black;
			width:<?php echo $sigmap; ?>%;}
			</style>
			<table id="prog" border="1px">
			<tr><th colspan="4">Available space</th></tr>
			<tr><td><div id="sigmaO"><div id="sigmaI"></div></div></td><td><?php echo $sigmap.'% of '.$sigmat;?></td></tr>
			</table>
			<table id="cube">
			<tr><th>Dormitory</th><th>Cube No.</th><th>Available Space</th><th>First Occupant</th><th>Second Occupant</th><th>Option</th></tr>

<?php
require('connect.php');
$query="select * from dorm where ((house='sigma')and(space >= 1))";
$run=mysql_query($query);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php echo $res->house;?></td><td><?php echo $res->cubeno;?></td><td><?php echo $res->space;?></td>
<?php 
$id1=$res->occupant1;
$sq="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id1'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$obj=mysql_fetch_object($ru);
echo '<td>'.$obj->sname .'   '.$obj->fname . '   '.$obj->lname .'</td>';
}
else{
echo'<td></td>';}

$id2=$res->occupant2;
$sq2="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id2'";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)){
$obj2=mysql_fetch_object($ru2);
echo '<td>'.$obj2->sname .'   '.$obj2->fname . '   '.$obj2->lname .'</td>';
}
else{
echo'<td></td>';}
?>
<td><a href="allocate.php?id=<?php echo $res->dorm_id; ?>">Allocate</a></td></tr>

<?php
} 
?>
			</table>
            </div>
			<div id="view5">
			<?php 
			require('connect.php');
			$query5="select * from dorm where house='gama'";
			$run5=mysql_query($query5);
			$gamat=mysql_num_rows($run5)*2;
			$query6="select * from dorm where ((house='gama')and(space >= 1))";
			$run6=mysql_query($query6);
			$free=0;
			while($avail=mysql_fetch_object($run6)){
			$sp=$avail->space;
			$free=$free+$sp;
			}
			$gamap=round(($free/$gamat)*100,2);
			?>
			<style type="text/css">
			#gamaO{height:20px;
			background-color:white;
			border:1px solid black;
			width:200px;}
			#gamaI{height:20px;
			background: rgb(180,227,145);
background: -moz-linear-gradient(top, rgba(180,227,145,1) 0%, rgba(97,196,25,1) 50%, rgba(180,227,145,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(180,227,145,1)), color-stop(50%,rgba(97,196,25,1)), color-stop(100%,rgba(180,227,145,1)));
background: -webkit-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -o-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: -ms-linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
background: linear-gradient(top, rgba(180,227,145,1) 0%,rgba(97,196,25,1) 50%,rgba(180,227,145,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
			border-right:1px solid black;
			width:<?php echo $gamap; ?>%;}
			</style>
			<table id="prog" border="1px">
			<tr><th colspan="4">Available space</th></tr>
			<tr><td><div id="gamaO"><div id="gamaI"></div></div></td><td><?php echo $gamap.'% of '.$gamat;?></td></tr>
			</table>
			<table id="cube">
			<tr><th>Dormitory</th><th>Cube No.</th><th>Available Space</th><th>First Occupant</th><th>Second Occupant</th><th>Option</th></tr>
<?php
require('connect.php');
$query="select * from dorm where ((house='gama')and(space >= 1))";
$run=mysql_query($query);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php echo $res->house;?></td><td><?php echo $res->cubeno;?></td><td><?php echo $res->space;?></td>
<?php 
$id1=$res->occupant1;
$sq="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id1'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$obj=mysql_fetch_object($ru);
echo '<td>'.$obj->sname .'   '.$obj->fname . '   '.$obj->lname .'</td>';
}
else{
echo'<td></td>';}

$id2=$res->occupant2;
$sq2="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id2'";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)){
$obj2=mysql_fetch_object($ru2);
echo '<td>'.$obj2->sname .'   '.$obj2->fname . '   '.$obj2->lname .'</td>';
}
else{
echo'<td></td>';}
?>
<td><a href="allocate.php?id=<?php echo $res->dorm_id; ?>">Allocate</a></td></tr>

<?php
} 
?>
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
<?php 
require('connect.php');
if(isset($_GET['id'])){
$cube=$_GET['id'];
$studentid=$_SESSION['sess_allocation'];
$sql="select * from dorm where dorm_id='$cube'";
$exe=mysql_query($sql);
$res=mysql_fetch_object($exe);
$house=$res->house;
$cubeno=$res->cubeno; 
$space=$res->space; 

$sq="select * from allocation where student_id='$studentid'";
$ru=mysql_query($sq);



if(mysql_num_rows($ru)==0){
 
 
 if($space==0){
echo"<script>window.open('allocationdetails.php?error=The cube is fully occupied','_self')</script>";
}



if($space==1){
$sq5="select * from dorm where dorm_id='$cube'";
$ru5=mysql_query($sq5);
$res=mysql_fetch_object($ru5);
$occupant1=$res->occupant1;

if($occupant1==0){
 $sql2="update dorm set space=0 ,occupant1='$studentid'  where dorm_id='$cube'";
 $run2=mysql_query($sql2);
 $query="insert into allocation(dorm_id,student_id,allocation_time) values('$cube','$studentid',CURRENT_TIMESTAMP)";
 $exe=mysql_query($query);}
 else{
 
 $sql2="update dorm set space=0 ,occupant2='$studentid'  where dorm_id='$cube'";
 $run2=mysql_query($sql2);
 $query="insert into allocation(dorm_id,student_id,allocation_time) values('$cube','$studentid',CURRENT_TIMESTAMP)";
 $exe=mysql_query($query);}
 

}

if($space==2){
$sql2="update dorm set space=1 ,occupant1='$studentid' where dorm_id='$cube'";
 $run2=mysql_query($sql2);
 $query="insert into allocation(dorm_id,student_id,allocation_time) values('$cube','$studentid',CURRENT_TIMESTAMP)";
  $exe=mysql_query($query);
 
}


 if($run2 && $exe){
 
 echo"<script>window.open('allocationdetails.php?message=The cube is allocated successfully','_self')</script>";
 }
 else{echo"<script>window.open('allocationdetails.php?error=sorry could not allocate room','_self')</script>";
 }

}

else{
echo"<script>window.open('allocationdetails.php?error=The student already has a cube','_self')</script>";
}


}
}

?>
