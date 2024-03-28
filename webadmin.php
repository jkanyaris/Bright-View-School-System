<?php
require('connect.php');
session_start();
if(!$_SESSION['admin']){
header("location:admin.php");
}
else{
$user=$_SESSION['admin'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
 <link href="css/drop.css" rel="stylesheet" type="text/css" />
  <style>
        body { background: #999999 no-repeat center 0px; padding-top:0px;}
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font color="white" size="5" style="margin-left:350px;">Administration Dashboard</font> <section id="settings" style="float:right; margin-right:60px; padding-bottom:30px;">
<ul id="drop-nav">
<li><img src="images/profile.png" height="40" width="40"><ul>
<li><a href="changepassadmin.php" style="width:120px;">Change Password</a></li>
<li><a href="adminlogout.php"style="width:120px;" >Log out</a></li>
</ul></li>
<li><font size="5" color="white" style="margin-left:20px;"><?php echo $user;?></font></li>
</ul>
</section></center>
 </section>
 </header>
 <center><section style="margin:0 auto; margin-top:40px;">
 <font size="4" color="red"><?php echo @$_GET['error'];?></font>
<font size="4" color="green"><?php echo @$_GET['success'];?></font>
</section></center>
<div style="width: 1000px; margin: 0 auto; ">
        <ul class="tabs" data-persist="true">
            <li><a href="#view1">Add User</a></li>
            <li><a href="#view2">Manage Staff Accounts</a></li>
		    <li><a href="#view3">Manage Parents Accounts</a></li>
            <li><a href="#view4">Manage Links</a></li>
        </ul>
        <div class="tabcontents">
            <div id="view1">
			
               <form action="webadmin.php" method="post">
			   <section style="width:600px">
			   <input type="text" name="username" required="required" style="border-radius:3px; border:1px solid grey;" placeholder="Enter username"/> &nbsp;  &nbsp; &nbsp; &nbsp;
			   <font size="4" color="brown" >User Category:</font>&nbsp; <select name="category" required="required">
			   <option value=""> </option>
			   <option value="principal">Principal</option>
			    <option value="teaching">Teaching staff</option>
				 <option value="nonteaching">Non teaching staff</option>
				
			
					   </select><br/><br/>
			   
		  
		  
		
			 
			   <input type="email" required="required" style="border-radius:3px;border:1px solid grey;" name="email" placeholder=" Enter Email"/><br/><br/>
			   <input type="text" required="required" style="border-radius:3px;border:1px solid grey;" name="national" placeholder="Enter National id"/>
			   <br/><br/>
			   <input type="password" required="required"  style="border-radius:3px;border:1px solid grey;" name="pass1" placeholder="Enter password"/><br/><br/>
			   <input type="password" required="required" style="border-radius:3px;border:1px solid grey;"name="pass2" placeholder="Confirm password"/><br/><br/>
			   
			   </section>
			   <br/><br/><br/><br/>
                <section style="width:300px;  float:right; margin-top:-280px;">
		  
				 <fieldset style="border-radius:5px;box-shadow:rgba(0, 0, 0 ,0.3) 0px  5px 5px;">
				 <legend> <font size="4" color="brown" >Additional roles</font></legend>
				<input type="checkbox" value="member" name="math">Mathematics<br/>
				 <input type="checkbox" value="member" name="hum">Humanities<br/>
				 <input type="checkbox" value="member"name ="tech">Technical<br/>
				 <input type="checkbox" value="member" name="lang">Languages<br/>
				 <input type="checkbox" value="member" name="sciences">Sciences<br/>
				  <input type="checkbox" value="member" name="nursing">Nursing<br/>
				  <input type="checkbox" value="member" name="schadm">School Administrator<br/>
				  <input type="checkbox" value="member" name="library">Library<br/>
				  <input type="checkbox"value="member" name="catering">Catering<br/>
				  <input type="checkbox"value="member" name="boarding">Boarding<br/>
				<input type="checkbox" value="member" name="accounts">Accounts Clerk
				</fieldset>
		</section>
					   <input style=" cursor:pointer;"  type="reset" name="reset" value="Clear"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


					   <input style=" cursor:pointer;"  type="submit" name="reguser" value="Add User"/>
					 

				</form>
<?php 
error_reporting(0);
require('connect.php');
if(isset($_POST['reguser'])){
$username=$_POST['username'];
$category=$_POST['category'];
$email=$_POST['email'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$national=$_POST['national'];
$math=$_POST['math'];
$hum=$_POST['hum'];
$tech=$_POST['tech'];
$lang=$_POST['lang'];
$sciences=$_POST['sciences'];
$nursing=$_POST['nursing'];
$schadm=$_POST['schadm'];
$library=$_POST['library'];
$catering=$_POST['catering'];
$boarding=$_POST['boarding'];
$accounting=$_POST['accounts'];

$sql2="select * from staff where email='$email'";
$run2=mysql_query($sql2);
$sql3="select * from staff where national='$national'";
$run3=mysql_query($sql3);
if($pass1 != $pass2){

echo "<script>window.open('webadmin.php?error=Passwords entered are not matching','_self')</script>";
exit();
}

if(mysql_num_rows($run2)>0){

echo "<script>window.open('webadmin.php?error=Email already in use','_self')</script>";
exit();
}
if(mysql_num_rows($run3)>0){

echo "<script>window.open('webadmin.php?error=National id already in use','_self')</script>";
exit();
}
else{
$sq="insert into staff(username,email,national,pass,category,mathematics,languages,sciences,
nursing,humanities,technical,catering,boarding,accounts,library,schadmin) values(
'$username','$email','$national','$pass1','$category','$math','$lang','$sciences',
'$nursing','$hum','$tech','$catering','$boarding','$accounting','$library','$schadm')";
$ex=mysql_query($sq);
if($ex){

echo "<script>window.open('webadmin.php?success=User successfully added','_self')</script>";

}

else{
echo "<script>window.open('webadmin.php?error=Unable to add user at this time','_self')</script>";
exit();
}


}

}				
				
				?>
				
            </div>
            <div id="view2">
			<form action="webadmin.php" method="post">
               <section style="height:400px; width:900px; overflow-x:hidden; overflow-y:scroll; box-shadow:rgba(0, 0, 0 ,0.3) 0px  5px 5px; border:1px solid grey;">
			   <input type="text" style="border-radius:2px;border:1px solid grey; margin-left:10px;margin-top:10px;" name="search" placeholder="Enter username or Id">
			   <input type="submit" name="submitsearch" value="search" ><br/><br/>
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
			   <?php if(isset($_POST['submitsearch'])){

			   $searchq=$_POST['search'];
 
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM staff WHERE( (username LIKE '%$searchq%') OR  (national LIKE '%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('webadmin.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:100px; border:1px solid grey;border-radius:5px;">Results</legend>
';       
echo "<table border='1' style='width:700px; border-spacing:0px;'><tr><th>Username</th><th>Email</th><th>Identity</th><th>Category</th><th>Edit</th><th>Delete</th></tr>";
while($row = mysql_fetch_object($query))
{
?>
<tr>
<td><?php echo $row->username;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->national;?></td>
<td><?php echo $row->category;?></td>
<td><a href="editstaff.php?staff_id=<?php echo $row->id_staff;?>" >View Profile</a></td>
<td><a href="editstaff.php?staff_del=<?php echo $row->id_staff;?>" onClick="return confirm('Are sure you want to delete this profile')">Delete profile</a></td>			   
</tr>		   
			  <?php  }}}
			   ?>
			   
			   
			   
			   </table>
			   </fieldset>
			  
</section>			   
            </div>
						<div id="view3">
									<form action="webadmin.php" method="post">
               <section style="height:400px; width:900px; overflow-x:hidden; overflow-y:scroll; box-shadow:rgba(0, 0, 0 ,0.3) 0px  5px 5px; border:1px solid grey;">
			   <input type="text" style="border-radius:2px;border:1px solid grey; margin-left:10px;margin-top:10px;" name="searchq" placeholder="Enter username or adm no.">
			   <input type="submit" name="parentssearch" value="search" ><br/><br/>
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
			   <?php if(isset($_POST['parentssearch'])){

			   $searchq=$_POST['searchq'];
 
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM parents INNER JOIN students ON students.student_id=parents.student_id  WHERE( (parents.username LIKE '%$searchq%') OR  (parents.email LIKE '%$searchq%')OR  (students.adm LIKE '%$searchq%'))") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('webadmin.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:100px; border:1px solid grey;border-radius:5px;">Results</legend>
';       
echo "<table border='1' style='width:700px; border-spacing:0px;'><tr><th>Username</th><th>Email</th><th>Student Name</th><th>Delete</th></tr>";
while($row = mysql_fetch_object($query))
{
?>
<tr>
<td><?php echo $row->username;?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->sname .'  '.$row->fname .'  '.$row->lname;?></td>
<td><a href="webadmin.php?delid=<?php echo $row->parents_id;?>" onClick="return confirm('Are sure you want to delete this profile')">Delete profile</a></td>			   
</tr>		   
			  <?php  }}}
			  
			  if(isset($_GET['delid'])){
			  $iddel=$_GET['delid'];
			  $sq="delete from parents where parents_id='$iddel'";
			  $ru=mysql_query($sq);
			  if($ru){
echo"<script>window.open('webadmin.php?success=Parents account is successfully Deleted','_self')</script>";
}
else{
echo"<script>window.open('webadmin.php?error=Could not delete the account at this time','_self')</script>";
}
			  }
			   ?>
			   
			   
			   
			   </table>
			   </fieldset>
			  
</section>		
						</div>

			<div id="view4">
			
               <fieldset style="border-radius:5px;height:200px;">  
			   <legend>Add link</legend>
			   <form action="webadmin.php" method="post">
			   <input style="border-radius:3px; border:1px solid grey;width:200px;"type="text" name="link" placeholder="Enter link name e.g home.php" required="required">
			  <select name="status" required="required">
			  <option value="">status</option>
			  <option value="Closed">Closed</option>
			  <option value="Opened">Opened</option>
			  </select>
			   <br/><br/>
			   <input type="submit" name="sublink" value="Add link">
			   </form>
			   <?php
if(isset($_POST['sublink'])){
$link=$_POST['link'];
$status=$_POST['status'];
$que="select * from links where link='$link'";
$exec=mysql_query($que);
if(mysql_num_rows($exec)>0){
echo"<script>window.open('webadmin.php?error=Link already exists','_self')</script>";

}
else{
$sql5="insert into links(link,status) values('$link','$status')";
$run5 = mysql_query($sql5);
if($run5){
echo"<script>window.open('webadmin.php?success=Link successfully added','_self')</script>";
}
else{
echo"<script>window.open('webadmin.php?error=Could not add link at this time','_self')</script>";
}

}}

			   ?>
</fieldset>		
               <fieldset style="border-radius:5px;">  
			   <legend>Added Links</legend>
			   <style type="text/css">
			   #links th{background:#AAD4FF;}
			   </style>
			   
			 
			   <form action="webadmin.php" method="post">
			   
			   <?php
			   require('connect.php');
			   error_reporting(0);
			   
		  $sq8="select * from links";
			   $run8=mysql_query($sq8);
			   $links_count=mysql_num_rows($run8);
			   echo'<table border="1px" id="links"style="width:500px;border-spacing:0;">
			   <tr><th>Link</th><th>Status</th><th>Option</th></tr>';
			   while($object=mysql_fetch_object($run8)){
			   ?>
			   <input type="hidden" name="link_id[]" value="<?php echo $object->link_id;?>">
			   <tr><td><input type="text" name="link[]" value="<?php echo $object->link; ?>"></td><td><select name="status[]"><option value="<?php echo $object->status; ?>"><?php echo $object->status; ?></option>
			   <option value="Closed">Closed</option><option value="Opened">Opened</option></select></td>
			  
			   <td><a href="dellink.php?link_del=<?php echo $object->link_id; ?>" onClick="return confirm('Delete this link')">Delete</a></td></tr>
			   
			 
			 <?php }?>
			 
			
						<input type="submit" name="update_link" value="Update">
						</table>
					</form>	
			   </fieldset>
			   <?php
			    if(isset($_POST['update_link'])){
			 $count=$links_count;
			 $link=$_POST['link'];
			 $status=$_POST['status'];
			 $id=$_POST['link_id'];
			 for($i=0;$i<$count;$i++){
			 $idlink=$id[$i];
			 
			$que1="update links set link='$link[$i]',status='$status[$i]' where link_id='$idlink'";
			 $exec2=mysql_query($que1);
			 
			 }
			 
			 if($exec2){
			 
			echo"<script>window.open('webadmin.php?success=Link updated successfully','_self')</script>";

			 }
			 else{echo"<script>window.open('webadmin.php?error=Could not update the link at this time','_self')</script>";
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
<?php } ?>