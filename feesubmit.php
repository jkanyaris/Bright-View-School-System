<?php
session_start();
error_reporting(0);
if(!$_SESSION['accounts'])
{
header("location: stafflogin.php");
}else{
?>
<?php 
error_reporting(0);
require('connect.php');
if(isset($_POST['download'])){
$adm=$_POST['adm'];
$date=date("d/m/Y");
$sq="select * from students where adm='$adm'";
$ru=mysql_query($sq);
$count=mysql_num_rows($ru);
$sq1="select * from students where form='$count' and adm='$adm'";
$ru1=mysql_query($sq1);
$ob=mysql_fetch_object($ru1);
$name=$ob->sname .'   '.$ob->fname .'   '.$ob->lname ;
$form=$ob->form;

$sql="select * from fee where adm='$adm'";
$run=mysql_query($sql);

require('pdf/fpdf.php');
$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont("times","B",15);
$pdf->Image('images/techhigh.jpg',10,8,33);
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"TECH HIGH SCHOOL",0,1,"C");
$pdf->cell(75,0," ",0,0);
$pdf->Cell(50,10,"P.O BOX 239, Nairobi",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->Cell(15,10,"Email: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"info@techhighschool.ac.ke",0,1,"C");
$pdf->cell(70,0," ",0,0);
$pdf->SetFont("times","B",15);
$pdf->Cell(15,10,"Website: ",0,0,"C");
$pdf->SetFont("times","",10);
$pdf->Cell(50,10,"www.techhighschool.ac.ke",0,1,"C");
$pdf->cell(0,5,"  ",0,1);
$pdf->SetFont("times","B",12);
$pdf->Cell(190,8,"Fee statement as at {$date}",1,1,"C");
$pdf->SetFont("times","",13);
$pdf->cell(0,5,"",0,1);
$pdf->cell(0,5,"Name: {$name}                               Form: {$form}                            Adm: {$adm}",0,1);
$pdf->cell(0,5,"",0,1);
$pdf->cell(0,1,"",1,1);
$pdf->cell(0,5,"",0,1);
$pdf->SetFont("times","B",12);
$pdf->cell(30,8,"Date",1,0);
$pdf->cell(30,8,"Receipt",1,0);
$pdf->cell(40,8,"Fee Description",1,0);
$pdf->cell(30,8,"Credit",1,0);
$pdf->cell(30,8,"Debit",1,0);
$pdf->cell(30,8,"Balance",1,1);
$pdf->SetFont("times","",10);
while($obj=mysql_fetch_object($run)){
$pdf->cell(30,8,$obj->dayt,1,0);
$pdf->cell(30,8,$obj->receipt,1,0);
$pdf->cell(40,8,$obj->feedesc,1,0);
$pdf->cell(30,8,$obj->credit,1,0);
$pdf->cell(30,8,$obj->debit,1,0);
$pdf->cell(30,8,$obj->balance,1,1);

}
$pdf->output(); 
}
if(isset($_POST['save'])){
$count=$_POST['count'];
$adm=$_POST['adm'];
$form=$_POST['form'];
$f=$_POST['f'];
$classname=$_POST['classname'];
$term=$_POST['term'];
$year=$_POST['year'];
$feedesc=$_POST['feedesc'];
$amt=$_POST['amt'];
$date=date('d/m/Y');
$query="select * from fee inner join students on students.adm=fee.adm where((students.form='$f')and(fee.term='$term')and(fee.year='$year')and(fee.feedesc='$feedesc'))";
$exe=mysql_query($query);
if(mysql_num_rows($exe)>0){
echo "<script>window.open('accounts.php?error=Accounts already credited for the given term and fee description','_self')</script>";

}
else{
for($i=0; $i<$count; $i++){
$sql="select * from fee where adm='$adm[$i]'";
$run=mysql_query($sql);
if(mysql_num_rows($run)==0){
$num=1;

$sq1="insert into fee(transc_no,adm,term,year,dayt,feedesc,receipt,credit,debit,balance) values('$num','$adm[$i]','$term','$year','$date','$feedesc','','$amt[$i]','','$amt[$i]')";
$ex1=mysql_query($sq1);

}

else{
$num=mysql_num_rows($run);
$numlast=$num+1;
$sq2="select * from fee where adm='$adm[$i]' and transc_no='$num'";
$ex2=mysql_query($sq2);
$res=mysql_fetch_object($ex2);
$prevbal=$res->balance;
$curbalance=$prevbal+$amt[$i];
$sq1="insert into fee(transc_no,adm,term,year,dayt,feedesc,receipt,credit,debit,balance) values('$numlast','$adm[$i]','$term','$year','$date','$feedesc','','$amt[$i]','','$curbalance')";
$ex1=mysql_query($sq1);
}


}
if($ex1){
echo "<script>window.open('accounts.php?success=Students Accounts successfully credited','_self')</script>";
}
else{
echo "<script>window.open('accounts.php?error=Unable to debit the accounts at this time','_self')</script>";
}
}
}

 if(isset($_POST['savedb'])){
$count=$_POST['count'];
$adm=$_POST['adm'];
$term=$_POST['term'];
$year=$_POST['year'];
$amt=$_POST['amt'];
$date=$_POST['date'];
$mode=$_POST['mode'];
$receipt=$_POST['receipt'];
 
 for($i=0;$i<$count;$i++){
 if($amt[$i]==''){}
 else{
 $sql="select * from fee where adm='$adm[$i]'";
 $run=mysql_query($sql);
 $num=mysql_num_rows($run);
 
if($num==0){
$bal=0-$amt[$i];
$sq="insert into fee(transc_no,adm,term,year,dayt,feedesc,receipt,debit,balance) values(1,'$adm[$i]','$term[$i]','$year[$i]','$date[$i]','$mode[$i]','$receipt[$i]','$amt[$i]','$bal')";
$ex=mysql_query($sq);

}
 else{
 $qu="select balance from fee where ((transc_no='$num') and (adm='$adm[$i]' ))";
 $ru=mysql_query($qu);
 $obj=mysql_fetch_object($ru);
 $bal=$obj->balance;
 $newbal=$bal-$amt[$i];
 $num=$num+1;
$sq="insert into fee(transc_no,adm,term,year,dayt,feedesc,receipt,debit,balance) values('$num','$adm[$i]','$term[$i]','$year[$i]','$date[$i]','$mode[$i]','$receipt[$i]','$amt[$i]','$newbal')";
$ex=mysql_query($sq);

 
 }
 
 }}
 if($ex){
echo "<script>window.open('accounts.php?success=Students Accounts successfully debited','_self')</script>";
}
else{
echo "<script>window.open('accounts.php?error=Unable to debit the accounts at this time','_self')</script>";
}
 
 
 }
 

if(isset($_POST['multipledeletion'])){
$count=$_POST['count'];
$id=$_POST['id'];


for($x=0;$x<$count;$x++){
$iddel=$id[$x];
$sql1="select * from fee where fee_id='$iddel'";
$exe1=mysql_query($sql1);
$res=mysql_fetch_object($exe1);
$no=$res->transc_no;
$cr=$res->credit;
$adm=$res->adm;
$sql2="select * from fee where adm='$adm'";
$exe2=mysql_query($sql2);
while($obj=mysql_fetch_object($exe2)){
$num=$obj->transc_no;
$balance=$obj->balance;
$idf=$obj->fee_id;

if($num==$no){

$newnum=$num;
$newbal=$balance;
$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);

}
else{
if($num < $no){
$newnum=$num;
$newbal=$balance;
$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);
}
else{

$newnum=$num-1;
$newbal=$balance-$cr;

$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);


}

}
if($exe3){
$q="delete from fee where fee_id='$iddel'";
$r=mysql_query($q);}
}
}
if($r){
echo"<script>window.open('accounts.php?success=Credit successfully removed from the students a/c','_self')</script>";
}


else{
echo"<script>window.open('accounts.php?error=Sorry could not remove credit at this time','_self')</script>";

}


}

if(isset($_POST['update'])){

$fee_id=$_POST['id'];
$feedesc=$_POST['feedesc'];
$receipt=$_POST['receipt'];
$amt=$_POST['amt'];
if($fee_id==''){
echo"<script>window.open('accounts.php?error=Please select a record to edit','_self')</script>";

}
else{
$sq="select * from fee where fee_id='$fee_id'";
$ru=mysql_query($sq);
$obj=mysql_fetch_object($ru);
$adm=$obj->adm;
$debit=$obj->debit;
$curnum=$obj->transc_no;
$balance=$obj->balance;
$diff=$debit-$amt;
$bal=$balance + $diff;


$sql="update fee set feedesc='$feedesc',receipt='$receipt',debit='$amt',balance='$bal' where fee_id='$fee_id' ";
$exe=mysql_query($sql);
$sq2="select * from fee where adm='$adm'";
$ex2=mysql_query($sq2);
$count=mysql_num_rows($ex2);
$max=$count+1;
$i=$curnum+1;
for($x=$i;$x<$max;$x++){

$query="update fee set balance=balance + $diff where ((adm='$adm') and(transc_no='$x')) ";
$exec=mysql_query($query);

}
if($exe && $exec){
echo"<script>window.open('accounts.php?success=Account successfully updated','_self')</script>";
}


else{
echo"<script>window.open('accounts.php?error=Sorry could not update the account at this time','_self')</script>";

}


}
}
if(isset($_POST['deleterecord'])){
$id=$_POST['id'];

if($id==''){
echo"<script>window.open('accounts.php?error=Please select a record to edit','_self')</script>";

}
else{
$sql1="select * from fee where fee_id='$id'";
$exe1=mysql_query($sql1);
$res=mysql_fetch_object($exe1);
$no=$res->transc_no;
$cr=$res->credit;
$dr=$res->debit;
$adm=$res->adm;
if($dr ==''){
$sql2="select * from fee where adm='$adm'";
$exe2=mysql_query($sql2);
while($obj=mysql_fetch_object($exe2)){
$num=$obj->transc_no;
$balance=$obj->balance;
$idf=$obj->fee_id;

if($num==$no){

$newnum=$num;
$newbal=$balance;
$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);

}
else{
if($num < $no){
$newnum=$num;
$newbal=$balance;
$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);
}
else{

$newnum=$num-1;
$newbal=$balance-$cr;

$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);


}

}
if($exe3){
$q="delete from fee where fee_id='$id'";
$r=mysql_query($q);}
}}

else{
$sql2="select * from fee where adm='$adm'";
$exe2=mysql_query($sql2);
while($obj=mysql_fetch_object($exe2)){
$num=$obj->transc_no;
$balance=$obj->balance;
$idf=$obj->fee_id;

if($num==$no){

$newnum=$num;
$newbal=$balance;
$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);

}
else{
if($num < $no){
$newnum=$num;
$newbal=$balance;
$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);
}
else{

$newnum=$num-1;
$newbal=$balance+$dr;

$sql3="update fee set transc_no='$newnum',balance='$newbal' where fee_id='$idf'";
$exe3=mysql_query($sql3);


}

}
if($exe3){
$q="delete from fee where fee_id='$id'";
$r=mysql_query($q);}
}




}

if($r){
echo"<script>window.open('accounts.php?success=Credit successfully deleted from the student fee a/c','_self')</script>";
}


else{
echo"<script>window.open('accounts.php?error=Sorry could not delete the record at this time','_self')</script>";

}



}

}
if(isset($_POST['save1'])){

$adm=$_POST['adm'];
$feedesc=$_POST['feedesc'];
$form=$_POST['form'];
$term=$_POST['term'];
$year=$_POST['year'];
$amt=$_POST['amount'];
$date=date('d/m/Y');
$query="select * from fee inner join students on students.adm=fee.adm where((students.form='$form')and(fee.term='$term')and(fee.year='$year')and(fee.feedesc='$feedesc') and (fee.adm='$adm'))";
$exe=mysql_query($query);
if(mysql_num_rows($exe)>0){
echo "<script>window.open('accounts.php?error=Account already credited for the given term and fee description','_self')</script>";

}
else{
$sql="select * from fee where adm='$adm'";
$run=mysql_query($sql);
if(mysql_num_rows($run)==0){
$num=1;

$sq1="insert into fee(transc_no,adm,term,year,dayt,feedesc,receipt,credit,debit,balance) values('$num','$adm','$term','$year','$date','$feedesc','','$amt','','$amt')";
$ex1=mysql_query($sq1);

}

else{
$num=mysql_num_rows($run);
$numlast=$num+1;
$sq2="select * from fee where adm='$adm' and transc_no='$num'";
$ex2=mysql_query($sq2);
$res=mysql_fetch_object($ex2);
$prevbal=$res->balance;
$curbalance=$prevbal+$amt;
$sq1="insert into fee(transc_no,adm,term,year,dayt,feedesc,receipt,credit,debit,balance) values('$numlast','$adm','$term','$year','$date','$feedesc','','$amt','','$curbalance')";
$ex1=mysql_query($sq1);
}

}

if($ex1){
echo "<script>window.open('accounts.php?success=Student Account successfully credited','_self')</script>";
}
else{
echo "<script>window.open('accounts.php?error=Unable to debit the Account at this time','_self')</script>";
}

}




}


?>


