<?php
session_start();
error_reporting(0);
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{ 
require('connect.php');
 if(isset($_POST['viewsheet'])){
 $form=$_POST['form'];
 $examtype=$_POST['examtype'];
 $term=$_POST['term'];
 $month=$_POST['month'];
 $year=$_POST['year'];
 $sql1="select * from examdetails where ((form=$form)and(examtype='$examtype')and(term=$term)and(month='$month')and(year=$year))";
 $exe1=mysql_query($sql1);
 if(($term == 1) && (($month =='May') || ($month =='June') || ($month =='July') ||($month =='August')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('viewmarksheet.php?error=The month is invalid for the selected term','_self')</script>";
 exit();
 }
 
 if(($term == 2) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('viewmarksheet.php?error=The month is invalid for the selected term','_self')</script>";
 
 exit();}
 if(($term == 3) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='May')||($month =='June')||($month =='July')||($month =='August'))){
 echo"<script>window.open('viewmarksheet.php?error=The month is invalid for the selected term','_self')</script>";
 exit();}
 if(mysql_num_rows($exe1)>0){
 $res=mysql_fetch_object($exe1);
 $exam_id=$res->exam_id;
session_start();
$_SESSION['exam_id']=$exam_id;

header('location:exam.php');


}
else{
echo "<script>window.open('viewmarksheet.php?error=No exam marks sheet was found matching','_self')</script>";
}
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
<a href="examdepartment.php">
<div>
<li>Back</li>
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
  <style type="text/css">
 

#fieldset{

background: #eeeeee;
background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc));
background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -o-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -ms-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: linear-gradient(top, #eeeeee 0%,#cccccc 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 );

}
 </style>
 <center><section style="margin-top:10px; "><font color="green" size="4"><?php echo @$_GET['success'];?></font><font color="red" size="4"><?php echo @$_GET['error'];?></font></section></center>
<fieldset id="fieldset" style="border-radius:10px; width:1120px; height:500px; margin: 0 auto; margin-bottom:50px;">
 <section id="heading"> <center ><font color="878787" size="5"><u>Select the following to view exam marks sheet </u></font></center></section>
 <section style="padding-left:200px; padding-top: 50px;">
 <fieldset style="border-radius:5px; width:760px; margin-bottom:50px; height:100px;">
 <form action="viewmarksheet.php" method="post">
 <font size="4" color="brown">Form</font>:&nbsp;&nbsp;&nbsp;<select required="required"   style="border-radius:5px;" name="form"><option value=""></option>
 <option value="1">Form 1</option>
 <option value="2">Form 2</option>
 <option value="3">Form 3</option>
 <option value="4">Form 4</option>
 </select>&nbsp;&nbsp;&nbsp;
 <font size="4" color="brown">Exam Type</font>:&nbsp;&nbsp;&nbsp;<select required="required"  style="border-radius:5px;"name="examtype">
 <option value="">      </option>
 <option value="Normal">Normal</option>
 <option value="Special">Special</option>
</select>&nbsp;&nbsp;&nbsp;
 <font size="4" color="brown">Term</font>:&nbsp;&nbsp;&nbsp;<select required="required"  style="border-radius:5px;" name="term">
 <option value="">      </option>
 <option value="1">Term 1</option>
 <option value="2">Term 2</option>
 <option value="3">Term 3</option>
</select>&nbsp;&nbsp;&nbsp;
 <font size="4" color="brown">Month</font>:&nbsp;&nbsp;&nbsp;<select required="required"  style="border-radius:5px;" name="month">
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
 </select>&nbsp;&nbsp;&nbsp;
 <font size="4" color="brown">Year</font>:&nbsp;&nbsp;&nbsp;
 <select required="required" style="border-radius:5px;" name="year">
  <option value=""></option>
   <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
 <option value="2018">2018</option>
 <option value="2019">2019</option>
 <option value="2020">2020</option>
 
 </select><br/><br/>
 </fieldset >
 <input id="input" type="submit" name="viewsheet" value="View Marks Sheet">
 </form>

 </section>
 </fieldset>
 
 <div id="footer" style="margin-top:50px;">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>

<?php  } ?>
