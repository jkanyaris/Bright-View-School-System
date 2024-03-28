<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['schadmin']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['schadmin'];

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

		#vote th{background:#AAD4FF;}
			#vote tr:nth-child(odd) td{background:#eee;}
			
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 </section>
 </header>
 <form action="" method="post">
 <nav id="ddmenu">
<ul>
<li class="full-width">
<li class="full-width">
<li class="no-sub"><a class="top-heading" href="admission.php">Admission</a></li>
<li class="no-sub"><a class="top-heading" href="subcand.php">Create Election</a></li>
     <li class="no-sub"><a class="top-heading" href="preview.php">Preview</a></li>

   	<li class="no-sub"><a class="top-heading" href="electionedit.php">Election Edit</a></li>
<li><a class="top-heading" href="viewelectionresults.php">View Election Results</a></li>
 <li class="no-sub"><a class="top-heading" href="votescount.php">Votes count</a></li>
	

                
</li>
</ul>
</nav>
<center><section style="margin-top:40px;"><font size="4.5" color="red"><?php echo @$_GET['error'];?></font><font size="4.5" color="green"><?php echo @$_GET['success'];?></font></section></center>
	<input type="text" name="search" style="margin-left:100px;"placeholder="Enter adm no. to search" required="required">
	<input type="submit" name="voters" value="Search">

<?php

require('connect.php');
 if(isset($_POST['voters'])){echo'<center><font size="5" color="brown" ><b>Voter(s) Found</b></font></center>';}
 
 ?>
<section id='main'>
   <?php
   if(isset($_POST['voters'])){
			   $searchq=$_POST['search'];
 
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM votescount  INNER JOIN  students ON students.student_id=votescount.voter INNER JOIN election ON election.post_id=votescount.post WHERE students.adm LIKE '%$searchq%' ") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('voters.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:100px; border:1px solid grey;border-radius:5px;">Results</legend>
';       
echo "<table border='1' id='vote' style=' border-spacing:0px;'><tr><th>Name</th><th>Adm</th><th>Form</th><th>Classname</th><th>Post</th><th>Voting time</th><th>Candidate</th></tr>";
while($row=mysql_fetch_object($query)){
$vote_id=$row->vote_id;
$sq="select * from votescount inner join students on students.student_id=votescount.candidate where votescount.vote_id='$vote_id'";
$ru=mysql_query($sq);
$obj=mysql_fetch_object($ru);

?>

<tr><td><?php echo $row->sname .'   '.$row->fname .'   '.$row->lname; ?></td><td><?php echo $row->adm ;?></td>
<td><?php echo $row->form; ?></td><td><?php echo $row->classname?></td><td><?php echo $row->post;?></td><td><?php echo $row->vote_time; ?></td>
<td><?php echo $obj->sname .'   '.$obj->fname .'   '.$obj->lname; ?></td></tr>

<?php }
}
}?>
</table>
</fieldset>
</form>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>