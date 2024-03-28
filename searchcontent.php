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
	background: #f7fbfc;
background: -moz-linear-gradient(top, #f7fbfc 0%, #d9edf2 40%, #add9e4 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7fbfc), color-stop(40%,#d9edf2), color-stop(100%,#add9e4));
background: -webkit-linear-gradient(top, #f7fbfc 0%,#d9edf2 40%,#add9e4 100%);
background: -o-linear-gradient(top, #f7fbfc 0%,#d9edf2 40%,#add9e4 100%);
background: -ms-linear-gradient(top, #f7fbfc 0%,#d9edf2 40%,#add9e4 100%);
background: linear-gradient(top, #f7fbfc 0%,#d9edf2 40%,#add9e4 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7fbfc', endColorstr='#add9e4',GradientType=0 );
	margin:0 auto;
	margin-top:20px;
overflow-x:hidden;overflow-y:scroll;
box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
margin-bottom:50px;}
#siearch{background: #ffffff;
background: -moz-linear-gradient(top, #ffffff 0%, #f6f6f6 47%, #ededed 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
background: -webkit-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
background: -o-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
background: -ms-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
background: linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );}
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
	
<li>
            <a class="top-heading" href="#">Examination</a>
			<i class="caret"></i>           
            <div class="dropdown">
                <div class="dd-inner">
                    <div class="column">
                        <a href="#">Results</a>
                        <a href="#">Internal Examination</a>
						<a href="#">External Examination</a>
						<a href="#">KCSE</a>
						
                       
                    </div>
                </div>
            </div>
        </li>
			<li>
            <span class="top-heading">Academics</span>
			<i class="caret"></i>           
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <div class="column">
                        <h4>Departments</h4>
                        <a href="languages.php">Languages</a>
						<a href="mathematics.php">Mathematics</a>
                        <a href="humanities.php">Humanities</a>
                       
                      <a href="technical.php">Technical</a>
					  <a href="sciences.php">Science</a>
                    </div>
                    <div class="column">
					<h4>Departments</h4>
					   <a href="games.php">Games</a> 
				       <a href="guidance.php">Guidance and counseling</a>
                        <a href="library.php">Library</a>
                        <a href="boardingdept.php">Boarding</a>
                        <a href="catering.php">Catering</a>
                        <a href="nursing.php">Nursing</a>
                    </div>
                </div>
 </div>
</li>
        <li>
            <a class="top-heading" href="#">Staff</a>
			<i class="caret"></i>           
            <div class="dropdown">
                <div class="dd-inner">
                    <div class="column">
                        <a href="#">Registration</a>
                        <a href="#">Events</a>
						<a href="#">Job Vacancies</a>
						<a href="#">Staff Welfare</a>
						
                       
                    </div>
                </div>
            </div>
        </li>
		<li>
            <span class="top-heading">Students</span>
			<i class="caret"></i>           
            <div class="dropdown right-aligned">
                <div class="dd-inner">
                    <div class="column">
                        
                        <a href="#">Events and Open Days</a>
						<a href="#">Fee Structure</a>
                        <a href="#">Student Governing Council</a>
                        <a href="#">E-learning</a>
                      
                    </div>
                    <div class="column">
					   <a href="#">Examination Results</a> 
				       <a href="#">Account Activation</a>
                        <a href="#">Boarding Facilities</a>
                        <a href="#">Admission Requirements</a>
                    </div>
                </div>
 </div>
		
		<li class="no-sub"><a class="top-heading" href="index.php">About Us</a></li>
		
                
</li>
</ul>
</nav>
<section id="main">
<center><font size='4.5' color="red" ><?php echo @$_GET['error'];?></font></center>


<?php

require('connect.php');
if(isset($_POST['submitsearch'])){
 $searchq=$_POST['search'];
 
 
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM search WHERE name LIKE '%$searchq%'") 
or die("could not search");
$count=mysql_num_rows($query);
?>
 <center><i><font color="grey"  size="5">Displaying &nbsp;&nbsp;&nbsp;<font color="brown"><?php echo $count;?> </font>&nbsp;&nbsp; results of &nbsp;&nbsp;&nbsp;"<font color="brown"><?php echo $searchq;?></font>"</font></i></center>
<font size="4">
<?php
if($count==0){
echo"<script>window.open('searchcontent.php?error=No search results were found','_self')</script>";
}
else{
while($row = mysql_fetch_object($query))
{
?>

<section style="width:900px; margin:0 auto;margin-top:20px" >
<table id="search" style="width:800px; margin:0 auto;margin-top:20px; border-spacing:0;">
<tr><td style="border-bottom:1px solid grey; height:120px;"><a  style="text-decoration:none;"href="<?php echo $row->link;?>.php"><?php echo $row->linkdesc;?></a>
<br/>
<?php echo $row->description .'.......';?>
</font>
<br/><br/>
</td>
</tr>
</table>

</section>
<?php
}
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