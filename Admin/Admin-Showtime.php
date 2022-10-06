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
   <link rel="stylesheet" href="../css/style.css" />
     <link rel="stylesheet" href="../css/style2.css" />
    <link rel="stylesheet" href="../css/style5.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

      <div class="showtime-admin">
        <h2>SHOWTIME</h2>

        <input type="search" class="search-box-admin" placeholder="Search" />

        <form name="showtime" id="detial-showtime" method="post" enctype="multipart/form-data">
          <div class="detial-showtime">
          <div class="top-detial-showtime">
              
              <label for="movie">Movie</label>
            <select name="movie" id="movie" class="detialshowtime-box">
              <option disabled selected value></option>
              <?php 
              $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
               $sql = "SELECT MovieID, MovieTitle, DateIn, DateOut FROM Movie";
                $result = mysqli_query($con, $sql);
               
                        if (mysqli_num_rows($result) > 0) {
                            
                             while($row = mysqli_fetch_assoc($result) ) { 
                                 $today = date("Y-m-d");
                              if($row["DateOut"] > $today)
                              {echo "<option value=\"".$row['MovieID']."\">".$row["MovieTitle"]."</option>";}
                              
                            }
                        }
              ?>
              
            </select>
            
            
              



            
            

            
            <label for="branch">Branch</label>
            
            <select name="branch" id="branch" class="detialshowtime-box" onchange="myFunction();">
              <option disabled selected value></option>
              
        <?php 
              
              $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
               $sql = "SELECT BranchID, BranchName FROM Branch";
              
                $result = mysqli_query($con, $sql);
             
                        if (mysqli_num_rows($result) > 0) {
                            
                             while($row = mysqli_fetch_assoc($result) ) {                              
                              if($row['BranchID']!=0)
                              {echo "<option value=\"".$row['BranchID']."\">".$row["BranchName"]."</option>";}
                              
                            }
                        }
              ?>
             
            </select>
            
    <p id="demo"></p>        
            
      <script>
function myFunction() {
  console.log("just check");
    /*var x = document.getElementById("branch").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;*/
}
</script>      
           
          
            <label for="theater">Theater</label>
            <select name="theater" id="theater" class="detialshowtime-box">
              <option disabled selected value></option>
               </select>          
                      
                      
                      
                      
                      
                      
                       
             
              
              
            


            <label for="date">Date</label>
            <input type="date" name="date" class="detialshowtime-box" />

            <label for="time">Time:</label>
            <input
              type="time"
              id="time"
              name="time"
              class="detialshowtime-box"
            />
        
          <div class="soundtrack">
            <label for="soundtrack">Soundtrack:</label>
            <input type="radio" id="EN/TH" name="soundtrack" value="EN/TH" />
            <label for="EN/TH">EN/TH</label>
            <input type="radio" id="TH/--" name="soundtrack" value="TH/--" />
            <label for="TH/--">TH/--</label>
          </div>
        </div>
            
            
        <div class="clearbtn">
          <input type="reset" value="Clear" class="clear-btn2" />  
        </div>
          
          </div>
         <div class="btn-basic">
             <input class="btn-add-movie" type="submit" value="ADD" name="submit" style="margin:0px auto; display:block;" >
        
          
         

      
        
        
        </div>
        
        </form>
        
        
      </div>

      <?php
        echo "<script>console.log(\"before\");</script>";
      	if(isset($_POST['submit'])){
         
        	$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");

            $showtimeid = uniqid("SHT");
            $movid = mysqli_real_escape_string($con, $_POST['movie']);
            $branchid = mysqli_real_escape_string($con, $_POST['branch']);
            $theaterid = mysqli_real_escape_string($con, $_POST['theater']);
            $date = mysqli_real_escape_string($con, $_POST['date']);
            $time = mysqli_real_escape_string($con, $_POST['time']);
            $soundtrack = mysqli_real_escape_string($con, $_POST['soundtrack']);
          
			$datetime = $date . ' ' . $time;          
          
          	if($soundtrack == 'EN/TH')
            { $soundtrack = 1; }
            else $soundtrack = 0;
          
           $sql="INSERT INTO `Showtime`(`ShowtimeID`, `StartDateTime`, `MovieID`, `TheaterID`, `IsSubtitles`) VALUES ('$showtimeid','$datetime','$movid','$theaterid','$soundtrack')";
          
          /*$sql_period = "SELECT Period FROM Movie WHERE MovieID=\"$movid\"";
          $sql_record = "SELECT CAST(s.StartDateTime AS TIME),s.MovieID,m.Period FROM Showtime s,Movie m WHERE s.MovieID = m.MovieID AND CAST(s.StartDateTime AS date) = \"$date\"";
			
          $period = mysqli_query($con,$sql_period);
          $records = mysqli_query($con,$sql_record);
		
          $count = 0;

          //echo mysqli_num_rows($records);
          //try to avoid time overlap but it doesn't work yet
          if(mysqli_num_rows($records)>0) {
              while($row = mysqli_fetch_assoc($records))
              {
                  echo $row['CAST(s.StartDateTime AS TIME)'];
                  if(($time > $row['CAST(s.StartDateTime AS TIME)']+$row['m.period']) || ($time+$period > $row['starttime']))
                      $count = $count + 1;
              }
          }*/
          
            //if($count == 0) {
              if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
              }
        	//}
          
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
      
  

    $("#branch").change(function(){
        var branchid = $(this).val();
		console.log(branchid);
        $.ajax({
            url: '../AjaxCall/getTheaterOfBranch.php',
            type: 'post',
            data: {brch:branchid},
            dataType: 'JSON',
            success:function(response){

                var len = response.length;
				
                $("#theater").empty();
              $("#theater").append("<option disabled selected value></option>");
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#theater").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });


    </script>
  </body>
</html>

