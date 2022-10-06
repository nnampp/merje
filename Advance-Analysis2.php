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
                <option>Income data for each movie</option>
                
              </select>
          </div>
          <div class="select-content_2"  id="select-content_2">
              <select id="dropbtn3" onclick="dropbtnchoose()" class="dropbtn">
        <?php     
        $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
         $dropbtn3 = mysqli_real_escape_string($con, $_POST['dropbtn3']);
         
         $sql = "SELECT MovieTitle, MovieID FROM Movie WHERE MovieID='$dropbtn3'";
                $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_assoc($result);
                                
            echo "<option value =\"".$dropbtn3."\" selected>".$row["MovieTitle"]."</option>";
                            
                        
         
         
         
        ?>
            
                <i class="fas fa-angle-down"></i>
               
            
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

<!-- analysis 3 graph-->
      
        <div class="detail-content-analy" id="graph-movie">
        <div class="items-sell">
          <div class="total-item-sell">
            <a class="alltext" href="#">
              <h1 class="title-item-sell">Total seats</h1>
              <p id="sum-seat-sell"></p>
            </a>
          </div>
          <div class="number-movie-screening">
            <a class="alltext" href="#">
              <h1 class="title-number-movie-screening">Total showtime</h1>
              <p id="number-movie-sell" ></p>
            </a>
          </div>
          <div class="total-price-sell">
            <a class="alltext" href="#">
              <h1 class="title-total-price-sell">Total income</h1>
              <p id="total-price-sell"></p>
            </a>
          </div> 
        </div>
        <div class="graph">
          <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
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
     
      
      let graphmovie = document.getElementById('graph-movie');
        let boxone = document.getElementById('sum-seat-sell');
      let boxtwo = document.getElementById('number-movie-sell');
      let boxthree = document.getElementById('total-price-sell');
       graphmovie.style.display = "block";
       
       const name_movie = ["Spider-Man: No Way Home", "The Batman", "The Desperate Hour"];
      const sum_seat_sell = ["12,345", "10,000", "5,000"];
      const number_movie_sell = ["312", "300", "250"]
      const total_price_sell = ["109 M THB", "90 M THB", "50 M THB"]
      
      
      
      
      
          
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
      
       <?php
            $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
         $movieid = mysqli_real_escape_string($con, $_POST['dropbtn3']);
         $daterange = mysqli_real_escape_string($con, $_POST['daterange']);
         
          $startdate = substr($daterange,0,10);
         $enddate= substr($daterange,13,10);
  
                $newstartdate=date("Y-m-d", strtotime($startdate));  
                $newenddate=date("Y-m-d", strtotime($enddate));  
                
                
               $sql2="SELECT COUNT(Showtime.ShowtimeID) AS SH
          FROM Showtime, Movie 
          Where Showtime.StartDateTime BETWEEN \"$newstartdate\" 
          AND \"$newenddate 23:59:59\" 
          AND Showtime.MovieID = Movie.MovieID 
          AND Movie.MovieID = \"$movieid\";";
          
         


        $result2 = mysqli_query($con, $sql2);
        mysqli_num_rows($result2);
          $row2 = mysqli_fetch_assoc($result2);  
                
                echo " boxtwo.innerHTML = \"".$row2["SH"]."\";";
                
                
           $sql1 = "SELECT Movie.MovieTitle AS MOVIE , SUM(SeatType.SeatPrice+TheaterType.TopUpPrice) AS INCOME, COUNT(*)AS SEAT
          FROM Movie, SeatType, TheaterType, Payment, Booking, BookingSeat, Seat, Showtime, Theater 
          WHERE Payment.PaymentStatus = '1' 
          AND Payment.BookingID = BookingSeat.BookingID 
          AND BookingSeat.BookingID = Booking.BookingID 
          AND BookingSeat.SeatID = Seat.SeatID 
          AND Seat.SeatTypeName = SeatType.SeatTypeName 
          AND Seat.TheaterID = Theater.TheaterID 
          AND Theater.TheaterTypeName = TheaterType.TheaterTypeName 
          AND Showtime.MovieID = Movie.MovieID 
          AND Booking.ShowtimeID = Showtime.ShowtimeID 
          AND Showtime.TheaterID = Theater.TheaterID 
          AND Showtime.StartDateTime BETWEEN \"$newstartdate\" 
          AND \"$newenddate 23:59:59\"
          AND Movie.MovieID = \"$movieid\";";     
         
          $result1 = mysqli_query($con, $sql1);
          mysqli_num_rows($result1);
          $row1 = mysqli_fetch_assoc($result1);
          
         echo "boxone.innerHTML = \"".$row1["SEAT"]."\";";
          
       //Get All Booking ID
          $sql4 = "SELECT Booking.BookingID AS bookingid, Promotion.PromotionCode AS promocode, Promotion.DiscountTHB AS thb, Promotion.DiscountPercent AS pc
          FROM Movie, SeatType, TheaterType, Payment, Booking, BookingSeat, Seat, Showtime, Theater, Promotion
          WHERE Payment.PaymentStatus = '1' 
          AND Payment.BookingID = BookingSeat.BookingID 
          AND BookingSeat.BookingID = Booking.BookingID 
          AND BookingSeat.SeatID = Seat.SeatID 
          AND Seat.SeatTypeName = SeatType.SeatTypeName 
          AND Seat.TheaterID = Theater.TheaterID 
          AND Theater.TheaterTypeName = TheaterType.TheaterTypeName 
          AND Showtime.MovieID = Movie.MovieID 
          AND Booking.ShowtimeID = Showtime.ShowtimeID 
          AND Showtime.TheaterID = Theater.TheaterID 
          AND Showtime.StartDateTime BETWEEN '$newstartdate' 
          AND '$newenddate 23:59:59'
          AND Movie.MovieID = \"$movieid\"
          AND Booking.PromotionCode = Promotion.PromotionCode
          GROUP BY Booking.BookingID;";
          

         echo "console.log(\"A\");";

         $discount=0;
           $result4 = mysqli_query($con, $sql4);
             
           while($row4 = mysqli_fetch_assoc($result4))
            { 
                
                if($row4["promocode"]!='0')
                {
                
                     if($row4["thb"]!='0'&&$row4["thb"]!=NULL)
                    {
                            $discount+=$row4["thb"];
                    }
                    else if($row4["pc"]!='0'&&$row4["pc"]!=NULL)
                    {
                         $boo = $row4["bookingid"];
               
                
                         $sql5="SELECT Booking.BookingID , SUM(SeatType.SeatPrice+TheaterType.TopUpPrice) AS B FROM Payment, 
                            BookingSeat, Booking, Seat, SeatType, Theater, TheaterType 
                             WHERE Payment.BookingID = BookingSeat.BookingID 
                            AND BookingSeat.BookingID = Booking.BookingID 
                            AND BookingSeat.SeatID = Seat.SeatID 
                             AND Seat.SeatTypeName=SeatType.SeatTypeName 
                              AND Seat.TheaterID = Theater.TheaterID
                                AND Theater.TheaterTypeName = TheaterType.TheaterTypeName
                                AND Payment.PaymentStatus='1'
                                AND Booking.BookingID ='$boo';";
                                  $result5 = mysqli_query($con, $sql5);
                                    $row5 = mysqli_fetch_assoc($result5);
                    
                                    $discount+=$row5["B"]*$row4["pc"]/100;
                    
                         }
                
                 }
 
            }
            
             
            
         $totalincome=0;
          $totalincome=$row1["INCOME"]-$discount;
         
          
         
          
          echo "boxthree.innerHTML = \"$totalincome\";";
          
        
        $sql3="SELECT COUNT(Showtime.ShowtimeID) AS S2, CAST(Showtime.StartDateTime AS DATE) AS D
          FROM Showtime, Movie 
          Where Showtime.StartDateTime BETWEEN \"$newstartdate\" 
          AND \"$newenddate 23:59:59\" 
          AND Showtime.MovieID = Movie.MovieID 
          AND Movie.MovieID = \"$movieid\"
          GROUP BY CAST(Showtime.StartDateTime AS DATE);";
    	
    	$result3 = mysqli_query($con, $sql3);
          mysqli_num_rows($result3);
          
          echo "var xValues = [''];";
          echo "var yValues = [''];";
          
      
          
           while($row3 = mysqli_fetch_assoc($result3)) { 
                            
                           
                             echo "xValues.push(\"".$row3["D"]."\");";
                             echo "yValues.push(\"".$row3["S2"]."\");";}
                             
                
                                
                                
                          
        
          
          
        
       
       ?>
      
   
    
          
          
          
          
          
          
          
           
           
           
            graphmovie.classList.toggle("active");
           new Chart("myChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            fill: false,
            backgroundColor: "#B45E5E",
            borderColor: "#B45E5E",
            data: yValues,
            labels: 'Number of Showtime in each day',
          }]
        },
        options: {
          legend: {display: false},
          scales: {
            yAxes: [{ticks: {min: 0, max:45}}],
          },
          title: {
          display: true,
          text: "Number of Showtime in each day",
          fontSize: 24,
          fontFamily:"Kanit",
          fontColor: "#252733",
          verticalAlign: "top", 
          horizontalAlign: "left"
          }
        }
    });
    
    
     

      </script>

    
    
  </body>
  
      
    
</html>