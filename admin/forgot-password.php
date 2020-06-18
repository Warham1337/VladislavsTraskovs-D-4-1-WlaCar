<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from admin where  Email='$email' and MobileNumber='$contactno' ");
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
<html lang="en">

<head>
    <title>Admin panele | Aizmirsat parole</title>
    

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
 
    <link href="css/fontawesome-all.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
        
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Ajaunot parole</h2>
        
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="#" method="post" name="submit">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div class="form-group">
                        <label>E-pasts</label>
                       <input type="email" class="form-control" name="email"required="true">
                    </div>
                    <div class="form-group">
                        <label>Telefona numurs</label>
                        <input class="form-control"  type="text" name="contactno" required="true">
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        
                        <div class="forgot col-md-6 text-sm-left text-center">
                            <a href="login.php">Ieiet</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4" value="Sign In" name="submit">Atjaunot</button>
                </form>
                
                <h1 class="paragraph-agileits-w3layouts mt-2">
                    <a href="../index.php">Atgriezties majas lapa</a>
                </h1>
            </div>

           <?php include_once('includes/footer.php');?>
        </div>
    </div>


</body>

</html>