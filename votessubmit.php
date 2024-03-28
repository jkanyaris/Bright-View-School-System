<?php 
session_start();
error_reporting(0);
if(!$_SESSION['student']){
header("location:studentslogin.php");
}
else{
require('connect.php');
$adm=$_SESSION['student'];
$sql="select * from students where adm='$adm'";
$run=mysql_query($sql);
$obj=mysql_fetch_object($run);
$voter=$obj->student_id;

if(isset($_POST['subvote'])){
$schcapt=$_POST['schcapt'];
$astschcapt=$_POST['ast_sch_capt'];
$dhcapt=$_POST['dhcapt'];
$astdhcapt=$_POST['ast_dh_capt'];
$libcapt=$_POST['libcapt'];
$astlibcapt=$_POST['ast_lib_capt'];
$entcapt=$_POST['entcapt'];
$astentcapt=$_POST['ast_ent_capt'];
$compcapt=$_POST['compcapt'];
$astcompcapt=$_POST['ast_comp_capt'];

$gamescapt=$_POST['gamescapt'];
$astgamescapt=$_POST['ast_games_capt'];
$labcapt=$_POST['labcapt'];
$astlabcapt=$_POST['ast_lab_capt'];
$timecapt=$_POST['timecapt'];
$asttimecapt=$_POST['ast_time_capt'];
$post=$_POST['post'];
$cand=array($schcapt,$astschcapt,$dhcapt,$astdhcapt,$compcapt,$astcompcapt,$libcapt,$astlibcapt,
$labcapt,
$astlabcapt,$timecapt,$asttimecapt,$gamescapt,$astgamescapt,$entcapt,$astentcapt
);
$num=16;
for($i=0;$i<$num;$i++){
$id=$post[$i];

$sq1="select cand1,cand2,cand3 from election where post_id='$id'";
$ex1=mysql_query($sq1);
$res=mysql_fetch_object($ex1);
$cand1=$res->cand1;
$cand2=$res->cand2;
$cand3=$res->cand3;




if($cand1==$cand[$i]){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$cand[$i]',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand1votes=cand1votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);


}

if($cand2==$cand[$i]){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$cand[$i]',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand2votes=cand2votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

if($cand3==$cand[$i]){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$cand[$i]',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand3votes=cand3votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

}





$post_id=$_POST['post_id'];
$postdorm=$_POST['postdorm'];
$postast=$_POST['postast'];
$count=2;
for($x=0;$x<$count;$x++){

$id=$post_id[$x];
$sq1="select cand1,cand2,cand3 from election where post_id='$id'";
$ex1=mysql_query($sq1);
$res=mysql_fetch_object($ex1);
$cand1=$res->cand1;
$cand2=$res->cand2;
$cand3=$res->cand3;
if($x==0){
if($cand1==$postdorm){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$postdorm',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand1votes=cand1votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);


}

if($cand2==$postdorm){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$postdorm',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand2votes=cand2votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

if($cand3==$postdorm){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$postdorm',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand3votes=cand3votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}}
else{
if($cand1==$postast){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$postast',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand1votes=cand1votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);


}

if($cand2==$postast){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$postast',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand2votes=cand2votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

if($cand3==$postast){
$qu="insert into votescount(voter,post,candidate,vote_time) values('$voter','$id','$postast',CURRENT_TIMESTAMP)";
$ru=mysql_query($qu);
$qu2="update votesresult set cand3votes=cand3votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}}


}


if($ru && $ru2){

unset($_SESSION['student']);
session_destroy();
echo"<script>window.open('studentslogin.php?success=Congratulation!!! You have voted successfully','_self')</script>";
}

else{

unset($_SESSION['student']);
session_destroy();
echo"<script>window.open('studentslogin.php?error=Error. You have already voted','_self')</script>";
}




}
}

?>