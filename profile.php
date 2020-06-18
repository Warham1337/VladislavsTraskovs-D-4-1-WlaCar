<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['vrmsuid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobilenumber=$_POST['mobilenumber'];
    $email=$_POST['email'];
    
   

    $query=mysqli_query($con, "update user set FirstName='$fname',LastName='$lname', MobileNumber='$mobilenumber' where ID='$uid'");


    if ($query) {
    $msg="Informācija jusu profila atjauinota!";
  }
  else
    {
      $msg="Kļuda. Pameģiniet vel reiz.";
    }

}

 ?>

<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
    
    <title>Profile</title>


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.css" rel="stylesheet">
   
    <link href="style.css" rel="stylesheet">


</head>

<body id="body-your-info">

   <?php include_once('includes/header.php');?>

    <div class="contact-page-perent">
        <div class="container-block">
            <h3 style="text-align: center;color: white">Jusu informācija</h3>
            <div class="row">

                <div class="col-lg-10 m-auto">
                    <div class="contact-form">

                        <?php
$uid=$_SESSION['vrmsuid'];
$ret=mysqli_query($con,"select * from  user where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                        <form class="mb-0" method="post">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="name-input">
                                       
                                       <input type="text" value="<?php  echo $row['FirstName'];?>" id="fname" name="fname" required="true">
                                    </div>
                                </div></div>
                          <div class="row" style="padding-top: 20px">
                                <div class="col-lg-12 col-md-6">
                                    <div class="email-input">
                                        <input type="text" value="<?php  echo $row['LastName'];?>" id="lname" name="lname" required="true">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="website-input">
                                         <input type="email" value="<?php  echo $row['Email'];?>" id="email" name="email" readonly="true">
                                    </div>
                                </div>

                                 </div>
                                 <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="website-input">
                                         <input  type="text" value="<?php  echo $row['MobileNumber'];?>" id="mobilenumber" name="mobilenumber" required="true">
                                    </div>
                                </div>

                                 </div>
<?php }?>
                            <div class="input-submit">
                                <a href="change-password.php">Nomainit parole</a>
                                <button type="submit" name="submit"> Atjauninat</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

   
   <?php include_once('includes/footer.php');?>

</body>

</html>
<?php }  ?>