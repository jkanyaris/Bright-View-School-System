<?php 
error_reporting(0);
require('connect.php');
$q="select * from links where link='votepanel.php' and status='Closed' ";
$r=mysql_query($q);
if(mysql_num_rows($r)>0){
header("location:studentsprofile.php");
}else{
session_start();
if(!$_SESSION['student']){
header("location:studentslogin.php");
}
else{
$adm=$_SESSION['student'];
$sql="select * from votescount inner join students on students.student_id=votescount.voter where students.adm='$adm'";
$run=mysql_query($sql);
if(mysql_num_rows($run)>0){
unset($_SESSION['student']);
session_destroy();
echo"<script>window.open('studentslogin.php?error=You have already voted','_self')</script>";
}
else{
$sq8="select dorm.house from allocation inner join dorm on dorm.dorm_id=allocation.dorm_id inner join students on students.student_id=allocation.student_id where students.adm='$adm'";
$ru8=mysql_query($sq8);
$obj=mysql_fetch_object($ru8);
$dorm=$obj->house;

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
 <center><font size="5" color="brown" ><b>Select 1 candidate for every post</b></font></center>

<form action="votessubmit.php" method="post">

<?php
require('connect.php');
$sql="select * from election  where((post !='alphacapt')and(post !='ast_alpha_capt')and(post !='theta_capt')and(post !='ast_theta_capt') and (post !='omegacapt') and(post !='ast_omega_capt')and (post !='gamacapt')and(post !='ast_gama_capt') and (post !='sigmacapt') and (post != 'ast_sigma_capt'))";
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
<tr><td><font color="brown" size="4.5">Vote</font><input type="radio" name="<?php echo $post;?>" value="<?php echo $adm1;?>" required="required"></td>
<td><font color="brown" size="4.5">Vote</font><input type="radio" name="<?php echo $post;?>" value="<?php echo $adm2;?>" ></td>
<td><font color="brown" size="4.5">Vote</font><input type="radio" name="<?php echo $post;?>" value="<?php echo $adm3;?>"><td></tr>

<input type="hidden" name="post[]" value="<?php echo $res->post_id;?>">
</table>
</fieldset>
<?php 

}
?>
<fieldset id="field" style="border-radius:5px; width:1000px;margin:0 auto;">
<legend id="legend">Dormitory</legend>
<?php 

if($dorm=='alpha'){$postdorm='alphacapt';$postast='ast_alpha_capt';}
if($dorm=='theta'){$postdorm='theta_capt';$postast='ast_theta_capt';}
if($dorm=='omega'){$postdorm='omegacapt';$postast='ast_omega_capt';}
if($dorm=='gama'){$postdorm='gamacapt';$postast='ast_gama_capt';}
if($dorm=='sigma'){$postdorm='sigmacapt';$postast='ast_sigma_capt';}

$query="select * from election where post='$postdorm' or post='$postast'";
$exe=mysql_query($query);
$count=1;
while(($row=mysql_fetch_object($exe)) && ($count<3)){
$student_id1=$row->cand1;
$student_id2=$row->cand2;
$student_id3=$row->cand3;
$post=$row->post;

$sq1="select * from students where student_id='$student_id1'";
$ex1=mysql_query($sq1);
$res1=mysql_fetch_object($ex1);
$name1=$res1->sname .'   '.$res1->fname .'   '.$res1->lname;
$image1=$res1->passport;
$class1=$res1->form .$res1->classname;
$ad1=$res1->adm;

$sq2="select * from students where student_id='$student_id2'";
$ex2=mysql_query($sq2);
$res2=mysql_fetch_object($ex2);
$name2=$res2->sname .'   '.$res2->fname .'   '.$res2->lname;
$image2=$res2->passport;
$class2=$res2->form .$res2->classname;
$ad2=$res2->adm;
$sq3="select * from students where student_id='$student_id3'";
$ex3=mysql_query($sq3);
$res3=mysql_fetch_object($ex3);
$name3=$res3->sname .'   '.$res3->fname .'   '.$res3->lname;
$image3=$res3->passport;
$class3=$res3->form .$res3->classname;
$ad3=$res3->adm;
?>
<table  style="border-spacing:0px;margin:0 auto; width:1000px;">
<br/><br/>
<?php if($count==1){
?>
<tr><td colspan="3"style="border:1px solid grey;background:#D4D4FF;border-radius:4px;"><font size="4.5"><b><?php echo $dorm."  ";?>Dorm Captain</b></font></td></tr>
<tr><td style="width:400px;"><img src="students/<?php echo $image1; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image2; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image3; ?>" height="100" width="100"></td>
</tr>
<tr><td><?php echo $name1?></td><td><?php echo $name2;2?></td><td><?php echo $name3;?></td><tr>
<tr><td><?php echo $ad1?></td><td><?php echo $ad2;?></td><td><?php echo $ad3;?></td><tr>
<tr><td><?php echo $class1?></td><td><?php echo $class2;?></td><td><?php echo $class3;?></td><tr>
<tr><td><font color="brown" size="4.5">Vote</font><input type="radio" name="postdorm" value="<?php echo $student_id1;?>" required="required"></td>
<td><font color="brown" size="4.5">Vote</font><input type="radio" name="postdorm" value="<?php echo $student_id2;?>" ></td>
<td><font color="brown" size="4.5">Vote</font><input type="radio" name="postdorm" value="<?php echo $student_id3;?>"><td></tr>

<input type="hidden" name="post_id[]" value="<?php echo $row->post_id;?>">
<?php 
}
else{
?>
<tr><td colspan="3"style="border:1px solid grey;background:#D4D4FF;border-radius:4px;"><font size="4.5"><b>Ast <?php echo"  ".$dorm."  ";?>Dorm captain</b></font></td></tr>
<tr><td style="width:400px;"><img src="students/<?php echo $image1; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image2; ?>" height="100" width="100"></td>
<td style="width:400px;"><img src="students/<?php echo $image3; ?>" height="100" width="100"></td>
</tr>
<tr><td><?php echo $name1?></td><td><?php echo $name2;2?></td><td><?php echo $name3;?></td><tr>
<tr><td><?php echo $ad1?></td><td><?php echo $ad2;?></td><td><?php echo $ad3;?></td><tr>
<tr><td><?php echo $class1?></td><td><?php echo $class2;?></td><td><?php echo $class3;?></td><tr>
<tr><td><font color="brown" size="4.5">Vote</font><input type="radio" name="postast" value="<?php echo $student_id1;?>" required="required"></td>
<td><font color="brown" size="4.5">Vote</font><input type="radio" name="postast" value="<?php echo $student_id2;?>" ></td>
<td><font color="brown" size="4.5">Vote</font><input type="radio" name="postast" value="<?php echo $student_id3;?>"><td></tr>

<input type="hidden" name="post_id[]" value="<?php echo $row->post_id;?>">
<?php
}
?>
</table>
<?php 
$count++;
}
?>
</table>
</fieldset>
<section style="margin:0 auto; border:1px solid grey; border-radius:5px;margin-top:100px;margin-bottom:30px; height:30px; width:400px; background:white;" >
<center><input type="submit" name="subvote" value="Submit Vote"></center>
</section>


</form>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php

}
}
}
?>