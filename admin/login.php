<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from admin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vrmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Ielagoties</title>
    
    
  
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    
    <link href="css/fontawesome-all.css" rel="stylesheet">
  
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  
</head>

<body id=admin-login>
    <div class="bg-page py-5">
        <div class="container">
 
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Admin panele</h2>
        
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="#" method="post" name="login">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div class="form-group">
                        <label>Lietotaja vards</label>
                       <input type="text" class="form-control" name="username" required="true">
                    </div>
                    <div class="form-group">
                        <label>Parole</label>
                        <input type="password" class="form-control" name="password" required="true">
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        
                        <div class="forgot col-md-6 text-sm-left text-center">
                            <a href="forgot-password.php">Aizmirstat parole?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4" value="Sign In" name="login">Pieslēgties</button>
                </form>
                
                <h1 class="paragraph-agileits-w3layouts mt-2">
                    <a href="../index.php">Atgriezties mājās lapa</a>
                </h1>
            </div>

           <?php include_once('includes/footer.php');?>
        </div>
    </div>

</body>

</html>