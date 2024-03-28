<?php 
require('connect.php');
if(isset($_GET['link_del'])){
$id=$_GET['link_del'];
$sql="delete from links where link_id='$id'";
$run=mysql_query($sql);
if($run){

			echo"<script>window.open('webadmin.php?success=Link Deleted successfully','_self')</script>";


}
else{
			echo"<script>window.open('webadmin.php?error=Could not delete the link at this time','_self')</script>";


}

}


?>