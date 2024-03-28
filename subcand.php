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
        body { background: #999 no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc no-repeat center 0px; padding-top:0px;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 </section>
 </header>
 <style type="text/css">
	#res{width:1100px; margin-top:10px;margin-bottom:200px;}	
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
 <nav id="ddmenu">
<ul>
<li class="full-width">
<li class="full-width">
<li class="no-sub"><a class="top-heading" href="admission.php">Admission</a></li>
   	<li class="no-sub"><a class="top-heading" href="electionedit.php">Election Edit</a></li>
		  <li class="no-sub"><a class="top-heading" href="Preview.php">Preview</a></li>

	  <li class="no-sub"><a class="top-heading" href="voters.php">View Voters</a></li>
<li><a class="top-heading" href="viewelectionresults.php">View Election Results</a></li>
 
</ul>
</nav>
 <center><font color="red" size="4"><?php echo @$_GET['erro']; ?></font><font color="green" size="4"><?php echo @$_GET['succes']; ?></font></center>

 <form action="subcand.php" method="post">
<fieldset style="border-radius:5px; margin-top:20px; height:200px;background:#7FAAFF;">
<legend style="border-radius:4px; width:200px; height:30px; border:1px solid grey;background:#E1E1E1">Select Election Period</legend>
<select required="required" name="year" style="border-radius:3px; border:1px solid grey;width:150px; height:25px;margin-top:20px;">
<option value=''>Year</option>
<option Value='2015'>2015</option>
<option Value='2016'>2016</option>
<option Value='2017'>2017</option>
<option Value='2018'>2018</option>
<option Value='2019'>2019</option>
<option Value='2020'>2020</option>
</select>

<select name="month" style="border-radius:3px; border:1px solid grey;width:150px; margin-left:50px; height:25px;margin-top:20px;">
<option value=''>Month</option>
<option value='January'>January</option>
<option value='February'>February</option>
<option value='March'>March</option>
<option value='April'>April</option>
<option value='May'>May</option>
<option value='June'>June</option>
<option value='July'>July</option>
<option value='August'>August</option>
<option value='September'>September</option>
<option value='October'>October</option>
<option value='November'>November</option>
<option value='December'>December</option>
</select>
<select name="term" style="border-radius:3px; margin-left:50px; border:1px solid grey;width:150px; height:25px;margin-top:20px;">
<option value=''>Term</option>
<option value='1'>Term 1</option>
<option value='2'>Term 2</option>
<option value='3'>Term 3</option>
</select>
<br/><br/><br/><br/>
<input type="submit" style="border-radius:2px; height:25px;" value="Submit" name="election">

</fieldset>
</form>
<?php 
require('connect.php');
if(isset($_POST['election'])){
$year=$_POST['year'];
$month=$_POST['month'];
$date=date("d/m/Y");
$term=$_POST['term'];
$sq2="select * from election";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)>0){
 echo"<script>window.open('subcand.php?erro=You have not cleared previous election','_self')</script>";

}
else{
$post=array("schcapt","ast_sch_capt","dhcapt","ast_dh_capt","compcapt","ast_comp_capt",
"libcapt","ast_lib_capt","labcapt",
"ast_lab_capt","timecapt","ast_time_capt","gamescapt","ast_games_capt","entcapt","ast_ent_capt",
"alphacapt","ast_alpha_capt",
"theta_capt","ast_theta_capt","omegacapt","ast_omega_capt","gamacapt",
"ast_gama_capt","sigmacapt","ast_sigma_capt");
$sql="select * from election where ((term='$term') and(month='$month') and (year='$year'))";
$run=mysql_query($sql);
if(($term==1) && (($month =='May') || ($month =='June') || ($month =='July') ||($month =='August')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('subcand.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();}
 
 if(($term==2) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('subcand.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();}
 if(($term==3) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='May')||($month =='June')||($month =='July')||($month =='August'))){
 echo"<script>window.open('subcand.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();}


for($i=0;$i<26;$i++){
$post_no=$i+1;
$sq="insert into election(term,month,year,dyte,post,post_no) values('$term','$month','$year','$date','$post[$i]','$post_no')";
$ru=mysql_query($sq);
}

if($ru){
echo"<script>window.open('subcand.php?succes=Election Details submitted successfully. Submit aspirants','_self')</script>";
}
else{
echo"<script>window.open('subcand.php?erro=Could not submit election details at this time','_self')</script>";

}
}
}

?>
			<form action="subcand.php" method="post">

							<fieldset style="border-radius:5px; margin-top:20px;">
<legend style="border-radius:4px; width:200px; height:30px; border:1px solid grey;background:#E1E1E1">Select Post and Candidates</legend>

			<input type="text" name="search" style="border-radius:5px; height:20px; border:1px solid grey; width:300px;" placeholder="Enter name or adm no. to search">
		<input type="submit" style="border-radius:5px; height:25px;" value="Search Student" name="searchstd"><br/><br/><br/>

			
			</form>
			
			<form action="subcand.php" method="post">
			<select name="post" style="border-radius:5px; height:20px; border:1px solid grey; width:200px;" required="required">
			<option value="" >Post </option>
			<option value="schcapt">School Captain</option>
			<option value="ast_sch_capt">Ast. Sch Capt</option>
			<option value="dhcapt">Dh Capt</option>
			<option value="ast_dh_capt">Ast Dh Capt</option>
			<option value="compcapt">Compound capt</option>
			<option value="ast_comp_capt">Ast Compound Capt</option>
			<option value="libcapt">Library Capt</option>
			<option value="ast_lib_capt">Ast Library Capt</option>
			<option value="labcapt">Lab Capt</option>
			<option value="ast_lab_capt">Ast Lab Capt</option>
			<option value="timecapt">Time keeper</option>
			<option value="ast_time_capt">Ast Time Keeper</option>
			<option value="gamescapt">Games captain</option>
			<option value="ast_games_capt">Ast Games Capt</option>
			<option value="entcapt">Entertainment capt</option>
			<option value="ast_ent_capt">Ast Ent Capt</option>
			<option value="alphacapt">Alpha Capt</option>
			<option value="ast_alpha_capt">Ast Alpha Capt</option>
			<option value="theta_capt">Theta capt</option>
			<option value="ast_theta_capt">Ast Theta Capt</option>
			<option value="omegacapt">Omega capt</option>
			<option value="ast_omega_capt">Ast Omega Capt</option>
			<option value="gamacapt">Gama Capt</option>
			<option value="ast_gama_capt">Ast Gama Capt</option>
			<option value="sigmacapt">Sigma Capt</option>
			<option value="ast_sigma_capt">Ast Sigma Capt</option>
			</select>
			

						<input type="submit" style="border-radius:5px; height:25px;" value="Submit" name="subcand"><br/>
 <center><font color="red" size="4"><?php echo @$_GET['error']; ?></font><font color="green" size="4"><?php echo @$_GET['success']; ?></font></center>
 <center><section style="margin-top:40px;"><font color="brown" size="4">Search Results</font></section></center>

 <table id="res">
 <tr><th>Passport</th><th>Surname</th><th>Firstname</th><th>Lastname</th><th>Adm no.</th><th>form</th><th>Classname</th><th>Age</th><th>Kcpe</th><th>Select</th></tr>
<?php 
require("connect.php");
if(isset($_POST['search'])){
$searchq=$_POST['search'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM students WHERE( (sname LIKE '%$searchq%')OR (fname LIKE'%$searchq%')OR (lname LIKE'%$searchq%')OR (adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('subcand.php?error=No search results were found','_self')</script>";
}
else{
while($row = mysql_fetch_object($query))
{

?>
<tr><td><img src="students/<?php echo $row->passport;?>" width="100" height="100"></td><td align="center"><?php echo $row->sname; ?></td><td align="center"><?php echo $row-> fname;?></td>
<td align="center"><?php echo $row->lname; ?></td><td align="center"><?php echo $row->adm; ?></td><td align="center"><?php echo $row->form; ?></td><td align="center"><?php echo $row->classname; ?></td>
<td align="center"><?php echo $row->age; ?></td><td align="center"><?php echo $row->kcpe; ?></td><td><input type="radio" name="cand" value="<?php echo $row->student_id;?>" required="required"></td></tr>
<?php

}

}

}

?>
</table>
</fieldset>
</form>

<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php 
if(isset($_POST['subcand'])){
echo $cand=$_POST['cand'];
echo $post=$_POST['post'];
$sq="select * from election where post='$post' ";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$obj=mysql_fetch_object($ru);
$post_id=$obj->post_id;
$sq1="select cand1,cand2,cand3 from election where post='$post' ";
$ru1=mysql_query($sq1);
$ob1=mysql_fetch_object($ru1);
$cand1=$ob1->cand1;
$cand2=$ob1->cand2;
$cand3=$ob1->cand3;
if($cand1==0){
$sql="update election set cand1='$cand' where post='$post'";
$query="insert into votesresult(post_id) values('$post_id')";
$exe=mysql_query($query);
$run=mysql_query($sql);

}

else{
if($cand2==0){
$sql="update election set cand2='$cand' where post='$post'";
$run=mysql_query($sql);
}
else{
if($cand3==0){
$sql="update election set cand3='$cand' where post='$post'";
$run=mysql_query($sql);

}
else{

echo"<script>window.open('subcand.php?error=All 3 candidates are submitted for this post you can make changes in election edit page','_self')</script>";

}
}
}
}



if($run){
echo"<script>window.open('subcand.php?success=Candidate details submitted successfully','_self')</script>";

}
else{
echo"<script>window.open('subcand.php?error=Could not submit candidate details at this time','_self')</script>";
}
}
}
?>
