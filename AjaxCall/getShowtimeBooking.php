<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
	$date = 0;
    $brchid = 0;
	$movid = 0;

	date_default_timezone_set('Asia/Bangkok');

    if(isset($_POST['date'])&&isset($_POST['brch'])&&isset($_POST['mov'])){
      $date = mysqli_real_escape_string($con,$_POST['date']);  
      $brchid = mysqli_real_escape_string($con,$_POST['brch']); 
      $movid = mysqli_real_escape_string($con,$_POST['mov']); 
    }
    //echo $brchid;
    $sht_arr = array();
	$full_date = date('Y-m-d H:i:s');
    
       $sql = "SELECT * FROM Showtime s, Theater t WHERE s.MovieID=\"$movid\" AND CAST(s.StartDateTime AS DATE)=\"$date\" AND s.StartDateTime >= \"$full_date\" AND s.TheaterID IN (SELECT TheaterID FROM Theater WHERE BranchID = \"$brchid\") AND s.TheaterID = t.TheaterID ORDER BY s.StartDateTime;";
    	//echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){

          $showtimeid = $row['ShowtimeID'];
          $theaterid = $row['TheaterID'];
         $theatername = $row['TheaterName'];
         $theatertypename = $row['TheaterTypeName'];
          $startdatetime = $row['StartDateTime'];
          $issubtitles = $row['IsSubtitles'];
    
         //echo $theatername;
         
          $sht_arr[] = array("showtimeid" => $showtimeid, "theaterid" => $theaterid, "theatername" => $theatername, "theatertypename" => $theatertypename,"startdatetime" => $startdatetime,"issubtitles" => $issubtitles);
       }

    // encoding array to json format
    echo json_encode($sht_arr);
?>