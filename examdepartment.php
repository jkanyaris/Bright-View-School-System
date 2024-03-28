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
 echo"<script>window.open('examdepartment.php?error=The month is invalid for the selected term','_self')</script>";
 exit();
 }
 
 if(($term == 2) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('examdepartment.php?error=The month is invalid for the selected term','_self')</script>";
 
 exit();}
 if(($term == 3) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='May')||($month =='June')||($month =='July')||($month =='August'))){
 echo"<script>window.open('examdepartment.php?error=The month is invalid for the selected term','_self')</script>";
 exit();}
 if(mysql_num_rows($exe1)>0){
 $res=mysql_fetch_object($exe1);
 $exam_id=$res->exam_id;
 $_SESSION['exam_id']=$exam_id;

header('location:sortmarks.php');


}
else{
echo "<script>window.open('examdepartment.php?error=No exam marks sheet was found matching','_self')</script>";
}
}   
if(isset($_POST['viewsheetranking'])){
 $form=$_POST['form'];
 $examtype=$_POST['examtype'];
 $term=$_POST['term'];
 $month=$_POST['month'];
 $year=$_POST['year'];
 $sql1="select * from examdetails where ((form=$form)and(examtype='$examtype')and(term=$term)and(month='$month')and(year=$year))";
 $exe1=mysql_query($sql1);
 if(($term == 1) && (($month =='May') || ($month =='June') || ($month =='July') ||($month =='August')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('examdepartment.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();
 }
 
 if(($term == 2) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('examdepartment.php?erro=The month is invalid for the selected term','_self')</script>";
 
 exit();}
 if(($term == 3) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='May')||($month =='June')||($month =='July')||($month =='August'))){
 echo"<script>window.open('examdepartment.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();}
 if(mysql_num_rows($exe1)>0){
 $res=mysql_fetch_object($exe1);
 $exam_id=$res->exam_id;
 $_SESSION['exam_id']=$exam_id;

header('location:rank.php');


}
else{
echo "<script>window.open('examdepartment.php?erro=No exam marks sheet was found matching','_self')</script>";
}
}
if(isset($_POST['viewresults'])){
 $form=$_POST['form'];
 $examtype=$_POST['examtype'];
 $term=$_POST['term'];
 $month=$_POST['month'];
 $year=$_POST['year'];
 $sql1="select * from examdetails where ((form=$form)and(examtype='$examtype')and(term=$term)and(month='$month')and(year=$year))";
 $exe1=mysql_query($sql1);
 if(($term == 1) && (($month =='May') || ($month =='June') || ($month =='July') ||($month =='August')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('examdepartment.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();
 }
 
 if(($term == 2) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='September')||($month =='October')||($month =='November')||($month =='December'))){
 echo"<script>window.open('examdepartment.php?erro=The month is invalid for the selected term','_self')</script>";
 
 exit();}
 if(($term == 3) && (($month =='January') || ($month =='February') || ($month =='March') ||($month =='April')||($month =='May')||($month =='June')||($month =='July')||($month =='August'))){
 echo"<script>window.open('examdepartment.php?erro=The month is invalid for the selected term','_self')</script>";
 exit();}
 if(mysql_num_rows($exe1)>0){
 session_start();
$res=mysql_fetch_object($exe1);
 $exam_id=$res->exam_id;
 $_SESSION['exam_id']=$exam_id;
header('location:multipleresults.php');


}
else{
echo "<script>window.open('examdepartment.php?err=No exam marks sheet was found matching','_self')</script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
	<link href="css/template1/tabcontent.css" rel="stylesheet" type="text/css" />
	<link href="css/drop.css" rel="stylesheet" type="text/css" />
	<script src="css/tabcontent.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #999  no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc  no-repeat center 0px; padding-top:0px;}
    </style>
</head>
<body>
<div id="body">

 <img src="images/log.jpg" id="log">

 <section id="logex">
  <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a></font><font color="white" size="5" style="margin-left:200px;">Welcome to Exam Department </font> 
 <section id="settings" style="float:right; margin-right:60px; padding-bottom:30px;">
<ul id="dropnav">
<li><img src="images/profile.png" height="40" width="40">
<ul><li><a href="myprofilestaff.php" style="width:120px;">My Profile</a></li>
<li><a href="changepassstaff.php" style="width:120px;">Change Password</a></li>
<li><a href="stafflogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $_SESSION['teaching'];?></font></li>
</ul>
</section></center>
 </section>
   <div style="width: 1100px; margin: 0 auto; padding: 40px 0 40px;">
        <ul class="tabs" data-persist="true">
		<li><a href="createmarksheet.php">New Marks sheet</a></li>
		<li><a href="viewmarksheet.php">View marks sheet</a></li>
            <li><a href="#view1">Sort Marks</a></li>
            <li><a href="#view2">Ranking</a></li>
            <li><a href="#view3">Results/Transcripts</a></li>
			
        </ul>
        <div class="tabcontents">
            <div id="view1">
               <center><section style="margin-top:10px; "><font color="brown" size="4"><?php echo @$_GET['success'];?></font><font color="red" size="4"><?php echo @$_GET['error'];?></font></section></center>
               <fieldset id="fieldset" style="border-radius:10px; width:1000px; height:500px; margin: 0 auto; margin-bottom:50px;">
 <section id="heading"> <center ><font color="878787" size="5"><u>Select exam marks sheet to sort marks</u></font></center></section>
 <section style="padding-left:100px; padding-top: 50px;">
 <fieldset style="border-radius:5px; width:760px; margin-bottom:50px; height:100px;">
 <form action="examdepartment.php" method="post">
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
                
            </div>
            <div id="view2">
              <center><section style="margin-top:10px; "><font color="brown" size="4"><?php echo @$_GET['succes'];?></font><font color="red" size="4"><?php echo @$_GET['erro'];?></font></section></center>
               <fieldset id="fieldset" style="border-radius:10px; width:1000px; height:500px; margin: 0 auto; margin-bottom:50px;">
 <section id="heading"> <center ><font color="B10707" size="5"><u>Select exam marks sheet to award positions </u></font></center></section>
 <section style="padding-left:100px; padding-top: 50px;">
 <fieldset style="border-radius:5px; width:760px; margin-bottom:50px; height:100px;">
 <form action="examdepartment.php" method="post">
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
 <input id="input" type="submit" name="viewsheetranking" value="Rank">
 </form>
 
 </section>
 </fieldset>                
            </div>
			<div id="view3">
	<center><section style="margin-top:10px; "><font color="red" size="4"><?php echo @$_GET['err'];?></font></section></center>

               <fieldset id="fieldset" style="border-radius:10px; width:1000px; height:500px; margin: 0 auto; margin-bottom:50px;">
 <section style="padding-left:100px;">
 <fieldset style="border-radius:5px; width:760px; margin-bottom:50px; height:100px;">
 <legend><font color="brown" size="4">Search a transcript</font></legend>
 <form action="searchresults.php" method="post">
 <input type="text" style="border-radius:5px; width:350px; height:20px;" name="search" placeholder="Enter adm no. /surname /firstname /lastname to search" required="required">
 <input type="submit" name="searchresults" value="Search Transcript" style="height:25px;">
 </form>
 </fieldset>
 <fieldset style="border-radius:5px; width:760px; margin-bottom:10px; height:150px;">
 <legend><font color="brown" size="4">Select exam marks sheet for multiple results </font></legend>
 <form action="examdepartment.php" method="post">
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
 <input  type="submit" name="viewresults" value="View results"> 
  
 </form>
 
 </section>
 </fieldset>
			               
            </div>
            
        </div>
    </div>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php
} ?>