
<?php
include('dbconnection.php');
$date_created=date('m/d/Y H:m:s');
$category=$_POST['PARAM'];
$sql="INSERT INTO `requests` (`date_created`, `category`) VALUES ('$date_created', '$category')";
echo "<script>window.history.back();</script>";
?>
