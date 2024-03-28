<?php
if(isset($_POST['download'])){
require('connect.php');
$form=$_POST['form'];
$date=date("d/m/Y");
$total=0;
$sql="select * from feestructure where form='$form' order by subtotal desc";
$run=mysql_query($sql);
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
$pdf->Cell(50,10,"brightviewschool@gmail.com",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.brightviewschool.ac.ke",0,1,"C");
$pdf->cell(0,5,"  ",0,1);
$pdf->SetFont("times","B",12);
$pdf->Cell(190,8,"Form    {$form}   Fee Structure As at {$date}",1,1,"C");
$pdf->SetFont("times","",13);
$pdf->cell(0,5,"",0,1);
$pdf->cell(0,1,"",1,1);
$pdf->cell(0,5,"",0,1);
$pdf->SetFont("times","B",12);
$pdf->cell(51,8,"Fee Description",1,0);
$pdf->cell(33,8,"Term 1",1,0);
$pdf->cell(33,8,"Term 2",1,0);
$pdf->cell(33,8,"Term 3",1,0);
$pdf->cell(40,8,"Sub total",1,1);
$pdf->SetFont("times","",10);
while($obj=mysql_fetch_object($run)){
$pdf->cell(51,8,$obj->feedesc,1,0);
$pdf->cell(33,8,$obj->term1,1,0);
$pdf->cell(33,8,$obj->term2,1,0);
$total=$total+$obj->subtotal;
$pdf->cell(33,8,$obj->term3,1,0);
$pdf->cell(40,8,$obj->subtotal,1,1);
}
$pdf->SetFont("times","B",12);
$pdf->cell(150,8,"Total",1,0);
$pdf->cell(40,8,$total,1,1);


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
<li class="no-sub"><a class="top-heading" href="index.php">Home</a></li>


                
</li>
</ul>
</nav>
<section id='main'>
<center><font size="5" color="brown" ><b>Fee structure</b></font></center>
<fieldset style="width:500px;margin:0 auto; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
 <form action="" method="post">
<legend><font size="4" color="blue">Form</font></legend>
<input type="radio" name="form" value="1" /> Form 1<br />
<input type="radio" name="form" value="2" /> Form 2<br />
<input type="radio" name="form" value="3" /> Form 3<br />
<input type="radio" name="form" value="4" /> Form 4<br />
<br/>

<input type="submit" name="download" value="Download">
</form>
</fieldset>

</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
