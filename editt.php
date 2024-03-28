<?php 
error_reporting(0);
require('connect.php');
session_start();
if(!$_SESSION['user']){

header('location:test7.php');
}
else{

?>
<table border="1">
<form action="editt.php" method="post">
<tr><th>ID</th><th>Firstname</th></tr>
<?php
error_reporting(0);
$query=$_SESSION['user'];
$sql="$query";
$run=mysql_query($sql);
$count=mysql_num_rows($run);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php $id[]=$res->id; echo $res->id;?></td>
<td><input type="text" name="name[]" value="<?php echo $res->name; ?>"></td>

<?php } ?>
<tr><td colspan="4"><input type="Submit" name="subname" value="Update"></td></tr>
</form>

</table><br/><br/><br/>
<table border="1">
<form action="editt.php" method="post">
<tr><th>ID</th><th>Lastname</th></tr>
<?php
$query=$_SESSION['user'];
$sql="$query";
$run=mysql_query($sql);
$count=mysql_num_rows($run);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php $id[]=$res->id; echo $res->id;?></td>
<td><input type="text" name="lastname[]" value="<?php echo $res->lastname; ?>"></td>
<?php } ?>
<tr><td colspan="4"><input type="Submit" name="sublastname" value="Update"></td></tr>
</form>

</table><br/><br/><br/>
<table border="1">
<form action="editt.php" method="post">
<tr><th>ID</th><th>Email</th></tr>
<?php
$query=$_SESSION['user'];
$sql="$query";
$run=mysql_query($sql);
$count=mysql_num_rows($run);
while($res=mysql_fetch_object($run)){
?>
<tr><td><?php $id[]=$res->id; echo $res->id;?></td>
<td><input type="text" name="email[]" value="<?php echo $res->email; ?>"></td></tr>
<?php } ?>
<tr><td colspan="4"><input type="Submit" name="subemail" value="Update"></td></tr>
</form>

</table>

<?php } ?>
<?php
error_reporting(0);
if(isset($_POST['subname'])){
$name=$_POST['name'];
for($i=0;$i<$count;$i++){
$sq="update test_mysql set name='$name[$i]' where id='$id[$i]'";
$ru=mysql_query($sq);
}
if($ru){
echo"<script>window.open('test7.php?success=success','_self');</script>";
}
else
{
echo"<script>window.open('test7.php?success=error','_self');</script>";}
}
if(isset($_POST['sublastname'])){
$lastname=$_POST['lastname'];
for($i=0;$i<$count;$i++){
$sq="update test_mysql set lastname='$lastname[$i]' where id='$id[$i]'";
$ru=mysql_query($sq);
}
if($ru){
echo"<script>window.open('test7.php?success=success','_self');</script>";
}
else
{
echo"<script>window.open('test7.php?success=error','_self');</script>";}
}
if(isset($_POST['subemail'])){
$email=$_POST['email'];
for($i=0;$i<$count;$i++){
$sq="update test_mysql set email='$email[$i]' where id='$id[$i]'";
$ru=mysql_query($sq);
}
if($ru){
echo"<script>window.open('test7.php?success=success','_self');</script>";
}
else
{
echo"<script>window.open('test7.php?success=error','_self');</script>";}
}
?>