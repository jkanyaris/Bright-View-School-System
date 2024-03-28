<?php
session_start();
error_reporting(0);
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{
require('connect.php');
if(!$_SESSION['exam_id']){
header('location:examdepartment.php');
}
else{
$exam_id=$_SESSION['exam_id'];
 $sq="select * from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
 $examtype=$ob->examtype;
 $year=$ob->year;
 $month=$ob->month;
 $form=$ob->form;
 $term=$ob->term;
 $subjects=$ob->subjects;
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #eee  no-repeat center 0px; padding-top:0px;}
		#body{background: #eee  no-repeat center 0px; padding-top:0px;}
		
		#links ul{ 
width:1100px;
height:40px;
margin:0 auto;
border-radius:7px;
list-style:none;}
#links div{
float:left;
border-right:1px solid grey;
width:170px;
height:30px;
margin-top:7px;
text-align:center;
}
#links li{
float:left;
width:170px;
margin-top:5px;
text-align:center;
}
#links a{text-decoration:none; color:#eee; }
#links div:hover{

background: #fcfff4;
background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(40%,#dfe5d7), color-stop(100%,#b3bead));
background: -webkit-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: -o-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: -ms-linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
background: linear-gradient(top, #fcfff4 0%,#dfe5d7 40%,#b3bead 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );

}
#links a:hover{color:blue;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
  <nav id="links">
<ul>
<a href="examdepartment.php">
<div>
<li>Exam department</li>
</div>
</a>
<a href="viewmarksheet.php">
<div>
<li>View mark sheet</li>
</div>
</a>
<a href="createmarksheet.php">
<div>
<li>New mark sheet</li>
</div>
</a>
<a href="examdepartment.php">
<div>

<li>Sort marks</li>
</div>
</a>
<a href="examdepartment.php">
<div>
<li>Rank</li>
</div>
</a>
<a href="examdepartment.php">
<div>
<li>Results</li>
</div>
</a>
</ul>
<nav>
 </section>
 </header>
 <br/><br/>
 <style type="text/css">
 #marksheet{background:white; border-spacing:0px;}
		#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
			<fieldset id="fieldset" style="border-radius:5px; width:1092px; margin: 0 auto;">
 <section id="heading"> <center ><font color="black" size="4"><b>TECH HIGH SCHOOL<br/>
 TERM <?php echo '   '.$term; ?> - <?php echo $month.'    '; echo $year;?> <br/>
 FORM <?php echo '   '.$form.'   '; ?> EXAM</b></font></center></section>
 </section>
 </fieldset>
 <form action="subfinal.php" method="post">
 <table border="1px;" id="marksheet" style="margin:0px auto; ">
 <tr><th>Name</th><th>Adm no</th><th>Class</th><th>English</th><th>Kiswahili</th><th>Mathematics</th>
 <th>Biology</th><th>Chemistry</th><th>Physics</th><th>Geography</th><th>B.studies</th><th>Agriculture</th><th>Computer</th><th>History</th><th>Cre</th><th>Total</th></tr>
 <?php 
 require('connect.php');

$query="select * from marks inner join students on students.student_id=marks.student_id where marks.exam_id='$exam_id' order by total desc
";
$exe=mysql_query($query);
 while($res=mysql_fetch_object($exe)){

 ?>
 <tr>
 <input type="hidden" name="id[]" value="<?php echo $res->mark_id;?>">
 <input type="hidden" name="subjects[]" value="<?php echo $subjects;?>">
 <input type="hidden" name="stdname[]" value="<?php echo $res->sname .'   '.$res->fname .'  '.$res->lname;?>">
<td><input type="hidden" name="name[]" value="<?php echo $res->student_id;?>"><?php echo $res->sname .'   '.$res->fname .'  '.$res->lname;?></td>
 <td><input type="hidden" name="adm[]" value="<?php echo $res->adm;?>"><?php echo $res->adm;?></td>
 <td><input type="hidden" name="classname[]" value="<?php echo $res->classname;?>"><?php echo $res->classname;?></td>
 <td><input type="hidden" name="engend[]" value="<?php echo $res->engend+$res->engcat;?>"><?php echo $res->engend+$res->engcat;?></td>
 <td><input type="hidden" name="kisend[]" value="<?php echo $res->kisend+$res->kiscat;?>"><?php echo $res->kisend+$res->kiscat;?></td>
 <td><input type="hidden" name="matend[]" value="<?php echo $res->matend+$res->matcat;?>"><?php echo $res->matend+$res->matcat;?></td>
 <td><input type="hidden" name="bioend[]" value="<?php echo $res->bioend+$res->biocat;?>"><?php echo $res->bioend+$res->biocat;?></td>
 <td><input type="hidden" name="chemend[]" value="<?php echo $res->chemend+$res->chemcat;?>"><?php echo $res->chemend+$res->chemcat;?></td>
 <td><input type="hidden" name="phyend[]" value="<?php echo $res->phyend+$res->phycat;?>"><?php echo $res->phyend+$res->phycat;?></td>
 <td><input type="hidden" name="geoend[]" value="<?php echo $res->geoend+$res->geocat;?>"><?php echo $res->geoend+$res->geocat;?></td>
 <td><input type="hidden" name="bsend[]" value="<?php echo $res->bsend+$res->bscat;?>"><?php echo $res->bsend+$res->bscat;?></td>
 <td><input type="hidden" name="agriend[]" value="<?php echo $res->agriend+$res->agricat;?>"><?php echo $res->agriend+$res->agricat;?></td>
 <td><input type="hidden" name="compend[]" value="<?php echo $res->compend +$res->compcat;?>"><?php echo $res->compend+$res->compcat;?></td>
 <td><input type="hidden" name="histend[]" value="<?php echo $res->histend+$res->histcat;?>"><?php echo $res->histend+$res->histcat;?></td>
 <td><input type="hidden" name="creend[]" value="<?php echo $res->creend+$res->crecat;?>"><?php echo $res->creend+$res->crecat;?></td>
 <td><input type="hidden" name="total[]" value="<?php echo $res->total;?>"><b><?php echo $res->total;?></b></td>
 </tr>
 <?php }
 
 
 ?>
 

 </table> 
 <center><input style="margin-bottom:50px; margin-top:20px;" type="submit" name="downloadmarks" value="Download"><input style="margin-bottom:50px;margin-top:20px; margin-left:100px;" type="submit" name="submitmarks" value="Submit as Final" 
 onclick="return confirm('Are you sure you have close checked the marks with the students?')">
 <input style="margin-bottom:50px; margin-left:100px;margin-top:20px;" type="submit" name="undosubmarks" value="Undo Submission" 
 onclick="return confirm('Are you sure you want to remove current submitted marks?')"></center>
 </form>
 
 
<div id="footer">
<center><footer>Tech High School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php 


}
}
?>
