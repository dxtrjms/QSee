<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
date_default_timezone_set('Asia/Manila');
$log_username = $_SESSION['login'];
$log_fname = $_SESSION['fname'];
$log_lname = $_SESSION['lname'];

if(isset($_POST['submit']))
{
		$date_created=date('m/d/Y H:m:s');
		$hospital = $_POST['hospital'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_hash= password_hash($password, PASSWORD_BCRYPT);



		$msg=mysqli_query($con,"INSERT INTO sub_admin(date_created, hospital, username, password) VALUES ('$date_created', '$hospital', '$username','$password_hash')");

		if($msg)
			{
			    echo "<script>alert('Sub-admin account created.');</script>";
			}
		else{
				echo "<script>alert('Error creating account.');</script>";
			}
}


?>

<!DOCTYPE html>




<html>
<head>
	<title>Qsee Register</title>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/login.css" rel='stylesheet' type='text/css' />
	<link href="css/search.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/des.css" rel='stylesheet' type='text/css' />
	<link href="css/btnapprove.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/des.js"></script>
  <script src="webcam.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default',
								width: 'auto',
								fit: true
							});
						});
					   </script>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/popup.css">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	<script>
		var flag = false;

		function ValidateEmail(inputText)
		{
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(inputText.value.match(mailformat))
			{
			document.form1.text1.focus();
			return true;
			}
			else
			{
			alert("You have entered an invalid email address!");
			document.form1.text1.focus();
			return false;
			}
		}
	</script>
	<script>
	function checkPass() {
					var errormessage = "";
					if (document.getElementById('password').value != document.getElementById('confirm_password').value) {
						errormessage += "Password does not match";
					}
					if (errormessage != "") {
						alert(errormessage);
						return false;
					}
					}
	</script>

</head>
<body onload='document.form1.text1.focus()' class="container bodesign" style="background-image: linear-gradient(120deg,#3498db,#8e44ad); margin-bottom: 23em; ">
	<div class="container margtop">
		<nav class="navbar navbar-default navbar" style="background-color: #09075C; border-color: transparent; border-radius: 10px;">
			  <div class="container-fluid">

			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header" >
			 		<img src="images/logo1.png" class="pull-left col-lg-4 col-md-8 col-sm-8 col-xs-12" style="margin-top: 0.8em; margin-bottom: 0.8em;">
			      <!-- Button that toggles the navbar on and off on small screens -->
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

			      <!-- Hides information from screen readers -->
			        <span class="sr-only"></span>

			        <!-- Draws 3 bars in navbar button when in small mode -->
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>

			      <!-- You'll have to add padding in your image on the top and right of a few pixels (CSS Styling will break the navbar) -->

			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-family: arial;">
			      <ul class="nav navbar-nav">
			      	 <li><a href="main.php" style="color: #ffffff; font-family: arial;"><?php echo $_SESSION['fname'];echo " "; echo $_SESSION['lname'];?></a></li>
			        <li class="active" ><a href="#" onclick="window.location.reload(true);" style="color: #000000; border-top-left-radius: 10px; border-top-right-radius: 10px; font-family: arial;">Camera<span class="sr-only">(current)</span></a></li>

			        <!-- <li><a href="creator.php" style="color: #ffffff;">About</a></li> -->
	            <!-- <li><a style="color: #ffffff; cursor: pointer;" data-toggle="modal" data-target="#myModalAccount<?php echo $_SESSION['id']?>">Account</a></li> -->
			        <li><a href="index.php" type="submit" name="logout" style="color: #ffffff; font-family: arial;">Log out</a></li>
			        <!-- <li><a href="#" style="color: #ffffff;">Approval</a></li> -->
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>
		<div class="container-fluid jumbotron" style="background-color: #F1F1F1;">

      <div id="my_camera" style="width:514px; height:385px; border: 2px solid gray;"></div>
      <div id="my_result" style="display: none"></div>
      <button type="button" name="button" onclick="startcapture()">Start Capture</button>
      <p id="probability"></p>

      <script language="JavaScript">
          Webcam.attach( '#my_camera' );

          function take_snapshot() {
              Webcam.snap( function(data_uri) {
                  document.getElementById('my_result').innerHTML = '<img id="img_url" src="'+data_uri+'"/>';
              });
          }

          function saveSnap(){
           // Get base64 value from <img id='imageprev'> source
           var base64image = document.getElementById('img_url').src;

              Webcam.upload( base64image, 'upload.php', function(code, text) {
              console.log('Save successfully');
            })
          };

					var timer;

          function takeandsave() {
            take_snapshot();
            saveSnap();

            $.ajax({
              type: 'POST',
              url: 'predict.php',
              success: function(data) {
                payload = JSON.parse(data);

								alert(data);

								for (var counter = 0; counter < 5; counter++) {
                  if (payload['predictions'][counter]['tagName'] == 'crash') {
                    document.getElementById('probability').innerHTML = payload['predictions'][counter]['probability'];
                    if (payload['predictions'][counter]['probability'] > 0.70) {
                      document.getElementById('probability').innerHTML += '<br />KABOOM';

											if (!flag) {
												$.ajax({
						              type: 'POST',
						              url: 'newrequest.php',
													data: {'category': payload['predictions'][counter]['tagName']},
						              success: function(data) {
						                flag = true;
						              }
						            });
											}

                    }
                    else {
                      document.getElementById('probability').innerHTML += '<br />NO KABOOM'
                    }
                  }
                }
              }
            });
          }

          function startcapture() {
            timer = window.setInterval(takeandsave, 500);
          }
      </script>

		</div>
	</div>
<script src="email-validation.js"></script>
</body>
</html>
