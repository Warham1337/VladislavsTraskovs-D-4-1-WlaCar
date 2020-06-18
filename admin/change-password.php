<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['vrmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from admin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update admin set Password='$newpassword' where ID='$adminid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

  
  ?>
<!DOCTYPE html>
<html lang="lv">

<head>
    <title>Admin panele | Izmainit parole</title>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
 
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
   
    <link rel="stylesheet" href="css/style4.css">

    <link href="css/fontawesome-all.css" rel="stylesheet">
  
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Jauna parole un parole apstiprinajums atskeras');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body>
    <div class="wrapper">
       
       <?php include_once('includes/sidebar.php');?>

        <div id="content">
     
       <?php include_once('includes/header.php');?>
   
            <div class="col-lg-10 m-auto">

     
            <section class="forms-section">

       
                <div class="change-conteiner">
                    <h4 class="tittle-w3-agileits mb-4"> Nomainit parole</h4>

   <?php
$adminid=$_SESSION['vrmsaid'];
$ret=mysqli_query($con,"select * from admin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <form action="#" method="post" name="changepassword" onsubmit="return checkpass();">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Jusu parole:</label>
                                
                                <input type="password" name="currentpassword" class=" form-control" required= "true" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Jauna parole:</label>
                                <input type="password" name="newpassword" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Parole apstiprinajums:</label>
                            <input type="password" name="confirmpassword" class="form-control" value="">
                        </div>
                       
                        <?php } ?>
                        <button type="submit" class="btn btn-primary" name="submit">Nomainit</button>
                    </form>
                </div>
                </div>
              
            </section>


           <?php include_once('includes/footer.php');?>

        </div>
    </div>


    <script src='js/jquery-2.2.3.min.js'></script>

    <script src="js/sidebar-j.js"></script>

    <script>
       
        (function () {
            'use strict';

            window.addEventListener('load', function () {
            
                var forms = document.getElementsByClassName('needs-validation');

                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
  

</body>
</html>
<?php }  ?>