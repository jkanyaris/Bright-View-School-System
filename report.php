<?php 
require('connect.php');
session_start();
if(!$_SESSION['teaching']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['teaching'];
$sq="select id_staff from staff where username='$username'";
$ru=mysql_query($sq);
$ob=mysql_fetch_object($ru);
$staff_id=$ob->id_staff;

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
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a><font color="white" size="4" style="margin-left:250px;">Duty report and Disciplinary</font> 
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

 <section style="margin-left:500px;"><font color="green" size="4.5" ><?php echo @$_GET['success']; ?></font>
 <font color="red" size="4.5"><?php echo @$_GET['error']; ?></font>
 </section>
 <div id="tab"style="width: 1000px; margin: 0 auto; padding: 10px 0 40px;">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Submit report </a></li>
            <li><a href="#view2">View report</a></li>
           
		
        </ul>
        <div class="tabcontents">
		<div id="view1">
		<fieldset style="width:900px;  border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;">
<form action="" method="post"> 
		<input type="text" name="search" placeholder="Enter name/Adm " required="required"><input type="submit" name="searchstd" value="Search">
</form>
<br/><br/>

<form action="" method="POST">
		
		<?php if(isset($_POST['searchstd']))
{
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM students WHERE( (sname LIKE '%$searchq%')OR (fname LIKE'%$searchq%')OR (lname LIKE'%$searchq%')OR (adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('report.php?error=No search results were found','_self')</script>";
}
else{
echo ' <textarea name="desc" placeholder="Enter brief report" style="width:300px;"required="required"></textarea><br/><input type="submit" name="submit" value="Submit">
<fieldset style="width:830px; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">Search Results</legend>
						    <table id="book" border="1" style="border-spacing:0;width:800px;">
 <tr><th>Passport</th><th>Surname</th><th>Firstname</th><th>Lastname</th><th>Adm no.</th><th>form</th><th>Classname</th><th>Select</th></tr>
						   ';
while($row = mysql_fetch_object($query))
{

?>
<tr><td><img src="students/<?php echo $row->passport;?>" width="100" height="100"></td><td align="center"><?php echo $row->sname; ?></td><td align="center"><?php echo $row-> fname;?></td>
<td align="center"><?php echo $row->lname; ?></td><td align="center"><?php echo $row->adm; ?></td><td align="center"><?php echo $row->form; ?></td><td align="center"><?php echo $row->classname; ?></td>
<td><input type="radio" name="student" value="<?php echo $row->student_id;?>" required="required"></td></tr>
<?php

}

}

}

?>
	</table>
	<?php 
	if(isset($_POST['submit'])){
	$std_id=$_POST['student'];
	$desc=$_POST['desc'];
	$sql="insert into report(id_staff,student_id,report,dyte) values('$staff_id','$std_id','$desc',CURRENT_TIMESTAMP) ";
	$run=mysql_query($sql);
	if($run){
	echo"<script>window.open('report.php?success=Report has been submitted successfully','_self')</script>";
	
	}
	else{
		echo"<script>window.open('report.php?error=Sorry. Could not submit report at this time','_self')</script>";

	
	}
	
	}
	
	?>
			</fieldset>
		</fieldset>
		
		</form>
		


            </div>
			
			
            <div id="view2">
			<form action="" method="post">
			<input type="text" name="search" placeholder="Enter username/name/Adm/"><input type="submit" name="viewrep" value="Search Report">
			</form>
			<form action="" method="post">

			<?php if(isset($_POST['viewrep']))
{
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM report INNER JOIN students ON students.student_id=report.student_id INNER JOIN staff ON staff.id_staff=report.id_staff WHERE( (students.sname LIKE '%$searchq%')OR (students.fname LIKE'%$searchq%')OR (students.lname LIKE'%$searchq%')OR (students.adm LIKE'%$searchq%')OR (staff.username LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('report.php?error=No search results were found','_self')</script>";
}
else{
echo ' <fieldset style="width:930px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">Search Results</legend>
						   <table id="book" border="1" style="border-spacing:0;width:930px;">
 <tr><th>Passport</th><th>Student Name</th><th>Adm no.</th><th>form</th><th>Classname</th><th>Date</th><th>Report</th><th>Staff</th><th>Edit</th><th>Del</th></tr>
						   ';
while($row = mysql_fetch_object($query))
{
?>
<tr><td><img src="students/<?php echo $row->passport;?>" width="50" height="50"></td><td align="center"><?php echo $row->sname .'  '.$row->fname .'  '.$row->lname; ?></td>
<td align="center"><?php echo $row->adm; ?></td><td align="center"><?php echo $row->form; ?></td><td align="center"><?php echo $row->classname; ?></td>
<td><?php echo $row->dyte;?></td><td><?php echo $row->report ;?></td><td><?php echo $row->username;?></td>
<td><a href="report.php?edit=<?php echo $row->report_id;?>">Edit</a></td>
<td><a href="report.php?del=<?php echo $row->report_id;?>"onclick="return confirm('You are about to delete this report')">Del</a></td></tr>
<?php

}

}

}

?>
	</table>
			</fieldset>
			</form>
			
		 <form action="" method="post">
<?php 
 if(isset($_GET['edit'])){
 echo'<fieldset style="margin-top:20px;height:50px;width:900px;border-radius:4px;">';
 $id=$_GET['edit'];
 $sql="select report from report where report_id='$id'";
 $run=mysql_query($sql);
 $res=mysql_fetch_object($run);

?> 
<table border="1"style="width:900px;border-spacing:0;" id="book" >
   <input size="10"type="hidden" name="id" value="<?php echo $id; ?>">
<td><textarea name="desc" placeholder="Enter brief report" style="width:300px;"required="required"><?php echo $res->report;?></textarea></td>			
<td><input type="submit" name="update" Value="Update"></td>
</tr>  
</table> 

</fieldset>
<?php } ?>
</form>
<?php 
if(isset($_POST['update'])){
$id=$_POST['id'];
$report=$_POST['desc'];
$sql="update report set report='$report',dyte=CURRENT_TIMESTAMP where report_id='$id'";
$run=mysql_query($sql);
if($run){
echo"<script>window.open('report.php?success=Record Updated successfully','_self')</script>";

}
else{
echo"<script>window.open('report.php?error=Unable to  Update record at this time','_self')</script>";
}
}
 
 if(isset($_GET['del'])){
$del=$_GET['del'];
$sql="delete from report where report_id='$del'";
$run=mysql_query($sql);
 if($run){
echo"<script>window.open('report.php?success=Record Deleted successfully','_self')</script>";

}
else{
echo"<script>window.open('report.php?error=Unable to  Delete record at this time','_self')</script>";
}
 }
?>

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