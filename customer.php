<?php
session_start();
require 'db.php';


$sum=0;
$deposit=500;


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Customer profile
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>
    <script src="js/kunal.js"></script>

    <style type="text/css">
        .tab-content > div:last-child {
  display: none;
}
    </style>

    


</head>

<body>
  
    <div id="all">

        <div id="content">
            <div class="container">


                <div class="col-md-12" id="checkout">

                    <div class="box">
                        <form method="post" action="checkout3.php">
                            <h1>Customer profile</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="tab active"><a href="#orders"><i class="fa fa-map-marker"></i><br>Orders</a>
                                </li>
                                
                                
                                <li class="tab"><a href="#about"><i class="fa fa-money"></i><br>About</a>
                                </li>
                                <!-- <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li> -->
                            </ul>

                          <div class="tab-content">  

                            <div id="orders">

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th colspan="2">Product</th>
                                                <th colspan="1">Price</th>
                                                <th colspan="1">Days</th>
                                                <th colspan="1">Total</th>
                                            </tr>
                                        </thead>
                                       
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->
                       
                       

                            <div class="box-footer">
                                
                               <!--  <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                        <!-- orders -->





<?php
$columns = [];
$res1 = $mysqli->query("show columns from customer") or die();
while($row=$res1->fetch_assoc()){
    array_push($columns,$row['Field']);
}
$i=0;
$res=$mysqli->query("Select * from customer where customer_id='001400028'");
$row=$res->fetch_assoc();
$len1 = count($columns);
// for($i=0;$i<$len;$i++){
?>



                 <div id="about">

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="1">bla</th>
                                                <th colspan="1">cla</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action = "change.php" method="post">
                                        <?php for($i=1;$i<$len1;$i++){
                                       ?>
                                            <tr>
                                                <td><?php echo str_replace("_", " ",$columns[$i]); ?></td>
                                                <td><input type="text" value="<?php echo $row[$columns[$i]]; ?>" style="width: 200px; text-align: left;"></td>
                                            </tr>

                                        <?php } ?>
                                    </form>

                                        
                                            
                                        </tbody>
                                       
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->
                       
                       

                            <div class="box-footer">
                                
                            <!--     <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                        <!-- about -->



                    </div>





















                        </form>

                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-12 -->

                

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->



     


    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
     <script src="js/kunal.js"></script>






</body>

</html>