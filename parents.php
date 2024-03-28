<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['parents']){
header("location:parentslogin.php");

}
else{
$username=$_SESSION['parents'];
$sql1="select * from parents inner join students on students.student_id=parents.student_id where parents.username='$username'";
$run1=mysql_query($sql1);
$obj1=mysql_fetch_object($run1);
$student_id=$obj1->student_id;
$adm=$obj1->adm;

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
$pdf->Cell(50,10,"P.O BOX 20105, MOGOTIO",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"brightviewschool.ac.ke",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.brightvieschool.ac.ke",0,1,"C");
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
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #999 center 0px; padding-top:0px;}
		#body{background: #ccc center 0px; padding-top:0px;}
		#book th{background:#AAD4FF;}
			#book tr:nth-child(odd) td{background:#eee;}
			#book1 th{background:#AAD4FF;}
			
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 
<font color="white" size="5" style="margin-left:400px;margin-right:150px;">Parents Dashboard </font> 
 <section id="settings" style="float:right; margin-right:60px;margin-top:0px;">
<ul id="dropnav">
<li><img src="images/profile.png" height="40" width="40">
<ul>
<li><a href="changepassparents.php" style="width:120px;">Change Password</a></li>
<li><a href="parentslogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $username;?></font></li>
</ul>
</section></center>
 </section>
 </header>

 <section style="margin-left:500px;"><font color="green" size="4.5" ><?php echo @$_GET['success']; ?></font>
 <font color="red" size="4.5"><?php echo @$_GET['error']; ?></font>
 </section>
 <div id="tab"style="width: 1000px; margin: 0 auto; padding: 10px 0 40px;">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Exam transcripts </a></li>
            <li><a href="#view2">Fee statement</a></li>
            <li><a href="#view3">Report</a></li>

        </ul>
        <div class="tabcontents">
		<div id="view1">
	
	<?php 
	$sql1="select * from results inner join examdetails on examdetails.exam_id=results.exam_id where results.student_id='$student_id' order by result_id desc";
	$run2=mysql_query($sql1);
	if(mysql_num_rows($run2)>0){
	echo'<table border="1" style="border-spacing:0;width:600px;" id="book">
	<tr><th>Term</th><th>Month</th><th>Year</th><th>form</th><th>Option</th></tr>';
	while($res=mysql_fetch_object($run2)){
	?>
	<tr><td><?php echo $res->term; ?></td><td><?php echo $res->month; ?></td><td><?php echo $res->year; ?></td><td><?php echo $res->form; ?></td><td><a href="parents.php?resid=<?php echo $res->result_id;?>">Download transcript</a></td></tr>
	
	
	<?php
	}
	}
	else{
	echo"<font color='brown'>No transcripts were found </font>";

	
	}
	?>


	</table>
            </div>
			
			
            <div id="view2">
			<?php
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);

if($cur=mysql_num_rows($run)>0){
$name=mysql_fetch_array($run);
$date=date("d/m/Y");
echo "<table border='1' style='border-spacing:0px;'><tr><td style='border-right:0px;'><img src='images/techhigh.jpg' height='120' width='120'>
</td><td style='width:1000px;border-left:0px;' colspan='5'><section style='background:#eee;height:120px;'><center><font size='5'><b>BRIGHT VIEW SCHOOL</b></font>
<br/><font size='4'>STUDENT FEES STATEMENT AS AT  ".$date."</font></center><br/>
Registration No.".$name['adm'] ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:".$name['sname']."   ".$name['fname']."   ".$name['lname']."<br/>
Form: ".$name['form']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Classname: ". $name['classname' ]."
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
Group: ".$name['year']."</section></td></tr>

<tr><th>Receipt No.</th><th>Date</th><th>Description</th><th>Credit</th><th>Debit</th><th>Balance</th></tr>";

?>
<?php
$sq="select * from fee where adm='$adm'";
$ru=mysql_query($sq);
$count=mysql_num_rows($ru);
?>
<?php
while($res=mysql_fetch_object($ru)){
?>

<tr><td><?php echo $res->receipt;?></td>
<td><?php echo $res->dayt;?></td>
<td><?php echo $res->feedesc;?></td>
<td><?php echo $res->credit;?></td>
<td><?php echo $res->debit;?></td>
<td><?php echo $res->balance;?></td>
</tr>

<?php 
}
}
else{

echo "<script>window.open('parents.php?error=No record of students was found matching','_self')</script>";
}
?>
</table>
            </div>
			<div id="view3">
			<?php 
$query=mysql_query("SELECT * FROM report INNER JOIN students ON students.student_id=report.student_id INNER JOIN staff ON staff.id_staff=report.id_staff WHERE report.student_id='$student_id'") 
or die("could not search");
if(mysql_num_rows($query)>0){


echo ' <fieldset style="width:930px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">Search Results</legend>
						   <table id="book" border="1" style="border-spacing:0;width:930px;">
 <tr><th>Passport</th><th>Student Name</th><th>Adm no.</th><th>form</th><th>Classname</th><th>Date</th><th>Report</th><th>Staff</th></tr>
						   ';
while($row = mysql_fetch_object($query))
{
?>
<tr><td><img src="students/<?php echo $row->passport;?>" width="50" height="50"></td><td align="center"><?php echo $row->sname .'  '.$row->fname .'  '.$row->lname; ?></td>
<td align="center"><?php echo $row->adm; ?></td><td align="center"><?php echo $row->form; ?></td><td align="center"><?php echo $row->classname; ?></td>
<td><?php echo $row->dyte;?></td><td><?php echo $row->report ;?></td><td><?php echo $row->username;?></td>
<?php

}

}
else{
echo"<font color='brown'>There is no negative report about your son for now</font>";

}



?>
	</table>
			</fieldset>
			
            </div>
			<div id="view4">

            </div>
        </div>
    </div>

<div id="footer" style="margin-top:300px;">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>