<?php
session_start();
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{
if(!$_SESSION['exam_id']){
header('location:examdepartment.php');
}
else{
require('connect.php');
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
 $std_num=$ob->std_num;
if(isset($_POST['downloadresults'])){
$query="select * from results where exam_id='$exam_id' order by total desc";
$exe=mysql_query($query);
require('pdf/fpdf.php');
$pdf= new FPDF();
$pdf->AddPage('L');
$pdf->SetFont("times","B",15);
$pdf->Image('images/techhigh.jpg',10,8,33);
$pdf->cell(115,0," ",0,0);
$pdf->Cell(50,10,"BRIGHT VIEW SCHOOL",0,1,"C");
$pdf->cell(115,0," ",0,0);
$pdf->Cell(50,10,"P.O BOX 20105, Mogotio",0,1,"C");
$pdf->cell(110,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"brightviewschool@gmail.com",0,1,"C");
$pdf->cell(110,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.brightviewschool.ac.ke",0,1,"C");
$pdf->cell(0,5,"  ",0,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(50,8,"TERM-{$term}  {$month} {$year}",1,0,"C");
$pdf->cell(177,0," ",0,0);
$pdf->Cell(50,8,"FORM {$form} EXAM",1,1,"C");
$pdf->cell(0,5," ",0,1);
$pdf->cell(0,1," ",1,1);
$pdf->cell(0,5," ",0,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(12,5,"Pos",1,0);
$pdf->Cell(55,5,"Name",1,0);
$pdf->Cell(15,5,"Adm no.",1,0);
$pdf->Cell(13,5,"Class",1,0);
$pdf->Cell(13,5,"Eng",1,0);
$pdf->Cell(13,5,"Kis",1,0);
$pdf->Cell(13,5,"Mat",1,0);
$pdf->Cell(13,5,"Bio",1,0);
$pdf->Cell(13,5,"Che",1,0);
$pdf->Cell(13,5,"Phy",1,0);
$pdf->Cell(13,5,"Geo",1,0);
$pdf->Cell(13,5,"Bss",1,0);
$pdf->Cell(13,5,"Agr",1,0);
$pdf->Cell(13,5,"Com",1,0);
$pdf->Cell(13,5,"His",1,0);
$pdf->Cell(13,5,"Cre",1,0);
$pdf->Cell(13,5,"Tot",1,0);
$pdf->Cell(13,5,"Grade",1,1);
while($obj=mysql_fetch_object($exe)){
$student_id=$obj->student_id;
$sql="select * from students where student_id='$student_id'";
$run=mysql_query($sql);
$row=mysql_fetch_object($run);
$name=$row->sname .'  '.$row->fname .'  '.$row->lname;
$classname=$row->classname;
$adm=$row->adm;
$pdf->SetFont("times","",10);
$pdf->cell(0,1," ",0,1);
$pdf->Cell(12,5,$obj->pos,1,0);
$pdf->Cell(55,5,$name,1,0);
$pdf->Cell(15,5,$adm,1,0);
$pdf->Cell(13,5,$classname,1,0);
$pdf->Cell(13,5,"{$obj->eng}  {$obj->enggrade}",1,0);
$pdf->Cell(13,5,"{$obj->kis}  {$obj->kisgrade}",1,0);
$pdf->Cell(13,5,"{$obj->mat}  {$obj->matgrade}",1,0);
$pdf->Cell(13,5,"{$obj->bio}  {$obj->biograde}",1,0);
$pdf->Cell(13,5,"{$obj->chem}  {$obj->chemgrade}",1,0);
$pdf->Cell(13,5,"{$obj->phy}  {$obj->phygrade}",1,0);
$pdf->Cell(13,5,"{$obj->geo}  {$obj->geograde}",1,0);
$pdf->Cell(13,5,"{$obj->bs}  {$obj->bsgrade}",1,0);
$pdf->Cell(13,5,"{$obj->agri}  {$obj->agrigrade}",1,0);
$pdf->Cell(13,5,"{$obj->comp}  {$obj->compgrade}",1,0);
$pdf->Cell(13,5,"{$obj->hist}  {$obj->histgrade}",1,0);
$pdf->Cell(13,5,"{$obj->cre}  {$obj->cregrade}",1,0);
$pdf->Cell(13,5,$obj->total,1,0);
$pdf->Cell(13,5,"$obj->mg",1,1);
}
$pdf->output(); 

}
if(isset($_POST['downloadtranscripts'])){

$query="select * from results inner join students on students.student_id=results.student_id where results.exam_id='$exam_id' order by total desc
";
$exe=mysql_query($query);
require('pdf/fpdf.php');
$pdf= new FPDF();
while($obj=mysql_fetch_object($exe)){
$position=$obj->pos;
$name=$obj->sname .'  '.$obj->fname .'  '.$obj->lname;
$adm=$obj->adm;
$form=$obj->form;
$classname=$obj->classname;
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
$tot=100 * $subjects;
$num=$std_num;
$remarks=$obj->remarks;
$pdf->AddPage();
$pdf->SetFont("times","B",15);
$pdf->Image('images/techhigh.jpg',10,8,33);
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"BRIGHT VIEW SCHOOL",0,1,"C");
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"P.O BOX 20105, Mogotio",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"brightviewschool",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.brightviewschool",0,1,"C");
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

}
$pdf->output(); 


}
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
 #marksheet{background:white; width:1148px; border-spacing:0px;}
		#marksheet th{background:#AAD4FF;}
			#marksheet tr:nth-child(odd) td{background:#eee;}
			
			</style>
			<fieldset id="fieldset" style="border-radius:5px; width:1120px; margin: 0 auto;">
 <section id="heading"> <center ><font color="black" size="4"><b>BRIGHT VIEW SCHOOL<br/>
 TERM <?php echo $term; ?> - <?php echo $month.'    '; echo $year;?> <br/>
 FORM <?php echo '   '.$form.'   '; ?> EXAM</b></font></center></section>
 </section>
 </fieldset>
 <form action="multipleresults.php" method="post">
 <table border="1px;" id="marksheet" style="margin:0px auto; ">
 <tr><th>Pos</th><th>Name</th><th>Adm</th><th>C</th><th>Eng</th><th>Kis</th><th>Mat</th>
 <th>Bio</th><th>Chem</th><th>Phy</th><th>Geo</th><th>Bss</th><th>Agri</th><th>Comp</th><th>His</th><th>Cre</th><th>Total</th></tr>
 <?php 
 require('connect.php');

$query="select * from results inner join students on students.student_id=results.student_id where results.exam_id='$exam_id' order by total desc
";
$exe=mysql_query($query);
 while($res=mysql_fetch_object($exe)){

 ?>
 <tr>
 <td><b><?php echo $res->pos; ?></b></td>
<td  ><?php echo $res->sname .'  '.$res->fname .'  '.$res->lname;?></td>
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
 </tr>
 <?php }
 
 
 ?>
 

 </table> 
 <center><input style="margin-bottom:50px; margin-top:20px;" type="submit" name="downloadresults" value="Download results">
 <input style="margin-bottom:50px; margin-left:100px;margin-top:20px;" type="submit" name="downloadtranscripts" value="Multiple transcripts" 
 ></center>
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
?>
