<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MERJE</title>
    <link
      rel="icon"
      type="image/x-icon"
      href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678"
    />
    <link rel="stylesheet" href="/css/style2.css" />
     <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/style4.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/bootstrap-select.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="dist/js/bootstrap-select.js"></script>

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
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

      <div class="branch-admin">
        <h2>BRANCH</h2>
        
        <!--<input type="search" class="search-box-admin" placeholder="Search" />-->
       
            

        <form name="branchdel id="branchdel" method="post">
          <div class="detial-branch">
            <div class="top-detial-branch">
            
            
        <label for="ฺฺBrachName">Branch Name</label>
               <select id="selectbranch" name="selectbranch" class="search-box-admin selectpicker detialbranch-box" data-live-search="true" title="Please select" readonly>
    
    
              <?php 
              $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
              
              $branchid= mysqli_real_escape_string($con, $_POST['branchid']);
              
                 $sql3 = "SELECT Region, BranchAddress, BranchTelNo, BranchID, BranchName FROM Branch WHERE BranchID=\"".$branchid."\";";
                 $result3 = mysqli_query($con, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
              
              echo "<option value =\"".$branchid."\" selected>".$row3["BranchName"]." ( BranchID: ".$row3["BranchID"]." )</option>";
         echo "</select>";
        
        
        
             
              echo "<label for=\"region\">Region</label>";
              echo "<input type=\"text\" class=\"detialbranch-box\" name=\"region\" id=\"region\" value=\"".$row3['Region']."\" required disabled/>";
              
              
             echo "<label for=\"branch-address\">Branch Address</label>";
              echo "<input type=\"text\" class=\"detialbranch-box\" name=\"branchaddress\" id=\"branchaddress\" value=\"".$row3['BranchAddress']."\" required disabled/>";
                
                
                
              echo "<label for=\"tel\">Tel</label>";
             echo" <input type=\"tel\" id=\"phone\" name=\"phone\" value=\"".$row3["BranchTelNo"]."\" pattern=\"[0-9]{10}\" class=\"detialbranch-box\" disabled/>";
            
            echo "</div>";
            
            ?>

            <div class="clearbtn">
              <input type="reset" value="Clear" class="clear-btn2" />
            </div>
          </div>
          
         
        <div class="btn-basic">
  
        <a href="Admin-Branch.php">
             <input class="btn-add-movie" type="button" value="BACK" name="back" style="margin:0px auto; display:block;" >
        </a>
         <input class="btn-edit-movie" type="submit" value="CONFIRM" name="delnow" style="margin:0px auto; display:block;">
          
          
        </form>


 
        
        </div>
      </div>
      
       <?php
      
       
    if (isset($_POST['delnow'])){
      $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection



 
    $branchid = mysqli_real_escape_string($con, $_POST['selectbranch']);
	



	$sql="DELETE FROM Branch WHERE BranchID=\"".$branchid."\";";
	

	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	
	echo "<meta http-equiv=\"refresh\" content=\"0; url='Admin-Branch.php'\" />";
	
      
    }
      
      
      ?>
      
      

      <div class="home_content">
        <div class="detail-staff">
          <div class="bar-before-name"></div>
          <h1 class="name-staff">Monthida A.</h1>
          <img
            class="img-staff"
            src="/pic/profilepic.png"
          />
        </div>
      </div>
    </div>

    <script>
      let btn = document.querySelector("#btn-slidetab");
      let sidebar = document.querySelector(".sidebar");

      btn.onclick = function () {
        sidebar.classList.toggle("active");
      };
    </script>
  </body>
</html>

