<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
	$code= 0;
	$today = date("Y-m-d"); 

    if(isset($_POST['code'])){
      $code = mysqli_real_escape_string($con,$_POST['code']);  
    }
    //echo $brchid;
    $pm_arr = array();   

       $sql = "SELECT DiscountTHB,DiscountPercent FROM Promotion WHERE PromotionCode=\"$code\" AND PromotionStartDate<=\"$today\" AND PromotionEndDate>=\"$today\" AND Available > (SELECT COUNT(PromotionCode) FROM Booking WHERE PromotionCode=\"$today\" AND BookingID IN (SELECT BookingID FROM Payment WHERE PaymentStatus=1));";
    	//echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
         $discountthb = $row['DiscountTHB'];
         $discountpercent = $row['DiscountPercent'];
    
         //echo $theatername;
         
          $pm_arr[] = array("discountthb" => $discountthb, "discountpercent" => $discountpercent);
       }
		
    // encoding array to json format
    echo json_encode($pm_arr);
?>