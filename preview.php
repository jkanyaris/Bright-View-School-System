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
        body { background: #eee  no-repeat center 0px; padding-top:0px;}
		#body{background: #fcfff4;
background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 0%, #b3bead 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(0%,#dfe5d7), color-stop(100%,#b3bead));
background: -webkit-linear-gradient(top, #fcfff4 0%,#dfe5d7 0%,#b3bead 100%);
background: -o-linear-gradient(top, #fcfff4 0%,#dfe5d7 0%,#b3bead 100%);
background: -ms-linear-gradient(top, #fcfff4 0%,#dfe5d7 0%,#b3bead 100%);
background: linear-gradient(top, #fcfff4 0%,#dfe5d7 0%,#b3bead 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );}
	#main{width:1000px;
	height:600px;
	border:1px solid grey;
	background:white;
	margin:0 auto;
	margin-top:20px;
overflow-x:hidden;overflow-y:scroll;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
margin-bottom:50px;}
#legend{width:300px; border-radius:3px; border:1px solid grey;
box-shadow:rgba(0, 0, 0 ,0.4) 0px  5px 5px;
color:white;
font-size:17px;
font-family:lucida calligraphy;
background: #45484d;
background: -moz-linear-gradient(top, #45484d 0%, #000000 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#45484d), color-stop(100%,#000000));
background: -webkit-linear-gradient(top, #45484d 0%,#000000 100%);
background: -o-linear-gradient(top, #45484d 0%,#000000 100%);
background: -ms-linear-gradient(top, #45484d 0%,#000000 100%);
background: linear-gradient(top, #45484d 0%,#000000 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 );


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
   <li class="no-sub"><a class="top-heading" href="admission.php">Admission</a></li>
<li class="no-sub"><a class="top-heading" href="subcand.php">Create Election</a></li>
   <li class="no-sub"><a class="top-heading" href="electionedit.php">Election Edit</a></li>
<li><a class="top-heading" href="viewelectionresults.php">View Election Results</a></li>
 <li class="no-sub"><a class="top-heading" href="votescount.php">Votes count</a></li>
  <li class="no-sub"><a class="top-heading" href="voters.php">View Voters</a></li>



                
</li>
</ul>
</nav>
<center><font size="5" color="brown" ><b>Vote Panel Preview</b></font></center>
<form action="votessubmit.php" method="post">

<?php
require('connect.php');
$sql="select * from election";
$run=mysql_query($sql);
while($res=mysql_fetch_object($run)){
$adm1=$res->cand1;
$adm2=$res->cand2;
$adm3=$res->cand3;
$post=$res->post;


$sq1="select * from students where student_id='$adm1'";
$ex1=mysql_query($sq1);
$res1=mysql_fetch_object($ex1);
$name1=$res1->sname .'   '.$res1->fname .'   '.$res1->lname;
$image1=$res1->passport;
$class1=$res1->form .$res1->classname;
$ad1=$res1->adm;

$sq2="select * from students where student_id='$adm2'";
$ex2=mysql_query($sq2);
$res2=mysql_fetch_object($ex2);
$name2=$res2->sname .'   '.$res2->fname .'   '.$res2->lname;
$image2=$res2->passport;
$class2=$res2->form .$res2->classname;
$ad2=$res2->adm;
$sq3="select * from students where student_id='$adm3'";
$ex3=mysql_query($sq3);
$res3=mysql_fetch_object($ex3);
$name3=$res3->sname .'   '.$res3->fname .'   '.$res3->lname;
$image3=$res3->passport;
$class3=$res3->form .$res3->classname;
$ad3=$res3->adm;
?>
<fieldset id="field" style="border-radius:5px; width:1000px;margin:0 auto;">
<legend id="legend">
<?php 
if($post=='schcapt'){echo"School Captain";}
if($post=='ast_sch_capt'){echo"Ast. School Captain";}
if($post=='dhcapt'){echo"Dining Hall Captain";}
if($post=='ast_dh_capt'){echo"Ast. Dining Hall Captain";}
if($post=='compcapt'){echo"Compound Captain";}
if($post=='ast_comp_capt'){echo"Ast. Compound Captain";}
if($post=='libcapt'){echo"Library Captain";}
if($post=='ast_lib_capt'){echo"Ast Library Captain";}
if($post=='labcapt'){echo"Laboratory Captain";}
if($post=='ast_lab_capt'){echo"Ast. Laboratory Captain";}
if($post=='entcapt'){echo"Entertainment Captain";}
if($post=='ast_ent_capt'){echo"Ast. Entertainment Captain";}
if($post=='timecapt'){echo"Time Keeper";}
if($post=='ast_time_capt'){echo"Ast. Time Keeper";}
if($post=='gamescapt'){echo"Games Captain";}
if($post=='ast_games_capt'){echo"Ast. Games Captain";}
if($post=='alphacapt'){echo"Alpha Captain";}
if($post=='ast_alpha_capt'){echo"Ast. Alpha Captain";}
if($post=='theta_capt'){echo"Theta Captain";}
if($post=='ast_theta_capt'){echo"Ast Theta Captain";}
if($post=='omegacapt'){echo"Omega Captain";}
if($post=='ast_omega_capt'){echo"Ast Omega Captain";}
if($post=='gamacapt'){echo"Gama Captain";}
if($post=='ast_gama_capt'){echo"Ast gama Captain";}
if($post=='sigmacapt'){echo"Sigma Captain";}
if($post=='ast_sigma_capt'){echo"Ast sigma Captain";}



?>
</legend>
<table  style="border-spacing:0px;margin:0 auto; width:1000px;">
<tr><td style="width:400px;"><img src="students/<?php echo $image1; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image2; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image3; ?>" height="100" width="100"></td>
</tr>
<tr><td><?php echo $name1?></td><td><?php echo $name2;2?></td><td><?php echo $name3;?></td></tr>
<tr><td><?php echo $ad1?></td><td><?php echo $ad2;?></td><td><?php echo $ad3;?></td></tr>
<tr><td><?php echo $class1?></td><td><?php echo $class2;?></td><td><?php echo $class3;?></td></tr>

</table>
</fieldset>
<?php 

}
?>

<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>