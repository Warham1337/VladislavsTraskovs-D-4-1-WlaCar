<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vrmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['vrmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from user where ID='$uid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update user set Password='$newpassword' where ID='$uid'");
$msg= "Jusu parols veiksmigi mainits!"; 
} else {

$msg="Jus ne parezi ivadat jusu vecu parole";
}



}

  
?>
<!DOCTYPE html>
<html class="no-js" lang="lv">

<head>
    
    <title>Mainīt parole</title>


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

<body id="body-change-pas">


   <?php include_once('includes/header.php');?>


    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="contact-form" style="padding-top: 250px">
                        <?php
$uid=$_SESSION['vrmsuid'];
$ret=mysqli_query($con,"select * from  user where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <form class="mb-0" method="post" name="changepassword" onsubmit="return checkpass();">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>    
                        <h2>Nomainīt paroli</h2>
                            <div class="row" style="padding-top: 30px">
                                <div class="col-lg-12 col-md-6">
                                    <div class="name-input">
                                        <input type="password" name="currentpassword" id="currentpassword"  required='true' placeholder="Vecā parole">
                                    </div>
                                </div></div>
                          <div class="row" style="padding-top: 20px">
                                <div class="col-lg-12 col-md-6">
                                    <div class="email-input">
                                        <input type="password" name="newpassword" id="newpassword" required='true' placeholder="Jaunā porole">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="website-input">
                                         <input type="password" name="confirmpassword" id="confirmpassword" value="" required='true' placeholder="Apstiprināt jaunā porole">
                                    </div>
                                </div>

                                 </div>
<?php }?>
                            <div class="input-submitch" style="padding-top: 60px">
                                <button type="submit" name="submit">Nomainīt</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


</body>

</html>
<?php }  ?>