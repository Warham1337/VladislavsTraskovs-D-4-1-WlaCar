<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update user set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Parole veiksmigi ir izmainita');</script>";
session_destroy();
   }
  
  }
  ?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
   

    <title>Atjaunot parole</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
 
    <link href="assets/css/font-awesome.css" rel="stylesheet">
  
    <link href="style.css" rel="stylesheet">

    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Jauna porole un apstiprinajuma porole ne sakrit!');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body>

   <?php include_once('includes/header.php');?>

    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                	<div class="login-page-content">
                		<div class="login-form">
                			<h3>Ievadiet jauno parole</h3>
							<form action="" method="post" name="changepassword" onsubmit="return checkpass();" id="changepassword">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
								<div class="username">
									<input type="password"placeholder="Jauna parole" name="newpassword" id="newpassword" required="true">

								</div>
								<div class="password">
									<input type="password" placeholder="Apstiprinat jauno porole" name="confirmpassword" id="confirmpassword" required="true">
								</div>
								<div class="log-btn">
									<button type="submit" name="submit"><i class="fa fa-sign-in"></i> Apstiprinat</button>
								</div>
							</form>
                		</div>
                		
                		<div class="login-other">
                			<span class="vai">vai</span>
                			<a href="login.php" class="login-with-btn facebook"> Iejiet</a>
                			</div>
                		<div class="create-ac">
                			<p>Ne esat registrets? <a href="register.php">Registracija</a></p>
                		</div>
                		<div class="login-menu">
                			<a href="about.php">Par mums</a>
                			<span>|</span>
                			<a href="contact.php">Kontakti</a>
                		</div>
                	</div>
                </div>
        	</div>
        </div>
    </section>


  <?php include_once('includes/footer.php');?>


</body>

</html>