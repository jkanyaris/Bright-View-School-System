<?php 
require('connect.php');
session_start();
if(!$_SESSION['library']){
header("location:stafflogin.php");

}
else{
$username=$_SESSION['library'];

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
			#book1 th{background:#AAD4FF;}
			
    </style>
	<script src="css/tabcontent.js" type="text/javascript"></script>
    <link href="css/tabcontent.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body">
<header>
<section id="logo">
 <img src="images/log.jpg" id="log">
 <center><font size="4"<left><a href="staffprofile.php" style="color:#FFFFFF">Back</a><font color="white" size="4" style="margin-left:250px;">Library Department-Books Inventory</font> 
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
            <li><a href="#view1">Books Registration </a></li>
            <li><a href="#view2">Search book</a></li>
            <li><a href="#view3">Remove record</a></li>
		
        </ul>
        <div class="tabcontents">
		<div id="view1">
		<form action="" method="POST">
		<input type="text" name="name" placeholder="Enter Book name" style="border-radius:4px;border:1px solid grey;"required='required'>
			<input type="text" name="initial" placeholder="Book Initials" style="border-radius:4px;border:1px solid grey;"required="required">
			<select name="sub" style="border-radius:4px;border:1px solid grey;"required="required">
			<option value="">Subject</option>
			<option value="Mat">Mathematics</option>
			<option value="Eng">English</option>
			<option value="Kis">Kiswahili</option>
			<option value="Bio">Biology</option>
			<option value="Che">Chemistry</option>
			<option value="Phy">Physics</option>
			<option value="Geo">Geography</option>
			<option value="His">History</option>
			<option value="Bs">Business Studies</option>
			<option value="Comp">Computer Studies</option>
			<option value="Agr">Agriculture</option>
			<option value="Cre">Cre</option>
			</select>
			
			<select name="year" style="border-radius:4px;border:1px solid grey;"required="required">
			<option value="">Year</option>
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
			<select name="form" style="border-radius:4px;border:1px solid grey;"required="required" >
			<option value="">Form</option>
			<option value="1">Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select>
			
			<input type="text" name="quantity" required="required" placeholder="Quantity">
			<input type="submit" name="preview" value="Preview">
</form>
<br/><br/>
<form action="" method="post">
<?php 
if(isset($_POST['preview'])){
echo'<input type="submit" name="save" value="Submit"><table id="book1" border="1px" style="width:862px;border-spacing:0px;">
<tr><th>Book Name</th><th>Initials</th><th>Subject</th><th>Book no.</th><th>Year</th><th>Form</th></tr>';
$name=$_POST['name'];
$initial=$_POST['initial'];
$sub=$_POST['sub'];
$form=$_POST['form'];
$year=$_POST['year'];
$quantity=$_POST['quantity'];
$sq="select * from books where((name='$name')and(subject='$sub')and(year='$year')and(form='$form'))";
$ru=mysql_query($sq);
if(mysql_num_rows($ru)>0){
$res=mysql_fetch_object($ru);
$all=mysql_num_rows($ru);
$nam=$res->name;
$ini=$res->initial;
$i=$all+1;
$max=$all+$quantity+1;
while($i < $max){

$bookno=$initial."_".$sub."_".$i."_".$year ;
echo"<input type='hidden' name='quantity' value='".$quantity."'><tr><td>".$nam."</td><input type='hidden' name='name' value='".$nam."'><td>".$ini."<input type='hidden' name='initial' value='".$ini."'></td>
<td>".$sub."<input type='hidden' name='sub' value='".$sub."'></td><td>".$bookno."<input type='hidden' name='bookno[]' value='".$bookno."'></td>
<td>".$year."</td><input type='hidden' name='year' value='".$year."'><td>".$form."</td><input type='hidden' name='form' value='".$form."'></tr>";
$i++;
}

}
else{
$max=$quantity+1;
$i=1;

while($i < $max){
$bookno=$initial."_".$sub."_".$i."_".$year ;
echo"<input type='hidden' name='quantity' value='".$quantity."'><tr><td>".$name."</td><input type='hidden' name='name' value='".$name."'><td>".$initial."<input type='hidden' name='initial' value='".$initial."'></td>
<td>".$sub."<input type='hidden' name='sub' value='".$sub."'></td><td>".$bookno."<input type='hidden' name='bookno[]' value='".$bookno."'></td>
<td>".$year."</td><input type='hidden' name='year' value='".$year."'><td>".$form."</td><input type='hidden' name='form' value='".$form."'></tr>";
$i++;
}}
echo"</table></form>";
}
if(isset($_POST['save'])){
$name=$_POST['name'];
$initial=$_POST['initial'];
$sub=$_POST['sub'];
$bookno=$_POST['bookno'];
$year=$_POST['year'];
$form=$_POST['form'];
$count=$_POST['quantity'];

for($i=0;$i<$count;$i++){


$sql="insert into books(name,initial,subject,bookno,year,form) values('$name','$initial','$sub','$bookno[$i]','$year','$form')";
$run=mysql_query($sql);

}



if($run){
echo"<script>window.open('libdep.php?success=Book details submitted successfully','_self')</script>";}
else{
echo"<script>window.open('libdep.php?error=Sorry. Could not submit Book details at this time,'_self')</script>";
}

}
?>
			</table>
			

            </div>
			
			
            <div id="view2">
			<form action="" method="post">
			
			<select name="form" style="border-radius:4px;border:1px solid grey;margin-left:50px;"required="required" >
			<option value="">Form</option>
			<option value="1">Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select>
<input type="text" name="name" placeholder="Enter Book name" style="border-radius:4px;border:1px solid grey;" required="required">
<input type="submit" name="search" value="Search">
</form>
			<?php 
require("connect.php");
if(isset($_POST['search'])){
$form=$_POST['form'];
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM books WHERE ((name LIKE '%$searchq%')and(form='$form')) ") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('libdep.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">'.$count.'  <font color="black">Books in total</font></legend>
';       
echo "<table border='1' id='book' style=' border-spacing:0px;width:800px;margin:0 auto;'><tr><th>Name</th><th>Initial</th><th>Subject</th><th>Book No.</th><th>Year</th><th>Form</th></tr>";
while($row=mysql_fetch_object($query)){


?>

<tr><td><?php echo $row->name; ?></td><td><?php echo $row->initial;?></td><td><?php echo $row->subject ;?></td><td><?php echo $row->bookno;?></td>
<td><?php echo $row->year;?></td><td><?php echo $row->form; ?></td>
</tr>

<?php }
}
}?>


			</table>
			</fieldset>
            </div>
			<div id="view3">
               	<form action="" method="post">
			
			<select name="form" style="border-radius:4px;border:1px solid grey;margin-left:50px;"required="required" >
			<option value="">Form</option>
			<option value="1">Form 1</option>
			<option value="2">Form 2</option>
			<option value="3">Form 3</option>
			<option value="4">Form 4</option>
			</select>
<input type="text" name="name" placeholder="Enter Book name" style="border-radius:4px;border:1px solid grey;" required="required">
<input type="submit" name="del" value="Search">
</form>
               	<form action="" method="post">

			<?php 
require("connect.php");
if(isset($_POST['del'])){
$form=$_POST['form'];
$searchq=$_POST['name'];


$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
$query=mysql_query("SELECT * FROM books WHERE ((name LIKE '%$searchq%')and(form='$form')) ") 
or die("could not search");
$count=mysql_num_rows($query);
if($count==0){
echo"<script>window.open('libdep.php?error=No search results were found','_self')</script>";
}
else{
			   echo ' <fieldset style="width:830px;margin:0 auto; margin-top:20px; border-radius:5px;">
			   			   <legend id="legend"style="color:brown; width:200px; border:1px solid grey;border-radius:5px;">Book records  to be deleted</font></legend>
';       
echo "<table border='1' id='book' style=' border-spacing:0px;width:800px;margin:0 auto;'><tr><th>Name</th><th>Initial</th><th>Subject</th><th>Year</th><th>Form</th><th><Option></th></tr>";
$row=mysql_fetch_object($query)


?>

<tr><td><?php echo $row->name; ?><input type="hidden" name="name" value="<?php echo $row->name;?>"></td><td><?php echo $row->initial;?><input type="hidden" name="initial" value="<?php echo $row->initial;?>"></td><td><?php echo $row->subject ;?><input type="hidden" name="subject" value="<?php echo $row->subject;?>"></td>
<td><?php echo $row->year;?><input type="hidden" name="year" value="<?php echo $row->year;?>"></td><td><?php echo $row->form; ?><input type="hidden" name="form" value="<?php echo $row->form;?>"></td><td>
<input type="submit" name="remove" value="Delete" onClick="return confirm('About to delete All the records bearing book name, initial,subject,year and form prescribed below')"></td></tr>

<?php }

}?>


			</table>
			</form>
			<?php 
			if(isset($_POST['remove'])){
			$name=$_POST['name'];
			$initial=$_POST['initial'];
			$subject=$_POST['subject'];
			$year=$_POST['year'];
			$form=$_POST['form'];
			$sql="delete from books where ((name='$name')and(initial='$initial')and(subject='$subject')and(year='$year')and(form='$form'))";
			$run=mysql_query($sql);
			if($run){
echo"<script>window.open('libdep.php?success=Book records Deleted successfully','_self')</script>";}
else{
echo"<script>window.open('libdep.php?error=Sorry. Could not delete Book records at this time,'_self')</script>";
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