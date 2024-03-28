<?php 
require('connect.php');error_reporting(0);
session_start();
if(!$_SESSION['schadmin']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['schadmin'];

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
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a></font><font color="white" size="4" style="margin-left:250px;">Student Admission and Accounts Management Panel </font> 
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
 <div style="padding-top:70px;">
 <center><font color="green" size="4.5" style="padding-bottom:40px;"><?php echo @$_GET['success']; ?></font></center>
  <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['error']; ?></font></center>
    <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['exist']; ?></font></center>
	 <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['form']; ?></font></center>
	  <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['class']; ?></font></center>
	   <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['admyear']; ?></font></center>
	    <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['adm1']; ?></font></center>
		 <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['adm2']; ?></font></center>
		  <center><font color="red" style="padding-bottom:40px;" size="4.5"><?php echo @$_GET['image']; ?></font></center>
</div>
 
 <div id="tab"style="width: 1000px; margin: 0 auto; padding: 10px 0 40px;">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Registration </a></li>
            <li><a href="#view2">Class transition</a></li>
            <li><a href="#view3">Manage students records</a></li>
			<li><a href="#view4">Student accounts</a></li>
			<li><a href="#view5">Clear Election</a></li>
			<li><a href="subcand.php">Create Election</a></li>
        </ul>
        <div class="tabcontents">
		<div id="view1">
		<form action="post.php" method="post" enctype='multipart/form-data'>
		<center><font color="brown" size="4"><u>Please fill all the fields in this section</u></font></center>
          <section size="3" style="width:800px; background:#F9F9F9; border-radius: 10px 10px 0px 0px; color:black;padding-left:10px;padding-right:10px; padding-top:10px; margin:0 auto;">
		  <fieldset style="border-radius:5px; height:100px;"><legend style="color:#990000">Class selection</legend>
		  <select name="form" required="required">
		  <option value="">Form</option>
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		  </select>
		  
		  <select name="classname" required="required">
		  <option value="">name</option>
		  <option value="E">E</option>
		  <option value="W">W</option>
		  <option value="S">S</option>
		  <option value="N">N</option>
		  </select>
		  </fieldset>
		  		  <br/><br/>

		  <fieldset style="border-radius:5px;height:100px;"><legend style="color:#990000;">The year of admission</legend>
		  <select name="admyear" required="required">
		  <option value="">- - - - -</option>
		  <option value="2011">2011</option>
		  <option value="2012">2012</option>
		  <option value="2013">2013</option>
		  <option value="2014">2014</option>
		  <option value="2015">2015</option>
		  <option value="2016">2016</option>
		  <option value="2017">2017</option>
		  <option value="2018">2018</option>
		  <option value="2019">2019</option>
		  <option value="2020">2020</option>
		  </select>
		  </fieldset>
		  		  <br/><br/>

		  <fieldset style="border-radius:5px;height:100px;"><legend style="color:#990000;">Admission number</legend>
		  <select name="year" required="required">
		  <option value="">- - - - -</option>
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
		  <select name="number" required="required">
		  <option value="">- - - - -</option>
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
		  <option value="031">031</option>
		  <option value="032">032</option>
		  <option value="033">033</option>
		  <option value="034">034</option>
		  </select>
		  
		  </fieldset>
		  <br/><br/>
		  <fieldset style="border-radius:5px;height:100px;">
		  <legend style="color:#990000;">Student passport image</legend>
		  <input type="file" name="img" required="required"/>
		  </fieldset>
		  <br/><br/>
		  </section>
		  <section style="width:800px; background:#F9F9F9;border-radius: 0px 0px 10px 10px; color:black;padding-left:10px;padding-right:10px; padding-bottom:10px; margin:0 auto;">
		  <fieldset style="border-radius:5px;"><legend style="color:#990000;margin-top:30px;">Personal details</legend>
		  <input required="required" style="border-radius:5px; width:250px; border:1px solid grey; height:20px;"type="text" name="sname" placeholder="Surname"><br/><br/>
		  <input required="required" style="border-radius:5px; width:250px; border:1px solid grey; height:20px;" type="text" name="fname" placeholder="First name"><br/><br/>
		  <input required="required" style="border-radius:5px; width:250px; border:1px solid grey; height:20px;" type="text" name="lname" placeholder="Last name"><br/><br/>
		  <input required="required" style="border-radius:5px; width:250px; border:1px solid grey; height:20px;" type="text" name="age" placeholder="student age"><br/><br/>
		  <input required="required" style="border-radius:5px; width:250px; border:1px solid grey; height:20px;" type="text" name="kcpe" placeholder="KCPE marks"><br/><br/>
		  </fieldset>
		  <br/>
		  <br/>
		  <center><input  type="submit" name="submit" value="Register Student"></center>
		  </section>
		
            </div>
			
			</form>
			
            <div id="view2">
			
			<form action="transition.php" method="post">
			<font size="4" color="#990000">Class of Year:</font>
			<select name="year" required="required">
			 <option value="">      </option>
		  <option value="2011">2011</option>
		  <option value="2012">2012</option>
		  <option value="2013">2013</option>
		  <option value="2014">2014</option>
		  <option value="2015">2015</option>
		  <option value="2016">2016</option>
		  <option value="2017">2017</option>
		  <option value="2018">2018</option>
		  <option value="2019">2019</option>
		  <option value="2020">2020</option>
			</select>
			<br/><br/><br/>
			<font size="4" color="#990000">Transition:</font>
			<select name="form" required="required">
			<option value=''></option>
			<option value='1'>Form 1 to Form 2 </option>
			<option value='2'>Form 2 to Form 3</option>
			<option value='3'>Form 2 to Form 3</option>
			
			</select>
			<br/><br/><br/><br/>
			<br/>
			<br/>
			<input style="border-radius:5px; cursor:pointer;"type="submit" value="Make Transition" name="transition">

			</form>
            </div>
			<div id="view3">
                <form action="searchstd.php" method="post">
				
			<input type="text" name="search" style="border-radius:5px; height:20px; border:1px solid grey; width:300px;" placeholder="Enter name or adm no. to search">
			<input type="submit" style="border-radius:5px; height:25px;" value="Search Student" name="searchstd"><br/>
			
			</form>
			<fieldset style="width:400px; border-radius:5px; margin-top:100px;">
			<legend ><font color="#990000">Filter Student Records</font></legend>
			<form action="filterstd.php" method="post">
			<select name="form" style="border-radius:5px; width:100px;" required="required">
			<option value=''>Form</option>
			<option value='1'>Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select>
			<select name="class" required="required" style="border-radius:5px; width:100px; margin-left:50px;">
			<option value=''>Class</option>
			<option value='all'>All</option>
			<option value='E'>E</option>
			<option value="W">W</option>
			<option value="S">S</option>
			<option value="N">N</option>
			</select>
			<br/><br/><br/><br/><br/><br/><br/>
			<input type="submit" name="filterstd" value="View Records">
			</form>
			
			</fieldset>				
            </div>
			<div id="view4">
									<form action="" method="post">
               <section style="height:400px; width:900px; overflow-x:hidden; overflow-y:scroll; box-shadow:rgba(0, 0, 0 ,0.3) 0px  5px 5px; border:1px solid grey;">
			   <input type="text" style="border-radius:2px;border:1px solid grey; margin-left:10px;margin-top:10px;" name="searchq" placeholder="Enter  adm no.">
			   <input type="submit" name="studentssearch" value="search" ><br/><br/>
			   </form>
			  
			   <style type="text/css">
			   th{background:#7FAAFF;}
			   tr:nth-child(odd) td{background:#eee;}
			   #legend{
			   background: #feffff;
background: -moz-linear-gradient(top, #feffff 0%, #ddf1f9 35%, #a0d8ef 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#feffff), color-stop(35%,#ddf1f9), color-stop(100%,#a0d8ef));
background: -webkit-linear-gradient(top, #feffff 0%,#ddf1f9 35%,#a0d8ef 100%);
background: -o-linear-gradient(top, #feffff 0%,#ddf1f9 35%,#a0d8ef 100%);
background: -ms-linear-gradient(top, #feffff 0%,#ddf1f9 35%,#a0d8ef 100%);
background: linear-gradient(top, #feffff 0%,#ddf1f9 35%,#a0d8ef 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffff', endColorstr='#a0d8ef',GradientType=0 );}
			   </style>
			   <?php if(isset($_POST['studentssearch'])){

			   $searchq=$_POST['searchq'];
 
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM students_accounts INNER JOIN students ON students.student_id=students_accounts.student_id  WHERE students.adm LIKE '%$searchq%'") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('admission.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:100px; border:1px solid grey;border-radius:5px;">Results</legend>';       
echo "<table border='1' style='width:700px; border-spacing:0px;'><tr><th>Name</th><th>Adm no.</th><th>Form</th><th>Classname</th><th>Delete</th></tr>";
while($row = mysql_fetch_object($query))
{
?>
<tr>
<td><?php echo $row->sname .'  '.$row->fname .'  '.$row->lname;?></td>
<td><?php echo $row->adm;?></td>
<td><?php echo $row->form; ?></td>
<td><?php echo $row->classname; ?></td>

<td><a href="admission.php?delid=<?php echo $row->std_id;?>" onClick="return confirm('Are you sure you want to delete this profile')">Delete profile</a></td>			   
</tr>		   
			  <?php  }}}
			  
			  if(isset($_GET['delid'])){
			  $iddel=$_GET['delid'];
			  $sq="delete from students_accounts where std_id='$iddel'";
			  $ru=mysql_query($sq);
			  if($ru){
echo"<script>window.open('admission.php?success=Students account is successfully Deleted','_self')</script>";
}
else{
echo"<script>window.open('admission.php?error=Could not delete the account at this time','_self')</script>";
}
			  }
			   ?>
			   
			   
			   
			   </table>
			   </fieldset>
			  
</section>		
			
			</div>
			<div id="view5">
			<form action="" method="post">
			<p>
			To conduct a new election previous election must be cleared. To clear Previous election click the following button
			<br/><br/><br/><br/><input type="submit" name="clear" value="Clear" onClick="return confirm('Sure you want to clear previous election.All information about it will be lost')">
			</p>
            </form>
			<?php 
			if(isset($_POST['clear'])){
			$sql="delete from election";
			$run=mysql_query($sql);
			$sql1="delete from votesresult";
			$run1=mysql_query($sql1);
			$sql2="delete from votescount";
			$run2=mysql_query($sql2);
			
			if($run && $run1 && $run2){
			
			echo"<script>window.open('admission.php?success=You Have Cleared Previous Election Successfully ','_self')</script>";
			}
			else{
						echo"<script>window.open('admission.php?error=Unable to Clear Previous Election at this time ','_self')</script>";

			
			}
			
			}
			
			?>
			</div>
        </div>
    </div>

<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php }?>