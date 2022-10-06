<?php
  $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
  // Check connection
  if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	session_start();

?> 

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="/pic/merjeth.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
  <body>
      
      
    <header class = "Navbar">
      <div class = "Navbar-container">
        <div class ="Menu">
           <div class ="logo">
            <img src = "/pic/merjeth.png"/>
          </div>
            <div class ="Menu-content">
              <ul class="nav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="client-theater.php">THEATER</a></li>
                <li><a href="client-news.php">NEWS</a></li>
                <li><a href="client-promotion.php">PROMOTIONS</a></li>
                <li><a href="#">FAQ</a></li> 
                <li><img src = "/pic/merje+.png" height="78" width="125" <?php if((isset($_SESSION['RegisterID']))&&($_SESSION['MembercardID']!=NULL)) echo "onclick=\"openPage('client-merje-plus-mem.php');\""; else echo "onclick=\"openPage('client-merje-plus-no-mem.php');\""; ?>/></li>
              </ul>
            </div>
            <div class ="Search-Profile">
              <div class = "Search">
                <input type="search" class="search-box" placeholder="Search">
                <img src = "/pic/search.png" height="20" width="20"/>
              </div>
              <div class = "Profile">
                 <img onclick="openForm()" src = "/pic/profilepic.png"/>
              </div>
            </div>
        </div>
      </div>
 
      
    </header>
    
    
      
<?php
$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection




      


echo "<section class=\"TopicRegister\">";
echo "<br><br><br><br><br><br><br><br>";

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(empty($_POST['email'])){
	echo "Please fill your EMAIL" ;
}
elseif(empty($_POST['name'])){
	echo "Please fill your Name" ;
}elseif(empty($_POST['surname'])){
	echo "Please fill your Surname" ;
}
elseif(empty($_POST['phone'])){
	echo "Please fill your Phone" ;
}
elseif(empty($_POST['dob'])){
	echo "Please fill your Date of Birth" ;
}
elseif(empty($_POST['password'])){
	echo "Please fill your Password" ;
}
elseif(empty($_POST['confirmpassword'])){
	echo "Please fill your Confirm Password" ;
}
elseif($_POST['confirmpassword']!=$_POST['password']){
	echo "Password doesn't match" ;
}




else{
	//esc//ape variables for security
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$surname = mysqli_real_escape_string($con, $_POST['surname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
	$registerid = uniqid("cl");


	$sql="INSERT INTO Register (RegisterID,Name,Surname,Email,RegisterTelNo,Password,DOB,point )
	VALUES ('$registerid','$name','$surname','$email','$phone','$password','$dob','0')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	echo "Success" ;
}	

echo "</section>";

mysqli_close($con);
?>
<form name="register" method="post" action="client-register.php">
    <br><br><br><br><br>
<table border='0' align='center' class='RegisterForm'>
<tr align="center">
   <td> <input class="RegisterButton" align="center" name="reset" type="submit" id="Back" value="Back"/></td>
</tr>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <footer>
      <p>COPYRIGHT RESERVED © 2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    
  </body>
</html>