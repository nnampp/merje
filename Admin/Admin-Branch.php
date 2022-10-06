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
    <link rel="stylesheet" href="../css/style2.css"/>
     <link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/style4.css"/>
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
        
    <form name="branch1" id="editdel" method="post">       
     
        <select id="branchid" name="branchid" class="search-box-admin selectpicker detialbranch-box" data-live-search="true" title="Please select" required>
            <option disabled selected value>Select the branch</option>
              <?php 
              $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
               $sql = "SELECT BranchName, BranchID FROM Branch ORDER BY BranchName";
                $result = mysqli_query($con, $sql);
               
                        if (mysqli_num_rows($result) > 0) {
                            
                             while($row = mysqli_fetch_assoc($result)) { 
                                
                              if($row['BranchID']!='0')
                              echo "<option value=\"".$row['BranchID']."\">".$row["BranchName"]."</option>";
                              
                            }
                        }
              ?>
              
            </select>
      <!--  <input type="search" class="search-box-admin" placeholder="Search" />  -->
      
    
      </form>

        <form name="branch" id="detial-branch" method="post">
          <div class="detial-branch">
            <div class="top-detial-branch">
              <label for="ฺBrachName">Branch Name</label>
              <input type="text" class="detialbranch-box" name="branchname" required/>

              <label for="region">Region</label>
              <select name="region" id="region" class="detialbranch-box">
                <option disabled selected value></option>
                <option value="BANGKOK AND METROPOLITAN REGION">Bangkok and Metropolitan Region</option>
                <option value="CENTRAL REGION">Central Region</option>
                <option value="NORTHERN REGION">Northern Region</option>
                <option value="NORTHEASTERN REGION">Northeastern Region</option>
                <option value="EASTERN REGION">Eastern Region</option>
                <option value="SOUTHERN REGION">Southern Region</option>
              </select>
              
              <label for="branch-address">Branch Address</label>
              <input type="text" class="detialbranch-box" name="branchaddress" id="branchaddress" required/>

              <label for="tel">Tel</label>
              <input
                type="tel"
                id="phone"
                name="phone"
                placeholder="09xxxxxxxx"
                pattern="[0-9]{10}"
                class="detialbranch-box"
              />
            </div>

            <div class="clearbtn">
              <input type="reset" value="Clear" class="clear-btn2" />
            </div>
          </div>
          
          <div class="btn-basic">
             <input class="btn-add-movie" type="submit" value="ADD" name="submit" style="margin:0px auto; display:block;" >
        
          
          
        </form>

       
       
        <input class="btn-edit-movie" type="submit" value="EDIT" name="edit" style="margin:0px auto; display:block;" form="editdel" formaction="Admin-Branch-Edit.php">
   
          <input class="btn-delete-movie" type="submit" value="DELETE" name="delete" style="margin:0px auto; display:block;" form="editdel" formaction="Admin-Branch-Delete.php">
         

        
        </div>
      </div>
      
       <?php
      
    if (isset($_POST['submit'])){
      $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection

    $branchid = uniqid("MJ");
    $branchname = mysqli_real_escape_string($con, $_POST['branchname']);
	$region = mysqli_real_escape_string($con, $_POST['region']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$branchaddress= mysqli_real_escape_string($con, $_POST['branchaddress']);


	$sql="INSERT INTO Branch (BranchID,BranchName,Region,BranchAddress,BranchTelNo)
	VALUES ('$branchid','$branchname','$region','$branchaddress','$phone')";
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

