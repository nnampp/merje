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
            <br>
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
<form name="advm" id="advm" method="post">  
    <div class="content-analysis">
      <div clss="all-select">
        <h1 class="title-header">Overview</h1>
        <div class="select-content">
          <div class="select-content_1">
             <select id="dropbtn" name="dropbtn" class="dropbtn" required>
                <i class="fas fa-angle-down"></i>
                <option disabled selected value></option>
                <option value="Adv1">The daily income from movie tickets of each branch</option>
                <option value="Adv2">Income data for each movie</option>
                <option value="Adv3">Top 10 movies that can generate the most income each month</option>
                <option value="Adv4">Show sales, net income of beverages, popcorn, etc.</option>
              </select>
        
          </div>
      
          <div class="select-content_2"  id="select-content_2" >
            <select id="dropbtn3" name="dropbtn3" class="dropbtn" required>
                <i class="fas fa-angle-down"></i>
                <option disabled selected value></option>
            
                
              </select>
          </div>
     
          
                
                
             </select>
          </div>
        </div>
        
        
        <div class="select-date">
          <p>Time range : </p>
          <div class="select-Date">
            <input type="text" name="daterange" id="daterange" class="date-input" required/>
          </div>
          <div id="submitbut" class="btn-basic">
        
       </div>
        </div>
        
        
    
        
      </div>
    
    
    
</form>
    
    
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
     $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, 
        function(start, end, label) {
          console.log("A new date selection was made: " + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY'));
        });
      });    
      
      
      
       $("#dropbtn").change(function(){
        var dropbtn = $(this).val();
		console.log(dropbtn);
        $.ajax({
            url: 'AjaxCall/getDropbtn3.php',
            type: 'post',
            data: {dropbtn:dropbtn},
            dataType: 'JSON',
            success:function(response){

                var len = response.length;
			  var submitfile = response[0]['submitfile'];
			
		
              $("#dropbtn3").empty();
              $("#dropbtn3").append("<option disabled selected value></option>");
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                   
                    if(id=="NON")
                    {
                         $("#dropbtn3").append("<option selected value='NON'>-</option>");
                        
                    }
                    else
                    $("#dropbtn3").append("<option value='"+id+"'>"+name+"</option>");
                    
                    }
                 
                 
                 $("#submitbut").empty();
                 $("#submitbut").append("<input class=\"btn-add-movie\" type=\"submit\" value=\"ADD\" name=\"submit\" style=\" auto; display:block;\" form=\"advm\" formaction='"+submitfile+"' > ");
                 
                    
                    }
         
        });
    });

      
      
      
      
      
      </script>

    
    
  </body>
  
      
    
</html>