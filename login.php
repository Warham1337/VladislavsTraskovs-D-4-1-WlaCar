<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from user where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $status=mysqli_query($con,"select adminstatus from user where ID='$ret'");
      $status_ad=mysqli_fetch_array($status);
      $_SESSION['adminid']=$status_ad['adminstatus'];
      $_SESSION['vrmsuid']=$ret['ID'];
     header('location:index.php');
    }else{
    $msg="Invalid Details.";
    }
  }
  ?>

<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
   

    <title>Ielagoties</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.css" rel="stylesheet">
 
    <link href="style.css" rel="stylesheet">


</head>

<body id="body-login">

   <?php include_once('includes/header.php');?>


    <section id="lgoin-page-wrap" class="section-padding">
                    <div class="login-area">
							<form action="" method="post" class="box-login">
                            <h3>PIESLĒGTIES</h3>
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
									<input type="text" placeholder="E-pasts vai tell. nr." name="emailcont" required="true">
									<input type="password" placeholder="Parole" name="password" required="true">
                                    <button type="submit" name="login">  Autorizeties</button>
                                    <hr>
                                    <a href="forgot-password.php"> Aizmirstat parole</a>
                                    <a href="register.php">Reģistrācija</a>
							</form>
                		
    </section>
</body>

</html>