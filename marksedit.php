<?php
session_start();
error_reporting(0);
if(!$_SESSION['teaching'])
{
header("location: stafflogin.php");
}
else{
require('connect.php');
if(isset($_POST['subkis'])){
session_start();
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$kisend=$_POST['kisend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$kiscat=$_POST['kiscat'];

$sq="update marks set kiscat='$kiscat[$i]', kisend='$kisend[$i]',total=$kiscat[$i] + $kisend[$i] +  engcat + engend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}


else{
for($i=0;$i<$count;$i++){
$sq="update marks set kisend='$kisend[$i]', total=$kisend[$i] + engend + matend + bioend 
 + chemend + phyend + geoend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subeng'])){
session_start();
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$engend=$_POST['engend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$engcat=$_POST['engcat'];
$sq="update marks set engcat='$engcat[$i]', engend='$engend[$i]',total=$engcat[$i] + $engend[$i] +  kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set engend='$engend[$i]', total=$engend[$i] + kisend + matend + bioend 
 + chemend + phyend + geoend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['submat'])){
session_start();
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$matend=$_POST['matend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$matcat=$_POST['matcat'];
$sq="update marks set matcat='$matcat[$i]', matend='$matend[$i]',total=$matcat[$i] + $matend[$i] + engcat + engend + kiscat + kisend + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set matend='$matend[$i]', total=$matend[$i] + engend + kisend + bioend 
 + chemend + phyend + geoend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subbio'])){
session_start();
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$bioend=$_POST['bioend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$biocat=$_POST['biocat'];
$sq="update marks set biocat='$biocat[$i]', bioend='$bioend[$i]',total=$biocat[$i] + $bioend[$i] + engcat + engend + kiscat + kisend + matend + matcat  
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set bioend='$bioend[$i]',total=$bioend[$i] + engend + kisend + matend 
 + chemend + phyend + geoend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subchem'])){
session_start();
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$chemend=$_POST['chemend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$chemcat=$_POST['chemcat'];
$sq="update marks set chemcat='$chemcat[$i]', chemend='$chemend[$i]',total=$chemcat[$i] + $chemend[$i] +  engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set chemend='$chemend[$i]',total=$chemend[$i] + engend + kisend + matend + bioend 
 + phyend + geoend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subphy'])){
session_start();
  $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$phyend=$_POST['phyend'];

if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$phycat=$_POST['phycat'];
$sq="update marks set phycat='$phycat[$i]', phyend='$phyend[$i]',total=$phycat[$i] + $phyend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set phyend='$phyend[$i]',total=$phyend[$i] + engend + kisend + matend + bioend 
 + chemend + geoend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subgeo'])){
session_start();
  $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$geoend=$_POST['geoend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$geocat=$_POST['geocat'];
$sq="update marks set geocat='$geocat[$i]', geoend='$geoend[$i]',total=$geocat[$i] + $geoend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set geoend='$geoend[$i]',total=$geoend[$i] + engend + kisend + matend + bioend 
 + chemend + phyend + bsend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subbs'])){
session_start();
  $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$bsend=$_POST['bsend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$bscat=$_POST['bscat'];
$sq="update marks set bscat='$bscat[$i]', bsend='$bsend[$i]',total=$bscat[$i] + $bsend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + agricat + agriend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set bsend='$bsend[$i]',total=$bsend[$i] + engend + kisend + matend + bioend 
 + chemend + phyend + geoend + agriend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subagri'])){
session_start();

 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$agriend=$_POST['agriend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$agricat=$_POST['agricat'];
$sq="update marks set agricat='$agricat[$i]', agriend='$agriend[$i]',total=$agricat[$i] + $agriend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + compcat + compend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set agriend='$agriend[$i]',total=$agriend[$i] + engend + kisend + matend + bioend 
 + chemend + phyend + geoend + bsend + compend  
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subcomp'])){
session_start();
 
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$compend=$_POST['compend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$compcat=$_POST['compcat'];
$sq="update marks set compcat='$compcat[$i]', compend='$compend[$i]',total=$compcat[$i] + $compend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend  
 + histcat + histend + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set compend='$compend[$i]' ,total=$compend[$i] + engend + kisend + matend + bioend 
 + chemend + phyend + geoend + bsend + agriend   
 + histend + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subhist'])){
session_start();
  $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$histend=$_POST['histend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$histcat=$_POST['histcat'];
$sq="update marks set histcat='$histcat[$i]', histend='$histend[$i]', total=$histcat[$i] + $histend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + crecat + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set histend='$histend[$i]',total=$histend[$i]+ engend + kisend + matend + bioend 
 + chemend + phyend + geoend + bsend + agriend + compend  
  + creend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
?>
<?php 
error_reporting(0);
if(isset($_POST['subcre'])){
session_start();
 $exam_id=$_SESSION['exam_id'];
 $sq="select examtype from examdetails where exam_id='$exam_id'";
 $ru=mysql_query($sq);
 $ob=mysql_fetch_object($ru);
$examtype=$ob->examtype;
$squ="select * from marks where exam_id='$exam_id'";
$run=mysql_query($squ);
$count=mysql_num_rows($run);
$id=$_POST['id'];
$creend=$_POST['creend'];
if($examtype=='Normal'){
for($i=0;$i<$count;$i++){
$crecat=$_POST['crecat'];
$sq="update marks set crecat='$crecat[$i]', creend='$creend[$i]', total=$crecat[$i] + $creend[$i] + engcat + engend + kiscat + kisend + matend + matcat + biocat + bioend 
 + chemcat + chemend + phycat + phyend + geocat + geoend + bscat + bsend + agricat + agriend + compcat + compend  
 + histcat + histend  where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}
}
else{
for($i=0;$i<$count;$i++){
$sq="update marks set creend='$creend[$i]',total= $creend[$i] + engend + kisend + matend + bioend 
 + chemend + phyend + geoend + bsend + agriend + compend  
 + histend where mark_id='$id[$i]'";
$ex=mysql_query($sq);
if($ex){
echo"<script>window.open('viewmarksheet.php?success=The marks have been submitted successfully','_self');</script>";
}
else{
echo"<script>window.open('viewmarksheet.php?error=Unable to marks submit the marks at this time','_self');</script>";

}
}

}

}
}
?>