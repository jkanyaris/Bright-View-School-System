<?php
session_start();
error_reporting(0);
if(!$_SESSION['boarding'])
{
header("location: stafflogin.php");
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
 
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a>
 <font color="white" size="5" style="margin-left:250px;">Welcome to Boarding Department</font> <section id="settings" style="float:right; margin-right:60px; padding-bottom:30px;">
<ul id="drop-nav">
<li><img src="images/profile.png" height="40" width="40">
<ul><li><a href="myprofilestaff.php" style="width:120px;">My Profile</a></li>
<li><a href="changepassstaff.php" style="width:120px;">Change Password</a></li>
<li><a href="stafflogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $_SESSION['staff'];?></font></li>
</ul>
</section></center>
 </section>
 </header>
 
<table id="progress">
<?php
require('connect.php');
$free=0;
$query5="select * from dorm";
$run5=mysql_query($query5);
$tot=mysql_num_rows($run5) * 2;
while($Space=mysql_fetch_object($run5)){
$sp=$Space->space;

$free=$free+$sp;
}
$alloc=$tot-$free;
$freep=round(($free/$tot)*100,2);
$allocp=round(($alloc/$tot)*100,2);
?>
<style type="text/css">
#outer{width:200px;
border:1px solid black;
height:20px;
background-color:white;}
#inner{
width:100%;
height:20px;
border-right:1px solid black;
background: #b4e391;
background: -moz-linear-gradient(top, #b4e391 0%, #61c419 50%, #b4e391 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b4e391), color-stop(50%,#61c419), color-stop(100%,#b4e391));
background: -webkit-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
background: -o-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
background: -ms-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
background: linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
}
#outerf{width:200px;
border:1px solid black;
height:20px;
background-color:white;}
#innerf{
width:<?php echo $freep; ?>%;
height:20px;
border-right:1px solid black;
background: #b4e391;
background: -moz-linear-gradient(top, #b4e391 0%, #61c419 50%, #b4e391 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b4e391), color-stop(50%,#61c419), color-stop(100%,#b4e391));
background: -webkit-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
background: -o-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
background: -ms-linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
background: linear-gradient(top, #b4e391 0%,#61c419 50%,#b4e391 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4e391', endColorstr='#b4e391',GradientType=0 );
}
#outera{width:200px;
border:1px solid black;
height:20px;
background-color:white;}
#innera{
width:<?php echo $allocp; ?>%;
height:20px;
background: #f3c5bd;
background: -moz-linear-gradient(top, #f3c5bd 0%, #e86c57 50%, #ea2803 51%, #ff6600 75%, #c72200 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f3c5bd), color-stop(50%,#e86c57), color-stop(51%,#ea2803), color-stop(75%,#ff6600), color-stop(100%,#c72200));
background: -webkit-linear-gradient(top, #f3c5bd 0%,#e86c57 50%,#ea2803 51%,#ff6600 75%,#c72200 100%);
background: -o-linear-gradient(top, #f3c5bd 0%,#e86c57 50%,#ea2803 51%,#ff6600 75%,#c72200 100%);
background: -ms-linear-gradient(top, #f3c5bd 0%,#e86c57 50%,#ea2803 51%,#ff6600 75%,#c72200 100%);
background: linear-gradient(top, #f3c5bd 0%,#e86c57 50%,#ea2803 51%,#ff6600 75%,#c72200 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f3c5bd', endColorstr='#c72200',GradientType=0 );
border-right:1px solid black;
}
#progress td{border:1px solid grey;}
#progress {margin-left:100px;margin-top:40px;margin-bottom:20px;}
#progress th{
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
<tr><th colspan="4"><font size="4">Dynamic Progress Bar</font></th></tr>
<tr><td><font size="4" color="brown">Total Space</font></td><td><?php echo $tot; ?></td><td><div id="outer"><div id="inner"></div></div></td><td>100%</td></tr>
<tr><td><font size="4" color="brown">Free Space</font></td><td><?php echo $free; ?></td><td><div id="outerf"><div id="innerf"></div></div></td><td><?php echo $freep; ?>%</td></tr>
<tr><td><font size="4" color="brown">Allocated Space</font></td><td><?php echo $alloc; ?></td><td><div id="outera"><div id="innera"></div></div></td><td><?php echo $allocp; ?>%</td></tr>
</table> 
<div style="width: 1000px; margin: 0 auto;margin-bottom:40px;">

        <ul class="tabs" data-persist="true">
            <li><a href="#view1">All space</a></li>
           
			<li><a href="allocationdetails.php"> <font color="brown">Allocate a cube</font></a></li>
<li><a href="cubeclearanceform.php"> <font color="brown">Clear a cube</font></a></li>
        </ul>
        <div class="tabcontents">
            <div id="view1">
			
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
			<table id="cube">
			<tr><th>Dormitory</th><th>Cube No.</th><th>Available Space</th><th>First Occupant</th><th>Time</th><th>Second Occupant</th><th>Time</th></tr>
			<?php
require('connect.php');
$query="select * from dorm";
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
echo '<td>'.$obj->sname .'   '.$obj->fname . '   '.$obj->lname .'</td><td>'.$obj->allocation_time .'</td>';
}
else{
echo'<td></td><td></td>';}

$id2=$res->occupant2;
$sq2="select * from allocation inner join students on students.student_id=allocation.student_id where allocation.student_id='$id2'";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)){
$obj2=mysql_fetch_object($ru2);
echo '<td>'.$obj2->sname .'   '.$obj2->fname . '   '.$obj2->lname .'</td><td>'.$obj2->allocation_time .'</td>';
}
else{
echo'<td></td><td></td>';}
?>
</tr>
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
<?php } ?>