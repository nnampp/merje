<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/style2.css"/>
    <link rel="stylesheet" href="../css/style6.css">
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

        <form name="manu" id="detial-manu" method="post" action="Admin-Menu-Confirm.php">
          <div class="detial-manu">
          
            <div class="detial-manu1"> <!---phone--->
              <label for="tel">Phone</label>
              <input
                type="tel"
                id="phone"
                name="phone"
                placeholder="09xxxxxxxx"
                pattern="[0-9]{10}"
                class="detialmanu-box"
                required/> 
            </div>
            
            <div class="head-of-manu">
              <h1>List</h1>
              <h1>Size</h1>
              <h1>Price</h1>
              <h1>Order</h1>
            </div>
            
            <div class="detial-manu2"> <!---aboutmanu--->
              
              <div class="list">
                
                <h3 class="popcorn">
                  Popcorn
                </h3>
                <h3 class="beverage">
                  Beverage
                </h3>
              </div>
              
              <div class="size">
                 
                <div class="size16">
                  <h2>16</h2> <h3>Oz.</h3>
                </div>
                
                <div class="size24">
                  <h2>24</h2> <h3>Oz.</h3>
                </div>
                
                <div class="size85">
                  <h2>85</h2> <h3>Oz.</h3>
                </div>
                
                <div class="size16">
                  <h2>16</h2> <h3>Oz.</h3>
                </div>
                
                <div class="size24">
                  <h2>24</h2> <h3>Oz.</h3>
                </div>
                
                <div class="size85">
                  <h2>85</h2> <h3>Oz.</h3>
                </div>
              </div>
              
              <div class="price">
                
                <div class="price16">
                  <h2>150</h2> <h3>Baht</h3>
                </div>
                
                <div class="price24">
                  <h2>300</h2> <h3>Baht</h3>
                </div>
                
                <div class="price85">
                  <h2>600</h2> <h3>Baht</h3>
                </div>
                
                <div class="price16">
                  <h2>150</h2> <h3>Baht</h3>
                </div>
                
                <div class="price24">
                  <h2>300</h2> <h3>Baht</h3>
                </div>
                
                <div class="price85">
                  <h2>600</h2> <h3>Baht</h3>
                </div>
              </div>
              
              <div class="order">
                
                  <input type="number" id="MN001" name="MN001" min="0" max="20">
  
                   <input type="number" id="MN002" name="MN002" min="0" max="20">
                   
                  <input type="number" id="MN003" name="MN003" min="0" max="20"> 
                  
                  <input type="number" id="MN004" name="MN004" min="0" max="20">
                  <input type="number" id="MN005" name="MN005" min="0" max="20"> 
                  <input type="number" id="MN006" name="MN006" min="0" max="20">   
                
              </div>
              
             
              
              
              
              
              
              
              
              
              
              
            </div>
            
            
            
          
            
            
            
            
            
            

          </div>
          
          <input type="submit" value="SUBMIT" class="btn-submit">

          
          
          <br><br>
           
        </form>
        
        
        
      </div>
   
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
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