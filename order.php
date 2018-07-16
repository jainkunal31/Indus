<?php
require 'db.php';
session_start();


//echo $_SERVER['HTTP_HOST'];


$d=1;
$sum=0;


if($_SERVER['REQUEST_METHOD']=='POST'){
  
   // echo "HIIIIIIII";
  if(isset($_POST['sku'])){
 //   echo "HIIIIIIIIII";
    $sku=$_POST['sku'];
    $rate=$_POST['rate'];
    if(isset($_POST['ic']))
      $ic=$_POST['ic'];
    else 
      $ic=0;
    if(isset($_POST['mc']))
      $mc=$_POST['mc'];
    else 
      $mc=0;
    if(isset($_POST['dmc']))
      $dmc=$_POST['dmc'];
    else 
      $dmc=0;
    if(isset($_POST['nos']))
      $nos=$_POST['nos'];
    else 
      $nos=0;

    $sql="Insert into orders(sku,rate,ic,mc,dmc,nos) values('$sku',$rate,$ic,$mc,$dmc,$nos)";
    $result4 = $mysqli->query($sql) or die($mysqli->error);



    $_SESSION['sbrand']=$_POST['brand'];
    $_SESSION['scategory']=$_POST['category'];
    $_SESSION['scolour']=$_POST['colour'];
    $_SESSION['sgrade']=$_POST['grade'];
    $_SESSION['spacking']=$_POST['packing'];
    $_SESSION['ssize']=$_POST['size'];
    $_SESSION['sunit']=$_POST['unit'];
  //  echo $sbrand;






  }


  
}




?>



<!DOCTYPE html>
<html lang="en">

<head>

   <title>
Order
</title>
    
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}

/*datalist{
  display: block;
}*/

body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>






 <script type="text/javascript">



  






            function get_category() { // Call to ajax function
              // alert($("#brand").val());
            if(document.getElementById('colour')){
              document.getElementById('colour').options.length=1;
            }
             if(document.getElementById('grade')){
              document.getElementById('grade').options.length=1;
            }
             if(document.getElementById('packing')){
              document.getElementById('packing').options.length=1;
            }
             if(document.getElementById('size')){
              document.getElementById('size').options.length=1;
            }
             if(document.getElementById('unit')){
              document.getElementById('unit').options.length=1;
            }
             if(document.getElementById('dp')){
             
              $('#dp').remove();
            }
            if(document.getElementById('disc')){
             
              $('#disc').remove();
            }

             $("#rate").val('');


            var brand = $('#brand').val();

            //document.getElementById('colour').options.length=1;
            var dataString = "brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#2").html(html);
                    $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });
          }



           function get_colour() { // Call to ajax function

              if(document.getElementById('grade')){
              document.getElementById('grade').options.length=1;
            }
             if(document.getElementById('packing')){
              document.getElementById('packing').options.length=1;
            }
             if(document.getElementById('size')){
              document.getElementById('size').options.length=1;
            }
             if(document.getElementById('unit')){
              document.getElementById('unit').options.length=1;
            }
             if(document.getElementById('dp')){
              $('#dp').remove();
            }
             if(document.getElementById('disc')){
             
              $('#disc').remove();
            }

             $("#rate").val('');


            var category = $('#category').val();
            var brand = $('#brand').val();
           // alert(brand);
            var dataString = "category='"+category+"'&brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
              //  data: '{ "category":' + category + ', "brand":' +brand+ ' }',
                data : dataString,
                  // contentType: 'application/json; charset=utf-8',
                  // data: JSON.stringify({ 'categ': 'CPVC' , locale: 'en-US' }),           
                  // dataType: 'json',
                success: function(html)
                {
                    $("#3").html(html);
                    $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });
          }


          function get_grade() { // Call to ajax function

              if(document.getElementById('packing')){
              document.getElementById('packing').options.length=1;
            }
             if(document.getElementById('size')){
              document.getElementById('size').options.length=1;
            }
             if(document.getElementById('unit')){
              document.getElementById('unit').options.length=1;
            }
              if(document.getElementById('dp')){
              $('#dp').remove();
            }
             if(document.getElementById('disc')){
             
              $('#disc').remove();
            }

             $("#rate").val('');

            var brand = $('#brand').val();
            var category = $('#category').val();
            var colour = $('#colour').val();

            //document.getElementById('colour').options.length=1;
            var dataString = "colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#4").html(html);
                    $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });
          }


          function get_packing() { // Call to ajax function
             if(document.getElementById('size')){
              document.getElementById('size').options.length=1;
            }
             if(document.getElementById('unit')){
              document.getElementById('unit').options.length=1;
            }
             if(document.getElementById('dp')){
              $('#dp').remove();
            }
             if(document.getElementById('disc')){
             
              $('#disc').remove();
            }

             $("#rate").val('');
          

            var brand = $('#brand').val();
            var category = $('#category').val();
            var colour = $('#colour').val();
            var grade = $('#grade').val();
            // alert(grade);

            //document.getElementById('colour').options.length=1;
           var dataString = "grade='"+grade+"'&colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#5").html(html);
                    $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });
          }


          function get_size() { // Call to ajax function
           if(document.getElementById('unit')){
              document.getElementById('unit').options.length=1;
            }
             if(document.getElementById('dp')){
            
              $('#dp').remove();
            }
             if(document.getElementById('disc')){
             
              $('#disc').remove();
            }
             $("#rate").val('');
        

            var brand = $('#brand').val();
            var category = $('#category').val();
            var colour = $('#colour').val();
            var grade = $('#grade').val();
            var packing = $('#packing').val();

            //document.getElementById('colour').options.length=1;
            var dataString = "packing='"+packing+"'&grade='"+grade+"'&colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#6").html(html);
                    $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });
          }


          function get_unit() { // Call to ajax function
             if(document.getElementById('dp')){
              $('#dp').remove();
            }
             if(document.getElementById('disc')){
             
              $('#disc').remove();
            }
             $("#rate").val('');

            var brand = $('#brand').val();
            var category = $('#category').val();
            var colour = $('#colour').val();
            var grade = $('#grade').val();
            var packing = $('#packing').val();
            var size = $('#size').val();

            //document.getElementById('colour').options.length=1;
            var dataString = "size='"+size+"'&packing='"+packing+"'&grade='"+grade+"'&colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#7").html(html);
                    // $("#disc").innerHTML='';
                    $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');

                    // $("#dp").parentNode.removeChild("#dp");
                }
            });
          }



          function get_dp() { // Call to ajax function
            

            var brand = $('#brand').val();
            var category = $('#category').val();
            var colour = $('#colour').val();
            var grade = $('#grade').val();
            var packing = $('#packing').val();
            var size = $('#size').val();
            var unit = $('#unit').val();
            var dis = 10;
            var r=0;
           

            //document.getElementById('colour').options.length=1;
            var dataString = "unit='"+unit+"'&size='"+size+"'&packing='"+packing+"'&grade='"+grade+"'&colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";
            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#8").html(html);
                  
                     // alert(f);
                }
            });
          //   f=$('#dp').val();




            if(unit!=''){
              


            dataString = "dis='"+dis+"'&unit='"+unit+"'&size='"+size+"'&packing='"+packing+"'&grade='"+grade+"'&colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";
           
            
            // var p = document.getElementById("#dp").value;
              // alert("hii");
             // alert(p);
             // var f=$('#dp').val();
           

            

            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#9").html(html);
                     $("#disc,#ic,#mc,#dmc,#nos").removeAttr('disabled');
                     // var disc = $('#disc').val();

                     // p = document.getElementById("dp").value;
                     //  alert(p);
                     // p = p - disc/100*p;
                     // $("#rate").val(p);

                     //alert(disc);
                     // $("#ic").removeAttr('disabled');
                     // $("#mc").removeAttr('disabled');
                     // $("#dmc").removeAttr('disabled');
                     // $("#nos").removeAttr('disabled');
                }
            });



            dataString = "rate='"+r+"'&dis='"+dis+"'&unit='"+unit+"'&size='"+size+"'&packing='"+packing+"'&grade='"+grade+"'&colour='"+colour+"'&category='"+category+"'&brand='"+brand+"'";


            $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                success: function(html)
                {
                    $("#10").html(html);
               
                }
            });


            //  $("#rate").val(p);
            //  //alert($("#rate").val());
            //  if( !($("#rate").val()))
            //   $("#rate").val(p);
            // var x= $("#rate").val();
            //  alert(x);





        //    $('#rate').attr("disabled","false");
          

// $(document).ready(function(){
//     alert();
//     while(!document.getElementById("disc")){}
//     var p = $('#dp').val();
//     // alert(p);
//     var disc = $('#disc').val();
//     p = p - disc/100*p;
//                      $("#rate").val(p);
  
// });

          }
          else {
            alert();
            if(document.getElementById('disc'))
            {
              $('#disc').remove();
            }
            $("#rate").val('');
            $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
            //$("#rate").val()='';

          }
        }





          



          function myfunc(){


            // if($("[value=0]").length==4)
            //   alert("Please select quantitiy");
            // else
            //   $("#form1").submit();
           // alert($("input:number").length);
           var i=0;

            $("[value=0]").each(function(){
              //alert("hello");
              if($(this).val()!=0)
              i++;
            });

            if(i){
              $b = $('#brand').val();

              $("#form1").submit();
            }
            else
              alert("Please select quantity");



           // alert();



          }




          function disable(a,b,c){
            $(a,b,c).attr('disabled','disabled');
          }





 
</script>















<body class="w3-content" style="max-width:1200px">

<!--  $current=$_SERVER['HTTP_REFERER'];
if(strcmp($current , 'http://localhost/fashiononrent/basket.php') )
$_SESSION['refererurl']= $_SERVER['HTTP_REFERER']; -->


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Indus</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      <?php

   if(isset($_SESSION['logged_in'])){
      if($_SESSION['logged_in']==true)
     {
      ?>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Welcome <?php echo $_SESSION['first_name']; ?></a></li>
        <li><a href="Login/logout.php">Logout</a></li>
       <?php }} else {?>
      <li><a href="/fashiononrent/Login/index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
       <?php } ?>

   </ul>
  </div>
</nav>




    <!-- *** TOPBAR ***
 _________________________________________________________ -->
  


    <!-- *** TOP BAR END *** -->




    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Cart</li>
                    </ul>
                </div>

                     <div class="navbar-buttons ">

                <div class="navbar-collapse collapse  " id="basket-overview">
                    <a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">
<?php

$result = mysqli_query($mysqli,"SELECT * FROM orders");
$rows = $result->num_rows;
if ($rows > 0) {
        $total=$rows;
} else {
    $total=0;
}
echo $total ?> item<?php if($total!=1){ ?>s<?php } ?> in cart</span></a>
                </div>
                <!--/.nav-collapse -->

               
            </div>












<?php
$sql = "SELECT distinct brand FROM items ";
$result = $mysqli->query($sql) or die($mysqli->error); 

?>










 <div class="col-md-12" id="basket">

                    <div class="box">

                       

                            <h1>Select item</h1>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- <th colspan="1">SKU</th> -->
                                            <th colspan="1">Brand</th>
                                            <th colspan="1">Category</th>
                                            <th colspan="1">Colour</th>
                                            <th colspan="1">Grade</th>
                                            <th colspan="1">Packing</th>
                                            <th colspan="1">Size</th>
                                            <th colspan="1">Unit</th>
                                            <th colspan="1">Dp</th>
                                            <th colspan="1">Discount</th>
                                            <th colspan="1">Rate</th>
                                            <th colspan="1">IC</th>
                                            <th colspan="1">MC</th>
                                            <th colspan="1">DMC</th>
                                            <th colspan="1">Pieces</th>

                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <form action="" method="POST" id='form1'>
                                      <tr>
                                            <td>
                                                <!-- <input value='<?php echo isset($sbrand)?$sbrand:''; ?>' type="text" name="brand" id="brand" list="hh" autocomplete="off" onchange="get_category();" > -->
                                                <!-- <datalist id="hh" > -->
                                                  <select id="brand" name="brand" onchange="get_category();">
                                                  <option value=''>Select</option>
                                                  <?php while ($r = $result->fetch_assoc()) {
                                                   // echo $r['brand'];
                                                    if(!strcmp($_SESSION['sbrand'],$r['brand'])){
                                                  echo "<option selected value='" . $r['brand'] . "'>".$r['brand']." </option>";
                                                  echo '<script type="text/javascript">',
                                                       'get_category()',
                                                       '</script>'
                                                  ;


                                                }
                                                else
                                                echo "<option value='" . $r['brand'] . "'>".$r['brand']." </option>";
                                              }
                                                  ?>
                                                  </select>
                                                <!-- </datalist> -->
                                               
                                            </td>
                                            <td>
                                              <div id="2"></div>
                                            </td>
                                            <td><div id="3"></div></td>

                                             <td>
                                                <!-- <form method="post" action="days.php?num=2" >
                                                <input type="number" class="form-control" value="2" name="days">
                                                <button type="submit" class="button button-block" ><i class="fa fa-chevron-right"></i></button>
                                                 </form> -->
                                                 <div id="4"></div>
                                               </td>
                                            <td><div id="5"></div></td>
                                            <td><div id="6"></div></td>
                                            <td><div id="7"></div></td>
                                            <td><div id="8"></div></td>
                                            <td><div id="9"></div></td>
                                            <td><div id="10">
                                              

                                            </div></td>
                                            <td><div id="11">

                                              <input type="number" value=0 name="ic" id='ic' disabled="
                                              " required="" style="width: 40px;" onchange="disable('#mc,#dmc,#nos');" min=0>
                                              
                                            </div></td>
                                            <td><div id="12">
                                              
                                              <input type="number" value=0  name="mc" id='mc' disabled="
                                              " required="" style="width: 40px;" onchange="disable('#ic,#dmc,#nos');" min=0>

                                            </div></td>
                                            <td><div id="13">
                                              
                                              <input type="number" value=0  name="dmc" id='dmc' disabled="
                                              " required="" style="width: 40px;" onchange="disable('#ic,#mc,#nos');" min=0>

                                            </div></td>
                                            <td><div id="14">

                                              <input type="number" value=0  name="nos" id='nos' disabled="
                                              " required="" style="width: 40px;" onchange="disable('#ic,#mc,#dmc');" min=0>
                                              
                                            </div></td>


                                           
                                             
                                            
                                            <td>
      <!-- <p><a href="javascript:add()"  role="button"><i class="fa fa-trash-o"></i></a></p> -->
      <button type="button" onclick="myfunc()" class="button button-block" name="add" ><i class="fa fa-chevron-right"></i></button>
                                            </td>
                                        </tr>
                                      </form>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>















                <div class="col-md-9" id="basket">

                    <div class="box">

                       

                            <h1>Added items</h1>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- <th colspan="1">SKU</th> -->
                                            <th colspan="1">Brand</th>
                                            <th colspan="1">Category</th>
                                            <th colspan="1">Colour</th>
                                            <th colspan="1">Grade</th>
                                            <th colspan="1">Packing</th>
                                            <th colspan="1">Size</th>
                                            <th colspan="1">Unit</th>
                                            
                                            <th colspan="1">Rate</th>
                                            <th colspan="1">IC</th>
                                            <th colspan="1">MC</th>
                                            <th colspan="1">DMC</th>
                                            <th colspan="1">Pieces</th>
                                            <th colspan="1">Total item amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
$sql = "SELECT * FROM orders o inner join items i on i.sku=o.sku";
$result = mysqli_query($mysqli,$sql);
$sum=0;
while($r = mysqli_fetch_assoc($result))
{
// $sum+=($r['price']*$r['days']);

?>
                                        <tr>
                                            <td>
                                               
                                                   <?php echo $r['brand']; ?>
 
                                               



                                            </td>
                                            <td><?php echo $r['category']; ?>
                                            </td>
                                            <td><?php echo $r['colour']; ?></td>

                                             <td>
                                                <!-- <form method="post" action="days.php?num=2" >
                                                <input type="number" class="form-control" value="2" name="days">
                                                <button type="submit" class="button button-block" ><i class="fa fa-chevron-right"></i></button>
                                                 </form> -->
                                                 <?php echo $r['grade']; ?>
                                               </td>
                                            <td><?php echo $r['packing'] ?></td>
                                            <td><?php echo $r['size']; ?></td>
                                            <td><?php echo $r['unit']; ?></td>
                                            
                                            <td><?php echo $r['rate']; ?></td>
                                            <td><?php echo $r['ic']; ?></td>
                                            <td><?php echo $r['mc']; ?></td>
                                            <td><?php echo $r['dmc']; ?></td>
                                            <td><?php echo $r['nos']; ?></td>
                                            <td>
                                              <?php 
                                                $t=0;
                                                $t+=$r['ic_pieces']*$r['ic']*$r['rate'];
                                                $t+=$r['mc_pieces']*$r['mc']*$r['rate'];
                                                $t+=$r['dmc_pieces']*$r['dmc']*$r['rate'];
                                                $t+=$r['nos']*$r['rate'];
                                                $sum+=$t;
                                                echo $t; 
                                              ?>
                                                
                                            </td>
                                           
                                             
                                            
                                            <td>
      <p><a href="deletefromcart.php?n=<?php echo $r['serial_no']; ?>"  role="button"><i class="fa fa-trash-o"></i></a></p>
                                            </td>
                                        </tr>
<?php } ?>


                                        <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>

                                            <th colspan="2">Total</th>
                                            <th colspan="2"><?php echo $sum; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer" style="padding:50px">
                               
                           <?php
                           if($total && isset($_SESSION['logged_in'])){ ?>
                                
                               <form method="post" action="checkout1.html">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                           <?php } ?>
                            </div>

                        </div>


         
             
        </div>




       


    

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




 




  


</body>

</html>