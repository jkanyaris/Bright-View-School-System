<?php
session_start();
error_reporting(0);
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{
require('connect.php');
if(isset($_GET['resid'])){
$id=$_GET['resid'];
$sql="select * from results inner join students on students.student_id=results.student_id inner join examdetails on examdetails.exam_id=results.exam_id where results.result_id='$id'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$position=$obj->pos;
$name=$obj->sname .'  '.$obj->fname .'  '.$obj->lname;
$adm=$obj->adm;
$form=$obj->form;
$classname=$obj->classname;
$term=$obj->term;
$month=$obj->month;
$year=$obj->year;
$engend=$obj->eng;
$enggrade=$obj->enggrade;
$kisend=$obj->kis;
$kisgrade=$obj->kisgrade;
$matend=$obj->mat;
$matgrade=$obj->matgrade;
$bioend=$obj->bio;
$biograde=$obj->biograde;
$chemend=$obj->chem;
$chemgrade=$obj->chemgrade;
$phyend=$obj->phy;
$phygrade=$obj->phygrade;
$geoend=$obj->geo;
$geograde=$obj->geograde;
$bsend=$obj->bs;
$bsgrade=$obj->bsgrade;
$agriend=$obj->agri;
$agrigrade=$obj->agrigrade;
$compend=$obj->comp;
$compgrade=$obj->compgrade;
$histend=$obj->hist;
$histgrade=$obj->histgrade;
$creend=$obj->cre;
$cregrade=$obj->cregrade;
$total=$obj->total;
$mg=$obj->mg;
$pos=$obj->pos;
$subjects=$obj->subjects;
$tot=100 * $subjects;
$num=$obj->std_num;
$remarks=$obj->remarks;
$term=$obj->term;


require('pdf/fpdf.php');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("times","B",15);
$pdf->Image('images/techhigh.jpg',10,8,33);
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"TECH HIGH SCHOOL",0,1,"C");
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"P.O BOX 239, Nairobi",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"info@techhighschool.ac.ke",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.techhighschool.ac.ke",0,1,"C");
$pdf->cell(0,5,"  ",0,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(50,8,"TERM-{$term}  {$month} {$year}",1,0,"C");
$pdf->cell(90,0," ",0,0);
$pdf->Cell(50,8,"FORM {$form} EXAM RESULTS",1,1,"C");
$pdf->cell(0,5," ",0,1);
$pdf->cell(0,1," ",1,1);
$pdf->cell(0,5," ",0,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(20,5,"Name",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(70,5,$name,1,0);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Admission no.",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(30,5,$adm,1,0);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Class name",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(10,5,$classname,1,1);
$pdf->cell(0,5," ",0,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Subject",1,0);
$pdf->Cell(20,5,"Marks",1,0);
$pdf->Cell(20,5,"Grade",1,1);
$pdf->Cell(30,5,"English",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$engend,1,0);
$pdf->Cell(20,5,$enggrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Kiswahili",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$kisend,1,0);
$pdf->Cell(20,5,$kisgrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Mathematics",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$matend,1,0);
$pdf->Cell(20,5,$matgrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Biology",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$bioend,1,0);
$pdf->Cell(20,5,$biograde,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Chemistry",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$chemend,1,0);
$pdf->Cell(20,5,$chemgrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Physics",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$phyend,1,0);
$pdf->Cell(20,5,$phygrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Geography",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$geoend,1,0);
$pdf->Cell(20,5,$geograde,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Business",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$bsend,1,0);
$pdf->Cell(20,5,$bsgrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Agriculture",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$agriend,1,0);
$pdf->Cell(20,5,$agrigrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"Computer",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$compend,1,0);
$pdf->Cell(20,5,$compgrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"History",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$histend,1,0);
$pdf->Cell(20,5,$histgrade,1,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(30,5,"CRE",1,0);
$pdf->SetFont("times","",10);
$pdf->Cell(20,5,$creend,1,0);
$pdf->Cell(20,5,$cregrade,1,1);
$pdf->cell(0,10," ",0,1);
$pdf->SetFont("times","B",12);
$pdf->Cell(15,6,"Total",0,0);
$pdf->SetFont("times","",10);
$pdf->Cell(30,6,"{$total} out of {$tot}",1,0);
$pdf->SetFont("times","B",12);
$pdf->Cell(25,6,"Mean Grade",0,0);
$pdf->SetFont("times","",10);
$pdf->Cell(30,6,$mg,1,0);
$pdf->SetFont("times","B",12);
$pdf->Cell(20,6,"Position",0,0);
$pdf->SetFont("times","",10);
$pdf->Cell(30,6,"{$pos} out of {$num}",1,1);
$pdf->cell(0,10," ",0,1);
$pdf->SetFont("times","B",10);
$pdf->cell(40,6,"Class Teacher Remarks ",1,1);
$pdf->cell(0,3,"",0,1);
$pdf->SetFont("times","",10);
$pdf->cell(0,6,$remarks,0,1);


$pdf->output(); 

}

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #eee no-repeat center 0px; padding-top:0px;}
		#body{background: #eee no-repeat center 0px; padding-top:0px;}
		
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
 <center><section style="margin-top:40px;"><font color="brown" size="4">Search Results</font></section></center>
 <style type="text/css">
	#results{width:1200px; margin-top:0px;margin-bottom:200px;border-spacing:0px;}	
#results{background:white;}
		#results th{background:#AAD4FF;}
			#results tr:nth-child(odd) td{background:#eee;}
}
</style>
 <table id="results" border="1">
 <tr><th>Pos</th><th>Name</th><th>Adm</th><th>C</th><th>Eng</th><th>Kis</th><th>Mat</th>
 <th>Bio</th><th>Chem</th><th>Phy</th><th>Geo</th><th>Bss</th><th>Agri</th><th>Comp</th><th>His</th><th>Cre</th><th>Total</th><th>Option</th></tr>
 <center><font size="4" color="red"><?php echo @$_GET['error']; ?></font></center>
<?php 
require("connect.php");
if(isset($_POST['search'])){
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM results INNER JOIN students ON students.student_id=results.student_id WHERE( (students.sname LIKE '%$searchq%') OR (students.fname LIKE '%$searchq%')OR(students.lname LIKE '%$searchq%')OR (students.adm LIKE'%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('searchstd.php?error=No search results were found','_self')</script>";
}
else{
while($res = mysql_fetch_object($query))
{

?>
 <tr>
 <td><b><?php echo $res->pos; ?></b></td>
<td><?php echo $res->sname .'  '.$res->fname .'  '.$res->lname;?></td>
 <td><?php echo $res->adm;?></td>
 <td><?php echo $res->classname;?></td>
 <td align="center"><?php echo $res->eng;echo'  '.$res->enggrade;?></td>
 <td align="center"><?php echo $res->kis;echo'  '. $res->kisgrade;?></td>
 <td align="center"><?php echo $res->mat;echo '  '.$res->matgrade;?></td>
 <td align="center"><?php echo $res->bio;echo '  '.$res->biograde;?></td>
 <td align="center"><?php echo $res->chem; echo '  '.$res->chemgrade;?></td>
 <td align="center"><?php echo $res->phy;echo '  '.$res->phygrade;?></td>
 <td align="center"><?php echo $res->geo;echo '  '.$res->geograde;?></td>
 <td align="center"><?php echo $res->bs;echo '  '.$res->bsgrade;?></td>
 <td align="center"><?php echo $res->agri;echo '  '.$res->agrigrade;?></td>
 <td align="center"><?php echo $res->comp; echo '  '.$res->compgrade;?></td>
 <td align="center"><?php echo $res->hist;echo'  '. $res->histgrade;?></td>
 <td align="center"><?php echo $res->cre;echo '  '.$res->cregrade;?></td>
 <td align="center"><b><?php echo $res->total;?></b></td>
 <td align="center"><a href="searchresults.php?resid=<?php echo $res->result_id; ?>"><img src="images/dl_icon.png" width="40" height="40"></a></td>
 </tr>
<?php

}

}

}

?>
</table>
<div id="footer">
<center><footer>Tech High School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>