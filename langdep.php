<?php 
require('connect.php');
session_start();
if(!$_SESSION['languages']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['languages'];

?>
<!DOCTYPE html>
<html>
<head>
<title>bright View school</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #999 center 0px; padding-top:0px;}
		#body{background: #ccc center 0px; padding-top:0px;}
		#book th{background:#AAD4FF;}
			#book tr:nth-child(odd) td{background:#eee;}
						#table{margin:0 auto;background:#333;box-shadow: 5px 5px 5px #888888;border-radius:10px;color:#CCC;padding:10px;}
#table1{margin:0 auto;}
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a></font><font color="white" size="4" style="margin-left:250px;">Welcome to Languages Department</font> 
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
			 <li><a href="#view1">Search Books</a></li>
			             <li><a href="#view2">Allocate Books </a></li>

            <li><a href="#view3">Clear Book</a></li>
			<li><a href="#view4">Upload revision materials</a></li>
			
        </ul>
        <div class="tabcontents">
		<div id="view1">
<form action="" method="post">
			
			<select name="form" style="border-radius:4px;border:1px solid grey;margin-left:50px;"required="required" >
			<option value="">Form</option>
			<option value="1">Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select>
<input type="text" name="name" placeholder="Enter Book name" style="border-radius:4px;border:1px solid grey;" required="required">
<input type="submit" name="search" value="Search">
</form>
			<?php 
require("connect.php");
if(isset($_POST['search'])){
$form=$_POST['form'];
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM books WHERE ((name LIKE '%$searchq%')and(form='$form') and ((subject='Eng') or(subject='Kis'))) ") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('langdep.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">'.$count.'  <font color="black">Books in total</font></legend>
';       
echo "<table border='1' id='book' style=' border-spacing:0px;width:800px;margin:0 auto;'><tr><th>Name</th><th>Initial</th><th>Subject</th><th>Book No.</th><th>Year</th><th>Form</th></tr>";
while($row=mysql_fetch_object($query)){


?>

<tr><td><?php echo $row->name; ?></td><td><?php echo $row->initial;?></td><td><?php echo $row->subject ;?></td><td><?php echo $row->bookno;?></td>
<td><?php echo $row->year;?></td><td><?php echo $row->form; ?></td>
</tr>

<?php }
}
}?>


			</table>
</fieldset>
            </div>
			
			
            <div id="view2">
			
			<form action="" method="post">		
<input type="text" name="name" placeholder="Enter student name/adm" style="border-radius:4px;border:1px solid grey;" required="required">
<input type="submit" name="searchstd" value="Search Student">
</form>
<br/><br/><br/>
<form action="" method="post">	

			
<input type="text" name="name" placeholder="Enter Book name" style="border-radius:4px;border:1px solid grey;" required="required">
<input type="submit" name="searchbk" value="Search Book"><br/>
<select name="form" style="border-radius:4px;border:1px solid grey;"required="required" >
			<option value="">Form</option>
			<option value="1">Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select>
<?php if(isset($_POST['searchstd']))
{
$searchq=$_POST['name'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM students WHERE( (sname LIKE '%$searchq%')OR (fname LIKE'%$searchq%')OR (lname LIKE'%$searchq%')OR (adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('langdep.php?error=No search results were found','_self')</script>";
}
else{
echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
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
			</fieldset>
			
			

</form>
		
						<?php 
require("connect.php");
if(isset($_POST['searchbk'])){
$student=$_POST['student'];
$_SESSION['std']=$student;
$form=$_POST['form'];
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM books WHERE ((name LIKE '%$searchq%')and(form='$form') and((subject='Eng')or(subject='Kis'))) ") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('langdep.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">Books in available</legend>
';       
echo "<table border='1' id='book' style=' border-spacing:0px;width:800px;margin:0 auto;'><tr><th>Name</th><th>Initial</th><th>Subject</th><th>Book No.</th><th>Year</th><th>Form</th><th>Option</th></tr>";
while($row=mysql_fetch_object($query)){

$book_id=$row->book_id;
$sq="select * from book_allocation where book_id='$book_id'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){}
else{
?>

<tr><td><?php echo $row->name; ?></td><td><?php echo $row->initial;?></td><td><?php echo $row->subject ;?></td><td><?php echo $row->bookno;?></td>
<td><?php echo $row->year;?></td><td><?php echo $row->form; ?></td><td><a href="langdep.php?book=<?php echo $row->book_id; ?>">Allocate</a></td>
</tr>

<?php }}
}
}?>


			</table>
			<?php 
			if(isset($_GET['book'])){
			$book_id=$_GET['book'];
			$std=$_SESSION['std'];
			$date=date("d/m/Y");
			$sq="select name,form from books where book_id='$book_id'";
			$run=mysql_query($sq);
			$obj=mysql_fetch_object($run);
			$name=$obj->name;
			$form=$obj->form;
			$query="select * from book_allocation inner join books on books.book_id=book_allocation.book_id where ((books.name='$name')and(books.form='$form')and(book_allocation.student_id='$std')) ";
			$ru=mysql_query($query);
			
			if(mysql_num_rows($ru)>0){
			echo"<script>window.open('langdep.php?error=The student already has the same type of the book','_self')</script>";
			}
			else{
			$sq1="insert into book_allocation(student_id,book_id,dyte) values('$std','$book_id','$date')";
			$ru1=mysql_query($sq1);
			if($ru1){
			echo"<script>window.open('langdep.php?success=Book allocated successfully to selected student','_self')</script>";

			}
			else{
						echo"<script>window.open('langdep.php?error=Unable to allocate the book at this time','_self')</script>";

			
			}
			}
			}
			
			?>
            </div>
			<div id="view3">
			<form action="" method="post">
               <input type="text" name="name" placeholder="Enter adm/name" style="margin-left:50px; border-radius:4px;border:1px solid grey;">
<input type="submit" name="searchcl" value="Search">
</form>
			<?php 
require("connect.php");
if(isset($_POST['searchcl'])){
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("select * from book_allocation inner join students on students.student_id=book_allocation.student_id inner join books on books.book_id=book_allocation.book_id 
where(( (students.sname LIKE '%$searchq%')OR (students.fname LIKE'%$searchq%')OR (students.lname LIKE'%$searchq%')OR (students.adm LIKE'%$searchq%'))and((books.subject='Eng')or(books.subject='Kis')))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('langdep.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">Book(s)allocated to the student</font></legend>
';       
echo "<table border='1' id='book' style=' border-spacing:0px;width:800px;margin:0 auto;'><tr><th>Name</th><th>Initial</th><th>Subject</th><th>Book No.</th><th>Year</th><th>Adm no.</th><th>Form</th><th>Option</th></tr>";
while($row=mysql_fetch_object($query)){
$nam=$row->name;


?>

<tr><td><?php echo $row->name; ?></td><td><?php echo $row->initial;?></td><td><?php echo $row->subject ;?></td><td><?php echo $row->bookno;?></td>
<td><?php echo $row->year;?></td><td><?php echo $row->adm?></td><td><?php echo $row->form; ?></td><td><a href="langdep.php?clear=<?php echo $row->allocation_id;?>" onClick="return confirm('Are you sure this is the right student')">Clear</a></td>
</tr>

<?php 
}
}
}?>
</table>
</fieldset>
<?php 
if(isset($_GET['clear'])){
$id=$_GET['clear'];
$sql="delete from book_allocation where allocation_id='$id'";
$run=mysql_query($sql);
 if($run){
 
 echo"<script>window.open('langdep.php?success=You have cleared the student successfully','_self')</script>";

 }
 else{
   echo"<script>window.open('langdep.php?error=Unable to clear the student at this time','_self')</script>";

 
 }

}

?>
            </div>
			<div id="view4">
						<h3><p align="center">Upload Revision Materials</p></h3>	
<form enctype="multipart/form-data" action="" name="form" method="post">
<table border="0" cellspacing="0" cellpadding="5" id="table">
<tr>
<th >Choose File</th>
<td ><label for="photo"></label>
<input type="file" name="photo" id="photo" required="required" /></td><br/>
<td><input type="text" name="nam" placeholder="Enter file description" required="required"></td><br/>
<td><select name="form" style="border-radius:4px;border:1px solid grey;"required="required">
			<option value="">Form</option>
			<option value="1">Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select></td>
</tr>
<tr>
<td><select name="sub" style="border-radius:4px;border:1px solid grey;"required="required">
			<option value="">Subject</option>
			<option value="Mathematics">Mathematics</option>
			<option value="English">English</option>
			<option value="Kiswahili">Kiswahili</option>
			<option value="Biology">Biology</option>
			<option value="Chemistry">Chemistry</option>
			<option value="Physics">Physics</option>
			<option value="Geography">Geography</option>
			<option value="History">History</option>
			<option value="Business Studies">Business Studies</option>
			<option value="Computer Studies">Computer Studies</option>
			<option value="Agriculture">Agriculture</option>
			<option value="Cre">Cre</option>
			</select></td>
			
	<td><select name="term" style="border-radius:4px;border:1px solid grey;"required="required">
	<option value="">Term</option>
	<option value="1">Term 1</option>
	<option value="2">Term 2</option>
	<option value="3">Term 3</option>
	
	</select></td>

</tr>
<tr><td style="height:40px;"></td></tr>

<tr>
<th colspan="2" scope="row"><input type="submit" name="submit" id="submit" value="Submit" /></th>
</tr>
</table>
</form>
<?php 
if(isset($_POST['submit'])!=""){
$nam=$_POST['nam'];
$date=date("d/m/Y");
$form=$_POST['form'];
$sub=$_POST['sub'];
$term=$_POST['term'];
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];

move_uploaded_file($temp,"files/".$name);
$insert=mysql_query("insert into upload(dyte,term,name,nam,subject,form) values('$date','$term','$name','$nam','$sub','$form')");
if($insert){
echo"<script>window.open('langdep.php?success=You have have uploaded the file successfully','_self')</script>";
}
else{
echo"<script>window.open('langdep.php?error=Could not upload the file at this time','_self')</script>";

}
}



?>
			</div>
        </div>
    </div>

<div id="footer" style="margin-top:300px;">
<center><footer>Bright View Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>