<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\style2.css">
     <link rel="stylesheet" href="css\styleadvance.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap" rel="stylesheet">
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
          <a href="Advance-AnalysisTRY.php">
            <i class="fas fa-chart-pie"></i>
            <span class="links_name">Overview</span>
            <span class="tooltip">Overview</span>
          </a>
        </li>
        
        <li>
          <a href="Admin/Admin-Branch.php">
            <i class="fas fa-building"></i>
            <span class="links_name">Branch</span>
            <span class="tooltip">Branch</span>
          </a>
        </li>
        
        <li>
          <a href="Admin/Admin-Theater.php">
            <i class="fas fa-theater-masks"></i>
            <span class="links_name">Theater</span>
            <span class="tooltip">Theater</span>
          </a>
        </li>
        
        <li>
          <a href="Admin/Admin-Movie.php">
            <i class="fas fa-ticket-alt"></i>
            <span class="links_name">Movie</span>
            <span class="tooltip">Movie</span>
          </a>
        </li>
        
        <li>
          <a href="Admin/Admin-Showtime.php">
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
          <a href="Admin/Admin-Promotion.php">
            <i class="fas fa-percent"></i>
            <span class="links_name">Promotion</span>
            <span class="tooltip">Promotion</span>
          </a>
        </li>
        
        <li>
          <a href="Admin/Admin-Menu.php">
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
    <div class="content-analysis">
      <div clss="all-select">
        <h1 class="title-header">Overview</h1>
        <div class="select-content">
          <div class="select-content_1">
             <select id="dropbtn" onclick="dropbtnmenu()" class="dropbtn">
                <i class="fas fa-angle-down"></i>
                <option>Show sales, net income of beverages, popcorn, etc.</option>
                
              </select>
          </div>
          <div class="select-content_2"  id="select-content_2" disabled>
            <select id="dropbtn2" onclick="dropbtnchoose()" class="dropbtn" disabled>
                <i class="fas fa-angle-down"></i>
                <option>-</option>
            
              </select>
          </div>
        </div>
        <div class="select-date">
          <p>Time range : </p>
          <div class="select-Date">
              <?php
              $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");

             $daterange = mysqli_real_escape_string($con, $_POST['daterange']);
              
              echo "<input type=\"text\" name=\"daterange\" id=\"daterange\" class=\"date-input\" value=\"".$daterange."\" disabled/>";
              
              ?>
             
            
          </div>
          <div id="submitbut" class="btn-basic">
              <a href="Advance-AnalysisTRY.php">
                <input class="btn-add-movie" type="button" value="BACK" name="BACK" style=" auto; display:block;"> 
              </a>
       </div>
        </div>
      </div>
      
      <!-- analysis 5 -->
      <div class="detail-content-analy" id="food-movie">
        <div class="grid-container">
          <div class="grid-item">
            <div class="title-icon">
              <div class ="title-name">
                <h1>Date/Month/Year</h1>
              </div>
              
            </div>
          </div>
          
          <div class="grid-item">
            <div class="title-icon">
              <div class ="title-name">
                <h1>Total sales</h1>
              </div>
              
            </div>
          </div> 
          
          <div class="grid-item">
            <div class="title-icon">
              <div class ="title-name">
                <h1>Total income</h1>
              </div>
              
            </div>
          </div> 
        <?php    
             $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
             $daterange = mysqli_real_escape_string($con, $_POST['daterange']);
             
               $startdate = substr($daterange,0,10);
                 $enddate= substr($daterange,13,10);
  
                $newstartdate=date("Y-m-d", strtotime($startdate));  
                $newenddate=date("Y-m-d", strtotime($enddate));  
                
 
             
                
            for($i=$newstartdate;$i<=$newenddate; $i=date("Y-m-d", strtotime($i. ' + 1 days')) ){
                $sql = "SELECT SUM(m.Price) as TOTAL, COUNT(*) as SALES FROM ConcessionMenu m,EachConcessionOrder e WHERE e.MenuID=m.MenuID AND e.OrderID 
                    IN (SELECT c.OrderID FROM ConcessionOrder c WHERE c.OrderDateTime BETWEEN '$i' AND '$i 23:59:59');";
    
               
                $newi=date("D d-m-y", strtotime($i));  
                $result = mysqli_query($con,$sql);
                 $row = mysqli_fetch_array($result);
    
                echo "<div class=\"grid-item\">".$newi."</div>";
                if($row["SALES"]!=0)
                 echo "<div class=\"grid-item\">".$row["SALES"]."</div>";
                 else
                 echo "<div class=\"grid-item\">-</div>";
                 
                if($row["TOTAL"]!=0)
                 echo "<div class=\"grid-item\">".$row["TOTAL"]."</div>";
                 else
                 echo "<div class=\"grid-item\">-</div>";
                 
                 
    
    }
     
                
                
                
        
        ?>
         
        
          
        </div>
      </div>
      
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
      let foodmovie = document.getElementById('food-movie');
      foodmovie.classList.toggle("active");
         dropbtn2.style.background = "#cccccc";
         dropbtn2.style.cursor = "no-drop";
         foodmovie.style.display = "block";
      
      
      
      
      
      
      
          
     btn.onclick = function(){
       sidebar.classList.toggle("active");
     }
     $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, 
        function(start, end, label) {
          console.log("A new date selection was made: " + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY'));
        });
      });
      
      
     

      </script>

    
    
  </body>
  
      
    
</html>