<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
    $brchid = 0;

    if(isset($_POST['brch'])){
       $brchid = mysqli_real_escape_string($con,$_POST['brch']); // branch id
    }
    //echo $brchid;
    $theater_arr = array();
    
    if($brchid > 0){
       $sql = "SELECT TheaterID,TheaterName FROM Theater WHERE BranchID=\"$brchid\" ORDER BY TheaterName";
    //echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
          $theaterid = $row['TheaterID'];
          $theatername = $row['TheaterName'];
    
          $theater_arr[] = array("id" => $theaterid, "name" => $theatername);
       }
    }
    // encoding array to json format
    echo json_encode($theater_arr);
?>