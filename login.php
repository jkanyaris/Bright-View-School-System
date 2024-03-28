<?php
require('connect.php');
if(isset($_POST['login'])){
$sess_user="hitech";
if($sess_user=="hitech"){

session_start();
$_SESSION['sess_user']=$sess_user;
header('location: allocationdetails.php');
}
else{
echo "wrondg credentials";

}


}


 ?>
 <form action="login.php" method="post">
 
 <input type="submit" name="login" value="login">
 </form>