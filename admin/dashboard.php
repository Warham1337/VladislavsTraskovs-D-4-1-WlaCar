<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | Dashboard</title>
    
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
   
    <link rel="stylesheet" href="css/bar.css">
  
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
           
            <h2>Informācijas panele</h2>
            <div class="container-admin">
               
                    <div class="conteiner-moto rounded">
                        <h5 style="padding-bottom: 10px">Motocikli</h5>
                        <hr>
                        <a href="manage-vehicledetails.php"><div class="stat-grid p-3 d-flex 
                        align-items-center justify-content-between bg-secondary rounded">
                        <?php $query1=mysqli_query($con,"Select * from moto");
$totaltwowheeler=mysqli_num_rows($query1);
?>
                            <div class="s-l">
                                <h5>Kopējais motociklu skaits</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $totaltwowheeler;?>
                                    <i class="fa fa-motorcycle"></i>
                                </h6>
                            </div>
                        </div></a>
                        <a href="new-twowheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-left justify-content-between bg-secondary rounded ">
                            <?php $query2=mysqli_query($con,"Select * from bookingmoto where Status=''");
$newtwbooking=mysqli_num_rows($query2);
?>
                            <div class="s-l">
                                <h5>Jaunas motociklu rezervācijas </h5> 
                            </div>
                            <div class="s-r">
                                <h6><?php echo $newtwbooking;?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div></a>
                        <a href="approved-twowheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-secondary rounded">
                            <?php $query3=mysqli_query($con,"Select * from bookingmoto where Status='Approved'");
$apprtwbooking=mysqli_num_rows($query3);
?>
                            <div class="s-l">
                                <h5>Apstiprinātās motociklu rezervācijas</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $apprtwbooking;?>
                                    <i class="fas fa-check"></i>
                                </h6>   
                            </div>
                        </div></a>

                        <a href="unapproved-twowheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-secondary rounded">
                            <?php $query4=mysqli_query($con,"Select * from bookingmoto where Status='Unapproved'");
$unapprtwbooking=mysqli_num_rows($query4);
?>
                            <div class="s-l">
                                <h5>Atceltās motociklu rezervācijas</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $unapprtwbooking;?>
                                    <i class="fas fa-times"></i>
                                </h6>
                            </div>
                        </div></a>
<a href="all-twowheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-secondary rounded">
                        <?php $query5=mysqli_query($con,"Select * from bookingmoto");
$totaltwbooking=mysqli_num_rows($query5);
?>
                            <div class="s-l">
                                <h5>Visas motociklu rezervācijas</h5>
                            </div>

                            <div class="s-r">
                                <h6><?php echo $totaltwbooking;?>
                                    <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div></a>

                
                    <div class="conteiner-auto">
                        <h5 class="tittle-w3-agileits mb-4 font-weight-bold">Automašīnas</h5>
                        <hr>
                        <a href="manage-fourwheeler-vehicledetails.php"><div class="stat-grid p-3 d-flex 
                        align-items-center justify-content-between text-white bg-dark rounded">
                        <?php $query6=mysqli_query($con,"Select * from car");
$totalfw=mysqli_num_rows($query6);
?>
                            <div class="s-l">
                                <h5>Kopējais automašīnu skaits</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $totalfw;?>
                                    <i class="fa fa-car"></i>
                                </h6>
                            </div>
                        </div></a>
                        <a href="new-fourwheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-left justify-content-between bg-dark rounded">
                            <?php $query7=mysqli_query($con,"Select * from bookingcar where Status=''");
$newfwbooking=mysqli_num_rows($query7);
?>
                            <div class="s-l">
                                <h5>Jaunas automašīnu rezervācijas</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $newfwbooking;?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div></a>
                        <a href="approved-fourwheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-dark rounded">
                            <?php $query8=mysqli_query($con,"Select * from bookingcar where Status='Approved'");
$apprfwbooking=mysqli_num_rows($query8);
?>
                            <div class="s-l">
                                <h5>Apstiprinātās automašīnu rezervācijas</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $apprfwbooking;?>
                                    <i class="fas fa-check"></i>
                                </h6>
                            </div>
                        </div></a>

                        <a href="unapproved-fourwheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-dark rounded">
                            <?php $query9=mysqli_query($con,"Select * from bookingcar where Status='Unapproved'");
$unapprfwbooking=mysqli_num_rows($query9);
?>
                            <div class="s-l">
                                <h5>Atceltās automašīnu rezervācijas</h5>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $unapprfwbooking;?>
                                    <i class="fas fa-times"></i>
                                </h6>
                            </div>
                        </div></a>
                        <a href="all-fourwheeler-booking.php"><div class="stat-grid p-3 mt-3 d-flex 
                        align-items-center justify-content-between bg-dark rounded">
                        <?php $query10=mysqli_query($con,"Select * from bookingcar");
$totalfwbooking=mysqli_num_rows($query10);
?>
                            <div class="s-l">
                                <h5>Visas automašīnu rezervācijas</h5>
                            </div>

                            <div class="s-r">
                                <h6><?php echo $totalfwbooking;?>
                                    <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div>
                    </div></a>
          
                </div>
            </div>


            
            <?php include_once('includes/footer.php');?>
            
        </div>
    </div>

    <script src='js/jquery-2.2.3.min.js'></script>

   
    <script>
      
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });

            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
       
    </script>
  
    <script src="js/sidebar-j.js"></script>

   
    <link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>

    <script>
        var chart;
        var legend;

        var chartData = [{
                country: "Lithuania",
                value: 260
            },
            {
                country: "Ireland",
                value: 201
            },
            {
                country: "Germany",
                value: 65
            },
            {
                country: "Australia",
                value: 39
            },
            {
                country: "UK",
                value: 19
            },
            {
                country: "Latvia",
                value: 10
            }
        ];

        AmCharts.ready(function () {
     
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
    
            chart.depth3D = 20;
            chart.angle = 30;

        
            chart.write("chartdiv");
        });
    </script>

    <script>
        $('admin.btn').click(function(){
            $('nav ul .admin-show').toggleClass("show")
        });

    </script>

</body>

</html>
<?php } ?>