<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

// if ( !isset( $_SESSION["origURL"] ) )
//     $_SESSION["origURL"] = $_SERVER["HTTP_REFERER"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Form</title>
  <?php include 'css/css.html'; ?>
</head>



<script type="text/javascript">















  


</script>

<style type="text/css">
  
  input {
    width: 50%;
  }


  input.invalid {
  /*background-color: #ffdddd;*/
  border-color: orange;
}


  .tab1 {
    display: none;
  }



  button {
  background-color: #1AB188;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}



input[type='radio'] {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: 10px;
        left: -8px;
        position: relative;
        background-color: #ffffff;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }



#prevBtn {
  background-color: #bbbbbb;
}


.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}


/*.first > div:not(:first-child) {
  display: none;
}*/

.tab-group1 {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group1:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group1 li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 20%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group1 li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group1 .active a {
  background: #1ab188;
  color: #ffffff;
}


.form_hint{background:#f0f8ff;font-size:.93em;line-height:16px;*width:200px;border-radius:20px;margin:-40px 20px;padding:10px;z-index:999;position:absolute;display:none;border:2px solid #fff;box-shadow:0 10px 140px 2px #cbcbcb}

.form_hint:before{content:"\25C0";color:#666aac;position:absolute;top:10px;left:-12px;*left:-6px}

input:focus+.form_hint{display:inline;max-width:500px}

span:hover+.form_hint{display:inline;max-width:500px}



#special
    {
     /*font-size:18pt;*/
     height:320px;
     width:500px;
    }








/*p {
    text-align: center;
    color: #ffffff;
    margin: 0px 0px 50px 0px;
}*/



</style>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['old'])) { //user logging in

         require 'old.php';
        
    }
    
    elseif (isset($_POST['nextBtn'])) { //user registering
        
        require 'new.php';
        
    }
}
?>
<body>





                            <div class="form" style="max-width: 1100px" >
                                
                                <ul class="tab-group">
                                  <li class="tab"><a href="#new">New</a></li>
                                  <li class="tab active"><a href="#old">Old</a></li>
                                </ul>
                                
                                <div class="tab-content">

                                         <div id="old">   
                                                    <h1>Welcome Back!</h1>
                                                    
                                                    <form action="old.php" method="post" autocomplete="off">
                                                    
                                                      <div class="field-wrap">
                                                      <label>
                                                        Customer Id<span class="req">*</span>
                                                      </label>
                                                      <input onkeyup="get_name();" type="text" required autocomplete="off" name="customer_id" id="customer_id"/>
                                                    </div>

                                                     <div class="field-wrap">
                                                      <label>
                                                        Customer Name<span class="req">*</span>
                                                      </label>
                                                      <input onkeyup="get_id();" type="text" required autocomplete="off" name="customer_name" list="name" id="customer_name"/>

                                                      <datalist id="name">
                                                        <?php
                                                         $sql1 = "SELECT distinct company_name FROM customer";
                                                         $result1 = $mysqli->query($sql1);
                                                         while ($row = $result1->fetch_assoc()) {
                                                         echo "<option value='" . $row['company_name'] . "'>" . $row['compamy_name'] . "</option>";
                                                       }
                                                        ?>
                                                        
                                                      </datalist>

                                                      <div id="kuns"></div>
                                                      
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    <button class="button button-block" name="old" />Go</button>
                                                    
                                                    </form>
                                          </div>


                                    
                            <div id="new" >   
                                    <!-- <h1>Sign Up for Free</h1> -->
                                    
                                    <form action="new.php" method="post" autocomplete="on" id="form1" >




                                      <div class="tab1">
                                      
                                      <div class="field-wrap" >
                                        <h1>Type:</h1>


                                        <p style="font-size: 20px;">
                                          <label class="posi">Customer</label>
                                          <input type="radio" value="customer" name="ctype"><br><br>
                                          <label class="posi">Vendor</label>
                                          <input type="radio" value="vendor" name="ctype"><br><br>
                                          <label class="posi">Potential customer</label>
                                          <input type="radio" value="potential_customer" name="ctype"><br><br>
                                          <label class="posi">Lapsed customer</label>
                                          <input type="radio" value="lapsed_customer" name="ctype"><br><br>
                                          <label class="posi">Other</label>
                                          <input type="radio" value="other" name="ctype"><br><br>
                                        </p>  



                                    

                          
                                      </div>
                                    
                                    </div>
                                    





      

                                    <div class="tab1">
                                      
                                      <div class="field-wrap">
                                        <h1>Basic Details:</h1>
                                        <p>
                                          <label>
                                            Company Name<span class="req">*</span>
                                          </label>
                                          <input oninput="this.className = ''" name="company_name">
                                          <span aria-hidden="true" role="tooltip" id="lastNameHint" class="form_hint"><span ng-transclude="" message-name="profile.create.message.lastNameHint" class="ng-isolate-scope">Enter your full company name</span></span>
                                        </p> 

                                      

                                        <p>
                                          <h2 style="text-align: left;color: white;margin-bottom: 20px;">Address</h2>
                                      
                                          <input id="address_line_1" placeholder="Address line 1" style="width: 50%" oninput="this.className = ''" name="address_line_1">
                                           
                                          <div style="margin-top: 10px;">
                                            <input id="address_line_2" placeholder="Address line 2" style="width: 50%" oninput="this.className = ''" name="address_line_2">
                                            

                                          </div>
                                          
                                          <div style="margin-top: 10px;">
                                            <input id="city" placeholder="City" style="width: 50%" oninput="this.className = ''" name="city">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="state" placeholder="State" style="width: 50%" oninput="this.className = ''" name="state">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="pincode" placeholder="Pincode" style="width: 50%" oninput="this.className = ''" name="pincode">
                                          </div>
                                        </p>
                                      </div>
                                    
                                    </div>


                                    <div class="tab1">

                                      <div class="field-wrap">
                                        <h1>Contact numbers</h1>

                                        <p>
                                          <h2 style="text-align: left;color: white;margin-bottom: 20px;">Prime contact</h2>
                                          <label>
                                            First Name<span class="req">*</span>
                                          </label>
                                          <input oninput="this.className = ''" name="prime_contact_fname">
                                        </p>

                                        <p>
                                          <label>
                                            Last Name<span class="req">*</span>
                                          </label>
                                          <input oninput="this.className = ''" name="prime_contact_lname">
                                        </p> 

                                        <p>
                                          <label>
                                            Number<span class="req">*</span>
                                          </label>
                                          <input oninput="this.className = ''" name="prime_contact_number">
                                        </p>  

                                        <p>
                                          <label>
                                            Email
                                          </label>
                                          <input oninput="this.className = ''" name="prime_contact_email">
                                        </p>  

                                        <p>
                                          <label>
                                            Alternate Number 1
                                          </label>
                                          <input oninput="this.className = ''" name="prime_alternate_1" required="false">
                                        </p>

                                         <p>
                                          <label>
                                            Alternate Number 2
                                          </label>
                                          <input oninput="this.className = ''" name="prime_alternate_2" required="false">
                                        </p>

                                        <p id="more">
                                          <div>
                                            <button type="button" onclick="morecontact()">Add more contact person</button>
                                          </div>
                                        </p>

                                        <input type="hidden" id="contacts" value="1" name="contacts">


                                      </div>
                                    
                                    </div>



                                    <div class="tab1">

                                      <div class="field-wrap">
                                        <h1>Other details</h1>
                                        <p>
                                          <label>
                                            OEM Brand Name<span class="req">*</span>
                                          </label>
                                          <input list='none' oninput="this.className = ''" name="oem_brand_name_1">
                                          <datalist id='none'>
                                            <option>None</option>
                                          </datalist>
                                        </p>  


                                        <p id="more_oem">
                                          <div>
                                            <button type="button" onclick="moreoem()">Add more oem brand</button>
                                          </div>
                                        </p>

                                        <input type="hidden" id="oem" value="1" name="oem">  

                                        <p>
                                          <label>
                                            Transport payment<span class="req">*</span>
                                          </label>
                                          <input list='transport_payment' oninput="this.className = ''" name="transport_payment">
                                          <datalist id='transport_payment'>
                                            <option>To pay</option>
                                            <option>Paid</option>
                                          
                                          </datalist>
                                        </p>  

                                        <p>
                                          <label>
                                            Delivery<span class="req">*</span>
                                          </label>
                                          <input list='delivery' oninput="this.className = ''" name="delivery">
                                          <datalist id='delivery'>
                                            <option>Godown</option>
                                            <option>Door</option>
                                            <option>Hand</option>
                                          </datalist>
                                        </p>  

                                        <p >
                                          <h2 style="text-align: left;color: white;margin-bottom: 2px;">Payment terms</h2>
                                          <label>Days</label>
                                          <input type="radio" value="days" name="payment"><br><br>
                                          <label>COD</label>
                                          <input type="radio" value="cod" name="payment"><br><br>
                                          <label id="advance">advance</label>
                                          <input type="radio" value="advance" name="payment"><br>
                                        </p>  

                                        <p >
                                          <h2 style="text-align: left;color: white;margin-bottom: 2px;">Last order date</h2>
                                        
                                          <input type="date" name="last_order_date">
                                        </p>  

                                        <p id="best">
                                          <h2 style="text-align: left;color: white;margin-bottom: 20px;">Billing Address</h2>
                                          <a href="javascript:myfunc1()" style="color: white;position: relative;top: -10px;">Same as company address</a>
                                      
                                          <input id="billing_address_line_1" placeholder="Address line 1" style="width: 50%" oninput="this.className = ''" name="billing_address_line_1">
                                          <div style="margin-top: 10px;">
                                            <input id="billing_address_line_2" placeholder="Address line 2" style="width: 50%" oninput="this.className = ''" name="billing_address_line_2">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="billing_city" placeholder="City" style="width: 50%" oninput="this.className = ''" name="billing_city">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="billing_state" placeholder="State" style="width: 50%" oninput="this.className = ''" name="billing_state">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="billing_pincode" placeholder="Pincode" style="width: 50%" oninput="this.className = ''" name="billing_pincode">
                                          </div>
                                        </p>

                                         <p>
                                          <h2 style="text-align: left;color: white;margin-bottom: 20px;">Delivery Address </h2>
                                          <a href="javascript:myfunc2(1)" style="color: white;position: relative;top: -10px;">Same as company address</a>
                                          <a href="javascript:myfunc3(1)" style="color: white;margin-left: 100px;position: relative;top: -10px;">Same as billing address</a>
                                      
                                          <input id="delivery_address_line_1_1" placeholder="Address line 1" style="width: 50%" oninput="this.className = ''" name="delivery_address_line_1_1">
                                          <div style="margin-top: 10px;">
                                            <input id="delivery_address_line_2_1" placeholder="Address line 2" style="width: 50%" oninput="this.className = ''" name="delivery_address_line_2_1">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input   id="delivery_city_1" placeholder="City" style="width: 50%" oninput="this.className = ''" name="delivery_city_1">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="delivery_state_1" placeholder="State" style="width: 50%" oninput="this.className = ''" name="delivery_state_1">
                                          </div>
                                          <div style="margin-top: 10px;">
                                            <input id="delivery_pincode_1" placeholder="Pincode" style="width: 50%" oninput="this.className = ''" name="delivery_pincode_1">
                                          </div>
                                        </p>


                                        <p>
                                          <label>
                                            Any particular transport for above delivery address<span class="req">*</span>
                                          </label>
                                          <input list='none' oninput="this.className = ''" name="transport_name_1">
                                          <datalist id='none'>
                                            <option>None</option>
                                          </datalist>
                                        </p>

                                        <p id="more_delivery">
                                          <div>
                                            <button type="button" onclick="moredelivery()">Add more delivery address</button>
                                          </div>
                                        </p>

                                        <input type="hidden" id="del" value="1" name="del">

                                      </div>
                                    
                                    </div>


                                    <div class="tab1">

                                      <div class="field-wrap">
                                        <h1>Discount by category (in percent) :</h1>
                                        <p>
                                          <label>
                                            CPVC Discount<span class="req">*</span>
                                          </label>
                                          <input list='number' type='number' oninput="this.className = ''" name="cpvc_discount">
                                          <datalist id='number'>
                                          <option>0</option>
                                        </datalist>
                                        </p>

                                        <p>
                                          <label>
                                            PVC Discount<span class="req">*</span>
                                          </label>
                                          <input list='number' type='number' oninput="this.className = ''" name="pvc_discount">
                                          <datalist id='number'>
                                          <option>0</option>
                                        </datalist>
                                        </p>

                                        <p>
                                          <label>
                                            UPVC Discount<span class="req">*</span>
                                          </label>
                                          <input list='number' type='number' oninput="this.className = ''" name="upvc_discount" >
                                          <datalist id='number'>
                                          <option>0</option>
                                        </datalist>
                                        </p>

                                        <p>
                                          <label>
                                            ballvalve Discount<span class="req">*</span>
                                          </label>
                                          <input list='number' type='number' oninput="this.className = ''" name="ballvalve_discount">
                                          <datalist id='number'>
                                          <option>0</option>
                                        </datalist>
                                        </p>

                                        <p>
                                          <label>
                                            Lubricant Discount<span class="req">*</span>
                                          </label>
                                          <input list='number' type='number' oninput="this.className = ''" name="lubricant_discount">
                                          <datalist id='number'>
                                          <option>0</option>
                                        </datalist>
                                        </p>  
                                      </div>
                                    
                                    </div>

                                    <div class="tab1">
                                      
                                      <div class="field-wrap">
                                        <h1>Government Details:</h1>
                                        <p>
                                          <label>
                                            GST<span class="req">*</span>
                                          </label>
                                          <input oninput="this.className = ''" name="gst" id="gst">
                                        </p> 

                                        <p>
                                          <label>
                                            PAN<span class="req">*</span>
                                          </label>
                                          <input list='none' oninput="this.className = ''" name="pan" id="pan">
                                        </p> 

                                         <p>
                                          <label>
                                            AADHAR<span class="req">*</span>
                                          </label>
                                          <input list='none' oninput="this.className = ''" name="aadhar">
                                        </p>  

                                      </div>
                                    
                                    </div>


                                     <div class="tab1">
                                      
                                      <div class="field-wrap" >
                                        <h1>Special comments:</h1>


                                        <p style="font-size: 20px; text-align: center;" >
                            
                                          <textarea name = "special" cols = "10" rows="5"></textarea>
                                        </p>  



                                    

                          
                                      </div>
                                    
                                    </div>




                            <div style="overflow:auto;">
                              <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)" >Next</button>
                              </div>
                            </div>
                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                              <span class="step"></span>
                            </div>
                                    
                                    </form>

                                  </div>  
                                  
                                </div><!-- tab-content -->
                                
                          </div> <!-- /form -->













<script>

function get_id(){
// alert("helo");
var customer_name = $("#customer_name").val();
// alert(cid);
var dataString = "customer_name="+customer_name;
 $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                // dataType: "html",
                success: function(html)
                {
                  // console.log(res);
// alert();

                     if(document.getElementById('kuns')){
                      // alert("kuns");
                       // alert(html);
                      // document.getElementById('kuns').innerHTML=html;
                      var s=html;
                      $("#customer_id").val(s);
                      $("#customer_id").trigger("paste");

                   }
                                          // alert(res);
                    // $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });
      }



function get_name(){
// alert("hei");

var customer_id = $("#customer_id").val();
// alert(cid);
var dataString = "customer_id="+customer_id;
 $.ajax({
                type: "POST",
                url: "get.php", // Name of the php files
                data: dataString,
                // dataType: "html",
                success: function(html)
                {
                  // console.log(res);
// alert();

                     if(document.getElementById('kuns')){
                      // alert("kuns");
                       // alert(html);
                      // document.getElementById('kuns').innerHTML=html;
                      var s=html;
                      $("#customer_name").val(s);
                      $("#customer_name").trigger("paste");

                   }
                                          // alert(res);
                    // $("#disc,#rate,#ic,#mc,#dmc,#nos").attr('disabled','disabled');
                }
            });

}



var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab
 var z=0;
 var m=1;
 var o =1;
 var d=1;


var sz = document.forms['form1'].elements['payment'];
for(z=0;z<sz.length;z++)
sz[z].onclick = function() { // assign onclick handler function to each
        // put clicked radio button's value in total field
        // window.alert("hi");
       // var input = document.createElement("input");
       // input.type = "text";
       // input.name = "payment_days";
       // input.label = "Days";
       // input.form = "form1";
       var element = document.getElementById("best");
       // element.appendChild(input);
       var k = document.getElementById("payment_days");
       if(!k && sz[0].checked){
        $('<p id="payment_days"><input name="payment_days" placeholder="Days" form="form1"></p>').appendTo(best);
       
       }
       else if(!sz[0].checked){
        var element = document.getElementById("payment_days");
        element.parentNode.removeChild(element);
       }


       // input.className = "css-class-name";
      //  window.alert("hi");
    };


function morecontact() {
  // body...
  // $('<p><h2 style="text-align: left;color: white;margin-bottom: 20px;">Alternate contact 1</h2><label>Name<span class="req">*</span></label><input oninput="this.className = ''" name="prime_contact_name"></p><p><label> Number<span class="req">*</span></label><input oninput="this.className = ''" name="prime_contact_number"></p>  <p><label>       Email </label> <input oninput="this.className = ''" name="email"></p>  <p><label>  Alternate Number 1 </label> <input oninput="this.className = ''" name="prime_alternate_1" required="false"></p> <p>  <label>      Alternate Number 2 </ <input oninput="this.className = ''" name="prime_alternate_2" required="false"> </p>').appendTo(more);
  
  $('<p><h2 style="text-align: left;color: white;margin-bottom: 20px;">Alternate contact '+m+'</h2><input name="alternate_contact_fname_'+m+'" placeholder="First Name"></p><p><input placeholder="Last Name" name="alternate_contact_lname_'+m+'"><p><input placeholder="Number" name="alternate_contact_number_'+m+'"></p><p><input name="alternate_contact_email_'+m+'" placeholder="email"></p><p><input placeholder="Alternate number" name="alternate_alternate_'+m+'" required="false"></p>').appendTo(more);
  m++;


  var contacts = document.getElementById("contacts").value;
  var n = parseInt(contacts,10);
  n++;
  //alert(n);
  $("#contacts").val(n);

}



function moreoem() {
  
  m++;

  $('<p><input name="oem_brand_name_'+m+'" placeholder = "Oem brand'+m+'"></p>').appendTo(more_oem);



  var oem = document.getElementById("oem").value;
  var n = parseInt(oem,10);
  n++;
  //alert(n);
  $("#oem").val(n);


}



function moredelivery() {
  d++;
  
  $('<p><h2 style="text-align: left;color: white;margin-bottom: 20px;">Delivery Address '+d+'</h2><a href="javascript:myfunc2(d)" style="color: white;position: relative;top: -10px; float:left;">Same as company address</a><a href="javascript:myfunc3(d)" style="color: white;margin-left: 100px;position: relative;top: -10px;float:left;">Same as billing address</a><br><input id="delivery_address_line_1_'+d+'" placeholder="Address line 1" style="width: 50%" name="delivery_address_line_1_'+d+'"><div style="margin-top: 10px;"><input id="delivery_address_line_2_'+d+'" placeholder="Address line 2" style="width: 50%" name="delivery_address_line_2_'+d+'"></div><div style="margin-top: 10px;"><input   id="delivery_city_'+d+'" placeholder="City" style="width: 50%" name="delivery_city_'+d+'"></div><div style="margin-top: 10px;"><input id="delivery_state_'+d+'" placeholder="State" style="width: 50%" name="delivery_state_'+d+'"></div><div style="margin-top: 10px;"><input id="delivery_pincode_'+d+'" placeholder="Pincode" style="width: 50%" name="delivery_pincode_'+d+'"></div></p><p><input list="none" placeholder="Any particular transport for above delivery address"  name="transport_name_'+d+'"></p>').appendTo(more_delivery);
  


  var del = document.getElementById("del").value;
  var n = parseInt(del,10);
  n++;
  //alert(n);
  $("#del").val(n);

}


function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab1");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
 // alert("HIIi");
  //  alert(currentTab);

  // This function will figure out which tab to display
  var x2 = document.getElementsByClassName("tab1");
  //alert(x2.length);
  // Exit the function if any field in the current tab is invalid:
  //alert(x2.length);
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  //alert(x2.length);
  x2[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  //alert(currentTab);
  if (currentTab >= x2.length) {
    // ... the form gets submitted:
    //alert(currentTab);
    document.getElementById("form1").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i,z=1, valid = true;
  var typevalid=false;
  var paymentvalid = false;
  var extra = 1;
  x = document.getElementsByClassName("tab1");
  y = x[currentTab].getElementsByTagName("input");

  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...

    if(y[i].name != "prime_contact_email" && y[i].name != "prime_alternate_1" && y[i].name != "prime_alternate_2" && y[i].name != "email" && y[i].name != "last_order_date" && (y[i].name.indexOf("alternate")!=0))
    if (y[i].value == "") {
      // add an "invalid" class to the field:
     
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }

    // if(y[i].name == "prime_contact" || y[i].name == "alternate_contact" || y[i].name == "alternate_contact") {
    //   var x = y[i].value;
    //   if (!(x.match(/^\d{15}$/))) {
    //     valid=false;
    //     window.alert("Input not valid.Number is 10 digits");
    //     // document.getElementById("gst").value = text;
    //     y[i].className += " invalid";
    //   }
    // }


    if(y[i].name == "gst") {
      var x = y[i].value;
      if (!(x.match(/^[0-9A-Za-z]{15}$/))) {
        valid=false;
        window.alert("Input not valid..Gst number is 15 digits");
        // document.getElementById("gst").value = text;
        y[i].className += " invalid";
      }
    }

    if(y[i].name == "pan") {
      var x = y[i].value;
      if (!(x.match(/^[0-9A-Za-z]{10}$/)) && !(x.match(/None/))) {
        valid=false;
        window.alert("Input not valid..PAN number is 10 alphanumeric digits");
        // document.getElementById("pan").value = text;
        y[i].className += " invalid";
      }
    }

    if(y[i].name == "aadhar") {
      var x = y[i].value;
      if (!(x.match(/^\d{12}$/)) && !(x.match(/None/))) {
        valid=false;
        window.alert("Input not valid..AADHAR number is 12 digits");
        // document.getElementById("aadhar").value = text;
        y[i].className += " invalid";
      }
    }

    if(y[i].name == "ctype"){


      if(y[i].checked) {
        typevalid = true;
      }
    }
    else typevalid = true;

      if(y[i].name == "payment"){
        extra = 0;


      if(y[i].checked) {
        paymentvalid = true;
      }
      




    }





  }

  if(i==0)return true;

// var sz = document.forms['form1'].elements['payment'];

// if(sz){
//  var formValid = false;


// // loop through list
// for (var i=0, len=sz.length; i<len; i++) {
 
//         if (sz[i].checked) formValid = true;   
//     }

// if(!formValid) {
//   window.alert("Please select payment terms");
//   valid=false;
// }
// }


if(!typevalid){
  window.alert("Please select type");
  valid=false;
  return valid;
}
//else return true;
if(!extra){
if(!paymentvalid){
  window.alert("Please select payment terms");
  valid = false;
  return valid;
}
}

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}


function myfunc1() {
  var x, y, i;
  document.getElementById('billing_address_line_1').value=document.getElementById('address_line_1').value;
  document.getElementById('billing_address_line_2').value=document.getElementById('address_line_2').value;
  document.getElementById('billing_city').value=document.getElementById('city').value;
  document.getElementById('billing_state').value=document.getElementById('state').value;
  document.getElementById('billing_pincode').value=document.getElementById('pincode').value;
}


function myfunc2(d) {
  var x, y, i;
  document.getElementById("delivery_address_line_1_"+d+"").value=document.getElementById('address_line_1').value;
  document.getElementById("delivery_address_line_2_"+d+"").value=document.getElementById('address_line_2').value;
  document.getElementById("delivery_city_"+d+"").value=document.getElementById('city').value;
  document.getElementById("delivery_state_"+d+"").value=document.getElementById('state').value;
  document.getElementById("delivery_pincode_"+d+"").value=document.getElementById('pincode').value;
}


function myfunc3(d) {
  var x, y, i;
  document.getElementById("delivery_address_line_1_"+d+"").value=document.getElementById('billing_address_line_1').value;
  document.getElementById("delivery_address_line_2_"+d+"").value=document.getElementById('billing_address_line_2').value;
  document.getElementById("delivery_city_"+d+"").value=document.getElementById('billing_city').value;
  document.getElementById("delivery_state_"+d+"").value=document.getElementById('billing_state').value;
  document.getElementById("delivery_pincode_"+d+"").value=document.getElementById('billing_pincode').value;
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>











  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/kunal.js"></script>

</body>
</html>