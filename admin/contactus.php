<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$csmsaid=$_SESSION['vrmsaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
$phonenum=$_POST['phonenum'];

 $query=mysqli_query($con,"update info set PageTitle='$pagetitle',PageDescription='$pagedes',Email='$email',MobileNumber='$phonenum' where  PageType='contactus'");

    if ($query) {
    $msg="Contact Us has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Par mums</title>
   

    
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    
    <link rel="stylesheet" href="css/style4.css">
    
    <link href="css/fontawesome-all.css" rel="stylesheet">
   
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
   
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    <div class="wrapper">
      
       <?php include_once('includes/sidebar.php');?>

        <div id="content">
          
       <?php include_once('includes/header.php');?>
          
            <h2 class="main-title-w3layouts mb-2 text-center"> Mūsu kontakti</h2>
           
            <section class="forms-section">

         
                <div class="outer-w3-agile mt-3">
                    <form action="#" method="post">
                       <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>       
                        <?php

$ret=mysqli_query($con,"select * from  info where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Nosaukums</label>
                                
                                <input type="text" name="pagetitle" class=" form-control" required= "true" value="<?php  echo $row['PageTitle'];?>">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Informācija</label>
                                
                                <textarea class=" form-control" id="pagedes" name="pagedes" type="text" required="true" value=""><?php  echo $row['PageDescription'];?></textarea>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">E-pasts</label>
                                
                                <input type="text" name="email" class=" form-control" required= "true" value="<?php  echo $row['Email'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Tell. num.</label>
                                
                                <input type="text" name="phonenum" class=" form-control" required= "true" value="<?php  echo $row['MobileNumber'];?>">
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