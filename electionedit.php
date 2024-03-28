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
	height:620px;
	border:1px solid grey;
	background:white;
	margin:0 auto;
	margin-top:10px;
overflow-x:hidden;overflow-y:scroll;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
margin-bottom:50px;}
#legend{width:200; border:1px solid grey; border-radius:5px;
background: #b0d4e3;
background: -moz-linear-gradient(top, #b0d4e3 0%, #88bacf 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b0d4e3), color-stop(100%,#88bacf));
background: -webkit-linear-gradient(top, #b0d4e3 0%,#88bacf 100%);
background: -o-linear-gradient(top, #b0d4e3 0%,#88bacf 100%);
background: -ms-linear-gradient(top, #b0d4e3 0%,#88bacf 100%);
background: linear-gradient(top, #b0d4e3 0%,#88bacf 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 );}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 </section>
 </header>
 <nav id="ddmenu">
<ul>
<li class="full-width">
<li class="full-width">
<li class="no-sub"><a class="top-heading" href="admission.php">Admission</a></li>
<li class="no-sub"><a class="top-heading" href="subcand.php">Create Election</a></li>
     <li class="no-sub"><a class="top-heading" href="preview.php">Preview</a></li>

<li><a class="top-heading" href="viewelectionresults.php">View Election Results</a></li>
 <li class="no-sub"><a class="top-heading" href="votescount.php">Votes count</a></li>
  <li class="no-sub"><a class="top-heading" href="voters.php">View Voters</a></li>
                
</li>
</ul>
</nav>
<?php 
require('connect.php');
$sql="select * from election";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);

?>
<center><section style="margin-top:40px;"><font size="4.5" color="red"><?php echo @$_GET['error'];?></font><font size="4.5" color="green"><?php echo @$_GET['success'];?></font></section></center>
<section id='main'>
<center><font size="5" color="brown" ><b>Edit Election Details</b></font></center>
<fieldset style="border-radius:5px; height:200px;"><legend id="legend">Year Month Term</legend>
<form action="electionedit.php" method="post">
<select required="required" name="year" style="border-radius:3px; border:1px solid grey;width:150px; height:25px;margin-top:20px;">
<option value='<?php echo $obj->year ?>'><?php echo $obj->year;  ?></option>
<option Value='2016'>2016</option>
<option Value='2017'>2017</option>
<option Value='2018'>2018</option>
<option Value='2019'>2019</option>
<option Value='2020'>2020</option>
</select>
<select name="month" style="border-radius:3px; border:1px solid grey;width:150px; margin-left:50px; height:25px;margin-top:20px;">
<option value='<?php echo $obj->month;?>'><?php echo $obj->month;?></option>
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
<option value='<?php echo $obj->term;?>'>Term&nbsp;&nbsp;<?php echo $obj->term;?></option>
<option value='1'>Term 1</option>
<option value='2'>Term 2</option>
<option value='3'>Term 3</option>
</select>
<br/><br/><br/><br/><br/>
<center><input type="submit"  name="savetime" value="Update"></center>
</form>
<?php 
require('connect.php');
if(isset($_POST['savetime'])){
$year=$_POST['year'];
$month=$_POST['month'];
$term=$_POST['term'];


if(($term==1) && (($month =='May') || ($month =='June') || ($month =='July') ||($month =='August')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('electionedit.php?error=The month is invalid for the selected term','_self')</script>";
 exit();}
 
 if(($term==2) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('electionedit.php?error=The month is invalid for the selected term','_self')</script>";
 exit();}
 if(($term==3) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='May')||($month =='June')||($month =='July')||($month =='August'))){
 echo"<script>window.open('electionedit.php?error=The month is invalid for the selected term','_self')</script>";
 exit();}
 else{
 $sql="update election set year='$year',month='$month',term='$term'";
$run=mysql_query($sql);
if($run){

echo "<script>window.open('electionedit.php?success=Updates successful','_self')</script>";
}
else{
echo "<script>window.open('electionedit.php?error=Problem-Could not update at this time','_self')</script>";


}
}
}


?>
</fieldset>

<form action="electionedit.php" method="post">
<fieldset style="border-radius:5px; height:320px;margin-top:20px;"><legend id="legend">Candidates</legend>
<select name="post" style="border-radius:3px;border:1px solid grey; " size="10" required="required">
<option value="schcapt">School captain</option>
<option value='ast_sch_capt'>Assistant School captain</option>
<option value='dhcapt'> DH captain</option>
<option value='ast_dh_capt'> Assistant DH captain</option>
<option value='compcapt'> Compound captain</option>
<option value='ast_comp_capt'> Assistant Compound captain</option>
<option value='libcapt'> Library captain</option>
<option value='ast_lib_capt'> Assistant Library captain</option>
<option value='labcapt'> Lab captain</option>
<option value='ast_lab_capt'> Assistant Lab captain</option>
<option value='gamescapt'> Games captain</option>
<option value='ast_games_capt'> Assistant Games captain</option>
<option value='entcapt'> Entertainment captain</option>
<option value='ast_entcapt'> Assistant Ent captain</option>
<option value='timecapt'> Time keeper</option>
<option value='ast_time_capt'> Assistant time keeper</option>
<option value='alphacapt'> Alpha captain</option>
<option value='ast_alpha_capt'> Assistant Alpha captain</option>
<option value='thetacapt'> Theta captain</option>
<option value='ast_theta_capt'> Assistant theta captain</option>
<option value='omegacapt'> Omega captain</option>
<option value='ast_omega_capt'> Assistant omega captain</option>
<option value='gamacapt'> Gama captain</option>
<option value='ast_gama_capt'> Assistant Gama captain</option>
<option value='sigmacapt'> Sigma captain</option>
<option value='ast_sigma_capt'> Assistant sigma captain</option>

</select>
<br/><br/>
<input type="submit" name="subpost" value="Edit">
</form>
<br/><br/>
<?php 
require('connect.php');
if(isset($_POST['subpost'])){
$post=$_POST['post'];
$sql="select * from election where post='$post'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);

$id=$obj->post_id;
$cand1=$obj->cand1;
$cand2=$obj->cand2;
$cand3=$obj->cand3;

$sq1="select adm from students where student_id='$cand1' ";
$ru1=mysql_query($sq1);
$res1=mysql_fetch_object($ru1);
$adm1=$res1->adm;


$sq2="select adm from students where student_id='$cand2' ";
$ru2=mysql_query($sq2);
$res2=mysql_fetch_object($ru2);
$adm2=$res2->adm;

$sq3="select adm from students where student_id='$cand3' ";
$ru3=mysql_query($sq3);
$res3=mysql_fetch_object($ru3);
$adm3=$res3->adm;

echo'<form action="electionedit.php" method="post"><input type="hidden" name="id" value="'.$id.'"><input type="text" style="margin-right:50px;" name="cand1" value="'.$adm1.'"><input type="text" style="margin-right:50px;" name="cand2" value="'.$adm2.'"><input type="text" name="cand3" value="'.$adm3.'">
<br/><br/><input type="submit" name="updpost" value="Save">';

}


?>
</form>
<?php 
require('connect.php');
if(isset($_POST['updpost'])){
$adm1=$_POST['cand1'];
$adm2=$_POST['cand2'];
$adm3=$_POST['cand3'];
$id=$_POST['id'];

$sq1="select student_id from students where adm='$adm1' ";
$ru1=mysql_query($sq1);

if(mysql_num_rows($ru1)==0){
echo"<script>window.open('electionedit.php?error=Candidate 1 admission number does not exist','_self')</script>";
exit();
}
else{
$res1=mysql_fetch_object($ru1);

$id1=$res1->student_id;}


$sq2="select student_id from students where adm='$adm2' ";
$ru2=mysql_query($sq2);
if(mysql_num_rows($ru2)==0){
echo"<script>window.open('electionedit.php?error=Candidate 2 admission number does not exist','_self')</script>";
exit();
}else{
$res2=mysql_fetch_object($ru2);
$id2=$res2->student_id;
}


$sq3="select student_id from students where adm='$adm3' ";
$ru3=mysql_query($sq3);

if(mysql_num_rows($ru3)==0){
echo"<script>window.open('electionedit.php?error=Candidate 3 admission number does not exist','_self')</script>";
exit();
}
else{
$res3=mysql_fetch_object($ru3);
$id3=$res3->student_id;
}


$sql="update election set cand1='$id1',cand2='$id2',cand3='$id3' where post_id='$id'";
$ex=mysql_query($sql);
if($ex){

echo"<script>window.open('electionedit.php?success=Updates are successful','_self')</script>";

}
else{

echo"<script>window.open('electionedit.php?error=Problem updating records at this time','_self')</script>";

}
}

?>
</fieldset>
</section>

<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>