<?php 
require('connect.php');

$sql="select  * from test_mysql";
$result=mysql_query($sql);

//count rows
$count=mysql_num_rows($result);
?>
<table width="500" border="0" cellspacing="1" cellpadding="0">
<form name="form1" method="post" action="">
<tr>
<td>
<table  width="500" border="0" cellspacing="1" cellpadding="1" cellpadding="0">
<tr>
<td align="center"><strong>Id</strong></td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>Lastname</strong></td>
<td align="center"><strong>Email</strong></td>
</tr>
<?php
while($rows=mysql_fetch_array($result)){

?>

<tr>
<td align="center">
<?php $id[]=$rows['id'];?><?php echo $rows['id'];?>
</td>
<td align="center">
<input name="name[]" type="text" id="name" value="<?php echo $rows['name'];?>">
</td>
<td align="center">
<input name="lastname[]" type="text" id="lastname" value="<?php echo $rows['lastname'];?>">
</td>
<td align="center">
<input name="email[]" type="text" id="email" value="<?php echo $rows['email'];?>">
</td>
</tr>
<?php
}
?>
<tr>
<td colspan="4"
align="center">
<input type="submit" name="Submit" value="Submit"></td>
</tr>
</form>
</table>
<?php 
if(isset($_POST['Submit'])){
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];

for($i=0;$i<$count;$i++){
$sql1="UPDATE test_mysql SET name='$name[$i]',lastname='$lastname[$i]',email='$email[$i]' WHERE id='$id[$i]'";
$result1=mysql_query($sql1);


}

if($result1){

echo "<script>alert('success')</script>";
}
mysql_close();

}

?>