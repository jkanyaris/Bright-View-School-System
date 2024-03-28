<?php 
require('connect.php');
if(isset($_POST['clear'])){
$sql1="select * from students";
$run1=mysql_query($sql1);
$sql="select * from dorm";
$run=mysql_query($sql);
while(($obj=mysql_fetch_object($run))&&($obj1=mysql_fetch_object($run1))){
$id=$obj->id;
$id1=$obj1->id;
$query="update dorm set space='2',occupant1='',adm1='',adm2='',space1issue='', occupant2='', space2issue='' where id='$id'";
$exe=mysql_query($query);

$query1="update students set house='', cube_no=0, accomodation='' where id='$id1'";
$exe1=mysql_query($query1);
}

}
?>
<form action="clearall.php" method="post">
<input type="submit" name="clear" value="clear all cubes">
</form>