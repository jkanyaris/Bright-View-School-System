<?php
require('connect.php');
if(isset($_POST['subvote'])){
$schcapt=$_POST['schcapt'];
$dhcapt=$_POST['dhcapt'];
$post=$_POST['post'];
$cand=array($schcapt,$dhcapt);
$num=2;
for($i=0;$i<$num;$i++){
$id=$post[$i];

$sq1="select cand1 from election where post_id='$id'";
$ex1=mysql_query($sq1);
$res1=mysql_fetch_object($ex1);
$cand1=$res1->cand1;

$sq2="select cand2 from election where post_id='$id'";
$ex2=mysql_query($sq2);
$res2=mysql_fetch_object($ex2);
$cand2=$res2->cand2;

$sq3="select cand3 from election where post_id='$id'";
$ex3=mysql_query($sq3);
$res3=mysql_fetch_object($ex3);
$cand3=$res3->cand3;


if($cand1==$cand[$i]){
$qu="insert into votescount(post,candidate) values('$id','$cand[$i]')";
$ru=mysql_query($qu);
$qu2="update votesresult set cand1votes=cand1votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

if($cand2==$cand[$i]){
$qu="insert into votescount(post,candidate) values('$id','$cand[$i]')";
$ru=mysql_query($qu);
$qu2="update votesresult set cand2votes=cand2votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

if($cand3==$cand[$i]){
$qu="insert into votescount(post,candidate) values('$id','$cand[$i]')";
$ru=mysql_query($qu);
$qu2="update votesresult set cand3votes=cand3votes+1 where post_id='$id'";
$ru2=mysql_query($qu2);
}

}
if($ru && $ru2){
echo"success";


}
else{echo "error";}

}
?>