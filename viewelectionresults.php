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
<meta http-equiv="refresh" content="20">
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #999999  no-repeat center 0px; padding-top:0px;}
		#body{background: #cccccc;
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
 <img src="images/log.jpg" id="log"><center><a href="preview.php" style="color:#FFFFFF">Back</a></center>
 </section>
 </header>

<center><font size="5" color="brown" ><b>Provisional Results</b></font></center>
<?php
require('connect.php');
$sql="select * from votesresult inner join election on election.post_id=votesresult.post_id";
$run=mysql_query($sql);
while($res=mysql_fetch_object($run)){
$post_no=$res->post_no;
$post=$res->post;
$cand1votes=$res->cand1votes;
$cand2votes=$res->cand2votes;
$cand3votes=$res->cand3votes;

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
<table  style="margin:0 auto;">

<?php  if($post_no%2==1){ 
$ast=$post_no+1;
$sql5="select * from votesresult inner join election on election.post_id=votesresult.post_id where election.post_no='$ast'";
$run5=mysql_query($sql5);
$res5=mysql_fetch_object($run5);

$adm11=$res5->cand1;
$adm22=$res5->cand2;
$adm33=$res5->cand3;
$cand11votes=$res5->cand1votes;
$cand22votes=$res5->cand2votes;
$cand33votes=$res5->cand3votes;


$sq11="select * from students where student_id='$adm11'";
$ex11=mysql_query($sq11);
$res11=mysql_fetch_object($ex11);
$name11=$res11->sname .'   '.$res11->fname .'   '.$res11->lname;

$sq22="select * from students where student_id='$adm22'";
$ex22=mysql_query($sq22);
$res22=mysql_fetch_object($ex22);
$name22=$res22->sname .'   '.$res22->fname .'   '.$res22->lname;


$sq33="select * from students where student_id='$adm33'";
$ex33=mysql_query($sq33);
$res33=mysql_fetch_object($ex33);
$name33=$res33->sname .'   '.$res33->fname .'   '.$res33->lname;





?>
<tr><th colspan="3" style="border:1px solid grey;border-radius:4px;

background: #deefff;
background: -moz-linear-gradient(top, #deefff 0%, #98bede 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#deefff), color-stop(100%,#98bede));
background: -webkit-linear-gradient(top, #deefff 0%,#98bede 100%);
background: -o-linear-gradient(top, #deefff 0%,#98bede 100%);
background: -ms-linear-gradient(top, #deefff 0%,#98bede 100%);
background: linear-gradient(top, #deefff 0%,#98bede 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#deefff', endColorstr='#98bede',GradientType=0 );


">
<?php

if($post=='schcapt'){echo"School Captain";}
if($post=='dhcapt'){echo"Dining Hall Captain";}
if($post=='compcapt'){echo"Compound Captain";}
if($post=='libcapt'){echo"Library Captain";}
if($post=='labcapt'){echo"Laboratory Captain";}
if($post=='entcapt'){echo"Entertainment Captain";}
if($post=='timecapt'){echo"Time Keeper";}
if($post=='gamescapt'){echo"Games Captain";}
if($post=='alphacapt'){echo "Alpha Dorm Captain";}
if($post=='theta_capt'){echo "Theta Dorm Captain";}
if($post=='omegacapt'){echo "Omega Dorm Captain";}
if($post=='gamacapt'){echo "Gama Dorm Captain";}
if($post=='sigmacapt'){echo "Sigma Dorm Captain";}
 ?></th>
 <tr><td style="width:400px;"><img src="students/<?php echo $image1; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image2; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image3; ?>" height="100" width="100"></td>
</tr>
<tr><td><?php echo $name1?></td><td><?php echo $name2;2?></td><td><?php echo $name3;?></td></tr>
<tr>
<td><section style="width:80px;height:25px;border:1px solid grey;border-radius:5px;background:white;text-align:center;"><font size="5" color="brown"><?php echo $cand1votes;?></font></section></td>
<td><section style="width:80px;height:25px;border:1px solid grey;border-radius:5px;background:white;text-align:center;"><font size="5" color="brown"><?php echo $cand2votes;?></font></section></td>
<td><section style="width:80px;height:25px;border:1px solid grey;border-radius:5px;background:white;text-align:center;"><font size="5" color="brown"><?php echo $cand3votes;?></font></section></td>
</tr>
 <tr><td colspan="3" style="height:20px;"></td></tr>
<tr><th style="border:1px solid grey; border-radius:5px;">Asistants</th><td colspan="2" ><section style="border-radius:5px; width:600px;background:white;height:25px;border:1px solid grey;">
<marquee>
<?php echo $name11;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4.5" color="brown"><?php echo $cand11votes?></font>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $name22;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4.5" color="brown"><?php echo $cand22votes?></font>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $name33;?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4.5" color="brown"><?php echo $cand33votes?></font>
</marquee></section></td></tr>

 
 <?php}
 
 
 else{
 

 ?>
 
<?php

}
echo"</table><br/>";
}
?>

<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>