<?php
session_start();
error_reporting(0);
if(!$_SESSION['boarding'])
{
header("location: stafflogin.php");
}
else{
 if(isset($_POST['Allocate'])){
header('location: allocate.php');
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
        body { background: #999 center 0px; padding-top:0px;}
		#body{background: #ccc  center 0px; padding-top:0px;}
				#links ul{ 


width:1100px;
height:40px;
margin:0 auto;
border-radius:7px;
list-style:none;}
#links div{
float:left;
border-right:1px solid grey;
width:200px;
height:30px;
margin-top:7px;
text-align:center;
}
#links li{
float:left;
width:200px;
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
<section>
<div id="body" >
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 
  <nav id="links">
  
<ul>


<div>
<li><font size="4"<left><a href="boarding.php" style="color:#FFFFFF">Back</a></li>
</div>
<a href="boarding.php">
<div>
<li>Boarding</li>
</div>
</a>
<a href="cubeclearanceform.php">
<div>
<li>Clear Cube</li>
</div>
</a>
</ul>
<nav>
 </section>
 </header>
 <center><section style="margin-top:10px; "><font color="green" size="4"><?php echo @$_GET['message'];?></font><font color="red" size="4"><?php echo @$_GET['error'];?></font></section></center>
 <section style="width:600px; margin-top:40px;">
 <fieldset style="border-radius:5px;">
 <legend ><font size="5" color="brown">Cube allocation form</font></legend>
 <form action="allocationdetails.php" method="post">
 <div style="height:40px; font-size:20px; background:#E1E1E1;border-radius:5px; padding-top:10px;padding-left:10px;">Admission number
 <select style="width:80px;" name="admyear" required="required" >
  <option value=""></option>
 <option value="011">011</option>
 <option value="012">012</option>
 <option value="013">013</option>
 <option value="014">014</option>
 <option value="015">015</option>
 <option value="016">016</option>
 <option value="017">017</option>
 <option value="018">018</option>
 <option value="019">019</option>
 <option value="020">020</option>
 </select>
  <select name="admno" required="required"style="width:80px;" >
 <option value=""></option>
 <option value="001">001</option>
 <option value="002">002</option>
 <option value="003">003</option>
 <option value="004">004</option>
 <option value="005">005</option>
 <option value="006">006</option>
 <option value="007">007</option>
 <option value="008">008</option>
 <option value="009">009</option>
 <option value="010">010</option>
 <option value="011">011</option>
 <option value="012">012</option>
 <option value="013">013</option>
 <option value="014">014</option>
 <option value="015">015</option>
 <option value="016">016</option>
 <option value="017">017</option>
 <option value="018">018</option>
 <option value="019">019</option>
 <option value="020">020</option>
 <option value="021">021</option>
 <option value="022">022</option>
 <option value="023">023</option>
 <option value="024">024</option>
 <option value="025">025</option>
 <option value="026">026</option>
 <option value="027">027</option>
 <option value="028">028</option>
 <option value="029">029</option>
 <option value="030">030</option>
 </select> </div><br/>
 <div style="height:40px; font-size:20px; background:#E1E1E1;border-radius:5px; padding-top:10px;padding-left:10px;">Form
  <select name="form" required="required" style="width:80px; margin-left:110px;" >
 <option value=""></option>
 <option value="1">Form 1</option>
 <option value="2">Form 2</option>
 <option value="3">Form 3</option>
 <option value="4">Form 4</option>
 </select>
 </div>
 <br/>
 <input type="submit" name="view" value="Verify student" style="border-radius:5px; margin-top:20px;"/>
 </form>

 </fieldset>
 </section>
  
  <?php 
 require('connect.php');
 if(isset($_POST['view']) ){
 
 $admyear=$_POST['admyear'];
 $admno=$_POST['admno'];
 $adm=$admyear.$admno;
 $form=$_POST['form'];

 
$query="select * from students where( (adm='$adm')and(form='$form'))";
$exe=mysql_query($query);
$row=mysql_num_rows($exe);

if($row){
$obj=mysql_fetch_object($exe);
 $sname=$obj->sname;
 $fname=$obj->fname; 
 $lname=$obj->lname;
 $id=$obj->student_id;
 $name=$sname.'   '.$fname.'   '.$lname;
 $form=$obj->form;
 $class=$obj->classname;
 $classname=$form.$class;
 session_start();
 $_SESSION['sess_allocation']=$id;

 ?>
 <section style="width:600px; ">
 <fieldset style="border-radius:5px;">
 <legend ><font size="5" color="brown">Student details found</font></legend>
 <form action="allocationdetails.php" method="post">
 <table style="width:400px; border-radius:5px;" id="sdetails">
 <tr><td ><b><i><font color="brown">Passport</font></i></b></td><td><img src="students/<?php echo $obj->passport;?>" width="100" height="100"></td></tr>
 <tr><td><b><i><font color="brown">Name</font></i></b></td><td><?php echo $name; ?></td></tr>
 <tr><td><b><i><font color="brown">Adm no.</font></i></b></td><td><?php echo $obj->adm; ?></td></tr>
 <tr><td><b><i><font color="brown">Class</font></i></b></td><td><?php echo $classname; ?></td></tr>
 <tr><td><b><i><font color="brown">Year</font></i></b></td><td><?php echo $obj->year; ?></td></tr>
 <tr><td><b><i><font color="brown">House</font></i></b></td><td>
 <?php

$sq="select * from allocation inner join dorm on dorm.dorm_id=allocation.dorm_id where allocation.student_id='$id'";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$res=mysql_fetch_object($ru);
echo $res->house .'</td></tr>
 <tr><td><b><i><font color="brown">Cube no.</font></i></b></td><td>'.$res->cubeno .'</td></tr>';
} 
else {
echo '</td></tr>
 <tr><td><b><i><font color="brown">Cube no.</font></i></b></td><td></td></tr>';
}?>
 </table>
 <input type="submit" name="Allocate" value="Allocate a cube to above student" style="border-radius:5px; margin-top:20px;"/>
 </form>
 </fieldset>
 </section>
 <?php 
 }
 else{
 echo"<script>alert('Sorry no student record found matching the selected details ')</script>";
 
 }
 }

 ?>
 
 
 <div id="footer" style="margin-top:300px;">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>

