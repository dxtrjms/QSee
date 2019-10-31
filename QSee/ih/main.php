<?php
session_start();
include("dbconnection.php");
include("checklogin.php");


$log_username = $_SESSION['login'];
$log_fname = $_SESSION['fname'];
$log_lname = $_SESSION['lname'];

if (isset($_POST['logout'])) {
	session_destroy();
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	header('Location: ' . $home_url);
}

if (isset($_POST['submit_pass'])) {
  $password = $_POST['cpassc'];
  $password_hash= password_hash($password, PASSWORD_BCRYPT);
  $msg=mysqli_query($con,"UPDATE admin SET password = '".$password_hash."' WHERE id = '".$_SESSION['id']."' ");
    if($msg)
      {

        echo "<script>alert('Password updated.');</script>";

      }
    else{
        echo "<script>alert('Error updating password.');</script>";
      }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Qsee Admin</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
<script>
	function checkPass() {
					var errormessage = "";
					if (document.getElementById('cpass').value != document.getElementById('cpassc').value) {
						errormessage += "Password does not match";
					}
					if (errormessage != "") {
						alert(errormessage);
						return false;
					}
					}
</script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/popup.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


</head>
<body class="container bodesign" style="background-image: linear-gradient(120deg,#3498db,#8e44ad); margin-bottom: 23em; ">


<!-- start body -->
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
		        <li class="active" ><a href="#" onclick="window.location.reload(true);" style="color: #000000; border-top-left-radius: 10px; border-top-right-radius: 10px;"><?php echo $_SESSION['fname'];echo " "; echo $_SESSION['lname'];?><span class="sr-only">(current)</span></a></li>
						<li><a href="camera.php" style="color: #ffffff;">Camera</a></li>
						<li><a href="register.php" style="color: #ffffff;">Register</a></li>
		        <!-- <li><a href="creator.php" style="color: #ffffff;">About</a></li> -->
            <li><a style="color: #ffffff; cursor: pointer;" data-toggle="modal" data-target="#myModalAccount<?php echo $_SESSION['id']?>">Account</a></li>
		        <li><a href="index.php" type="submit" name="logout" style="color: #ffffff;">Log out</a></li>
		        <!-- <li><a href="#" style="color: #ffffff;">Approval</a></li> -->
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->





      <!-- start modalaccount -->
      <div id="myModalAccount<?php echo $_SESSION['id'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Account Details</h4>
              </div>
              <div class="modal-body">

                  <div class="row" style="margin-bottom: 0.5em;">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                      <label for="fname">Fist Name</label>
                      <div id="fname" style="border-radius: 10px; background-color: #C0D1D5; margin-bottom: 0.1em; padding: 0.6em;">
                        <?php echo $log_fname;?>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                      <label for="lname">Last Name</label>
                      <div id="lname" style="border-radius: 10px; background-color: #C0D1D5; margin-bottom: 0.1em; padding: 0.6em;">
                        <?php echo $log_lname;?>
                      </div>
                  </div>
                  </div>
                  <div class="row" style="margin-bottom: 0.5em;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                      <label for="uname">Username</label>
                      <div id="uname" style="border-radius: 10px; background-color: #68D3E7; margin-bottom: 0.1em; padding: 0.6em;">
                        <?php echo $log_username;?>
                      </div>
                  </div>
                  </div>

                  <form method="post" onsubmit="return checkPass()" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0.5em;">
                        <label for="cpass">Password</label>
                        <input type="password" name="cpass" id="cpass" class="form-control" style="border-radius: 10px;" required="">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <label for="cpassc">Confirm Password</label>
                        <input type="password" name="cpassc" id="cpassc" class="form-control"  style="border-radius: 10px;" required="">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <input id="submitcpass" type="submit" name="submit_pass"  value="Update Password" class="btn btn-info my-4 btn-block" style="float: right; border-radius: 20px;" >
                    </div>
                    </div>


                  </form>


              </div>
          </div>
        </div>
      </div>
      <!-- end modalaccount -->



		</nav>


		<nav  style="background-color: #E0E0E0; border-radius: 10px; ">

			<div class="table-responsive jumbotron">

	            <table class="table table-bordered">
	              	<tr style="background-color: #006596; " >
	                    <th width="10%" style="color: #ffffff;" class="text-center">ID</th>
	                    <th width="10%" style="color: #ffffff;" class="text-center">Date Posted</th>
	                    <th width="30%" style="color: #ffffff;" class="text-center">Category</th>
	                    <th width="40%" style="color: #ffffff;" class="text-center">Respondent</th>
	                    <th width="10%" style="color: #ffffff;" class="text-center">Action</th>
	                </tr>
	                <?php

	                $sql = "SELECT * FROM requests";
	                $result = mysqli_query($con,$sql);
	                $i = 1;
	                while($row = mysqli_fetch_array($result))
	                {
	                ?>

	                <tr>

	                    <td class="text-center"><?php echo $row['id']; ?></td>
	                    <td class="text-center"><?php echo $row['date_created']; ?></td>
	                    <td class="text-center"><?php echo $row['category']; ?></td>

	                    <td class="text-center"><?php
	                    if (!empty($row['respondent'])) {
	                    	echo $row['respondent'];
	                    }
	                    else {
	                    	echo "NEED AN IMMEDIATE RESPONSE.";
	                    }
	                    ?></td>
	                    <td class="text-center">
	                    <button type="button" style="border-radius: 15px;" class="btngr btngr3" data-toggle="modal" data-target="#myModal<?php echo $row['id']?>">View</button>
	                    </td>
	                </tr>

	                <!-- start modal -->
					      <div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
					        <div class="modal-dialog">
					            <div class="modal-content">
						            <div class="modal-header">
						               <button type="button" class="close" data-dismiss="modal">&times;</button>
						                  <h4 class="modal-title">Request for a Respondent Details</h4>
						            </div>
						            <div class="modal-body">
						                <div class="table-responsive container">
						                    <div class="row" style="margin-bottom: 0.5em; ">
						                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #28C2C6; border-radius: 10px; color: #ffffff;">
						                        <h5 >DATE POSTED : <?php echo $row['date_created'];?></h5>
						                      </div>
						                    </div>
						                    <div class="row" style="margin-bottom: 0.5em; ">
						                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #0065CE; border-radius: 10px; color: #ffffff;">
						                        <h5 >CATEGORY : <?php echo $row['category'];?></h5>
						                      </div>
						                    </div>

						                    <?php
						                    if (!empty($row['respondent'])) {
						                    ?>
							                    <div class="row" style="margin-bottom: 0.5em; ">
							                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #0065CE; border-radius: 10px; color: #ffffff;">
							                        <h5 >RESPONDENT: <?php echo $row['respondent'];?></h5>
							                      </div>
							                    </div>
						                    <?php
						                	}
						                	else {
						                	?>
						                		<div class="row" style="margin-bottom: 0.5em; ">
							                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #E00000; border-radius: 10px; color: #ffffff;">
							                        <h5 class="text-center">NEED AN IMMEDIATE RESPONSE</h5>
							                      </div>
							                    </div>

																	<div class="row" style="margin-bottom: 0.5em;" >
								                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" >
								                      	<img src="images/loc1.png" width="350px" height="300px">
								                      </div>
								                    </div>
							                <?php
							            	}
							            	?>

						                </div>
						            </div>



					            </div>
					        </div>
					    </div>
					      <!-- end modal -->



	                <?php
	                $i++;
	                }

	                ?>

	            </table>
			</div>













		</nav>



	</div>




	<script>
		function expandTextarea(id) {
	    document.getElementById(id).addEventListener('keyup', function() {
	        this.style.overflow = 'hidden';
	        this.style.height = 0;
	        this.style.height = this.scrollHeight + 'px';
	    }, false);
		}

		expandTextarea('txtarea');




	</script>
<!-- end body -->
</body>
</html>
