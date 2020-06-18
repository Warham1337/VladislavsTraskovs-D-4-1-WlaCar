<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['vrmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update admin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile ir redigeta.";
  }
  else
    {
      $msg="Kluda. Pameginiet vel reiz.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="lv">

<head>
    <title>Admin panele | Profile</title>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
 
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="css/style4.css">
 
    <link href="css/fontawesome-all.css" rel="stylesheet">
 
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>

<body>
    <div class="wrapper">

       <?php include_once('includes/sidebar.php');?>

        <div id="content">
        
       <?php include_once('includes/header.php');?>
   
            <h2 class="main-title-w3layouts mb-2 text-center"> Admin Profile</h2>
         
            <section class="forms-section">

         
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4"> Rediget</h4>

   <?php
$adminid=$_SESSION['vrmsaid'];
$ret=mysqli_query($con,"select * from admin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <form action="#" method="post">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Vards</label>
                                
                                <input class=" form-control" id="adminname" name="adminname" type="text" value="<?php  echo $row['AdminName'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Lietota vards</label>
                                <input class=" form-control" id="username" name="username" type="text" value="<?php  echo $row['UserName'];?>" required="true" readonly='true'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Kontakt numurs</label>
                            <input class="form-control " id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">E-pasts</label>
                            <input class="form-control " id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputCity">Registracijas datums</label>
                                <input class="form-control " id="regdate" name="regdate" type="text" value="<?php  echo $row['AdminRegdate'];?>" required="true" readonly='true'>
                            </div>
                          
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary" name="submit">Rediget</button>
                    </form>
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