<html>
<?php 
if(isset($_POST['submit'])){
 $content=$_POST['content'];
 if(empty($content))
 {$error="please enter some content to create pdf";}
else{
include_once('dompdf/dompdf_config.inc.php');

$html1="this is me";
$html2="this you";

$dompdf=new DOMPDF();
$dompdf->load_html($html1);
$dompdf->load_html($html2);
$dompdf->render();
$dompdf->stream("mypdffile.pdf");

}
 
}

?>
<body>
<?php if(isset($error) ) {  echo $error; } ?>
<form method="post" action="pdf.php">
<textarea name="content" id="content" placeholder="add content here"></textarea>
<br/>
<input type="submit" name="submit" value="generate Pdf"/>
</form>
</body>
</html>
