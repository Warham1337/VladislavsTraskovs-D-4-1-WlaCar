
<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobno=$_POST['mobilenumber'];
    $password=md5($_POST['password']);
   


    $ret=mysqli_query($con, "select Email from user where Email='$email' || MobileNumber='$mobno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="Sis e-pasts vai telefona numurs jau ir saistīts ar citu profilu";
    }
    else{
    $query=mysqli_query($con, "insert into user(FirstName,LastName,Email,MobileNumber,Password) value('$fname','$lname','$email','$mobno','$password')");
    if ($query) {
        
    $msg="Jus veiksimi registreti!";
  }
  else
    {
     $msg="Kluda. Ludzu, meginiet velreiz";
    }
}

}
 ?>
<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
    
    <title>Reģistrācija</title>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">


</head>

<body id="body-reg">

   <?php include_once('includes/header.php');?>

    <section id="lgoin-page-wrap" class="section-padding">
                    <div class="login-area">
							<form action="" method="post" >
                                <div id="box-reg" class="box-login">
                            <h3>Reģistrācija</h3>
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                    <input type="text" placeholder="Vards" name="fname" required="true">
                                    <input type="text" placeholder="Uzvards" name="lname" required="true">
                                    <input type="text" placeholder="E-pasts" name="email" required="true">
                                    <input type="text" placeholder="Telefona numurs" name="mobilenumber" required="true">
									<input type="password" placeholder="Parole" name="password" required="true">
                                    <button type="submit" name="submit"> Reģistrēties</button>
                                    <hr>
                                    <a href="login.php"> PIESLĒGTIES</a>
                                    </div>
                                </form>
                		
    </section>
</body>

</html>