
<?php

require 'db.php';
session_start();

if ($_POST) {

  if(isset($_POST['brand']) && !(isset($_POST['category'])) && !(isset($_POST['colour'])) && !(isset($_POST['grade'])) && !(isset($_POST['packing'])) && !(isset($_POST['size'])) && !(isset($_POST['unit']))){
    $brand = $_POST['brand'];
    if ($brand != '') {
       $sql1 = "SELECT distinct category FROM items WHERE brand=" . $brand;
       $result1 = $mysqli->query($sql1);
       echo "<select name='category' id='category' onchange='get_colour();' form='form1'>";

       echo "<option value=''>Select</option>"; 
       while ($row = $result1->fetch_assoc()) {
         if(isset($_SESSION['scategory'])){

         if(!strcmp($_SESSION['scategory'],$row['category'])){
          echo "<option selected value='" . $row['category'] . "'>" . $row['category'] . "</option>";
          echo '<script type="text/javascript">',
               'get_colour()',
               '</script>'
              ;

       }
        else
          echo "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";
      }
     
     else
          echo "<option value='" . $row['category'] . "'>" . $row['category'] . "</option>";
    
       
    }
    echo "</select>";
  }
    else
    {   

        echo  '';
    }

  }

  
  if(isset($_POST['category']) && !(isset($_POST['colour'])) && !(isset($_POST['grade'])) && !(isset($_POST['packing'])) && !(isset($_POST['size'])) && !(isset($_POST['unit']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    
    // echo $category;
    if ($category != '') {
       $sql1 = "SELECT distinct colour FROM items WHERE category=" . $category. "and brand =".$brand;
       $result1 = $mysqli->query($sql1);
       echo "<select name='colour' id='colour' onchange='get_grade();' form='form1'>";
       echo "<option value=''>Select</option>"; 

       while ($row = $result1->fetch_assoc()) {
         if(isset($_SESSION['scolour'])){

         if(!strcmp($_SESSION['scolour'],$row['colour'])){
          echo "<option selected value='" . $row['colour'] . "'>" . $row['colour'] . "</option>";
          echo '<script type="text/javascript">',
               'get_grade()',
               '</script>'
              ;

       }
        else
          echo "<option value='" . $row['colour'] . "'>" . $row['colour'] . "</option>";
      }
     
     else
          echo "<option value='" . $row['colour'] . "'>" . $row['colour'] . "</option>";
    
       
  }
  echo "</select>";
}
    else
    {
        echo  '';
    }

  }



  if((isset($_POST['colour'])) && !(isset($_POST['grade'])) && !(isset($_POST['packing'])) && !(isset($_POST['size'])) && !(isset($_POST['unit']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
   
    // echo $category;
    if ($colour != '') {
       $sql1 = "SELECT distinct grade FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour ;
       $result1 = $mysqli->query($sql1);
       echo "<select name='grade' id='grade' onchange='get_packing();' form='form1'>";
       echo "<option value=''>Select</option>"; 
       while ($row = $result1->fetch_assoc()) {
         if(isset($_SESSION['sgrade'])){

         if(!strcmp($_SESSION['sgrade'],$row['grade'])){
          echo "<option selected value='" . $row['grade'] . "'>" . $row['grade'] . "</option>";
          echo '<script type="text/javascript">',
               'get_packing()',
               '</script>'
              ;

       }
        else
          echo "<option value='" . $row['grade'] . "'>" . $row['grade'] . "</option>";
      }
     
     else
          echo "<option value='" . $row['grade'] . "'>" . $row['grade'] . "</option>";
    
       
    }
    echo "</select>";
  }
    else
    {
        echo  '';
    }

  }



  if((isset($_POST['grade'])) && !(isset($_POST['packing'])) && !(isset($_POST['size'])) && !(isset($_POST['unit']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
    $grade = $_POST['grade'];
   
     // echo $grade;
    if ($grade != '') {
       $sql1 = "SELECT distinct packing FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour."and grade =".$grade;
       $result1 = $mysqli->query($sql1);
       echo "<select name='packing' id='packing' onchange='get_size();' form='form1'>";
       echo "<option value=''>Select</option>"; 

       while ($row = $result1->fetch_assoc()) {
         if(isset($_SESSION['spacking'])){

         if(!strcmp($_SESSION['spacking'],$row['packing'])){
          echo "<option selected value='" . $row['packing'] . "'>" . $row['packing'] . "</option>";
          echo '<script type="text/javascript">',
               'get_size()',
               '</script>'
              ;

       }
        else
          echo "<option value='" . $row['packing'] . "'>" . $row['packing'] . "</option>";
      }
     
     else
          echo "<option value='" . $row['packing'] . "'>" . $row['packing'] . "</option>";
    
       
    }
    echo "</select>";
  }
    else
    {
        echo  '';
    }

  }




  if((isset($_POST['packing'])) && !(isset($_POST['size'])) && !(isset($_POST['unit']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
    $grade = $_POST['grade'];
    $packing = $_POST['packing'];
   
    // echo $category;
    if ($packing != '') {
       $sql1 = "SELECT distinct size FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour."and grade =".$grade."and packing =".$packing ;
       $result1 = $mysqli->query($sql1);
       echo "<select name='size' id='size' onchange='get_unit();' form='form1'>";
       echo "<option value=''>Select</option>"; 
        while ($row = $result1->fetch_assoc()) {
         if(isset($_SESSION['ssize'])){

         if(!strcmp($_SESSION['ssize'],$row['size'])){
          echo "<option selected value='" . $row['size'] . "'>" . $row['size'] . "</option>";
          echo '<script type="text/javascript">',
               'get_unit()',
               '</script>'
              ;

       }
        else
          echo "<option value='" . $row['size'] . "'>" . $row['size'] . "</option>";
      }
     
     else
          echo "<option value='" . $row['size'] . "'>" . $row['size'] . "</option>";
    
       
    }
    echo "</select>";
  }

    else
    {
        echo  '';
    }

  }



  if((isset($_POST['size'])) && !(isset($_POST['unit']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
    $grade = $_POST['grade'];
    $packing = $_POST['packing'];
    $size = $_POST['size'];
    
    // echo $category;
    if ($size != '') {
       $sql1 = "SELECT distinct unit FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour."and grade =".$grade."and packing =".$packing."and size=".$size ;
       $result1 = $mysqli->query($sql1);
       echo "<select name='unit' id='unit' onchange='get_dp();' form='form1'>";
       echo "<option value=''>Select</option>"; 
        while ($row = $result1->fetch_assoc()) {      
         if(isset($_SESSION['sunit'])){

         if(!strcmp($_SESSION['sunit'],$row['unit'])){
          echo "<option selected value='" . $row['unit'] . "'>" . $row['unit'] . "</option>";
          echo '<script type="text/javascript">',
               'get_dp()',
               '</script>'
              ;

       }
        else
          echo "<option value='" . $row['unit'] . "'>" . $row['unit'] . "</option>";
      }
     
     else
          echo "<option value='" . $row['unit'] . "'>" . $row['unit'] . "</option>";
    
       
    }
    echo "</select>";
  }
  
    else
    {
        echo  '';
    }

  }



  if((isset($_POST['unit']))  && !(isset($_POST['dis']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
    $grade = $_POST['grade'];
    $packing = $_POST['packing'];
    $size = $_POST['size'];
    $unit =$_POST['unit'];
    // echo $category;
    if ($unit != '') {
       $sql1 = "SELECT dp,sku FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour."and grade =".$grade."and packing =".$packing."and size=".$size."and unit=".$unit ;
       $result1 = $mysqli->query($sql1);
       // echo "<input name='dp' id='dp'>";
       // echo "<option value=''>Select</option>"; 
      

       while ($row = $result1->fetch_assoc()) {
         $_SESSION['dp']=$row['dp'];
          echo "<input value=" . $row['dp'] . " id='dp' name='dp' disabled style='width:60px;' form='form1'>" ;
          echo "<input type='hidden'  value=" . $row['sku'] . " id='sku' name='sku' form='form1'>" ;
        }
       // echo "</select>";
    }
    else
    {
        echo  '';
    }

  }





  if((isset($_POST['dis']))  && !(isset($_POST['rate']))){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
    $grade = $_POST['grade'];
    $packing = $_POST['packing'];
    $size = $_POST['size'];
    $unit =$_POST['unit'];
    // echo $category;
    if ($unit != '') {
    //    $sql1 = "SELECT dp,sku FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour."and grade =".$grade."and packing =".$packing."and size=".$size."and unit=".$unit ;
    //    $result1 = $mysqli->query($sql1);
    //    // echo "<input name='dp' id='dp'>";
    //    // echo "<option value=''>Select</option>"; 
    //    while ($row = $result1->fetch_assoc()) {
      $_SESSION['disc']=10;
           echo "<input type='number' value=10 id='disc' name='disc' disabled style='width:60px;' form='form1'>" ;
         
        // }
       // echo "</select>";
    }
    else
    {
        echo  '';
    }

  }


  if((isset($_POST['rate'])) ){
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $colour = $_POST['colour'];
    $grade = $_POST['grade'];
    $packing = $_POST['packing'];
    $size = $_POST['size'];
    $unit =$_POST['unit'];

    // echo $category;
    if ($unit != '') {
    //    $sql1 = "SELECT dp,sku FROM items WHERE category=" . $category. "and brand =".$brand ."and colour=".$colour."and grade =".$grade."and packing =".$packing."and size=".$size."and unit=".$unit ;
    //    $result1 = $mysqli->query($sql1);
    //    // echo "<input name='dp' id='dp'>";
    //    // echo "<option value=''>Select</option>"; 
    //    while ($row = $result1->fetch_assoc()) {
     // echo $_SESSION['dp'];
           $rate = $_SESSION['dp']-$_SESSION['disc']/100*$_SESSION['dp'];

           echo "<input type='number' value=$rate id='rate' name='rate' style='width:60px;' form='form1'>" ;
         
        // }
       // echo "</select>";
    }
    else
    {
        echo  '';
    }

  }


  if(isset($_POST['customer_name']) && !isset($_POST['customer_id'])){
     $customer= mysqli_real_escape_string($mysqli,$_POST['customer_name']) ;
    // echo $customer;
    // echo $customer;

     $sql1 = "SELECT distinct customer_id FROM customer WHERE company_name='".$customer."'" ;
       $result1 = $mysqli->query($sql1) or die($mysqli->error);
       
        if ($row = $result1->fetch_assoc()) {
           echo $row['customer_id'];



  }
}



     

if(isset($_POST['customer_id']) && !isset($_POST['customer_name'])){
     $customer= mysqli_real_escape_string($mysqli,$_POST['customer_id']) ;
    // echo $customer;
    // echo $customer;

     $sql1 = "SELECT distinct company_name FROM customer WHERE customer_id='".$customer."'" ;
       $result1 = $mysqli->query($sql1) or die($mysqli->error);
       
        if ($row = $result1->fetch_assoc()) {
           echo $row['company_name'];



  }
}
  // else
  //       echo "<input type='number' id='rate' name='rate' style='width:60px;' form='form1'>" ;







}


?>