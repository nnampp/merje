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
<html >
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MERJE</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="/pic/merjeth.png"
    />
    <link rel="stylesheet" href="..\css\style.css" />
    <script src="..\script.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <header class="Navbar">
      <div class="Navbar-container">
        <div class="Menu">
          <div class="logo">
            <img
              src="/pic/merjeth.png"
            />
          </div>
          <div class="Menu-content">
            <ul class="nav">
              <li><a href="home.php">HOME</a></li>
              <li><a href="client-theater.php">THEATER</a></li>
              <li><a href="client-news.php">NEWS</a></li>
              <li><a href="client-promotion.php">PROMOTIONS</a></li>
              <li><a href="#">FAQ</a></li>
              <li>
                <img
                  src="/pic/merje+.png"
                  height="78"
                  width="125"
                  <?php if((isset($_SESSION['RegisterID']))&&($_SESSION['MembercardID']!=NULL)) echo "onclick=\"openPage('client-merje-plus-mem.php');\""; else echo "onclick=\"openPage('client-merje-plus-no-mem.php');\""; ?>
                />
              </li>
            </ul>
          </div>
          <div class="Search-Profile">
            <div class="Search">
              <input type="search" class="search-box" placeholder="Search" />
              <img
                src="/pic/search.png"
                height="20"
                width="20"
              />
            </div>
            <div class="Profile">
              <img onclick="openForm()" 
                src="/pic/profilepic.png"
              />
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

    <!---------------- list of promotion -------------------->    
    
    <br /><br /><br /><br />
    <div class="promotion-list" id="prolist">
      
      <?php
      $sql = "SELECT PromotionCode,PromotionName,PromotionDetail,PromotionPic FROM Promotion";
              $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            //echo "<h1> OKAYYY </h1>";
                            //echo mysqli_num_rows($result);
                          
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result) ) {  
                                
                                if($row["PromotionCode"]!='0'){
                              echo "<div class=\"promotion-each-list\">";
                              echo "<img";
                                echo " src=\"..";
                                  echo $row['PromotionPic'];
                                  echo "\"";
                                echo "class = \"promotion-img\"";
                              echo"/>";
                              echo"<div class=\"promotion-detail\">";
                                echo "<p><b>";
                                  echo $row['PromotionName'];
                                echo "</b></p>";
                                echo "<p>";
                                  echo $row['PromotionDetail'];
                                 echo "</p>";
                                echo "<br />";
                                echo "<div class=\"view-and-more\">";
                                  echo "<p><img src=\"/pic/Vector.png\" class=\"view-icon\"> 20 k</p>";
                                  echo "<div class=\"more-detail-btn\" onclick=\"openPage('client-promotiondetail.php?promocode=".$row['PromotionCode']."')\"><p>More detail</p></div>";
                                echo "</div>";
                              echo "</div>";
                            echo "</div>";
                                }
                            }
                        } else {
                            echo "0 results";
                        }
      
      	/*$sql = "SELECT PromotionCode,PromotionName,PromotionDetail,PromotionPic FROM Promotion";
      	$result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_assoc($result)){
          	 echo "<div class=\"promotion-each-list\">";
        echo "<img";
          echo "src=\"";
            echo $row['PromotionPic'];
            echo "\"";
          echo "class = \"promotion-img\"";
        echo"/>";
        echo"<div class=\"promotion-detail\">";
    
          echo "<p>";
            echo $row['PromotionDetail'];
           echo "</p>";
          echo "<br />";
          echo "<div class=\"view-and-more\">";
            echo "<p><img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector.png?v=1650259698676\" class=\"view-icon\"> 20 k</p>";
            echo "<div class=\"more-detail-btn\" onclick=\"openPage('promotiondetail.php')\"><p>More detail</p></div>";
          echo "</div>";
        echo "</div>";
      echo "</div>";   */
      ?>
      
      
      
      
      
      
      
     
      
      
          
            
      
      
      
      
      
      
     
        
      
        
      
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    
    <footer>
      <p>
        COPYRIGHT RESERVED  2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.
      </p>
    </footer>
  </body>
</html>