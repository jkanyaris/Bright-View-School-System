<?php 
require('connect.php');
if(isset($_POST['view'])){
$form=$_POST['form'];
$examType=$_POST['examType'];
$term=$_POST['term'];
$year=$_POST['year'];

if($form==1){

$query="select * form form1 where( (year='$year')and (term='$term'))"
}

}
?>