<?php
session_start();
error_reporting(0);
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{

if(!$_SESSION['exam_id']){
header('location:examdepartment.php');
}else{
require('connect.php');
$exam_id=$_SESSION['exam_id'];
 $sq="select subjects from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);

 $subjects=$ob->subjects;
$query="select * from results where exam_id='$exam_id'";
$exe=mysql_query($query);
$no=1;
error_reporting(0);
while(($row=mysql_fetch_object($exe)) && ($no >=1)){
  
  $id=$row->result_id;
$previd1=$id-2;
$previd=$id-1;
$sql2="select * from results where result_id='$previd1'";
$run2=mysql_query($sql2);
$row2=mysql_fetch_object($run2);
$sql1="select * from result_id where result_id='$previd'";
$run1=mysql_query($sql1);
$row1=mysql_fetch_object($run1);
$total=$row->total;
$mar=$total/$subjects;
$mark=round($mar);
$prevtotal1=$row2->total;
$prevtotal=$row1->total;
if($total==$prevtotal){
if($total != $prevtotal1){
$pos=$no-1;
}
}
else{$pos=$no;}
if($mark>=0 && $mark<=7){$grade="E"; $remarks="Work extra hard to improve your grades";}if($mark>=11 && $mark<=17){$grade="D-";$remarks="Work extra hard to improve your grades"; }if($mark>=18 && $mark<=24){$grade="D";$remarks="Work extra hard to improve your grades";}
if($mark>=25 && $mark<=31){$grade="D+";$remarks="Work extra hard to improve your grades";}if($mark>=32 && $mark<=38){$grade="C-";$remarks="Work harder for better results";}if($mark>=39 && $mark<=45){$grade="C";$remarks="Work harder for better results";}
if($mark>=46 && $mark<=52){$grade="C+";$remarks="Work harder for better results";}if($mark>=53 && $mark<=59){$grade="B-";$remarks="Good work but you can do better";}if($mark>=60 && $mark<=66){$grade="B";$remarks="Good work. Aim higher";}
if($mark>=67 && $mark<=73){$grade="B+";$remarks="Very Good work. Aim higher";}if($mark>=74 && $mark<=80){$grade="A-";$remarks="Very Good work keep it up";}if($mark>=81 && $mark<=100){$grade="A";$remarks="Excellent work keep it up!!!";}
$mysql="update results set mean='$mark',mg='$grade',pos='$pos',remarks='$remarks' where result_id='$id' ";
$execute=mysql_query($mysql);
 
$no++;
}
if($execute){
echo"<script>window.open('examdepartment.php?succes=Positions awarded successfully. You can view results/transcripts','_self')</script>";

}
else{
echo"<script>window.open('examdepartment.php?erro=Could not rank students at this time','_self')</script>";
}
}
}
?>



