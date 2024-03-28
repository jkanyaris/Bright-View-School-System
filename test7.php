<form action="test7.php" method="post">
<input type="submit" name="submit">
<form>
<?php if(isset($_POST['submit'])){

echo "<script>alert('it is working')</script>";
}