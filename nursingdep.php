<?php
require('connect.php');
session_start();
if(!$_SESSION['nursing']){
header("location:stafflogin.php");
}
else{
$username=$_SESSION['nursing'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #999 no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc url(images/back.jpg) no-repeat center 0px; padding-top:0px;}
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
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a></font><font color="white" size="4" style="margin-left:250px;">Student Admission and Accounts Management Panel </font> 
 <section id="settings" style="float:right; margin-right:60px; padding-bottom:30px;">
<ul id="dropnav">
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
 <center><section style="margin:0 auto; margin-top:40px;">
 <font size="4" color="red"><?php echo @$_GET['error'];?></font>
<font size="4" color="green"><?php echo @$_GET['success'];?></font>
</section></center>
<div style="width: 1000px; margin: 0 auto; ">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Add Record</a></li>
            <li><a href="#view2">Search Record</a></li>
			<li><a href="#view3">View All Records</a></li>
        </ul>
        <div class="tabcontents">
            <div id="view1">
				<form action="nursingdep.php" method="POST">
				<input type="text" name="name" placeholder="Enter fname/ lname/ adm no."style="width:200px;"/><input type="submit" value="search" name="search">
				<br/><br/></form>
				<form action="nursingdep.php" method="POST">
				<textarea placeholder="Enter Health Status!" required="required" name="status" width="300px" height="70px"></textarea><br/><input type="submit" value="Enter" name="substatus"><br/>
				<table id="res" width="900px">
 <tr><th>Passport</th><th>Surname</th><th>Firstname</th><th>Lastname</th><th>Adm no.</th><th>form</th><th>Classname</th><th>Age</th><th>Kcpe</th><th>Select</th></tr>
				<?php 
require("connect.php");
if(isset($_POST['search'])){
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM students WHERE( (sname LIKE '%$searchq%')OR (fname LIKE'%$searchq%')OR (lname LIKE'%$searchq%')OR (adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('nursingdep.php?error=No search results were found','_self')</script>";
}
else{
while($row = mysql_fetch_object($query))
{

?>
<tr><td><img src="students/<?php echo $row->passport;?>" width="100" height="100"></td><td align="center"><?php echo $row->sname; ?></td><td align="center"><?php echo $row-> fname;?></td>
<td align="center"><?php echo $row->lname; ?></td><td align="center"><?php echo $row->adm; ?></td><td align="center"><?php echo $row->form; ?></td><td align="center"><?php echo $row->classname; ?></td>
<td align="center"><?php echo $row->age; ?></td><td align="center"><?php echo $row->kcpe; ?></td><td><input type="radio" required="required" name="student" value="<?php echo $row->student_id;?>"></td></tr>
<?php

}

}

}

?>
</table>
</form>
               <?php
			   if(isset($_POST['substatus'])){
			  $status=$_POST['status'];
			   $student_id=$_POST["student"];
			   $dyte=date("d/m/Y");
			   
			 $sql="INSERT INTO nursing(student_id, dyte, status) values('$student_id','$dyte','$status')";
			$sqlrun=mysql_query($sql);
			if($sqlrun){echo"<script>window.open('nursingdep.php?success=You Have Submitted Health Status Successfully','_self')</script>";
}else{echo"<script>window.open('nursingdep.php?error=Health Status was not Submitted!','_self')</script>";
}}
			   ?>
				
            </div>
            <div id="view2">
			<form action="" method="POST">
			<input type="text" style="width:230px; border-radius:5px; border:1px solid grey; height:20px;" name="name" placeholder="Enter fname/ sname/ lname/ adm no."/><input type="submit" value="Search" name="searchrecord" style="border-radius:3px; width:60px; height:25px;">
			<br/><br/>
			</form>
			<form action="" method="POST">
							<table id="res" width="900px">
 <tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>Date</th><th>Health Status</th><th>Select</th><th>Save</th><th>Delete</th></tr>
 <?php 
require("connect.php");
if(isset($_POST['searchrecord'])){
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM nursing INNER JOIN students ON students.student_id = nursing.student_id WHERE( (students.sname LIKE '%$searchq%')OR (students.fname LIKE'%$searchq%')OR (students.lname LIKE'%$searchq%')OR (students.adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('nursingdep.php?error=No search results were found','_self')</script>";
}
else{
while($row = mysql_fetch_object($query))
{

?>
<tr>
			<form action="" method="POST">

<td align="center"><?php echo $row->sname .'  '.$row->fname .'  '.$row->lname; ?></td><td align="center"><?php echo $row->adm; ?></td><td> <?php echo $row->form;?></td><td><?php echo $row->classname;?></td><td><?php echo $row->dyte;?></td><td><input type="text" name="status" value="<?php echo $row->status;?>" required="required"> </td><td><input type="radio" name="id" value="<?php echo $row->nursing_id; ?>" required="required"></td><td><input type="submit" name="subsave" value="save" ></td> <td><a href="nursingdep.php?del=<?php echo $row->nursing_id;?>" onClick="return confirm ('You are About to delete this record ')">Delete</a></td></tr>
			</form>

<?php

}

}

}

?>
</form>
            </table>
			<?php if(isset($_POST['subsave'])){
			$status=$_POST['status'];
$id=$_POST['id'];			
			$sq="update nursing set status='$status' where nursing_id='$id'";
			$ru=mysql_query($sq);
			if($ru){echo"<script>window.open('nursingdep.php?success=Health Status Successfully updated','_self')</script>";
}
else
{echo"<script>window.open('nursingdep.php?error=Unable to update health status at this time','_self')</script>";
}
			}
			if(isset($_GET['del'])){
			$id=$_GET['del'];
			
			$sql="delete from nursing where nursing_id='$id'";
			$run=mysql_query($sql);
			if($run){
			echo"<script>window.open('nursingdep.php?success=Health Record Successfully deleted','_self')</script>";
			}
			else
{echo"<script>window.open('nursingdep.php?error=Unable to Delete health record at this time','_self')</script>";
}
			}
			?>
			</div>
			
			<div id="view3">
			<table id="res" width="900px">
 <tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>Date</th><th>Health Status</th></tr>
 <?php
 
 $query=mysql_query("SELECT * FROM nursing INNER JOIN students ON students.student_id = nursing.student_id ") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('nursingdep.php?error=No search results were found','_self')</script>";
}
else{
while($row = mysql_fetch_object($query))
{

?>
<tr>

<td align="center"><?php echo $row->sname .'  '.$row->fname .'  '.$row->lname; ?></td><td align="center"><?php echo $row->adm; ?></td><td> <?php echo $row->form;?></td><td><?php echo $row->classname;?></td><td><?php echo $row->dyte;?></td>
<td><?php echo $row->status;?></td></tr>

<?php

}

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