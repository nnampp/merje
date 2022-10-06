<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="/css/style2.css"/>
    <link rel="stylesheet" href="/css/style6.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
  <body>
    <div class="all-in-admin">
      <!-------------sidebar------------------->
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <img src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/logo-W.png?v=1650801665361" width="123px" height="53px"/>
        </div>
        <i class="fas fa-bars" id="btn-slidetab" onclick="slide()"></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="../Advance-AnalysisTRY.php">
            <i class="fas fa-chart-pie"></i>
            <span class="links_name">Overview</span>
            <span class="tooltip">Overview</span>
          </a>
        </li>
        
        <li>
          <a href="Admin-Branch.php">
            <i class="fas fa-building"></i>
            <span class="links_name">Branch</span>
            <span class="tooltip">Branch</span>
          </a>
        </li>
        
        <li>
          <a href="Admin-Theater.php">
            <i class="fas fa-theater-masks"></i>
            <span class="links_name">Theater</span>
            <span class="tooltip">Theater</span>
          </a>
        </li>
        
        <li>
          <a href="Admin-Movie.php">
            <i class="fas fa-ticket-alt"></i>
            <span class="links_name">Movie</span>
            <span class="tooltip">Movie</span>
          </a>
        </li>
        
        <li>
          <a href="Admin-Showtime.php">
            <i class="fas fa-calendar-minus"></i>
            <span class="links_name">Showtime</span>
            <span class="tooltip">Showtime</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="fas fa-user-alt"></i>
            <span class="links_name">Register</span>
            <span class="tooltip">Register</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="fas fa-desktop"></i>
            <span class="links_name">Booking</span>
            <span class="tooltip">Booking</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="far fa-credit-card"></i>
            <span class="links_name">Payment</span>
            <span class="tooltip">Payment</span>
          </a>
        </li>
        
        <li>
           <a href="Admin-Promotion.php">
            <i class="fas fa-percent"></i>
            <span class="links_name">Promotion</span>
            <span class="tooltip">Promotion</span>
          </a>
        </li>
        
        <li>
          <a href="Admin-Menu.php">
            <i class="fab fa-elementor"></i>
            <span class="links_name">Menu</span>
            <span class="tooltip">Menu</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="fas fa-address-book"></i>
            <span class="links_name">Staff</span>
            <span class="tooltip">Staff</span>
          </a>
        </li>
        
        <div class="setting-bar"></div>
        
        <li>
          <a href="#">
            <i class="fas fa-cog"></i>
            <span class="links_name">Settings</span>
          </a>
        </li> 
      </ul>
      
    </div>
    
    <!----------------Content-------------->
    
      <div class="Manu-admin">
        <h2>MENU</h2>
        <input type="search" class="search-box-admin" placeholder="Search" />

        <form name="manu" id="detial-manu" method="post">
          <div class="detial-manu">
          
    <?php
$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

      	$phone = mysqli_real_escape_string($con, $_POST['phone']);
      	
      	$MN001 = mysqli_real_escape_string($con, $_POST['MN001']);
    
      	$MN002 = mysqli_real_escape_string($con, $_POST['MN002']);
      
      	$MN003 = mysqli_real_escape_string($con, $_POST['MN003']);
      	
      	$MN004 = mysqli_real_escape_string($con, $_POST['MN004']);
      	$MN005 = mysqli_real_escape_string($con, $_POST['MN005']);
      	$MN006 = mysqli_real_escape_string($con, $_POST['MN006']);
      	
      	
      	 $sql = "SELECT * FROM Register WHERE RegisterTelNo=\"".$phone."\";";
         $result = mysqli_query($con, $sql);
         $row = mysqli_fetch_assoc($result);
      	
      	
      $registerid = $row["RegisterID"];
 
          
           echo "<div class=\"detial-manu1\">"; //<!---phone--->
            echo  "<label for=\"tel\">Phone</label>";
                if($row!=NULL){
             echo "<input type=\"tel\" id=\"phone\" name=\"phone\" value=\"".$phone."\" pattern=\"[0-9]{10}\" class=\"detialmanu-box\"readonly/> ";}
             else{echo "<input type=\"tel\" id=\"phone\" name=\"phone\" value=\"This phone number has not been registered.\" pattern=\"[0-9]{10}\" class=\"detialmanu-box\" readonly/> ";}
            echo "</div>";
            
            echo "<div class=\"head-of-manu\">";
              echo "<h1>List</h1>";
              echo "<h1>Size</h1>";
              echo "<h1>Price</h1>";
              echo "<h1>Order</h1>";
            echo "</div>";
          
          
            echo "<div class=\"detial-manu2\">"; //<!---aboutmanu--->
              
              echo "<div class=\"list\">";
                
                echo "<h3 class=\"popcorn\">";
                  echo "Popcorn";
                echo "</h3>";
                echo "<h3 class=\"beverage\">";
                  echo "Beverage";
                echo "</h3>";
              echo "</div>";
                
             echo "<div class=\"size\">";
                 
              echo  "<div class=\"size16\">";
               echo   "<h2>16</h2> <h3>Oz.</h3>";
               echo "</div>";
                
                echo "<div class=\"size24\">";
                  echo "<h2>24</h2> <h3>Oz.</h3>";
                echo "</div>";
                
                echo "<div class=\"size85\">";
                  echo "<h2>85</h2> <h3>Oz.</h3>";
                echo "</div>";
                
                echo "<div class=\"size16\">";
                  echo "<h2>16</h2> <h3>Oz.</h3>";
                echo "</div>";
                
                echo "<div class=\"size24\">";
                  echo "<h2>24</h2> <h3>Oz.</h3>";
                echo "</div>";
                
                echo "<div class=\"size85\">";
                  echo "<h2>85</h2> <h3>Oz.</h3>";
                echo "</div>";
              echo"</div>";
             
              echo"<div class=\"price\">";
                
                echo"<div class=\"price16\">";
                 echo" <h2>150</h2> <h3>Baht</h3>";
               echo "</div>";
                
                echo "<div class=\"price24\">";
                 echo" <h2>300</h2> <h3>Baht</h3>";
                echo "</div>";
                
               echo "<div class=\"price85\">";
                 echo" <h2>600</h2> <h3>Baht</h3>";
                echo "</div>";
                
               echo" <div class=\"price16\">";
                 echo" <h2>150</h2> <h3>Baht</h3>";
               echo" </div>";
                
               echo "<div class=\"price24\">";
                 echo" <h2>300</h2> <h3>Baht</h3>";
               echo "</div>";
                
                echo "<div class=\"price85\">";
                echo  "<h2>600</h2> <h3>Baht</h3>";
               echo "</div>";
            echo " </div>";
            
          
             echo "<div class=\"order\">";
                
                echo  "<input type=\"number\" id=\"MN001\" name=\"MN001\" min=\"0\" max=\"20\" value=\"".$MN001."\" readonly>";
                echo  "<input type=\"number\" id=\"MN002\" name=\"MN002\" min=\"0\" max=\"20\" value=\"".$MN002."\" readonly>";
                echo  "<input type=\"number\" id=\"MN003\" name=\"MN003\" min=\"0\" max=\"20\" value=\"".$MN003."\" readonlyd>"; 
                  
                echo  "<input type=\"number\" id=\"MN004\" name=\"MN004\" min=\"0\" max=\"20\" value=\"".$MN004."\"  readonly>";
                echo  "<input type=\"number\" id=\"MN005\" name=\"MN005\" min=\"0\" max=\"20\" value=\"".$MN005."\"  readonly>";
                 echo "<input type=\"number\" id=\"MN006\" name=\"MN006\" min=\"0\" max=\"20\" value=\"".$MN006."\"  readonly>";
                
              echo "</div>";
    
              
             echo "</div>";
            
            
           echo "<div class=\"totalprice\">";
             echo   "<div class=\"total-left\">";
                echo  "<h1>Total</h1>";
            echo "</div>";
            
            $total=0;    
                
              $sql2 = "SELECT * FROM ConcessionMenu;";
              $result2 = mysqli_query($con, $sql2);
                
        
                        if (mysqli_num_rows($result2) > 0) {
                            
                             while($row2 = mysqli_fetch_assoc($result2)) { 
                                
                             if(${$row2["MenuID"]}!=NULL&&${$row2["MenuID"]}!=0){
                                 $total+=$row2["Price"]*${$row2["MenuID"]};
                             }
                              
                            }
                        }
                
                
                
                
                echo "<div class=\"total-right\">";
                  echo "<h1>";
                  echo $total;
                   echo " THB";
                   echo "</h1>";
                echo "</div>";
              echo "</div>";
              
              
              $point=0;
              if($row["MembercardID"]!=NULL)
              {$point=2*floor($total/50);}
              else
              {$point=floor($total/50);}
              
              
             echo "<div class=\"totalpoint\">";
               echo "<div class=\"total-left\">";
                 echo "<h1>Point</h1>";
               echo "</div>";
                
               echo "<div class=\"total-right\">";
                   echo "<h1>";
                   echo $point;
                   echo " PTs";
                   echo "</h1>";
                echo "</div>";
             echo "</div>";
            
            
            
        
            
            

          echo "</div>";
          
          
          if($row!=NULL){
          echo "<input type=\"submit\" value=\"submit\" name=\"submit\" id=\"submit\" class=\"btn-submit\">";
}
            echo "<a href=\"Admin-Menu.php\">";
        echo "<input type=\"button\" value=\"back\" class=\"btn-submit\">";
            echo "</a>";


 echo"<br><br>";
           
       echo "</form>";
        
        
        
     echo "</div>";
   








     if (isset($_POST['submit'])){

	
	    $orderid = uniqid("OD");
	    $OrderDateTime = date('Y-m-d h:i:s');
	    
	    $phone = mysqli_real_escape_string($con, $_POST['phone']);
	    $MN001 = mysqli_real_escape_string($con, $_POST['MN001']);
      	$MN002 = mysqli_real_escape_string($con, $_POST['MN002']);
      	$MN003 = mysqli_real_escape_string($con, $_POST['MN003']);
      	$MN004 = mysqli_real_escape_string($con, $_POST['MN004']);
      	$MN005 = mysqli_real_escape_string($con, $_POST['MN005']);
      	$MN006 = mysqli_real_escape_string($con, $_POST['MN006']);
	  
	    
	        $sql3="INSERT INTO ConcessionOrder (OrderID,RegisterID,BranchID,OrderDateTime)
	         VALUES ('$orderid','$registerid','0','$OrderDateTime')";
	         
	         
	       
	  if (!mysqli_query($con,$sql3)) {
	die('Error: ' . mysqli_error($con));
	}
	
      
  
      $sql2 = "SELECT * FROM ConcessionMenu;";
              $result2 = mysqli_query($con, $sql2);
                
        
                        if (mysqli_num_rows($result2) > 0) {
                            
                             while($row2 = mysqli_fetch_assoc($result2)) { 
                                
                             if(${$row2["MenuID"]}!=NULL&&${$row2["MenuID"]}!=0){
                                    
                                    
                                   for($i=1;  $i<=${$row2["MenuID"]}  ;$i++){ 
                                    $menu=$row2["MenuID"];
                                    $eachorderid=uniqid("EOD");
                                     $sql4="INSERT INTO EachConcessionOrder (EachOrderID,OrderID,MenuID)
	                                 VALUES ('$eachorderid','$orderid','$menu')";
	                                 
	                                  
	                                 if (!mysqli_query($con,$sql4)) {
	                                die('Error: ' . mysqli_error($con));
	                                    }
                                   }
                        
                             }
                              
                            }
                        }
                
             
          $sql4="UPDATE Register SET Point=Point+$point WHERE RegisterID=\"$registerid\";";
          echo $sql4;
	         
	  if (!mysqli_query($con,$sql4)) {
	die('Error: ' . mysqli_error($con));
	}
        
       
	echo "<meta http-equiv=\"refresh\" content=\"0; url='Admin-Menu.php'\" />";


     }


         ?>      
          
         
     
      
      
      
      
      <div class="home_content">
        <div class="detail-staff">
          <div class="bar-before-name"></div>
          <h1 class="name-staff">Monthida A.</h1>
          <img class="img-staff" 
            src="/pic/profilepic.png">
        </div>
      
       
      
      
      
      
      
      
      
    </div>  
    </div>
    <script>
      let btn = document.querySelector("#btn-slidetab");
      let sidebar = document.querySelector(".sidebar");
      
     btn.onclick = function(){
       sidebar.classList.toggle("active");
     }
         
      
    </script>
  </body>
  
      
    
</html>