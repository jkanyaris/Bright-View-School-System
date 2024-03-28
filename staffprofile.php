<?php 
require('connect.php');error_reporting(0);
session_start();
if(!($_SESSION['staff'] or $_SESSION['admin'])){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['staff'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
 <link href="css/drop.css" rel="stylesheet" type="text/css" />

  <style>
        body { background: #999  no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc  no-repeat center 0px; padding-top:0px;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 
<font color="white" size="5" style="margin-left:400px;margin-right:150px;">Staff Dashboard </font> 
 <section id="settings" style="float:right; margin-right:60px;margin-top:0px;">
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
<style type="text/css">
#top{ height:10px;
background: #eeeeee;
background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc));
background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -o-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -ms-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: linear-gradient(top, #eeeeee 0%,#cccccc 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 );
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
border-bottom:1px solid black;
}
#main{width:900px;height:760px; background:white;border-radius:3px;
margin-top:5px;
margin-bottom:30px;
overflow-x:hidden;overflow-y:scroll;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
margin-left:5px;
}
#aside{width:275px;
height:760px;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
border-left:1px solid black;
border-bottom:1px solid black;
float:right;
margin-top:-795px;
background: #eeeeee;
background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#cccccc));
background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -o-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: -ms-linear-gradient(top, #eeeeee 0%,#cccccc 100%);
background: linear-gradient(top, #eeeeee 0%,#cccccc 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#cccccc',GradientType=0 );

}
#option{background:blue;}
#button:hover{background-color:#AAD4FF;}
	#results{width:100%; margin-top:10px; border-spacing:0px;}	
#results{background:white;}
		#results th{background: #e4efc0;
background: -moz-linear-gradient(top, #e4efc0 0%, #abbd73 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e4efc0), color-stop(100%,#abbd73));
background: -webkit-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: -o-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: -ms-linear-gradient(top, #e4efc0 0%,#abbd73 100%);
background: linear-gradient(top, #e4efc0 0%,#abbd73 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e4efc0', endColorstr='#abbd73',GradientType=0 );}
			#results tr:nth-child(odd) td{background:#eee;}
}
#tdform{

background: -moz-linear-gradient(top, rgba(30,87,153,1) 0%, rgba(125,185,232,0) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,0)));
background: -webkit-linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: -o-linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: -ms-linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
background: linear-gradient(top, rgba(30,87,153,1) 0%,rgba(125,185,232,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#007db9e8',GradientType=0 );
}
#aside li{list-style:none;
height:25px; margin:0 auto; }
#aside a{text-decoration:none;}
 
#li:hover{
color:brown;
background: #b2e1ff;
background: -moz-linear-gradient(top, #b2e1ff 0%, #66b6fc 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b2e1ff), color-stop(100%,#66b6fc));
background: -webkit-linear-gradient(top, #b2e1ff 0%,#66b6fc 100%);
background: -o-linear-gradient(top, #b2e1ff 0%,#66b6fc 100%);
background: -ms-linear-gradient(top, #b2e1ff 0%,#66b6fc 100%);
background: linear-gradient(top, #b2e1ff 0%,#66b6fc 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b2e1ff', endColorstr='#66b6fc',GradientType=0 );

}
#li{
color:white;
background: #4f85bb;
background: -moz-linear-gradient(top, #4f85bb 0%, #4f85bb 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4f85bb), color-stop(100%,#4f85bb));
background: -webkit-linear-gradient(top, #4f85bb 0%,#4f85bb 100%);
background: -o-linear-gradient(top, #4f85bb 0%,#4f85bb 100%);
background: -ms-linear-gradient(top, #4f85bb 0%,#4f85bb 100%);
background: linear-gradient(top, #4f85bb 0%,#4f85bb 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4f85bb', endColorstr='#4f85bb',GradientType=0 );
height:30px; border-radius:5px; border:1px solid grey;margin-bottom:10px;text-align:center;font-size:18px; margin-right:40px;}

</style>

 </nav>
 <section id="main">

 
 <div id="mabodi" style="margin:15px;">
 <h3 style="color:#990000;">About Bright View School</h3>
 <p>Bright View School was started on January 2005. 
It is a learning institution offering 8-4-4 Kenya system of education. 
It is a private 
school having form one to form four
 classes each having 4 streams. It has an estimated population of about 
 700 students and 55 teaching and non-teaching staff. It is located at Baringo
 county Mogotio Sub-County along Nakuru-Marigat Road.</p>
 <h3 style="color:#990000;">Our Vision</h3>
 <p>We are commited to provide educational excellence fo all.</p>
 <h3 style="color:#990000;">Our Mission</h3>
We provide the highest quality education so that all of our students are empowered to lead productive and fullfilling lives as lifelong learners and responsible citizens
 </div>
 </section>
 
 </section>
 </form>
 <aside id="aside">
<fieldset style="width:200px;margin:0 auto; border-radius:3px; margin-top:20px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="brown">Quick Links</font></legend>
<ul>
<?php if($_SESSION['schadmin']){
echo '<a href="admission.php"><div id="li"><li>Admission</li></div></a>';
}
if($_SESSION['teaching']){
echo '<a href="examdepartment.php"><div id="li"><li>Exam</li></div></a>';
}
if($_SESSION['math']){
echo '<a href="matdep.php"><div id="li">Mathematics<li></li></div></a>';
}
if($_SESSION['languages']){
echo '<a href="langdep.php"><div id="li">Languages<li></li></div></a>';
}
if($_SESSION['sciences']){
echo '<a href="sciencedep.php"><div id="li"><li>Sciences</li></div></a>';
}
if($_SESSION['nursing']){
echo '<a href="nursingdep.php"><div id="li"><li>Nursing</li></div></a>';
}
if($_SESSION['humanities']){
echo '<a href="humanitydep.php"><div id="li"><li>Humanities</li></div></a>';
}
if($_SESSION['technical']){
echo '<a href="technicaldep.php"><div id="li"><li>Technical</li></div></a>';
}
if($_SESSION['catering']){
echo '<a href="cateringdep.php"><div id="li"><li>Catering</li></div></a>';
}
if($_SESSION['boarding']){
echo '<a href="boarding.php"><div id="li"><li>Boarding</li></div></a>';
}
if($_SESSION['library']){
echo '<a href="libdep.php"><div id="li"><li>Library</li></div></a>';
}
if($_SESSION['accounts']){
echo '<a href="accounts.php"><div id="li"><li>Fee accounts</li></div></a>';
}
if($_SESSION['teaching']){
echo '<a href="report.php"><div id="li"><li>Report</li></div></a>';
}
?>


</fieldset>

 </aside>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>