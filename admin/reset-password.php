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

        $query=mysqli_query($con,"update admin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Parole veiksmigi nomainita');</script>";
session_destroy();
   }
  
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Atjaunot parole</title>
    
 
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
 
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
   
    <link href="css/fontawesome-all.css" rel="stylesheet">
  
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Jaua parole un parole apstiprinajums ne sakrit!');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">
            
            <h2 class="main-title-w3layouts mb-2 text-center text-white">Atjaunot parole</h2>
           
            <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                <form action="#" method="post" name="changepassword" onsubmit="return checkpass();">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div class="form-group">
                        <label>Jauna parole</label>
                      
                       <input class="form-control" type="password" required="true" name="newpassword">
                    </div>
                    <div class="form-group">
                        <label>Apstiprinat parole</label>
                        
                        <input class="form-control" type="password" name="confirmpassword" required="true" >
                    </div>
                    <div class="d-sm-flex justify-content-between">
                        
                        <div class="forgot col-md-6 text-sm-left text-center">
                            <a href="login.php">Ieiet</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4" value="Sign In" name="submit">Reset</button>
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