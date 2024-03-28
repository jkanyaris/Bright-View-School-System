<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['student']){
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
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #999  no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc  no-repeat center 0px; padding-top:0px;}
	#main{width:1000px;
	height:600px;
	border:1px solid grey;
	background:white;
	margin:0 auto;
	margin-top:20px;
overflow-x:hidden;overflow-y:scroll;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
margin-bottom:50px;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log"><center><font size="4"<left><a href="studentsprofile.php" style="color:#FFFFFF">Back</a>
 </section>
 </header>
 <nav id="ddmenu">
<ul>
<li class="full-width">
   	<li class="no-sub"><a class="top-heading" href="studentsprofile.php">Student Dashboard</a></li>


                
</li>
</ul>
</nav>
<section id='main'>
<center><font size="5" color="brown" ><b>Fee Statement</b></font></center>


			<?php
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);

if($cur=mysql_num_rows($run)>0){
$name=mysql_fetch_array($run);
$date=date("d/m/Y");
echo "<table border='1' style='border-spacing:0px;'><tr><td style='border-right:0px;'><img src='images/techhigh.jpg' height='120' width='120'>
</td><td style='width:1000px;border-left:0px;' colspan='5'><section style='background:#eee;height:120px;'><center><font size='5'><b>BRIGHT VIEW SCHOOL</b></font>
<br/><font size='4'>STUDENT FEES STATEMENT AS AT  ".$date."</font></center><br/>
Registration No.".$name['adm'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:".$name['sname']."   ".$name['fname']."   ".$name['lname']."<br/>
Form: ".$name['form']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Classname: ". $name['classname' ]."
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
Group: ".$name['year']."</section></td></tr>

<tr><th>Receipt No.</th><th>Date</th><th>Description</th><th>Credit</th><th>Debit</th><th>Balance</th></tr>";

?>
<?php
$sq="select * from fee where adm='$adm'";
$ru=mysql_query($sq);
$count=mysql_num_rows($ru);
?>
<?php
while($res=mysql_fetch_object($ru)){
?>

<tr><td><?php echo $res->receipt;?></td>
<td><?php echo $res->dayt;?></td>
<td><?php echo $res->feedesc;?></td>
<td><?php echo $res->credit;?></td>
<td><?php echo $res->debit;?></td>
<td><?php echo $res->balance;?></td>
</tr>

<?php 
}
}
else{

echo "<script>window.open('balance.php?error=No record of students was found matching','_self')</script>";
}
?>
</table>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>