<?php
include('dbconnection.php');
// new filename
$filename = 'prediction.jpg';
$date_created = date('m/d/Y H:m:s');
$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'], 'predictions/'.$filename) ){
 $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
 // mysqli_query($con,"INSERT INTO requests(date_created,category) VALUES('$date_created','$filename')");

}

// Return image url
echo $url;
?>
