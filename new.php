<?php

require 'db.php';
session_start();


//echo $_POST["special"];

// echo $_POST['contacts'];
$customer_id = "";
$ctype = "";
$company_name = "";

$prime_contact_name = "";
$prime_contact_number = "";
$prime_contact_email = "";
$prime_alternate_1 = "";
$prime_alternate_2 = "";

$oem_brand_name = "";
$transport_name = "";
$transport_payment = "";
$delivery = "";
$payment = "";
$payment_days = "";

$cpvc_discount = 0;
$pvc_discount = 0;
$upvc_discount = 0;
$ballvalve_discount = 0;
$lubricant_discount = 0;

$gst = "";
$pan = "";
$aadhar = "";





/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

//check if user with that gst already exists

$gst = $mysqli->escape_string($_POST['gst']);
$result = $mysqli->query("SELECT customer_id FROM customer where gst = '$gst'") or die($mysqli->error);
if ( $result->num_rows > 0 ) {

	$_SESSION['message'] = "User with that gst already exists!";
    header("location: error.php");

 }

else{



//########################SESSION VARIABLES#########################################################################


$_SESSION['ctype'] = $_POST['ctype'];
$ctype = $_POST['ctype'];


// $_SESSION['pincode'] = $_POST['pincode'];
// $_SESSION['oem_brand'] = $_POST['oem_brand'];
// $_SESSION['last_name'] = $_POST['lastname'];
// $_SESSION['u_id'] = $user['id'];
// // Escape all $_POST variables to protect against SQL injections




//########################BASIC DETAILS#########################################################################

$company_name = $mysqli->escape_string($_POST['company_name']);
$address_line_1 = $mysqli->escape_string($_POST['address_line_1']);
$address_line_2 = $mysqli->escape_string($_POST['address_line_2']);
$city = $mysqli->escape_string($_POST['city']);
$state = $mysqli->escape_string($_POST['state']);
$pincode = $mysqli->escape_string($_POST['pincode']);



//########################PRIME CONTACT DETAILS#########################################################################




$prime_contact_fname = $_POST['prime_contact_fname'];
$prime_contact_lname = $_POST['prime_contact_lname'];
$prime_contact_number = $_POST['prime_contact_number'];
if(isset($_POST['prime_contact_email']))
$prime_contact_email = $_POST['prime_contact_email'];
if(isset($_POST['prime_alternate_1']))
$prime_alternate_1 = $_POST['prime_alternate_1'];
if(isset($_POST['prime_alternate_2']))
$prime_alternate_2 = $_POST['prime_alternate_2'];




//########################ALTERNATE CONTACT DETAILS#########################################################################



$contacts = $_POST['contacts'];
$n=intval($contacts);
for($i=1;$i<$n;$i++){
	$x='alternate_contact_fname_'.$i;
	if(isset($_POST[$x]))
		$$x = $_POST[$x];
	else
		$$x = "";
	$x='alternate_contact_lname_'.$i;
	if(isset($_POST[$x]))
		$$x = $_POST[$x];
	else
		$$x = "";
	$x='alternate_contact_number_'.$i;
	if(isset($_POST[$x]))
		$$x = $_POST[$x];
	else
		$$x = "";
	$x='alternate_contact_email_'.$i;
	if(isset($_POST[$x]))
		$$x = $_POST[$x];
	else
		$$x = "";
	$x='alternate_alternate_'.$i;
	if(isset($_POST[$x]))
		$$x = $_POST[$x];
	else
		$$x = "";
}




//########################OTHER DETAILS#########################################################################




$oem = $_POST['oem'];
$noem=intval($oem);
for($i=1;$i<=$noem;$i++){
	$x='oem_brand_name_'.$i;
	
		$$x = $_POST[$x];
		if(!strcmp($$x,"None")){
$$x = '';
}
	
}





// $oem_brand_name_1 = $mysqli->escape_string($_POST['oem_brand_name_1']);
// if(!strcmp($oem_brand_name_1,"None")){
// $oem_brand_name = '';
// }
// $transport_name_1 = $mysqli->escape_string($_POST['transport_name_1']);
// if(!strcmp($transport_name_1,"None")){
// $transport_name = '';
// }
$transport_payment = $mysqli->escape_string($_POST['transport_payment']);
$delivery = $mysqli->escape_string($_POST['delivery']);



$payment = $mysqli->escape_string($_POST['payment']);


if(strcmp('$payment',"days")){
	
	if(isset($_POST['payment_days'])){
	$d = $mysqli->escape_string($_POST['payment_days']);
	$payment_days = intval($d);
	}
}



if(isset($_POST['last_order_date']))
{
	$last_order_date = $_POST['last_order_date'];
}
else
 $last_order_date = '';


$billing_address_line_1 = $mysqli->escape_string($_POST['billing_address_line_1']);
$billing_address_line_2 = $mysqli->escape_string($_POST['billing_address_line_2']);
$billing_city = $mysqli->escape_string($_POST['billing_city']);
$billing_state = $mysqli->escape_string($_POST['billing_state']);
$billing_pincode = $mysqli->escape_string($_POST['billing_pincode']);

// $delivery_address_line_1_1 = $mysqli->escape_string($_POST['delivery_address_line_1_1']);
// $delivery_address_line_2_1 = $mysqli->escape_string($_POST['delivery_address_line_2_1']);
// $delivery_city_1 = $mysqli->escape_string($_POST['delivery_city_1']);
// $delivery_state_1 = $mysqli->escape_string($_POST['delivery_state_1']);
// $delivery_pincode_1 = $mysqli->escape_string($_POST['delivery_pincode_1']);





$del = $_POST['del'];
$ndel=intval($del);
for($i=1;$i<=$ndel;$i++){
	$x='delivery_address_line_1_'.$i;
	
		$$x = $_POST[$x];
	
	$x='delivery_address_line_2_'.$i;
	
		$$x = $_POST[$x];

	$x='delivery_city_'.$i;
	
		$$x = $_POST[$x];
	
	$x='delivery_state_'.$i;
	
		$$x = $_POST[$x];
	
	$x='delivery_pincode_'.$i;

		$$x = $_POST[$x];

	$x = 'transport_name_'.$i;	


	    $$x = $_POST[$x];


	if(!strcmp($$x,"None")){
$$x = '';
}
	
}




//########################DISCOUNT DETAILS#########################################################################



$cpvc_discount = $_POST['cpvc_discount'];
$pvc_discount = $_POST['pvc_discount'];
$upvc_discount = $_POST['upvc_discount'];
$ballvalve_discount = $_POST['ballvalve_discount'];
$lubricant_discount = $_POST['lubricant_discount'];



//########################GOVERNMENT DETAILS#########################################################################



//gst already obtained
$pan = $mysqli->escape_string($_POST['pan']);
if(!strcmp($pan,"None")){
$pan = '';
}
$aadhar = $mysqli->escape_string($_POST['aadhar']);
if(!strcmp($aadhar,"None")){
$aadhar = '';
}



//########################SPECIAL COMMENTS#########################################################################



$special = $_POST['special'];

      
// Check if user with that aadhar already exists

$result = $mysqli->query("SELECT serial_no,customer_id FROM customer order by serial_no desc limit 1 offset 0") or die($mysqli->error);
if($result->num_rows > 0){
	$r = $result->fetch_assoc();
	$code = $r['serial_no'];
	$code++;
	$code = sprintf("%03d",$code);
	echo $code;
}
else{
	$code = '001';
}

$customer_id=$code.$pincode;
//echo $customer_id;


// $sql = "Insert into customer (customer_id,ctype,company_name,prime_contact_name,prime_contact_number,prime_contact_email,prime_alternate_1,prime_alternate_2,oem_brand_name,transport_name,transport_payment,delivery,payment,payment_days,cpvc_discount,pvc_discount,upvc_discount,ballvalve_discount,lubricant_discount,gst,pan,aadhar,special) values"


$prime_alternate_1 = !empty($prime_alternate_1) ? "'$prime_alternate_1'" : "NULL";
$prime_alternate_2 = !empty($prime_alternate_2) ? "'$prime_alternate_2'" : "NULL";
$oem_brand_name = !empty($oem_brand_name) ? "'$oem_brand_name'" : "NULL";
$last_order_date = !empty($last_order_date) ? "'$last_order_date'" : "NULL";
$payment_days = !empty($payment_days) ? "'$payment_days'" : "NULL";
$special = !empty($special) ? "'$special'" : "NULL";
$pan = !empty($pan) ? "'$pan'" : "NULL";
$aadhar = !empty($aadhar) ? "'$aadhar'" : "NULL";

// $sql = "insert into tp values($transport_name)";

$sql = "Insert into customer (customer_id,ctype,company_name,prime_contact_fname,prime_contact_lname,prime_contact_number,prime_contact_email,prime_alternate_1,prime_alternate_2,transport_payment,delivery,payment,payment_days,cpvc_discount,pvc_discount,upvc_discount,ballvalve_discount,lubricant_discount,last_order_date,gst,pan,aadhar,special) values ('$customer_id','$ctype','$company_name','$prime_contact_fname','$prime_contact_lname',$prime_contact_number,'$prime_contact_email',$prime_alternate_1,$prime_alternate_2,'$transport_payment','$delivery','$payment',$payment_days,$cpvc_discount,$pvc_discount,$upvc_discount,$ballvalve_discount,$lubricant_discount,$last_order_date,'$gst','$pan','$aadhar',$special)";
 $result = $mysqli->query($sql) or die($mysqli->error);



for($i=1;$i<$n;$i++){

    $a='alternate_contact_fname_'.$i;
    $$a = !empty($$a) ? "'".$$a."'" : "NULL";
    echo $alternate_contact_fname_1;
    $b='alternate_contact_lname_'.$i;
    $$b = !empty($$b) ? "'".$$b."'" : "NULL";
    $c='alternate_contact_number_'.$i;
    $$c = !empty($$c) ? "'".$$c."'" : "NULL";
    $d='alternate_contact_email_'.$i;
    $$d = !empty($$d) ? "'".$$d."'" : "NULL";
    $e='alternate_alternate_'.$i;
    $$e = !empty($$e) ? "'".$$e."'" : "NULL";

    $f = 'alternate'.$i;

	
$sql = "Insert into contacts (customer_id,type,fname,lname,number,email,alternate_number) values ('$customer_id','".$f."',".$$a.",".$$b.",".$$c.",".$$d.",".$$e.")";
$result = $mysqli->query($sql) or die($mysqli->error);

}



$sql = "Insert into address (customer_id,type,line1,line2,city,state,pincode) values ('$customer_id','company','$address_line_1','$address_line_2','$city','$state','pincode')";
 $result = $mysqli->query($sql) or die($mysqli->error);
 $sql = "Insert into address (customer_id,type,line1,line2,city,state,pincode) values ('$customer_id','billing','$billing_address_line_1','$billing_address_line_2','$billing_city','$billing_state','$billing_pincode')";
 $result = $mysqli->query($sql) or die($mysqli->error);
 // $sql = "Insert into address (customer_id,type,line1,line2,city,state,pincode) values ('$customer_id','delivery','$delivery_address_line_1','$delivery_address_line_2','$delivery_city','$delivery_state','$delivery_pincode')";
 // $result = $mysqli->query($sql) or die($mysqli->error);



 for($i=1;$i<=$ndel;$i++){




 	$a='delivery_address_line_1_'.$i;
    $$a = !empty($$a) ? "'".$$a."'" : "NULL";
   // echo $alternate_contact_fname_1;
    $b='delivery_address_line_2_'.$i;
    $$b = !empty($$b) ? "'".$$b."'" : "NULL";
    $c='delivery_city_'.$i;
    $$c = !empty($$c) ? "'".$$c."'" : "NULL";
    $d='delivery_state_'.$i;
    $$d = !empty($$d) ? "'".$$d."'" : "NULL";
    $e='delivery_pincode_'.$i;
    $$e = !empty($$e) ? "'".$$e."'" : "NULL";
     $f='transport_name_'.$i;
    $$f = !empty($$f) ? "'".$$f."'" : "NULL";

    $g = 'delivery '.$i;


 	$sql = "Insert into address (customer_id,type,line1,line2,city,state,pincode,transport_name) values ('$customer_id','".$g."',".$$a.",".$$b.",".$$c.",".$$d.",".$$e.",".$$f.")";
 $result = $mysqli->query($sql) or die($mysqli->error);
 }



for($i=1;$i<=$noem;$i++){




 	$a='oem_brand_name_'.$i;
    
  

    $g = 'oem '.$i;

     if(!(empty($$a))){
 	$sql = "Insert into oem (customer_id,type,oem) values ('$customer_id','".$g."','".$$a."')";
 $result = $mysqli->query($sql) or die($mysqli->error);
}

}








echo "SUCCESS";


}










// else {


//     $customer_id = '001'.$pincode;
//     echo $customer_id;



// }
// else { // Email doesn't already exist in a database, proceed...

//     // active is 0 by DEFAULT (no need to include it here)
//     $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
//             . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

//     // Add user to the database
//     if ( $mysqli->query($sql) ){

//         $_SESSION['active'] = 0; //0 until user activates their account with verify.php
//         $_SESSION['logged_in'] = true; // So we know the user has logged in
//         $_SESSION['message'] =
                
//                  " Thank you for signing up!!";
//         $_SESSION['u_id'] = $user['id'];

//         // Send registration confirmation link (verify.php)
//         $to      = $email;
//         $subject = 'Account Verification ( clevertechie.com )';
//         $message_body = '
//         Hello '.$first_name.',

//         Thank you for signing up!

       

//         http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

//         mail( $to, $subject, $message_body );

//         header("location: profile.php"); 

//     }

//     else {
//         $_SESSION['message'] = 'Registration failed!';
//         header("location: error.php");
//     }

// }


?>