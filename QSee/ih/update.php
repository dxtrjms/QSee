<?php
include('responder.php');
if (empty($_GET['respondent'])) {
	$msg=mysqli_query($con,"UPDATE requests SET respondent = '".$log_hospital."' WHERE id = '".$_GET['id']."' ");
		if($msg)
			{
				echo "<script>alert('Accepted');</script>";
			}
		else{
				echo "<script>alert('Respondeded already.');</script>";
			}
}	
else
{
	echo "<script>alert('Responded already.');</script>";
}
echo "<script>window.history.back();</script>";
?>