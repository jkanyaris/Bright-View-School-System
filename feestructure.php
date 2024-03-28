<?php
session_start();
error_reporting(0);
if(!$_SESSION['accounts'])
{
header("location: stafflogin.php");
}else{
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
<li class="no-sub"><a class="top-heading" href="staffprofile.php">Staff Profile</a></li>
   	<li class="no-sub"><a class="top-heading" href="accounts.php">Fee Accounts</a></li>

                
</li>
</ul>
</nav>
 <center><font color="red" size="4"><?php echo @$_GET['error']; ?></font><font color="green" size="4"><?php echo @$_GET['success']; ?></font></center>

<section id="main">
<form action="feestructure.php" method="post">
<fieldset  style="border-radius:5px;margin:0 auto;margin-top:20px; height:300px; width:900px;">
<legend style="border:1px solid grey;border-radius:3px;">Add fee</legend>
<br/>
<select name="form" style="height:20px;width:150px; border-radius:5px;border:1px solid grey;" required="required">
<option value="">Form</option>
<option value="1">Form 1</option>
<option value="2">Form 2</option>
<option value="3">Form 3</option>
<option value="4">Form 4</option>
</select>
<br/><br/>
<fieldset style="width:200px;  border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="blue">Fee Description</font></legend>
<div style="overflow-x:hidden; overflow-y:scroll; height:80px;">
<input type="radio" name="feedesc" value="Tuition fee" /> Tuition<br />
<input type="radio" name="feedesc" value="Boarding fee" /> Boarding fee<br />
<input type="radio" name="feedesc" value=" Co-curriculum activity fee" /> Co-curriculum<br />
<input type="radio" name="feedesc" value="Development fee" /> Development<br />
<input type="radio" name="feedesc" value="Medical fee" /> Medical<br />
<input type="radio" name="feedesc" value="Transport fee" /> Transport<br />
<input type="radio" name="feedesc" value="Maintenance fee" /> Maintenance<br />
<input type="radio" name="feedesc" value="Caution money" /> Caution<br />

</div>
</fieldset>
<br/>
<input type="text" style="border-radius:5px; border:1px solid grey; height:20px;"name="term1" placeholder="Term 1 amount">
<input type="text" style="border-radius:5px; border:1px solid grey; height:20px;" name="term2" placeholder="Term 2 amount">
<input type="text" style="border-radius:5px; border:1px solid grey; height:20px;" name="term3" placeholder="Term 3 amount">
<br/><br/>
<input type="submit" name="subfee" value="submit">
</fieldset>
</form>
<?php 
require('connect.php');
if(isset($_POST['subfee'])){
$form=$_POST['form'];
$term1=$_POST['term1'];
$term2=$_POST['term2'];
$term3=$_POST['term3'];
$feedesc=$_POST['feedesc'];
$subtotal=$term1+$term2+$term3;
$sql="select * from feestructure where ((form='$form')and(feedesc='$feedesc'))";
$run=mysql_query($sql);
if(mysql_num_rows($run)>0){

echo"<script>window.open('feestructure.php?error=Fee details details already exist','_self')</script>";

}
else{
$sq="insert into feestructure(form,feedesc,term1,term2,term3,subtotal) values('$form','$feedesc','$term1','$term2','$term3','$subtotal')";
$ru=mysql_query($sq);
if($ru){
echo"<script>window.open('feestructure.php?success=Fee details submitted successfully','_self')</script>";
}
else{
echo"<script>window.open('feestructure.php?error=Could not submit Fee details at this time','_self')</script>";

}
}
}

?>
<form action="feestructure.php" method="post">
<fieldset  style="border-radius:5px;margin:0 auto;margin-top:20px; width:900px;">
<legend style="border:1px solid grey;border-radius:3px;">View A fee structure</legend>
<br/>
<select style="height:22px;width:150px; border-radius:5px;border:1px solid grey;" name="form" required="required">
<option value="">Form</option>
<option value="1">Form 1</option>
<option value="2">Form 2</option>
<option value="3">Form 3</option>
<option value="4">Form 4</option>
</select><input type="submit" name="viewfee" value="View">
</form>
<br/><br/><br/>
<form action="feestructure.php" method="post">

<?php 
error_reporting(0);
if(isset($_POST['viewfee'])){
$form=$_POST['form'];
$sql="select * from feestructure where form='$form' order by subtotal desc";
$run=mysql_query($sql);
$count=mysql_num_rows($run);
$total=0;
echo '<table border="1px" style="border-spacing:0; width:900px;">
<input type="hidden" name="count" value="'.$count.'">
<input type="hidden" name="form" value="'.$form.'">
<tr><th colspan="6" style="background:#D4D4FF;"><h2>Form'.$form.'</h2></th></tr>
<tr><th>Fee description</th><th>Term 1</th><th>Term 2</th><th>Term 3</th><th>Sub total</th><th>Option</th></tr>';
while($res=mysql_fetch_object($run)){
$total=$total+$res->subtotal;

?>
<input type="hidden" name="id[]" value="<?php echo $res->structure_id;?>">
<tr><td><?php echo $res->feedesc;?></td><td align="center"><input size="15" type="text" name="term1[]" value="<?php echo $res->term1;?>"></td><td align="center"><input size="15" type="text" name="term2[]" value="<?php echo $res->term2;?>"></td><td align="center"><input size="15" type="text" name="term3[]" value="<?php echo $res->term3;?>"></td><td align="center"><b><?php echo $res->subtotal;?></b></td><td><a href="feestructure.php?del=<?php echo $res->structure_id; ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td></tr>
<?php }
echo'<tr><td colspan="4"><b>Total</b></td><td  colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$total.'</b></td></tr>
</table><br/>
<center><input type="submit" name="update" value="Update"><input type="submit" style="margin-left:100px;"name="download" value="Download"></center>
';
}?>


</form>
</fieldset>
<?php 
if(isset($_POST['update'])){
$count=$_POST['count'];
$id=$_POST['id'];
$term1=$_POST['term1'];
$term2=$_POST['term2'];
$term3=$_POST['term3'];
for($i=0;$i<$count;$i++){
$upid=$id[$i];
$subtotal=$term1[$i]+$term2[$i]+$term3[$i];
$sql="update feestructure set term1='$term1[$i]',term2='$term2[$i]',term3='$term3[$i]',subtotal='$subtotal' where structure_id='$upid'";
$run=mysql_query($sql);
}
if($run){
echo"<script>window.open('feestructure.php?success=Fee details Updated successfully','_self')</script>";

}
else{
echo"<script>window.open('feestructure.php?error=Could not update Fee details at this time','_self')</script>";

}
}

if(isset($_GET['del'])){
$id=$_GET['del'];
$sql="delete from feestructure where structure_id='$id'";
$ru=mysql_query($sql);
if($ru){
echo"<script>window.open('feestructure.php?success=Fee record Deleted successfully','_self')</script>";


}

else{
echo"<script>window.open('feestructure.php?error=Could not delete record at this time','_self')</script>";


}
}
?>


</section>
<div id="footer">
<center><footer>Tech High School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>