<?php 
require('connect.php');error_reporting(0);
session_start();
if(!($_SESSION['student'] or $_SESSION['admin'])){
header("location:studentslogin.php");

}
else{

$adm=$_SESSION['student'];
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$fname=$obj->fname;
$image=$obj->passport;





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
 
<font color="white" size="5" style="margin-left:400px;margin-right:150px;">Student Dashboard </font> 
 <section id="settings" style="float:right; margin-right:60px;margin-top:0px;">
<ul id="dropnav">
<li><img src="students/<?php echo $image; ?>" height="40" width="40">
<ul><li><a href="myprofilestd.php" style="width:120px;">My Profile</a></li>
<li><a href="changepassstd.php" style="width:120px;">Change Password</a></li>
<li><a href="stdlogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $fname;?></font></li>
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

#li{height:30px; border-radius:5px; border:1px solid grey;margin-bottom:10px;text-align:center;font-size:18px; margin-right:40px;}

</style>

 </nav>
 <section id="main">
 <?php 
 require('connect.php');
$query="select * from links where link='votepanel.php'";
$ex=mysql_query($query);
$res=mysql_fetch_object($ex);
$status=$res->status;

 ?>
 <fieldset style="margin-top:10px;border-radius:5px;box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;">
 <legend><font size="4.5" color="blue">Student governing council Election(</font><font size="4.5" color="red"><?php echo $status; ?></font><font size="4.5">)</font></legend>
 <p>
 Bright View School School is a learning institution that promote democracy by providing 
 a platform where students can vote leaders of their choice. Various  Students' leaders
 form Student Governing Council which represents the interests of students to the 
 school management so as to improve students' welfare and to make Bright View School
 a better place for students to achieve their dreams. Student are encouraged to participate 
 in election so as to choose leaders of their choice. Students willing  to vie for various post
 are supposed to meet some conditions laid upon by the teachers and the school constitution at large.
  <?php if($status=='Opened'){echo 'To vote  <a href="votepanel.php" style="text-decoration:none;"><font size="4" color="red">Click here</font></a> ';} ?>
 
 <p/>
 
 
 </fieldset>
 <fieldset style="margin-top:10px;border-radius:5px;box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;">
 <legend><font size="4.5" color="blue">E-learning</font></legend>
 <p>
 E-learning is an online platform which give access to a wide range of revision materials. 
 Revision materials such as pastpapers and notes are uploaded periodically by the teachers.
  Once uploaded students can download them at <a href="elearning.php">E-learning</a> and use them to enhance their study skills.
  Their is no limit in number of materials/files downloaded. To view available revision materials click above e-learning link.</p>
  
 
 </section>
 
 </form>
 <aside id="aside">
 <fieldset style="width:200px;margin:0 auto; border-radius:3px; margin-top:20px; box-shadow:rgba(0, 0, 0 ,0.2) 0px  5px 5px;
 ">
<legend><font size="4" color="brown">Quick Links</font></legend>
<ul>
<a href="balance.php"><div id="li"><li>Fee Statement</li></div></a>

<a href="structure.php"><div id="li"><li>Fee structure</li></div></a>
<a href="transcripts.php"><div id="li"><li>Exam results</li></div></a>
<a href="elearning.php"><div id="li"><li>E-learning</li></div></a>


</fieldset>

 </aside>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php } ?>