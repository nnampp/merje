<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
	$movi = 0;

    if(isset($_POST['mmid'])){
      $movi = mysqli_real_escape_string($con,$_POST['mmid']);  
    }
    //echo $brchid;
    $gen_arr = array();   

       $sql = "SELECT GenreName FROM EachGenreOfMovie WHERE MovieID='$movi'";
    	//echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
         $gen = $row['GenreName'];
    
         //echo $theatername;
         
          $gen_arr[] = array("gen" => $gen);
       }
		
    // encoding array to json format
    echo json_encode($gen_arr);
?>