<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");

    //echo $brchid;
    $brch_arr = array();
    

       $sql = "SELECT BranchID,BranchName FROM Branch WHERE BranchID!='0' ORDER BY BranchName";
    //echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
          $branchid = $row['BranchID'];
          $branchname = $row['BranchName'];
    
          $brch_arr[] = array("branchid" => $branchid, "branchname" => $branchname);
       }

    // encoding array to json format
    echo json_encode($brch_arr);
?>