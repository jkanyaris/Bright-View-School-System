<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['student']){
header("location:studentslogin.php");

}
else{

$adm=$_SESSION['student'];
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$fname=$obj->fname;
$image=$obj->passport;
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
$pdf->Cell(50,10,"BRIGHT VIEW SCHOOL",0,1,"C");
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"P.O BOX 2015, MOGOTIO",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"brightviewschool@gmail.com",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.brightviewschool.ac.ke",0,1,"C");
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
        body { background: #eee  no-repeat center 0px; padding-top:0px;}
		#body{background: #eee  no-repeat center 0px; padding-top:0px;}
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
 <nav id="ddmenu">
<ul>
<li class="full-width">
   	<li class="no-sub"><a class="top-heading" href="studentsprofile.php">Student Profile</a></li>


                
</li>
</ul>
</nav>
<section id='main'>
<center><font size="5" color="brown" ><b>Exam results found</b></font></center>
	<?php 
	$sql1="select * from results inner join examdetails on examdetails.exam_id=results.exam_id inner join students on students.student_id=results.student_id  where students.adm='$adm' order by result_id desc";
	$run2=mysql_query($sql1);
	if(mysql_num_rows($run2)>0){
	echo'<table border="1" style="border-spacing:0;width:600px;margin:0 auto;" id="book">
	<tr><th>Term</th><th>Month</th><th>Year</th><th>form</th><th>Option</th></tr>';
	while($res=mysql_fetch_object($run2)){
	?>
	<tr><td><?php echo $res->term; ?></td><td><?php echo $res->month; ?></td><td><?php echo $res->year; ?></td><td><?php echo $res->form; ?></td><td><a href="transcripts.php?resid=<?php echo $res->result_id;?>">Download transcript</a></td></tr>
	
	
	<?php
	}
	}
	else{
	echo"<font color='brown'>No transcripts were found </font>";

	
	}
	?>


	</table>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>