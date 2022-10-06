<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");

	$status = 0;
    $branchid = 0;
    //$atheater = 0;
    $ttname = 0;
    $typett = 0;

    if(isset($_POST['branchid'])){
       $branchid = mysqli_real_escape_string($con,$_POST['branchid']); // branch id
       $status = mysqli_real_escape_string($con,$_POST['status']);
       //$atheater = mysqli_real_escape_string($con,$_POST['atheater']);
       $ttname = mysqli_real_escape_string($con,$_POST['ttname']);
       $typett = mysqli_real_escape_string($con,$_POST['typett']);
    }
    
    if($status == '1'){
      $gen_theater_id = uniqid("TH");
       $sql = "INSERT INTO Theater (TheaterID,TheaterName,BranchID,TheaterTypeName)
	VALUES ('$gen_theater_id','$ttname','$branchid','$typett')";
       if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
	  
      //deluxe
      for($i=67;$i<=71;$i++)
      {
         $row = chr($i);
         for($j=1;$j<=12;$j++)
         {
           $gen_seat_id = uniqid("S");
           $sql_seat = "INSERT INTO Seat (SeatID,SeatNo,SeatTypeName,TheaterID)
	VALUES ('$gen_seat_id','$row$j','Deluxe','$gen_theater_id')";
           if (!mysqli_query($con,$sql_seat)) {
              die('Error: ' . mysqli_error($con));
            }
         }
      }
      
      //premium
      for($i=65;$i<=66;$i++)
      {
         $row = chr($i);
         for($j=1;$j<=10;$j++)
         {
           $gen_seat_id = uniqid("S");
           $sql_seat = "INSERT INTO Seat (SeatID,SeatNo,SeatTypeName,TheaterID)
	VALUES ('$gen_seat_id','$row$j','Premium','$gen_theater_id')";
           if (!mysqli_query($con,$sql_seat)) {
              die('Error: ' . mysqli_error($con));
            }
         }
      }
      
      //sofasweet
      for($i=65;$i<=66;$i++)
      {
         $row = chr($i);
         for($j=1;$j<=8;$j++)
         {
           $gen_seat_id = uniqid("S");
           $sql_seat = "INSERT INTO Seat (SeatID,SeatNo,SeatTypeName,TheaterID)
	VALUES ('$gen_seat_id','$row$row$j','SofaSweet','$gen_theater_id')";
           if (!mysqli_query($con,$sql_seat)) {
              die('Error: ' . mysqli_error($con));
            }
         }
      }
      
   }
     
       /*while( $row = mysqli_fetch_array($result) ){
          $theaterid = $row['TheaterID'];
          $theatername = $row['TheaterName'];
    
          $theater_arr[] = array("id" => $theaterid, "name" => $theatername);
       }
    }
    // encoding array to json format
    echo json_encode($theater_arr);*/
?>