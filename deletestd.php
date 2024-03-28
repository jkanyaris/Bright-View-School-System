<?php
require_once("connect.php");
if(isset($_GET['del']))
{$del_id=$_GET['del'];
$query="delete from students where student_id='$del_id'";

if(mysql_query($query))
{

echo"<script>window.open('admission.php?success=Student has been deleted','_self')</script>";

}
else{ echo"<script>window.open('admission.php?error=Sorry could no delete student at this time','_self')</script>";
}
}
?>