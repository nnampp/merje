<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
    
    $dropbtn= 0;
    $submitfile=0;

    if(isset($_POST['dropbtn'])){
       $dropbtn = mysqli_real_escape_string($con,$_POST['dropbtn']); // branch id
    }
   
    $ans = array();
    
    if($dropbtn == "Adv1"){
       $sql = "SELECT BranchID,BranchName FROM Branch";
       $result = mysqli_query($con,$sql);
       $submitfile="Advance-Analysis1.php";
     
       while( $row = mysqli_fetch_array($result) ){
           if($row['BranchID']!='0')
           {
          $branchid = $row['BranchID'];
          $branchname = $row['BranchName'];
         $ans[] = array("id" => $branchid, "name" => $branchname, "submitfile"=> $submitfile);
           }
       }
    }
    else if($dropbtn == "Adv2"){
        $sql = "SELECT MovieID,MovieTitle FROM Movie";
        $result = mysqli_query($con,$sql);
        $submitfile="Advance-Analysis2.php";
     
       while( $row = mysqli_fetch_array($result) ){
          $movieid = $row['MovieID'];
          $movietitle = $row['MovieTitle'];
    
         $ans[] = array("id" => $movieid, "name" => $movietitle, "submitfile"=> $submitfile);
       }
    }
    else{
        if($dropbtn == "Adv3") $submitfile="Advance-Analysis3.php";
        if($dropbtn == "Adv4") $submitfile="Advance-Analysis4.php";
        
        $ans[] = array("id" => "NON", "name" =>"NON","submitfile"=> $submitfile);
    }    
        
        
    
    // encoding array to json format
    echo json_encode($ans);
?>