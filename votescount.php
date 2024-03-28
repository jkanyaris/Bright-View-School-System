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
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 </section>
 </header>
 <form action="votescount.php" method="post">
 <nav id="ddmenu">
<ul>
<li class="full-width">
<li class="no-sub"><a class="top-heading" href="admission.php">Admission</a></li>
<li class="no-sub"><a class="top-heading" href="subcand.php">Create Election</a></li>
     <li class="no-sub"><a class="top-heading" href="preview.php">Preview</a></li>

   	<li class="no-sub"><a class="top-heading" href="electionedit.php">Election Edit</a></li>
<li><a class="top-heading" href="viewelectionresults.php">View Election Results</a></li>
  <li class="no-sub"><a class="top-heading" href="voters.php">View Voters</a></li>

<li>
		  <span class="top-heading">Sort by Posts</span>
			<i class="caret"></i>           
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <div class="column">
                        <h4>Posts</h4>
                       <input type="submit" name="schcapt" value="School capt" style="width:150px;"><br/>
						<input type="submit" name="ast_sch_capt" value="Ast sch capt"style="width:150px;"><br/>
                        <input type="submit" name="dhcapt" value="Dh capt"style="width:150px;"><br/>
						<input type="submit" name="ast_dh_capt" value="Ast Dh capt"style="width:150px;"><br/>
						<input type="submit" name="compcapt" value="Compound capt"style="width:150px;"><br/>
						<input type="submit" name="ast_comp_capt" value="Ast comp capt"style="width:150px;"><br/>
						<input type="submit" name="libcapt" value="Library capt"style="width:150px;"><br/>


               
                    </div>
                    <div class="column">
					<h4>Posts</h4>
					      <input type="submit" name="ast_lib_capt" value="Ast lib capt" style="width:150px;"><br/>
						<input type="submit" name="labcapt" value="Lab capt"style="width:150px;"><br/>
                        <input type="submit" name="ast_lab_capt" value="Ast lab capt"style="width:150px;"><br/>
						<input type="submit" name="timecapt" value="Time keeper"style="width:150px;"><br/>
						<input type="submit" name="ast_time_capt" value="Ast time keeper"style="width:150px;"><br/>
						<input type="submit" name="entcapt" value="Entertainment"style="width:150px;"><br/>

               
                    </div>
					 <div class="column">
					<h4>Posts</h4>
					    <input type="submit" name="ast_ent_capt" value="Ast Ent capt" style="width:150px;"><br/>
						<input type="submit" name="gamescapt" value="Games capt"style="width:150px;"><br/>
						<input type="submit" name="ast_games_capt" value="Ast Games capt"style="width:150px;"><br/>

						<input type="submit" name="alphacapt" value="Alpha capt"style="width:150px;"><br/>
                        <input type="submit" name="ast_alpha_capt" value="Ast Alpha capt"style="width:150px;"><br/>
						<input type="submit" name="thetacapt" value="Theta capt"style="width:150px;"><br/>

						
               
                    </div>
					 <div class="column">
					<h4>Posts</h4>
						<input type="submit" name="ast_theta_capt" value="Ast Theta capt"style="width:150px;"><br/>
					<input type="submit" name="omegacapt" value="Omega capt"style="width:150px;"><br/>
						<input type="submit" name="ast_omega_capt" value="Ast Omega capt"style="width:150px;"><br/>
                        <input type="submit" name="gamacapt" value="Gama Capt"style="width:150px;"><br/>
						<input type="submit" name="ast_gama_capt" value="Ast gama capt"style="width:150px;"><br/>
						<input type="submit" name="sigmacapt" value="Sigma capt"style="width:150px;"><br/>
						<input type="submit" name="ast_sigma_capt" value="Ast sigma capt"style="width:150px;"><br/>

               
                    </div>
                </div>
 </div>
</li>



                
</li>
</ul>
</nav>
</form>
<?php
if(isset($_POST['schcapt'])){  echo'<center><font size="5" color="brown" ><b>School captain votes cast</b></font></center>';}

if(isset($_POST['ast_sch_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast School captain votes cast</b></font></center>';}

if(isset($_POST['dhcapt'])){  echo'<center><font size="5" color="brown" ><b>DH captain votes cast</b></font></center>';}

if(isset($_POST['ast_dh_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast DH captain votes cast</b></font></center>';}

if(isset($_POST['compcapt'])){  echo'<center><font size="5" color="brown" ><b>Compound captain votes cast</b></font></center>';}

if(isset($_POST['ast_comp_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast compound captain votes cast</b></font></center>';}

if(isset($_POST['libcapt'])){  echo'<center><font size="5" color="brown" ><b>Library captain votes cast</b></font></center>';}

if(isset($_POST['ast_lib_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast library captain votes cast</b></font></center>';}

if(isset($_POST['labcapt'])){  echo'<center><font size="5" color="brown" ><b>Lab captain votes cast</b></font></center>';}

if(isset($_POST['ast_lab_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast lab captain votes cast</b></font></center>';}

if(isset($_POST['timecapt'])){  echo'<center><font size="5" color="brown" ><b>Time Keeper votes cast</b></font></center>';}

if(isset($_POST['ast_time_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast time keeper votes cast</b></font></center>';}

if(isset($_POST['gamescapt'])){  echo'<center><font size="5" color="brown" ><b>Games captain votes cast</b></font></center>';}
if(isset($_POST['ast_games_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast Games captain votes cast</b></font></center>';}

if(isset($_POST['alpha capt'])){  echo'<center><font size="5" color="brown" ><b>Alpha captain votes cast</b></font></center>';}

if(isset($_POST['ast_alpha_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast Alpha captain votes cast</b></font></center>';}

if(isset($_POST['thetacapt'])){  echo'<center><font size="5" color="brown" ><b> Theta captain votes cast</b></font></center>';}

if(isset($_POST['ast_theta_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast Theta captain votes cast</b></font></center>';}

if(isset($_POST['omegacapt'])){  echo'<center><font size="5" color="brown" ><b>Omega captain votes cast</b></font></center>';}

if(isset($_POST['ast_omega_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast Omega captain votes cast</b></font></center>';}

if(isset($_POST['gamacapt'])){  echo'<center><font size="5" color="brown" ><b> Gama captain votes cast</b></font></center>';}

if(isset($_POST['ast_gama_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast Gama captain votes cast</b></font></center>';}

if(isset($_POST['sigmacapt'])){  echo'<center><font size="5" color="brown" ><b>Sigma captain votes cast</b></font></center>';}

if(isset($_POST['ast_sigma_capt'])){  echo'<center><font size="5" color="brown" ><b>Ast Sigma captain votes cast</b></font></center>';}



 ?>
<section id='main'>

<fieldset style="margin:0 auto; margin-top:20px;border-radius:5px; width:700px;">
<table border="1px" style="border-spacing:0px; width:600px;margin:0 auto;">
<tr><th>Count</th><th>Voter Adm</th><th>Post</th><th>Candidate</th></tr>
<?php
require('connect.php');
if(isset($_POST['schcapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='schcapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>

<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}
 
 if(isset($_POST['ast_sch_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_sch_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}
 
 if(isset($_POST['dhcapt'])){
$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='dhcapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}
 

 
 if(isset($_POST['ast_dh_capt'])){
$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_dh_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}
 
 if(isset($_POST['libcapt'])){
 
$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='libcapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}
 
 if(isset($_POST['ast_lib_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_lib_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 
 if(isset($_POST['labcapt'])){
$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='labcapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 
 if(isset($_POST['ast_lab_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_lab_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 
 if(isset($_POST['timecapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='timecapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

  
 if(isset($_POST['compcapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='compcapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

   if(isset($_POST['ast_comp_capt'])){
 $sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_comp_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_time_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_time_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['entcapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='entcapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_ent_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_ent_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 if(isset($_POST['gamescapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='gamescapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

  if(isset($_POST['ast_games_capt'])){
$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_games_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['alphacapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='alphacapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_alpha_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_alpha_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 if(isset($_POST['thetacapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='theta_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_theta_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_theta_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['omegacapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='omegacapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_omega_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_omega_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['gamacapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='gamacapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_gama_capt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_gama_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['sigmacapt'])){

$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='sigmacapt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}

 
 if(isset($_POST['ast_sigma_capt'])){
$sql="select * from votescount inner join election on election.post_id=votescount.post where election.post='ast_sigma_capt' ";
$run=mysql_query($sql);
$count=1;
while($obj=mysql_fetch_object($run)){


$cand1=$obj->candidate;


$q="select adm from students where student_id='$cand1'";
$r=mysql_query($q);
$ob=mysql_fetch_object($r);

$adm=$ob->adm;

?>
<tr><td><?php echo $count; $count++;?></td><td><?php echo $obj->voter;?></td><td><?php echo $obj->post;?></td><td><?php echo $adm;?></td></tr>


 <?php }}
?>
 
 

</table>
</fieldset>



</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>