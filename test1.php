<table border="1" width="400">
<?php
require('connect.php');
$sql="select * from votesresult";
$run=mysql_query($sql);
while($row=mysql_fetch_object($run)){
$post_id=$row->post_id;
if($post_id %2==1){
?>
<tr><th colspan="3">Captain Post</th></tr>
<td><?php echo $row->cand1votes;?></td>
<td><?php echo $row->cand2votes;?></td>
<td><?php echo $row->cand3votes;?></td>

</tr>

<?php 

}
else{
?>
<tr><td>Ast cand</td><td><section style="width:100px;"><marquee>Candidate 1<?php echo $row->cand1votes;?>candidate 2<?php echo $row->cand2votes;?>Candidate 3<?php echo $row->cand3votes;?></marquee></section></td></tr>
<?php
}
}


?>
</table>