<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
	session_start();    

	$seatcom = 0;
    $regis = 0;
    $shtm = 0;
    $pmc = 0;
    $cfmail = 0;
    $cftel  = 0;

	date_default_timezone_set('Asia/Bangkok');
	$bkid = uniqid("BK");
	$dt = date('Y-m-d H:i:s');


    if(isset($_POST['pmc'])&&isset($_POST['cfmail'])&&isset($_POST['cftel'])&&isset($_POST['totl'])){
      $pmc = mysqli_real_escape_string($con,$_POST['pmc']); 
      $cfmail = mysqli_real_escape_string($con,$_POST['cfmail']); 
      $cftel = mysqli_real_escape_string($con,$_POST['cftel']); 
      $totl = mysqli_real_escape_string($con,$_POST['totl']); 
    }
    $shtm = $_SESSION['shtc'];
	$regis = $_SESSION['RegisterID'];
	

	$sql = "INSERT INTO Booking (BookingID,RegisterID,ShowtimeID,BookingDateTime,PromotionCode,ConfirmationEmail,ConfirmationTelNo)
	VALUES ('$bkid','$regis','$shtm','$dt','$pmc','$cfmail','$cftel')";
     //echo $sql;  
	if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
    $_SESSION['BookingID'] = $bkid;
	$_SESSION['Total'] = $totl;

    $len1 = 0;
	if($_SESSION['sseat1']!='')
      {
        $listseat1 = explode(",",$_SESSION['sseat1']);
        $len1 = sizeof($listseat1);

        for($i=0;$i<$len1;$i++)
        {
            $sql_sid = "SELECT SeatID FROM Seat WHERE SeatNo='$listseat1[$i]' AND TheaterID IN (SELECT TheaterID FROM Showtime WHERE ShowtimeID='$shtm')";
            $result_sid = mysqli_query($con,$sql_sid);
            $row_sid = mysqli_fetch_array($result_sid);

            $sid = $row_sid['SeatID'];
            $bksid = uniqid("BKS");
            $sql_bks = "INSERT INTO BookingSeat (BookingSeatID,BookingID,SeatID)
        VALUES ('$bksid','$bkid','$sid')";
          if (!mysqli_query($con,$sql_bks)) {
          die('Error: ' . mysqli_error($con));
        }
        }
       }

	$len2 = 0;
	if($_SESSION['sseat2']!='')
    {
        
        $listseat2 = explode(",",$_SESSION['sseat2']);
        $len2 = sizeof($listseat2);

        for($i=0;$i<$len2;$i++)
        {
            $sql_sid = "SELECT SeatID FROM Seat WHERE SeatNo='$listseat2[$i]' AND TheaterID IN (SELECT TheaterID FROM Showtime WHERE ShowtimeID='$shtm')";
            $result_sid = mysqli_query($con,$sql_sid);
            $row_sid = mysqli_fetch_array($result_sid);

            $sid = $row_sid['SeatID'];
            $bksid = uniqid("BKS");
            $sql_bks = "INSERT INTO BookingSeat (BookingSeatID,BookingID,SeatID)
        VALUES ('$bksid','$bkid','$sid')";
           if (!mysqli_query($con,$sql_bks)) {
          die('Error: ' . mysqli_error($con));
        }
        }
    }


	$len3 = 0;
	if($_SESSION['sseat3']!='')
    {
      $listseat3 = explode(",",$_SESSION['sseat3']);
      $len3 = sizeof($listseat3);

      for($i=0;$i<$len3;$i++)
      {
          $sql_sid = "SELECT SeatID FROM Seat WHERE SeatNo='$listseat3[$i]' AND TheaterID IN (SELECT TheaterID FROM Showtime WHERE ShowtimeID='$shtm')";
          $result_sid = mysqli_query($con,$sql_sid);
          $row_sid = mysqli_fetch_array($result_sid);

          $sid = $row_sid['SeatID'];
          $bksid = uniqid("BKS");
          $sql_bks = "INSERT INTO BookingSeat (BookingSeatID,BookingID,SeatID)
      VALUES ('$bksid','$bkid','$sid')";
         if (!mysqli_query($con,$sql_bks)) {
          die('Error: ' . mysqli_error($con));
        }
      }
    }
	
	$len = $len1 + $len2 + $len3;

	$combk_arr[] = array("len" => $len, "bkid" => $bkid);
    // encoding array to json format
    echo json_encode($combk_arr);
?>