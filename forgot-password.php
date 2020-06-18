<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from user where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{ 
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>


<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
   

    <title>Aizmirstat parole</title>

  
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="assets/css/font-awesome.css" rel="stylesheet">
  
    <link href="style.css" rel="stylesheet">

</head>

<body id="body-change">

   <?php include_once('includes/header.php');?>

    <section id="lgoin-page-wrap" class="section-padding">
                    <div class="login-area">
							<form action="" method="post" class="box-login">
                            <h3>Mainīt paroli</h3>
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
									<input type="text" placeholder="E-pasts" name="email" id="email" required="true">
									<input type="password" placeholder="Tell. numurs" id="contactno" name="contactno" required="true">
                                    <button type="submit" name="submit"> Mainīt </button>
                                    <hr>
                                    <a href="login.php"> Pieslēgties</a>
                                    <a href="register.php">Reģistrācija</a>
							</form>
                		
    </section>
</body>

</html>