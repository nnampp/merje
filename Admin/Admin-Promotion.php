<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/style2.css"/>
   <link rel="stylesheet" href="../css/style3.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
    <div class="all-in-promation">
      <h2>PROMOTION</h2>
      <input type="search" class="search-box-admin" placeholder="Search" />

        <form name="promotion" id="detial-promotion" method="post" enctype="multipart/form-data">
          <div class="detail-promotion">
            <div class="name-code">
              <h1>Name Code</h1>
              <input type="text" id="Cname" name="Cname" class="input-box" required>
            </div>
            <div class="detail-promo-content">
              <h1>Detail</h1>
              <textarea id="Detail-promo-code" name="Detail-promo-code" rows="6" cols="57" required></textarea>
            </div>
            
            
         <div class="photo-promo-content">
              <h1>Photo</h1>
             
                <label class="form_label" id="file-input">
                  <input type="file" id="form_input" name="img" accept="image/*" class="form_input">
                  <i class="fas fa-upload"></i>
                  <span class="form_text">Choose a Photo</span>
                </label>
                <p class="filename">
                  <p id="file-name">None</p>
                </p>
              
            </div>
            
            
            
            <div class="discount-available">
              <div class="Discount">
                <h1>Discount</h1>
                <div class="Baht">
                  <input type="radio" id="Baht" name="unit_value" value="BAHT" class="check-radio">
                  <label for="Baht" id="label-baht">Baht</label>
                  <input type="text" id="Baht-number" name="discountthb">
                </div>
                <div class="Percentage">
                  <input type="radio" id="Percentage" name="unit_value" value="PERCENTAGE" class="check-radio">
                  <label for="Percentage" id="label-percentage">Percentage</label>
                  <input type="text" id="Percentage-number" name="discountpercent">
                </div>
              </div>
              <div class="available">
                <h1 class="title-available">Available</h1>
                <input type="text" id="Available-number" name="available" required>
              </div>
            </div>
            <div class="during-time">
              <h1 class="title-number-time">During time</h1>
              <div class="select-date">
                <div class="select-Date">
                  <input type="text" name="daterange" class="date-input" required/>
                  
                </div>
              </div>
            </div>
          </div>
       
   
   
   
        <div class="btn-basic">
             <input class="btn-add-movie" type="submit" value="ADD" name="submit" style="margin:0px auto; display:block;" >
        
          
          
        </form>

       
       
        
        </div>
     </div>
      
       <?php
      
    if (isset($_POST['submit'])){
      $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection

    $promotioncode = uniqid("PRO");
    $promotionname = mysqli_real_escape_string($con, $_POST['Cname']);
	$promotiondetail = mysqli_real_escape_string($con, $_POST['Detail-promo-code']);
	

	
	$available = mysqli_real_escape_string($con, $_POST['available']);
	$discountthb= mysqli_real_escape_string($con, $_POST['discountthb']);
    $discountpercent= mysqli_real_escape_string($con, $_POST['discountpercent']);
    
    $daterange= mysqli_real_escape_string($con, $_POST['daterange']);
    
    $startdate = substr($daterange,0,10);
    $enddate= substr($daterange,13,10);
  
  $newstartdate=date("Y-m-d", strtotime($startdate));  
  $newenddate=date("Y-m-d", strtotime($enddate));  
 


 if(is_uploaded_file($_FILES['img']['tmp_name'])!=NULL)
     { $pathpromotionpic="/pic/$promotioncode.png";
     
            
     
	    	move_uploaded_file($_FILES['img']['tmp_name'], "/home/a5.cpe231.cpe.kmutt.ac.th/public_html/pic/$promotioncode.png");
     }
   else {$pathpromotionpic=NULL;}
     
   
     
 if( $discountthb!=NULL)
 {
	$sql="INSERT INTO Promotion (PromotionCode,PromotionName,PromotionDetail,PromotionPic,Available,DiscountTHB,PromotionStartDate,PromotionEndDate)
	VALUES ('$promotioncode','$promotionname','$promotiondetail','$pathpromotionpic','$available','$discountthb','$newstartdate','$newenddate')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}

	
 }    
 else {
     	$sql="INSERT INTO Promotion (PromotionCode,PromotionName,PromotionDetail,PromotionPic,Available,DiscountPercent,PromotionStartDate,PromotionEndDate)
	VALUES ('$promotioncode','$promotionname','$promotiondetail','$pathpromotionpic','$available','$discountpercent','$newstartdate','$newenddate')";
	if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
 }
     
     
    }
      
      ?>
    <div class="home_content">
        <div class="detail-staff">
          <div class="bar-before-name"></div>
          <h1 class="name-staff">Monthida A.</h1>
          <img class="img-staff" src="/pic/profilepic.png"/>
        </div>
    
       
      
      
      
      
      
      
      
    </div>  
    </div>
    <script>
      let btn = document.querySelector("#btn-slidetab");
      let sidebar = document.querySelector(".sidebar");
      
     btn.onclick = function(){
       sidebar.classList.toggle("active");
     }
     $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, 
        function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      }); 
      
      let check_discount = document.querySelector(".check-radio");
      let check_baht = document.querySelector("#Baht");
      let check_percentage = document.querySelector("#Percentage");
      let contentPercentage = document.querySelector(".Percentage");
      console.log(check_discount.value);
      console.log(check_baht.value);
      console.log(check_percentage.value);
      
      check_baht.onclick = function(){
       document.getElementById("Percentage").disabled = true;
       document.getElementById("Percentage").style.cursor = "no-drop";
       document.getElementById("Percentage-number").disabled = true;
        document.getElementById("Percentage-number").style.cursor = "no-drop";
        document.getElementById("Percentage-number").style.borderColor = "#cccccc";
       document.getElementById("label-percentage").style.color = "#cccccc"; 
     }
      check_percentage.onclick = function(){
       document.getElementById("Baht").disabled = true;
       document.getElementById("Baht").style.cursor = "no-drop";
       document.getElementById("Baht").disabled = true;
        document.getElementById("Baht").style.cursor = "no-drop";
        document.getElementById("Baht-number").style.borderColor = "#cccccc";
       document.getElementById("label-baht").style.color = "#cccccc"; 
     }
      let inputfile = document.getElementById("form_input");
      let filename = document.getElementById("file-name");
      inputfile.addEventListener('change',function(event){
        let uploadfilename = event.target.files[0].name;
        filename.textContent = uploadfilename;
      })
    </script>
  </body>
  
      
    
</html>