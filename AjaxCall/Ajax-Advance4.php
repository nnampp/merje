<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    $brchid = 0;
   
     if(isset($_POST['datarange'])){
       $brchid = mysqli_real_escape_string($con,$_POST['datarange']); // branch id
       echo "kiki";
       echo $brchid;
    }
    
    
    
    $ans = array();
  
   /* for($i=$newstartdate;$i<=$newenddate;$i=date("Y-m-d", strtotime($i. ' + 1 days'))){
    $sql = "SELECT SUM(m.Price) as TOTAL, COUNT(*) as SALES FROM ConcessionMenu m,EachConcessionOrder e WHERE e.MenuID=m.MenuID AND e.OrderID 
    IN (SELECT c.OrderID FROM ConcessionOrder c WHERE c.OrderDateTime BETWEEN '$i' AND '$i 23:59:59');";
    
    echo $sql;
    
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
    
    $sumprice = $row["TOTAL"];
    $sales = $row["SALES"];
    
    $ans[] = array("date" => $i,"sumprice" => $sumprice, "sales" => $sales);
    
    }*/
    
    $i=date("Y-m-d", strtotime("2022-05-12"));  
    echo $i;
    $sql = "SELECT SUM(m.Price) as TOTAL, COUNT(*) as SALES FROM ConcessionMenu m,EachConcessionOrder e WHERE e.MenuID=m.MenuID AND e.OrderID 
    IN (SELECT c.OrderID FROM ConcessionOrder c WHERE c.OrderDateTime BETWEEN '$i' AND '$i 23:59:59');";
    
    echo $sql;
    
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
      
    $sumprice = $row["TOTAL"];
    $sales = $row["SALES"];
    
    $ans[] = array("date" => $i,"sumprice" => $sumprice, "sales" => $sales);
    
    
    
     echo json_encode($ans);
    
    /*$theater_arr = array();
    
    if($brchid > 0){
       $sql = "SELECT TheaterID,TheaterName FROM Theater WHERE BranchID=\"$brchid\"";
    //echo $sql;
       $result = mysqli_query($con,$sql);
     
       while( $row = mysqli_fetch_array($result) ){
          $theaterid = $row['TheaterID'];
          $theatername = $row['TheaterName'];
    
          $theater_arr[] = array("id" => $theaterid, "name" => $theatername);
       }
    }
    // encoding array to json format
    echo json_encode($theater_arr);*/
?>