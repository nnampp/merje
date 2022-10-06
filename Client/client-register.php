<?php
$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['submitsignin'])){ //check if form was submitted
            $_SESSION['submitsignin'] = $_POST['submitsignin'];
            $_SESSION['email'] = $_POST['email']; //get input text
            $_SESSION['password'] = $_POST['password'];
        }

    	$sql = "SELECT * FROM Register WHERE Email = '".$_SESSION['email']."' AND Password = '".$_SESSION['password']."' ";
          	$result = mysqli_query($con,$sql);
          
          	if(mysqli_num_rows($result)==1) {
              $row = mysqli_fetch_array($result);
              $_SESSION['RegisterID'] = $row['RegisterID'];
              $_SESSION['Name'] = $row['Name'];
              $_SESSION['MembercardID'] = $row['MembercardID'];              
        }
    
        if(isset($_POST['submitsignout'])) {
            session_unset();
            session_destroy();
        }
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
    
        
  <div class="form-popup" id="myForm">
  <form class="form-container" method="POST">
    <?php 
      if(isset($_SESSION['RegisterID'])) {
        echo "<br>&nbsp;&nbsp;&nbsp;You're signed in !!<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo $_SESSION['Name'];
        echo "  ";
        if($_SESSION['MembercardID']!=NULL) echo "(Membership)";
        echo "<br><br>";
        echo "<div class=\"pls\">";
        echo "<button type=\"submit\" class=\"btn\" name=\"submitsignout\">sign out</button>
                <button type=\"button\" class=\"btn cancel\" name=\"cancel\" onclick=\"closeForm();\">Cancel</button>
            </div>";
      }
      else {
        echo "<input type=\"Email\" class=\"LoginBox\" placeholder=\"Email\" name=\"email\" required>";
        echo "<input type=\"Password\" class=\"LoginBox\" placeholder=\"Password\" name=\"password\" required>";
        echo "<div class=\"pls\">";
        echo "<button type=\"submit\" class=\"btn\" name=\"submitsignin\">sign in</button>
                <a href=\"client-register.php\"><button type=\"button\" class=\"btn cancel\" >Register</button></a>
                <button type=\"button\" class=\"btn cancel\" name=\"cancel\" onclick=\"closeForm();\">Cancel</button>
            </div>";
        if(isset($_SESSION['submitsignin']))
          echo "<script> alert(\"Email or Password is incorrect\"); </script>";
      		session_unset();
      }

    ?>
  </form>
</div> 
      


    
    
    
    
    
     <section class="TopicRegister">
        Register
     </section>
    
<form name="register" method="post" action="insert-regist.php">
    <table class="RegisterForm" width="700" height="18" cellpadding="0" cellspacing="0" align="center">
      <tr>
		    <td height="30" width="700" align="left" colspan="3">Email </td><br>
      </tr>
      <tr>
        <td colspan="3"><input type="email" class="RegisterBox" id="email" name="email" size="40"></td>
      </tr>
      <tr>
		    <td height="30" width="350" align="left"><br>Name</td>
        <td height="30" width="50"></td>
        <td height="30" width="300" align="left"><br>Surname</td>
      </tr>
      <tr>
		    <td height="30" width="350" align="left"><input class="RegisterBox2" type="text" id="name" name="name" size="20"></td>
        <td height="30" width="50"></td>
        <td height="30" width="300" align="left"><input class="RegisterBox2" type="text" id="surname" name="surname" size="20"></td>
      </tr>
       <tr>
		    <td height="30" width="350" align="left"><br>Phone</td>
        <td height="30" width="50"></td>
        <td height="30" width="300" align="left"><br>Date of Birth</td>
      </tr>
      <tr>
		    <td height="30" width="350" align="left"><input type="tel" class="RegisterBox2" id="phone" name="phone" placeholder="089-999-9999" size="20"></td>
        <td height="30" width="50"></td>
        <td height="30" width="300" align="left"><input type="date" class="RegisterBox2" id="dob" name="dob"></td>
      </tr>
      <tr>
		    <td height="30" width="700" align="left" colspan="3"><br>Password </td><br>
      </tr>
      <tr>
        <td colspan="3"><input class="RegisterBox2" type="password" id="password" name="password" size="20"></td>
      </tr>
      <tr>
		    <td height="30" width="700" align="left" colspan="3"><br>Confirm Password </td><br>
      </tr>
      <tr>
        <td colspan="3"><input class="RegisterBox2" type="password" id="confirmpassword" name="confirmpassword" size="20"></td>
      </tr>
      <tr align="center" >
       <td height="90" width="700" colspan="3"> 
        <br>
        <input class="RegisterButton" type="submit" value="Submit"> 
      </td>
      </tr>
      
    </table>
    
    
    

    
    
    
   
   
	  
    
    
    
    
    
    </form>
    <footer>
      <p>COPYRIGHT RESERVED © 2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    
  </body>
</html>