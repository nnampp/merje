<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
    $brchid = "";
	$date = "";

    if(isset($_POST['brchid'])&&isset($_POST['date'])){
       $brchid = mysqli_real_escape_string($con,$_POST['brchid']); // branch id
       $date = mysqli_real_escape_string($con,$_POST['date']);
    }
    //echo $brchid;
    $showtime_arr = array();
    
    if($brchid > 0){
       //$sql = "SELECT * FROM Showtime WHERE CAST(StartDateTime AS DATE)=\"$date\" AND TheaterID IN (SELECT TheaterID FROM Theater WHERE BranchID=\"$brchid\") ORDER BY MovieID,TheaterID,StartDateTime,IsSubtitles;";
       $sql = "SELECT * FROM Showtime s, Movie m, Theater t WHERE CAST(s.StartDateTime AS DATE)=\"$date\" AND s.TheaterID IN (SELECT TheaterID FROM Theater WHERE BranchID=\"$brchid\") AND s.MovieID = m.MovieID AND s.TheaterID = t.TheaterID ORDER BY s.MovieID,s.TheaterID,s.StartDateTime,s.IsSubtitles;";
      //echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
          $showtimeid = $row['ShowtimeID'];
          $theaterid = $row['TheaterID'];
         $theatername = $row['TheaterName'];
         $theatertypename = $row['TheaterTypeName'];
          $movieid = $row['MovieID'];
          $startdatetime = $row['StartDateTime'];
          $issubtitles = $row['IsSubtitles'];
         
          $movietitle = $row['MovieTitle'];
          $poster = $row['Poster'];
          $datein = $row['DateIn'];
		  $rate = $row['Rate'];
          $period = $row['Period'];

          $showtime_arr[] = array("showtimeid" => $showtimeid, "theaterid" => $theaterid, "theatername" => $theatername, "theatertypename" => $theatertypename,"movieid" => $movieid,"startdatetime" => $startdatetime,"issubtitles" => $issubtitles,"movietitle" => $movietitle,"poster" => $poster,"datein" => $datein,"rate" => $rate,"period" => $period);
       }
    }
    // encoding array to json format
    echo json_encode($showtime_arr);
?>