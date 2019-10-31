<?php
session_start();
require_once('dbconnection.php');


// Code for login system
if(isset($_POST['login']))
{
  $useremail=$_POST['username'];
  $password=$_POST['password'];


  $admin= mysqli_query($con,"SELECT * FROM admin WHERE username='$useremail'");
  $sub_admin= mysqli_query($con,"SELECT * FROM sub_admin WHERE username='$useremail'");

  $adminlog=mysqli_fetch_array($admin);
  $sub_adminlog=mysqli_fetch_array($sub_admin);




  if($adminlog>0)
  {

  	$password_hash = $adminlog['password'];

  	if(password_verify($password, $password_hash))
  	{
      	$extra="main.php";
      	$_SESSION['id']=$adminlog['id'];
      	$_SESSION['login']=$_POST['username'];
      	$_SESSION['fname']=$adminlog['first_name'];
      	$_SESSION['lname']=$adminlog['last_name'];



      	$host=$_SERVER['HTTP_HOST'];
      	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      	header("location:http://$host$uri/$extra");
      	exit();
	  }
	  else
	  {
		 echo "<script>alert('Invalid username or password');</script>";
	  }
  }


  if($sub_adminlog>0)
  {

    $password_hash = $sub_adminlog['password'];

    if(password_verify($password, $password_hash))
    {
        $extra="responder.php";
        $_SESSION['id']=$sub_adminlog['id'];
        $_SESSION['login']=$_POST['username'];
        $_SESSION['hospital']=$sub_adminlog['hospital'];
   



        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else
    {
     echo "<script>alert('Invalid username or password');</script>";
    }
  }

 

  else
  {
    echo "<script>alert('Invalid username or password');</script>";
  }
}



?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Qsee</title>
    <link href="css/des.css" rel='stylesheet' type='text/css' />
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
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
  </head>
  <body>

    

    <form action="" class="login-form" method="post" enctype="multipart/form-data">
        <img src="images/logo.png"  style=" margin-bottom: 0.8em;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        

        <br><br><br><br><br>
        <div class="txtb" style="margin-bottom: 3em;">
          <input type="text" name="username" required="" id="approver_username" onBlur="checkFormat()">
          <span data-placeholder="Email"></span>
          
          
        </div>
        <span id="message"></span>

        <div class="txtb" style="margin-bottom: 3em;">
          <input type="password" name="password" required="">
          <span data-placeholder="Password"></span>
        </div>
        <br />
        <input type="submit" class="logbtn" value="Login" name="login" style="border-radius: 10px; font-family: arial;" id="submit">
     
       <!--  <p class="text-center">Don't have an account? <a href="register.php">Sign Up</a></p>  -->
      <!--   <div class="bottom-text">
          Don't have account? <a href="register.php">Register</a>
        </div> -->
    </form>

    <script type="text/javascript">
         $(".txtb input").on("focus",function(){
            $(this).addClass("focus");
          });

         $(".txtb input").on("blur",function(){
            if($(this).val() == "")
          $(this).removeClass("focus");
          });
    </script>



    <script>
          
          function checkFormat() {
              
            jQuery.ajax({
            url: "check_format.php",
            data:'username='+$("#approver_username").val(),
            type: "POST",
            success:function(data){
            $("#message").html(data);

            },
            error:function(){
            }
            });
            }  
            

        </script>
  </body>
</html>
