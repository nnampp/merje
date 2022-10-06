<?php 
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
    $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
	session_start();    

	$sseat1 = 0;
    $sseat2 = 0;
    $sseat3 = 0;
    $brc = 0;
    $shtc = 0;
    $prc  = 0;
    $movc = 0;
	$pro = 0;

    if(isset($_POST['sseat1'])&&isset($_POST['sseat2'])&&isset($_POST['sseat3'])&&isset($_POST['brc'])&&isset($_POST['shtc'])&&isset($_POST['prc'])&&isset($_POST['movc'])&&isset($_POST['pro'])){
      $sseat1 = mysqli_real_escape_string($con,$_POST['sseat1']); 
      $sseat2 = mysqli_real_escape_string($con,$_POST['sseat2']); 
      $sseat3 = mysqli_real_escape_string($con,$_POST['sseat3']); 
      $brc = mysqli_real_escape_string($con,$_POST['brc']); 
      $shtc = mysqli_real_escape_string($con,$_POST['shtc']); 
      $prc = mysqli_real_escape_string($con,$_POST['prc']); 
      $movc = mysqli_real_escape_string($con,$_POST['movc']); 
      $pro = mysqli_real_escape_string($con,$_POST['pro']); 
    }

	$_SESSION['sseat1'] = $sseat1;
	$_SESSION['sseat2'] = $sseat2;
	$_SESSION['sseat3'] = $sseat3;
	$_SESSION['brc'] = $brc;
    $_SESSION['shtc'] = $shtc;
	$_SESSION['prc'] = $prc;
    $_SESSION['movc'] = $movc;
	$_SESSION['pro'] = $pro;
	

    // encoding array to json format
    echo json_encode([0]);
?>