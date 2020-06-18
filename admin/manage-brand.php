<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin panele | Rediget transporta brendu</title>

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

            <h2 class="main-title-w3layouts mb-2 text-center">Rediget transporta brendu</h2>
       
            <section class="tables-section">
   

                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Transports</h4>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nr.</th>
                                        <th>Brenda nosaukums</th>
                                        <th>Izveidosanas datums</th> 
                                    </tr>
                                </thead>
                                <?php
$ret=mysqli_query($con,"select * from  brand");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <tbody>
                                    <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['BrandName'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>

                </tr>
                <?php 
$cnt=$cnt+1;
}?> 
                                    
                                    
                                   
                                   
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
        

            </section>

    

           <?php include_once('includes/footer.php');?>
        </div>
    </div>

    <script src='js/jquery-2.2.3.min.js'></script>
 
    <script src="js/sidebar-j.js"></script>


</body>

</html>
<?php }  ?>