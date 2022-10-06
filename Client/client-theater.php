<?php
  $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
  // Check connection
  if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

session_start();
?> 
<?php
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
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="..\css\style.css">
    <script src="..\script.js"></script>
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
                <li><a href="#faq">FAQ</a></li> 
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
      
    
    <style>
      /* page layout styles */
*{
    margin:0;
    padding:0;
}
.container {
    
    margin: 20px auto;
    overflow: hidden;
    padding: 10px;
    position: relative;
    width: 1250px;

    display: flex;
    justify-content: center;
}
      .markb{
   
    overflow: hidden;
    padding: 10px;
    position: relative;
    width: 130px;
     height: 78px;

    display: flex;
      }

    </style>
    
    
    <br><br><br>
    
    <img class="theaterr" src="/pic/thbanner.png">
    
    
    
      <div class="container">

            <ul id="nav">
                <li>
                       <img class="markk" src="/pic/locate.png">
                    <img class="markkright" src="/pic/chevron_down.png">
                       <figcaption>
                        <a href="#" class="regionth" >BANGKOK AND METROPOLITAN REGION</a></figcaption>
                        
					<?php 
                  $sql = "SELECT BranchID,BranchName, Region FROM Branch";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                            //echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) {                              
                              if($row["Region"] == "BANGKOK AND METROPOLITAN REGION") {
                                echo " <a href=\"..\Client\client-subtheater.php?branchid=";
                                echo $row['BranchID'];
                                echo "\" class=\"sm\"><img class=\"markb\" src=\"/pic/merjeth.png\">" ; 
                    			echo "<figcaption>";
                                echo $row["BranchName"];
                                echo "</figcaption></a><br>";
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                  	?>
                  
                  
                </li>
                <li>
                     <img class="markk" src="/pic/locate.png">
                    <img class="markkright" src="/pic/chevron_down.png">
                    <figcaption>
                    <a href="#" class="regionth" >CENTRAL REGION</a></figcaption>
                   
                    
                  <?php 
                  $sql = "SELECT BranchID,BranchName, Region FROM Branch";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                           // echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) { 
                              if($row["Region"] == "CENTRAL REGION") {
                                echo " <a href=\"..\Client\client-subtheater.php?branchid=";
                                echo $row['BranchID'];
                                echo "\" class=\"sm\"><img class=\"markb\" src=\"/pic/merjeth.png\">" ; 
                    			echo "<figcaption>";
                                echo $row["BranchName"];
                                echo "</figcaption></a><br>";
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                  	?>
                  
                  
                </li>
                <li>
                    <img class="markk" src="/pic/locate.png">
                    <img class="markkright" src="/pic/chevron_down.png">
                   <figcaption>
                    <a href="#" class="regionth" >NORTHERN REGION</a></figcaption>
                   
                  
                   <?php 
                  $sql = "SELECT BranchID,BranchName, Region FROM Branch";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                            //echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) {                              
                              if($row["Region"] == "NORTHERN REGION") {
                                echo " <a href=\"..\Client\client-subtheater.php?branchid=";
                                echo $row['BranchID'];
                                echo "\" class=\"sm\"><img class=\"markb\" src=\"/pic/merjeth.png\">" ; 
                    			echo "<figcaption>";
                                echo $row["BranchName"];
                                echo "</figcaption></a><br>";
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                  	?>
                  
                  
                </li>
                <li>
            
                    <img class="markk" src="/pic/locate.png">
                    <img class="markkright" src="/pic/chevron_down.png">
                   <figcaption><a href="#" class="regionth" >NORTHEASTERN REGION</a></figcaption>
                    
                  
                   <?php 
                  $sql = "SELECT BranchID,BranchName, Region FROM Branch";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                            //echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) {                              
                              if($row["Region"] == "NORTHEASTERN REGION") {
                                echo " <a href=\"..\Client\client-subtheater.php?branchid=";
                                echo $row['BranchID'];
                                echo "\" class=\"sm\"><img class=\"markb\" src=\"/pic/merjeth.png\">" ; 
                    			echo "<figcaption>";
                                echo $row["BranchName"];
                                echo "</figcaption></a><br>";
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                  	?>
                  
                  
                  
                </li>
               <li>
                     <img class="markk" src="/pic/locate.png">
                    <img class="markkright" src="/pic/chevron_down.png">
                    <figcaption>
                    <a href="#" class="regionth" >EASTERN REGION</a></figcaption>
                    
                  <?php 
                 $sql = "SELECT BranchID,BranchName, Region FROM Branch";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                            //echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) {                              
                              if($row["Region"] == "EASTERN REGION") {
                                echo " <a href=\"..\Client\client-subtheater.php?branchid=";
                                echo $row['BranchID'];
                                echo "\" class=\"sm\"><img class=\"markb\" src=\"/pic/merjeth.png\">" ; 
                    			echo "<figcaption>";
                                echo $row["BranchName"];
                                echo "</figcaption></a><br>";
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                  	?>
                 
                 
                </li>
               <li>
                    <img class="markk" src="/pic/locate.png">
                    <img class="markkright" src="/pic/chevron_down.png">
                 <figcaption>
                    <a href="#" class="regionth" >SOUTHERN REGION</a></figcaption>
                    
                  <?php 
                 $sql = "SELECT BranchID,BranchName, Region FROM Branch";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                            //echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) {                              
                              if($row["Region"] == "SOUTHERN REGION") {
                                echo " <a href=\"..\Client\client-subtheater.php?branchid=";
                                echo $row['BranchID'];
                                echo "\" class=\"sm\"><img class=\"markb\" src=\"/pic/merjeth.png\">" ; 
                    			echo "<figcaption>";
                                echo $row["BranchName"];
                                echo "</figcaption></a><br>";
                              }
                            }
                        } else {
                            echo "0 results";
                        }
                  	?>
                 
                 
                </li>
            </ul>

        </div>
    
    
    
    
    <footer>
      <p>COPYRIGHT RESERVED  2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    
  </body>
</html>