<?php
require('connect.php');
session_start();
if(!$_SESSION['admin']){
header("location:admin.php");
}
else{
error_reporting(0);
if(isset($_GET['staff_id'])){
$id=$_GET['staff_id'];
$sql="select * from staff where id_staff='$id'";
$exe=mysql_query($sql);
$obj=mysql_fetch_object($exe);

?>
<!DOCTYPE html>
<html>
<head>
<title>Bright View School</title>
 <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="css/ddmenu.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css">
  <style>
        body { background: #999  no-repeat center 0px; padding-top:0px;}
		#body{background: #ccc  no-repeat center 0px; padding-top:0px;}
	#main{width:800px;
	height:600px;
	border:1px solid grey;
	background:white;
	margin:0 auto;
	margin-top:20px;
box-shadow:rgba(0, 0, 0 ,0.3) 0px  5px 5px;
margin-bottom:50px;}
    </style>
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font size="4"<left><a href="webadmin.php" style="color:#FFFFFF">Back</a>
 </section>
 </header>

<section id='main'>
<fieldset style="border-radius:5px;margin:0 auto; margin-top:30px;width:600px;">
<legend id="legend" ><font size="4.5" color="brown">Staff profile</b></font></legend>
<table border="1px" style="border-spacing:0px;">
<form action="editstaff.php" method="post">
<style>
th{background:#55AAFF; color:white;}
</style>
<input type="hidden" name="idup" value="<?php echo $id;?>">
<tr><th>Username</th><td style="width:300px;"> <input type="text" name="username" value="<?php echo $obj->username; ?>"></td><tr>
<tr><th>Email</th><td><input type="text" name="email" value="<?php echo $obj->email; ?>"></td><tr>
<tr><th>Identity</th><td><input type="text"name="national" value="<?php echo $obj->national; ?>"></td><tr>
<tr><th>Category</th><td><input type="text"  name="category" value="<?php echo $obj->category; ?>" ></td><tr>
<tr><th>Mathematics</th><td><?php $math=$obj->mathematics; if($math == ''){echo'<input type="checkbox" value="member" name="math"></td>';} else{echo '<input type="text" name="math" value="'.$math.'">'; }?><tr>
<tr><th>Languages</th><td><?php $lang=$obj->languages; if($lang == ''){echo'<input type="checkbox" value="member" name="lang"></td>';} else{echo '<input type="text" name="lang" value="'.$lang.'">'; }?> </td><tr>
<tr><th>Sciences</th><td><?php $sciences=$obj->sciences; if($sciences == ''){echo'<input type="checkbox" value="member" name="sciences"></td>';} else{echo '<input type="text" name="sciences" value="'.$sciences.'">'; }?> </td><tr>
<tr><th>Nursing</th><td><?php $nursing=$obj->nursing; if($nursing == ''){echo'<input type="checkbox" value="member" name="nursing"></td>';} else{echo '<input type="text" name="nursing" value="'.$nursing.'">'; }?>  </td><tr>
<tr><th>Humanities</th><td><?php $humanities=$obj->humanities; if($humanities == ''){echo'<input type="checkbox" value="member" name="humanities"></td>';} else{echo '<input type="text" name="humanities" value="'.$humanities.'">'; }?>  </td><tr>
<tr><th>Technical</th><td><?php $technical=$obj->technical; if($technical == ''){echo'<input type="checkbox" value="member" name="technical"></td>';} else{echo '<input type="text" name="technical" value="'.$technical.'">'; }?> </td><tr>
<tr><th>Catering</th><td><?php $catering=$obj->catering; if($catering == ''){echo'<input type="checkbox" value="member" name="catering"></td>';} else{echo '<input type="text" name="catering" value="'.$catering.'">'; }?>  </td><tr>
<tr><th>Boarding</th><td><?php $boarding=$obj->boarding; if($boarding == ''){echo'<input type="checkbox" value="member" name="boarding"></td>';} else{echo '<input type="text" name="boarding" value="'.$boarding.'">'; }?>  </td><tr>
<tr><th>Accounts</th><td><?php $accounts=$obj->accounts; if($accounts == ''){echo'<input type="checkbox" value="member" name="accounts"></td>';} else{echo '<input type="text" name="accounts" value="'.$accounts.'">'; }?>  </td><tr>
<tr><th>Library</th><td><?php $library=$obj->library; if($library == ''){echo'<input type="checkbox" value="member" name="library"></td>';} else{echo '<input type="text" name="library" value="'.$library.'">'; }?> </td><tr>
<tr><th>Sch Admin</th><td><?php $schadmin=$obj->schadmin; if($schadmin == ''){echo'<input type="checkbox" value="member" name="schadmin"></td>';} else{echo '<input type="text" name="schadmin" value="'.$schadmin.'">'; }?> </td><tr>
</table>
<br>
<input type="submit" name="updatestaff" value="Save">
</form>
</fieldset>
</section>
<div id="footer">
<center><footer>Bright View School Copyright 2015.</footer></center>
</div>
</div>
</body>
</html>
<?php
error_reporting(0);
}
if(isset($_POST['updatestaff'])){
$id_up=$_POST['idup'];
$username=$_POST['username'];
$email=$_POST['email'];
$category=$_POST['category'];
$national=$_POST['national'];
$math=$_POST['math'];
$lang=$_POST['lang'];
$sciences=$_POST['sciences'];
$nursing=$_POST['nursing'];
$humanities=$_POST['humanities'];
$technical=$_POST['technical'];
 $catering=$_POST['catering'];
 $boarding=$_POST['boarding'];
$accounts=$_POST['accounts'];
$library=$_POST['library'];
 $schadmin=$_POST['schadmin'];
$query="update staff set username='$username',email='$email',category='$category',national='$national',
mathematics='$math',languages='$lang',sciences='$sciences', nursing='$nursing', humanities='$humanities'
,technical='$technical',catering='$catering',boarding='$boarding',accounts='$accounts',library='$library',
schadmin='$schadmin' where id_staff='$id_up'";
$ex=mysql_query($query);

if($ex){
echo "<script>window.open('webadmin.php?success=Profile successfully edited','_self')</script>";

}
else{
echo "<script>window.open('webadmin.php?error=Could not edit profile at this time','_self')</script>";


}
}




}

if(isset($_GET['staff_del']))
{
$id=$_GET['staff_del'];
$sql="delete from staff where id_staff='$id'";
$run=mysql_query($sql);
if($run)
{echo "<script>window.open('webadmin.php?success=Profile successfully Deleted','_self')</script>";
}
else{
echo "<script>window.open('webadmin.php?error=Could not delete profile at this time','_self')</script>";

}
}
?>