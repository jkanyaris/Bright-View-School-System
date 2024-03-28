<?php
session_start();
error_reporting(0);
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
$query="select * from marks where exam_id='$exam_id' order by total desc";
$qu5="select * from results where exam_id='$exam_id'";
$ex5=mysql_query($qu5);
$exe=mysql_query($query);
$count=mysql_num_rows($exe);
if(isset($_POST['downloadmarks'])){
$name=$_POST['name'];
$stdname=$_POST['stdname'];
$adm=$_POST['adm'];
$classname=$_POST['classname'];
$engend=$_POST['engend'];
$kisend=$_POST['kisend'];
$matend=$_POST['matend'];
$bioend=$_POST['bioend'];
$chemend=$_POST['chemend'];
$phyend=$_POST['phyend'];
$geoend=$_POST['geoend'];
$bsend=$_POST['bsend'];
$agriend=$_POST['agriend'];
$compend=$_POST['compend'];
$histend=$_POST['histend'];
$creend=$_POST['creend'];
$total=$_POST['total'];

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
$pdf->Cell(50,8,"FORM {$form} EXAM",1,1,"C");
$pdf->cell(0,5," ",0,1);
$pdf->cell(0,1," ",1,1);
$pdf->cell(0,5," ",0,1);
$pdf->SetFont("times","B",10);
$pdf->Cell(50,5,"Name",1,0);
$pdf->Cell(15,5,"ADM",1,0);
$pdf->Cell(8,5,"C",1,0);
$pdf->Cell(9,5,"Eng",1,0);
$pdf->Cell(9,5,"Kis",1,0);
$pdf->Cell(9,5,"Mat",1,0);
$pdf->Cell(9,5,"Bio",1,0);
$pdf->Cell(9,5,"Che",1,0);
$pdf->Cell(9,5,"Phy",1,0);
$pdf->Cell(9,5,"Geo",1,0);
$pdf->Cell(9,5,"Bss",1,0);
$pdf->Cell(9,5,"Agr",1,0);
$pdf->Cell(9,5,"Com",1,0);
$pdf->Cell(9,5,"His",1,0);
$pdf->Cell(9,5,"Cre",1,0);
$pdf->Cell(9,5,"Tot",1,1);
for($i=0;$i<$count;$i++){
$pdf->SetFont("times","",10);
$pdf->cell(0,1," ",0,1);
$pdf->Cell(50,5,$stdname[$i],1,0);
$pdf->Cell(15,5,"015115",1,0);
$pdf->Cell(8,5,$classname[$i],1,0);
$pdf->Cell(9,5,$engend[$i],1,0);
$pdf->Cell(9,5,$kisend[$i],1,0);
$pdf->Cell(9,5,$matend[$i],1,0);
$pdf->Cell(9,5,$bioend[$i],1,0);
$pdf->Cell(9,5,$chemend[$i],1,0);
$pdf->Cell(9,5,$phyend[$i],1,0);
$pdf->Cell(9,5,$geoend[$i],1,0);
$pdf->Cell(9,5,$bsend[$i],1,0);
$pdf->Cell(9,5,$agriend[$i],1,0);
$pdf->Cell(9,5,$compend[$i],1,0);
$pdf->Cell(9,5,$histend[$i],1,0);
$pdf->Cell(9,5,$creend[$i],1,0);
$pdf->Cell(9,5,$total[$i],1,1);

}
$pdf->output(); 

}
if(isset($_POST['submitmarks'])){
if(mysql_num_rows($ex5)>0){
echo"<script>window.open('examdepartment.php?error=Could not submit.The marks already exists','_self')</script>";
}
else{
$id=$_POST['id'];
$name=$_POST['name'];
$adm=$_POST['adm'];
$classname=$_POST['classname'];
$engend=$_POST['engend'];
$kisend=$_POST['kisend'];
$matend=$_POST['matend'];
$bioend=$_POST['bioend'];
$chemend=$_POST['chemend'];
$phyend=$_POST['phyend'];
$geoend=$_POST['geoend'];
$bsend=$_POST['bsend'];
$agriend=$_POST['agriend'];
$compend=$_POST['compend'];
$histend=$_POST['histend'];
$creend=$_POST['creend'];
$total=$_POST['total'];
$subjects=$_POST['subjects'];

for($i=0;$i<$count;$i++){
$marke=$engend[$i];$markk=$kisend[$i];$markm=$matend[$i];$markb=$bioend[$i];
$markch=$chemend[$i];$markph=$phyend[$i];$markge=$geoend[$i];$markbs=$bsend[$i];
$markag=$agriend[$i];$markco=$compend[$i];$markhi=$histend[$i];$markcr=$creend[$i];
$markmg=$total[$i];
if($marke>=0 && $marke<=10){$enggrade="E";}if($marke>=11 && $marke<=17){$enggrade="D-";}if($marke>=18 && $marke<=24){$enggrade="D";}
if($marke>=25 && $marke<=31){$enggrade="D+";}if($marke>=32 && $marke<=38){$enggrade="C-";}if($marke>=39 && $marke<=45){$enggrade="C";}
if($marke>=46 && $marke<=52){$enggrade="C+";}if($marke>=53 && $marke<=59){$enggrade="B-";}if($marke>=60 && $marke<=66){$enggrade="B";}
if($marke>=67 && $marke<=73){$enggrade="B+";}if($marke>=74 && $marke<=80){$enggrade="A-";}if($marke>=81 && $marke<=100){$enggrade="A";}

if($markk>=0 && $markk<=10){$kisgrade="E";}if($markk>=11 && $markk<=17){$kisgrade="D-";}if($markk>=18 && $markk<=24){$grade="D";}
if($markk>=25 && $markk<=31){$kisgrade="D+";}if($markk>=32 && $markk<=38){$kisgrade="C-";}if($markk>=39 && $markk<=45){$kisgrade="C";}
if($markk>=46 && $markk<=52){$kisgrade="C+";}if($markk>=53 && $markk<=59){$kisgrade="B-";}if($markk>=60 && $markk<=66){$kisgrade="B";}
if($markk>=67 && $markk<=73){$kisgrade="B+";}if($markk>=74 && $markk<=80){$kisgrade="A-";}if($markk>=81 && $markk<=100){$kisgrade="A";}

if($markm>=0 && $markm<=10){$matgrade="E";}if($markm>=11 && $markm<=17){$matgrade="D-";}if($markm>=18 && $markm<=24){$matgrade="D";}
if($markm>=25 && $markm<=31){$matgrade="D+";}if($markm>=32 && $markm<=38){$matgrade="C-";}if($markm>=39 && $markm<=45){$matgrade="C";}
if($markm>=46 && $markm<=52){$matgrade="C+";}if($markm>=53 && $markm<=59){$matgrade="B-";}if($markm>=60 && $markm<=66){$matgrade="B";}
if($markm>=67 && $markm<=73){$matgrade="B+";}if($markm>=74 && $markm<=80){$matgrade="A-";}if($markm>=81 && $markm<=100){$matgrade="A";}

if($markb>=0 && $markb<=10){$biograde="E";}if($markb>=11 && $markb<=17){$biograde="D-";}if($markb>=18 && $markb<=24){$biograde="D";}
if($markb>=25 && $markb<=31){$biograde="D+";}if($markb>=32 && $markb<=38){$biograde="C-";}if($markb>=39 && $markb<=45){$biograde="C";}
if($markb>=46 && $markb<=52){$biograde="C+";}if($markb>=53 && $markb<=59){$biograde="B-";}if($markb>=60 && $markb<=66){$biograde="B";}
if($markb>=67 && $markb<=73){$biograde="B+";}if($markb>=74 && $markb<=80){$biograde="A-";}if($markb>=81 && $markb<=100){$biograde="A";}

if($markch>=0 && $markch<=10){$chemgrade="E";}if($markch>=11 && $markch<=17){$chemgrade="D-";}if($markch>=18 && $markch<=24){$chemgrade="D";}
if($markch>=25 && $markch<=31){$chemgrade="D+";}if($markch>=32 && $markch<=38){$chemgrade="C-";}if($markch>=39 && $markch<=45){$chemgrade="C";}
if($markch>=46 && $markch<=52){$chemgrade="C+";}if($markch>=53 && $markch<=59){$chemgrade="B-";}if($markch>=60 && $markch<=66){$chemgrade="B";}
if($markch>=67 && $markch<=73){$chemgrade="B+";}if($markch>=74 && $markch<=80){$chemgrade="A-";}if($markch>=81 && $markch<=100){$chemgrade="A";}

if($markph>=0 && $markph<=10){$phygrade="E";}if($markph>=11 && $markph<=17){$phygrade="D-";}if($markph>=18 && $markph<=24){$phygrade="D";}
if($markph>=25 && $markph<=31){$phygrade="D+";}if($markph>=32 && $markph<=38){$phygrade="C-";}if($markph>=39 && $markph<=45){$phygrade="C";}
if($markph>=46 && $markph<=52){$phygrade="C+";}if($markph>=53 && $markph<=59){$phygrade="B-";}if($markph>=60 && $markph<=66){$phygrade="B";}
if($markph>=67 && $markph<=73){$phygrade="B+";}if($markph>=74 && $markph<=80){$phygrade="A-";}if($markph>=81 && $markph<=100){$phygrade="A";}

if($markge>=0 && $markge<=10){$geograde="E";}if($markge>=11 && $markge<=17){$geograde="D-";}if($markge>=18 && $markge<=24){$geograde="D";}
if($markge>=25 && $markge<=31){$geograde="D+";}if($markge>=32 && $markge<=38){$geograde="C-";}if($markge>=39 && $markge<=45){$geograde="C";}
if($markge>=46 && $markge<=52){$geograde="C+";}if($markge>=53 && $markge<=59){$geograde="B-";}if($markge>=60 && $markge<=66){$geograde="B";}
if($markge>=67 && $markge<=73){$geograde="B+";}if($markge>=74 && $markge<=80){$geograde="A-";}if($markge>=81 && $markge<=100){$geograde="A";}

if($markbs>=0 && $markbs<=10){$bsgrade="E";}if($markbs>=11 && $markbs<=17){$bsgrade="D-";}if($markbs>=18 && $markbs<=24){$bsgrade="D";}
if($markbs>=25 && $markbs<=31){$bsgrade="D+";}if($markbs>=32 && $markbs<=38){$bsgrade="C-";}if($markbs>=39 && $markbs<=45){$bsgrade="C";}
if($markbs>=46 && $markbs<=52){$bsgrade="C+";}if($markbs>=53 && $markbs<=59){$bsgrade="B-";}if($markbs>=60 && $markbs<=66){$bsgrade="B";}
if($markbs>=67 && $markbs<=73){$bsgrade="B+";}if($markbs>=74 && $markbs<=80){$bsgrade="A-";}if($markbs>=81 && $markbs<=100){$bsgrade="A";}

if($markag>=0 && $markag<=10){$agrigrade="E";}if($markag>=11 && $markag<=17){$agrigrade="D-";}if($markag>=18 && $markag<=24){$agrigrade="D";}
if($markag>=25 && $markag<=31){$agrigrade="D+";}if($markag>=32 && $markag<=38){$agrigrade="C-";}if($markag>=36 && $markag<=40){$agrigrade="C";}
if($markag>=46 && $markag<=52){$agrigrade="C+";}if($markag>=53 && $markag<=59){$agrigrade="B-";}if($markag>=60 && $markag<=66){$agrigrade="B";}
if($markag>=67 && $markag<=73){$agrigrade="B+";}if($markag>=74 && $markag<=80){$agrigrade="A-";}if($markag>=81 && $markag<=100){$agrigrade="A";}

if($markco>=0 && $markco<=10){$compgrade="E";}if($markco>=11 && $markco<=17){$compgrade="D-";}if($markco>=18 && $markco<=24){$compgrade="D";}
if($markco>=25 && $markco<=31){$compgrade="D+";}if($markco>=32 && $markco<=38){$compgrade="C-";}if($markco>=39 && $markco<=45){$compgrade="C";}
if($markco>=46 && $markco<=52){$compgrade="C+";}if($markco>=53 && $markco<=59){$compgrade="B-";}if($markco>=60 && $markco<=66){$compgrade="B";}
if($markco>=67 && $markco<=73){$compgrade="B+";}if($markco>=74 && $markco<=80){$compgrade="A-";}if($markco>=81 && $markco<=100){$compgrade="A";}

if($markhi>=0 && $markhi<=10){$histgrade="E";}if($markhi>=11 && $markhi<=17){$histgrade="D-";}if($markhi>=18 && $markhi<=24){$histgrade="D";}
if($markhi>=25 && $markhi<=31){$histgrade="D+";}if($markhi>=32 && $markhi<=38){$histgrade="C-";}if($markhi>=39 && $markhi<=45){$histgrade="C";}
if($markhi>=46 && $markhi<=52){$histgrade="C+";}if($markhi>=53 && $markhi<=59){$histgrade="B-";}if($markhi>=60 && $markhi<=66){$histgrade="B";}
if($markhi>=67 && $markhi<=73){$histgrade="B+";}if($markhi>=74 && $markhi<=80){$histgrade="A-";}if($markhi>=81 && $markhi<=100){$histgrade="A";}

if($markcr>=0 && $markcr<=10){$cregrade="E";}if($markcr>=11 && $markcr<=17){$cregrade="D-";}if($markcr>=18 && $markcr<=24){$cregrade="D";}
if($markcr>=25 && $markcr<=31){$cregrade="D+";}if($markcr>=32 && $markcr<=38){$cregrade="C-";}if($markcr>=39 && $markcr<=45){$cregrade="C";}
if($markcr>=46 && $markcr<=52){$cregrade="C+";}if($markcr>=53 && $markcr<=59){$cregrade="B-";}if($markcr>=60 && $markcr<=66){$cregrade="B";}
if($markcr>=67 && $markcr<=73){$cregrade="B+";}if($markcr>=74 && $markcr<=80){$cregrade="A-";}if($markcr>=81 && $markcr<=100){$cregrade="A";}

if($markmg>=0 && $markmg<=10){$mggrade="E";}if($markmg>=11 && $markmg<=17){$mggrade="D-";}if($markmg>=18 && $markmg<=24){$mggrade="D";}
if($markmg>=25 && $markmg<=31){$mggrade="D+";}if($markmg>=32 && $markmg<=38){$mggrade="C-";}if($markmg>=39 && $markmg<=45){$mggrade="C";}
if($markmg>=46 && $markmg<=52){$mggrade="C+";}if($markmg>=53 && $markmg<=59){$mggrade="B-";}if($markmg>=60 && $markmg<=66){$mggrade="B";}
if($markmg>=67 && $markmg<=73){$mggrade="B+";}if($markmg>=74 && $markmg<=80){$mggrade="A-";}if($markmg>=81 && $markmg<=100){$mggrade="A";}

$quer="insert into results(student_id,exam_id,mark_id,eng,enggrade,kis,kisgrade,mat,matgrade,bio,biograde,chem,chemgrade,phy,phygrade,geo,geograde,bs,bsgrade,comp,compgrade,agri,agrigrade,hist,histgrade,cre,cregrade,total) values(
'$name[$i]','$exam_id','$id[$i]','$engend[$i]','$enggrade','$kisend[$i]','$kisgrade','$matend[$i]','$matgrade','$bioend[$i]','$biograde','$chemend[$i]','$chemgrade','$phyend[$i]','$phygrade','$geoend[$i]','$geograde','$bsend[$i]','$bsgrade','$compend[$i]','$compgrade','$agriend[$i]','$agrigrade','$histend[$i]','$histgrade','$creend[$i]','$cregrade','$total[$i]')";
$exe=mysql_query($quer);
}
if($exe){
echo"<script>window.open('examdepartment.php?success=Submission of marks is successful','_self')</script>";
}
else{
echo"<script>window.open('examdepartment.php?error=Unable to submit marks at this time','_self')</script>";
}
}
}
if(isset($_POST['undosubmarks'])){
$qu1="delete from results where exam_id='$exam_id'";
$ex1=mysql_query($qu1);
if($exe){
echo"<script>window.open('examdepartment.php?success=Current submitted marks are removed successful','_self')</script>";
}
else{
echo"<script>window.open('examdepartment.php?error=Unable to undo submission of marks at this time','_self')</script>";
}
}
}
}
?>