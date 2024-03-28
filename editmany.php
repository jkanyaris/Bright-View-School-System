<table border="0" cellspacing="1" cellpadding="0">
<form action="editmany.php" method="post">
<tr><th>Id</th><th>Name</th><th>Lastname</th><th>Email</th></tr>
<?php 
if(isset($_POST['submit'])){
require('connect.php');
$query="select * from test_mysql";
$run=mysql_query($query);
$count=mysql_num_rows($run);
session_start();
echo $_SESSION['count']=$count;

while($res=mysql_fetch_object($run)){

?>
<tr><td><?php $id[]=$res->id; echo $res->id; ?></td><td><input name="name[]" type="text" value="<?php echo $res->name;?>"></td>
<td><input name="lastname[]" type="text"  value="<?php echo $res->lastname;?>"></td>
<td><input name="email[]" type="text"  value="<?php echo $res->email;?>"></td>
</tr>
<?php }
?>

<tr><td colspan="4"><input type="submit" name="test" value="test"></td></tr>
<?php }?>
<tr><td colspan="4"><input type="submit" name="submit"></td></tr>
</form>
</table>
<?php 
require('connect.php');
session_start();
if(isset($_POST['test'])){
echo $_SESSION['count'];
/* $name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
for($i=0;$i<$count;$i++){
$sql="update test_mysql set name='$name[$i]',lastname='$lastname[$i]',email='$email[$i]' where id='$id[$i]' ";
$ex=mysql_query($sql);
}

if($ex){
echo "<script>alert('sucess')</script>";

}
else{
echo "<script>alert('could not update')</script>";} */
}

?>