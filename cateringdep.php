<?php 
require('connect.php');
session_start();
if(!$_SESSION['catering']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['catering'];
if(isset($_POST['download'])){
$month=$_POST['month'];
$year=$_POST['year'];
$sql="select * from catering where month='$month' and year='$year' ";
$run=mysql_query($sql);
$total=0;
require('pdf/fpdf.php');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("times","B",15);
$pdf->Image('images/techhigh.jpg',10,8,33);
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"BRIGHT VIEW SCHOOL",0,1,"C");
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"P.O BOX 44, 20105 MOGOTIO",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"brightview@gmail.com",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.brightviewschool.ac.ke",0,1,"C");
$pdf->cell(0,5,"  ",0,1);
$pdf->SetFont("times","B",12);
$pdf->Cell(190,8,"Catering Department Expenditure for {$month} {$year}",1,1,"C");
$pdf->SetFont("times","",13);
$pdf->cell(0,5,"",0,1);
$pdf->cell(0,1,"",1,1);
$pdf->cell(0,5,"",0,1);
$pdf->SetFont("times","B",12);
$pdf->cell(25,7,"Date",1,0);
$pdf->cell(30,7,"Month",1,0);
$pdf->cell(15,7,"Year",1,0);
$pdf->cell(30,7,"Product",1,0);
$pdf->cell(30,7,"Package",1,0);
$pdf->cell(15,7,"Qty",1,0);
$pdf->cell(20,7,"Price",1,0);
$pdf->cell(25,7,"Sub total",1,1);
$pdf->SetFont("times","",10);
while($obj=mysql_fetch_object($run)){
$pdf->cell(25,7,$obj->day,1,0);
$pdf->cell(30,7,$obj->month,1,0);
$pdf->cell(15,7,$obj->year,1,0);
$pdf->cell(30,7,$obj->product,1,0);
$pdf->cell(30,7,$obj->package,1,0);
$pdf->cell(15,7,$obj->quantity,1,0);
$pdf->cell(20,7,$obj->price,1,0);
$pdf->cell(25,7,$obj->subtotal,1,1);
$total=$total+$obj->subtotal;
}
$pdf->SetFont("times","B",12);
$pdf->cell(165,8,"Total",1,0);
$pdf->cell(25,8,$total,1,1);


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
			
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a><font color="white" size="4" style="margin-left:250px;">Catering Department</font> 
 <section id="settings" style="float:right; margin-right:60px; padding-bottom:30px;">
<ul id="dropnav">
<li><img src="images/profile.png" height="40" width="40">
<ul><li><a href="myprofilestaff.php" style="width:120px;">My Profile</a></li>
<li><a href="changepassstaff.php" style="width:120px;">Change Password</a></li>
<li><a href="stafflogout.php"style="width:120px;" >Log out</a></li>
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
            <li><a href="#view1">Submit records </a></li>
            <li><a href="#view2">View records</a></li>
            <li><a href="#view3">Edit records</a></li>
		
        </ul>
        <div class="tabcontents">
		<div id="view1">
		<form action="" method="post">
<table border='1'style="width:500px; border-spacing:0" id="book">
<tr><th>Month</th><td><select required="required"  style="border-radius:4px;width:173px;" name="month">
  <option value="">   </option>
   <option value="January">January</option>
   <option value="February">February</option>
   <option value="March">March</option>
   <option value="April">April</option>
   <option value="May">May</option>
   <option value="June">June</option>
   <option value="July">July</option>
   <option value="August">August</option>
   <option value="September">September</option>
   <option value="October">October</option>
   <option value="November">November</option>
   <option value="December">December</option>
 </select></tr>
<tr><th>Year</th>
<td>
<select required="required" style="border-radius:4px;width:173px;" name="year">
  <option value=" "></option>
   <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
 <option value="2018">2018</option>
 <option value="2019">2019</option>
 <option value="2020">2020</option>
 
 </select>
</td></tr>
<tr><th>Product</th><td><input type="text" style="border-radius:4px;width:173px;border:1px solid grey;" name="product" placeholder="example:maize" required="required"></td></tr>
<tr><th>Package</th><td><input type="text" style="border-radius:4px;width:173px;border:1px solid grey" name="package" placeholder="example,bags,kg,gallons" required="required"></td></tr>
<tr><th>Quantity</th><td><input type="text" style="border-radius:4px;width:173px;border:1px solid grey" name="quantity" placeholder="example:10,15" required="required"></td></tr>
<tr><th>Price</th><td><input type="text" style="border-radius:4px;width:173px;border:1px solid grey" name="price" placeholder="Price per package " required="required"></td>
</tr>
</table>
<br/><br/>
<input type="submit" name="submit" value="submit">
</form>
<?php 
if(isset($_POST['submit'])){
$date=date("d/m/Y");
$month=$_POST['month'];
$year=$_POST['year'];
$product=$_POST['product'];
$package=$_POST['package'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$sql="insert into catering(day,month,year,product,package,quantity,price,subtotal)
values('$date','$month','$year','$product','$package','$quantity','$price',$quantity*$price)";
$run=mysql_query($sql);

if($run){
echo"<script>window.open('cateringdep.php?success=Record submitted successfully','_self')</script>";

}
else{
echo"<script>window.open('cateringdep.php?error=Unable to submit record at this time','_self')</script>";
}
}

?>


            </div>
			
			
            <div id="view2">
					<form action="" method="post">
			<fieldset style="width:900px; height:150px; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 "><legend><font size="4" color="blue">Select record period</font></legend>
			<select required="required"  style="border-radius:4px;width:173px;" name="month">
  <option value="">Month   </option>
   <option value="January">January</option>
   <option value="February">February</option>
   <option value="March">March</option>
   <option value="April">April</option>
   <option value="May">May</option>
   <option value="June">June</option>
   <option value="July">July</option>
   <option value="August">August</option>
   <option value="September">September</option>
   <option value="October">October</option>
   <option value="November">November</option>
   <option value="December">December</option>
 </select>
 <select required="required" style="border-radius:4px;width:173px;" name="year">
  <option value=" ">Year</option>
   <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
 <option value="2018">2018</option>
 <option value="2019">2019</option>
 <option value="2020">2020</option>
 </select>
 <br/><br/><br/>
 <input type="submit" name="view" value="View">
 </form>
 </fieldset>
 <form action="" method="post">
 <?php 
 if(isset($_POST['view'])){
 $month=$_POST['month'];
 $year=$_POST['year'];
 $sql="select * from catering where month='$month' and year='$year' ";
$run=mysql_query($sql);
$total=0;

if(mysql_num_rows($run)>0){
 echo'<center><input style="margin-top:20px;"type="submit" name="download" value="Download" ></center><fieldset style="width:900px;border-radius:4px;">
	<center><section style="margin:0 auto;"><table>
	<input type="hidden" name="month" value="'.$month.'">
		<input type="hidden" name="year" value="'.$year.'">

	<tr><th>Bright View School</th><tr>
	<tr><th>Catering Department Expenditure</th><tr>
		<tr><th>For This Period</th><tr>

	</table></section>	</center>	
<table border="1"style="width:900px;border-spacing:0;" id="book" >
<tr><th>Date</th><th>Month</th><th>Year</th><th>Product</th><th>Package</th><th>Quantity</th><th>Price</th><th>Subtotal</th></tr>';
 while($res=mysql_fetch_object($run)){
?>
<tr>
<td><?php echo $res->day;?></td>
<td><?php echo $res->month;?></td>
<td><?php echo $res->year;?></td>
<td><?php echo $res->product;?></td>
<td><?php echo $res->package;?></td>
<td><?php echo $res->quantity;?></td>
<td><?php echo $res->price;?></td>
<td><?php echo $res->subtotal;?></td>


</tr>
<?php $total=$total+$res->subtotal; }  }
else{
echo"<script>window.open('cateringdep.php?error=No record was found matching month and year','_self')</script>";
}
?>
<tr><td colspan="7"></td><td><b><?php echo $total?></b></td></tr>
</table>
</fieldset>
</form>
<?php }

?>
            </div>
			<div id="view3">
		
	<form action="" method="post">
			<fieldset style="width:900px; height:150px; border-radius:3px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 "><legend><font size="4" color="blue">Select record period</font></legend>
			<select required="required"  style="border-radius:4px;width:173px;" name="month">
  <option value="">Month   </option>
   <option value="January">January</option>
   <option value="February">February</option>
   <option value="March">March</option>
   <option value="April">April</option>
   <option value="May">May</option>
   <option value="June">June</option>
   <option value="July">July</option>
   <option value="August">August</option>
   <option value="September">September</option>
   <option value="October">October</option>
   <option value="November">November</option>
   <option value="December">December</option>
 </select>
 <select required="required" style="border-radius:4px;width:173px;" name="year">
  <option value=" ">Year</option>
   <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
 <option value="2018">2018</option>
 <option value="2019">2019</option>
 <option value="2020">2020</option>
 </select>
 <br/><br/><br/>
 <input type="submit" name="edit" value="View">
 </form>
 </fieldset>
  <?php 
 if(isset($_POST['edit'])){
 $month=$_POST['month'];
 $year=$_POST['year'];
 $sql="select * from catering where month='$month' and year='$year' ";
$run=mysql_query($sql);
if(mysql_num_rows($run)>0){
echo'<fieldset style="margin-top:20px;width:900px;border-radius:4px;"><table border="1"style="width:900px;border-spacing:0;" id="book" >
<tr><th>Date</th><th>Month</th><th>Year</th><th>Product</th><th>Package</th><th>Quantity</th><th>Price</th><th>Subtotal</th><th>Edit</th><th>Del</th></tr>';
   while($res=mysql_fetch_object($run)){
?>
<tr>
<td><?php echo $res->day;?></td>
<td><?php echo $res->month;?></td>
<td><?php echo $res->year;?></td>
<td><?php echo $res->product;?></td>
<td><?php echo $res->package;?></td>
<td><?php echo $res->quantity;?></td>
<td><?php echo $res->price;?></td>
<td><?php echo $res->subtotal;?></td>
<td><a href="cateringdep.php?edit=<?php echo $res->catering_id;?>">Edit</a></td>
<td><a href="cateringdep.php?del=<?php echo $res->catering_id;?>" onClick="return confirm('You are about to delete this record')">Del</a></td>


</tr>
<?php }  }
else{
echo"<script>window.open('cateringdep.php?error=No record was found matching month and year','_self')</script>";
}
?>
</table>
</fieldset>
<?php } ?>
<form action="" method="post">
<?php 
 if(isset($_GET['edit'])){
 echo'<fieldset style="margin-top:20px;height:50px;width:900px;border-radius:4px;">';
 $id=$_GET['edit'];
 $sql="select * from catering where catering_id='$id'";
 $run=mysql_query($sql);
 $res=mysql_fetch_object($run);

?> 
<table border="1"style="width:900px;border-spacing:0;" id="book" >
<tr><th>Date</th><th>Month</th><th>Year</th><th>Product</th><th>Package</th><th>Quantity</th><th>Price</th><th>Option</th></tr>
   <tr><td><?php echo $res->day;?></td>
   <input size="10"type="hidden" name="id" value="<?php echo $id; ?>">
<td>			<select required="required"  style="border-radius:4px;width:150px;" name="month">
  <option value="<?php echo $res->month; ?>"><?php echo $res->month; ?>   </option>
   <option value="January">January</option>
   <option value="February">February</option>
   <option value="March">March</option>
   <option value="April">April</option>
   <option value="May">May</option>
   <option value="June">June</option>
   <option value="July">July</option>
   <option value="August">August</option>
   <option value="September">September</option>
   <option value="October">October</option>
   <option value="November">November</option>
   <option value="December">December</option>
 </select></td>
<td> <select required="required" style="border-radius:4px;width:150px;" name="year">
  <option value="<?php echo $res->year;?> "><?php echo $res->year;?></option>
   <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
 <option value="2018">2018</option>
 <option value="2019">2019</option>
 <option value="2020">2020</option>
 </select></td>
<td><input size="10" type="text" name="product" value="<?php echo $res->product;?>"></td>
<td><input size="10"type="text" name="package" value="<?php echo $res->package;?>"></td>
<td><input size="10" type="text" name="quantity" value="<?php echo $res->quantity;?>"></td>
<td><input size="10" type="text" name="price" value="<?php echo $res->price;?>"></td>
<td><input type="submit" name="update" Value="Update"></td>
</tr>  
</table> 

</fieldset>
<?php } ?>
</form>
<?php 
if(isset($_POST['update'])){
$id=$_POST['id'];
$date=date("d/m/Y");
$month=$_POST['month'];
$year=$_POST['year'];
$product=$_POST['product'];
$package=$_POST['package'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$sub=$quantity*$price;
$sql="update catering set day='$date',month='$month',year='$year',product='$product',package='$package',quantity='$quantity',price='$price', subtotal='$sub' where catering_id='$id'";
$run=mysql_query($sql);
if($run){
echo"<script>window.open('cateringdep.php?success=Record Updated successfully','_self')</script>";

}
else{
echo"<script>window.open('cateringdep.php?error=Unable to  Update record at this time','_self')</script>";
}
}
 
 if(isset($_GET['del'])){
$del=$_GET['del'];
$sql="delete from catering where catering_id='$del'";
$run=mysql_query($sql);
 if($run){
echo"<script>window.open('cateringdep.php?success=Record Deleted successfully','_self')</script>";

}
else{
echo"<script>window.open('cateringdep.php?error=Unable to  Delete record at this time','_self')</script>";
}
 }
?>

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