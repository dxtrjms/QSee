<?php
include('dbconnection.php';

$category = $_POST['category'];
$date_created = date('m/d/Y H:m:s');
// $longitude = '10';
// $latitude = '11';
$insert_query = "INSERT INTO requests (date_created, category) values ('$date_created','$category')";

$insert_stmt = mysqli_stmt_init($con);
if (mysqli_stmt_prepare($insert_stmt, $insert_query)) {
  mysqli_stmt_bind_param($insert_stmt, "ssss", $date, $category, $latitude, $longitude);
  mysqli_stmt_execute($insert_stmt);
  echo "CRASH DETECTED";
}
?>
