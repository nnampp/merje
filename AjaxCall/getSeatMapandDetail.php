<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
	$shtid= 0;


    if(isset($_POST['shtchooseid'])){
      $shtid = mysqli_real_escape_string($con,$_POST['shtchooseid']);  
    }
    //echo $brchid;
    $sht_arr = array();
	$s_arr = array();    

       $sql = "SELECT * FROM Showtime s, Theater t,TheaterType y WHERE s.ShowtimeID=\"$shtid\" AND s.TheaterID = t.TheaterID AND t.TheaterTypeName = y.TheaterTypeName;";
    	//echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
         $theatername = $row['TheaterName'];
         $theatertypename = $row['TheaterTypeName'];
          $startdatetime = $row['StartDateTime'];
          $issubtitles = $row['IsSubtitles'];        
         $topupprice = $row['TopUpPrice'];
    
         //echo $theatername;
         
          $sht_arr[] = array("theatername" => $theatername, "theatertypename" => $theatertypename,"startdatetime" => $startdatetime,"issubtitles" => $issubtitles,"topupprice" => $topupprice);
       }
		
		$sql_seat = "SELECT s.SeatNo FROM BookingSeat bs, Seat s WHERE bs.BookingID IN (SELECT BookingID FROM Booking WHERE ShowtimeID=\"$shtid\" AND BookingID IN (SELECT BookingID FROM Payment WHERE PaymentStatus=1))  AND bs.SeatID = s.SeatID;";
        //echo $sql_seat;
		$result2 = mysqli_query($con,$sql_seat);
		while( $row2 = mysqli_fetch_array($result2) ){
        	$seatno = $row2['SeatNo'];
          
          	$s_arr[] = array("seatno" => $seatno);
        }

    // encoding array to json format
    echo json_encode(array_merge($sht_arr,$s_arr));
?>