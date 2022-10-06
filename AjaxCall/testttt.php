<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
	session_start();    
    date_default_timezone_set('Asia/Bangkok');
    
	$seatcom = "A1,B4,AA6,AA5";
    echo "start";
	$dt = date('Y-m-d H:i:s');
    echo $dt;
	$listseat = explode(",",$seatcom);
	$len = sizeof($listseat);
	echo $len;

	for($i=0;$i<$len;$i++)
    {
      	echo $listseat[$i];
    }

	$combk_arr[] = array("len" => $len, "bkid" => $bkid);
    // encoding array to json format
    echo json_encode($combk_arr);
?>