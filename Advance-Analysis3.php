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
                <option>Top 10 movies that can generate the most income each month</option>
                
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
             $startdate = substr($daterange,0,10);
  
             $newmonth=date("m-Y", strtotime($startdate));  
  
    
            
              
              echo "<input type=\"text\" name=\"daterangee\" id=\"daterangee\" class=\"date-input\" value=\"".$newmonth."\" disabled/>";
              
              ?>
             
            
          </div>
          <div id="submitbut" class="btn-basic">
              <a href="Advance-AnalysisTRY.php">
                <input class="btn-add-movie" type="button" value="BACK" name="BACK" style=" auto; display:block;"> 
              </a>
       </div>
        </div>
      </div>
      
      
      <!-- analysis 4 -->
      <div class="detail-content-analy" id="price-movie">
        <div class="grid-container">
          <div class="grid-item">
            <div class="title-icon">
              <div class ="title-name">
                <h1>Movie Title</h1>
              </div>
              
            </div>
          </div>
          <div class="grid-item">
            <div class="title-icon">
              <div class ="title-name">
                <h1>Total seats</h1>
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
          <!--1st row-->
          <?php
          $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
          $daterange = mysqli_real_escape_string($con, $_POST['daterange']);
          $startdate = substr($daterange,0,10);
  
           $month=date("m", strtotime($startdate));  
          $movieid=array();
          $totalincome=array();
          $seat=array();
          
          $sql="SELECT Movie.MovieTitle AS MOVIE , SUM(SeatType.SeatPrice+TheaterType.TopUpPrice) AS INCOME, COUNT(*)AS SEAT , Movie.MovieID AS mov
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
          AND Showtime.StartDateTime BETWEEN \"2022-$month-01\" 
          AND \"2022-$month-31 23:59:59\" 
          GROUP BY Movie.MovieID 
          ORDER BY INCOME DESC;";
          
          
            $result = mysqli_query($con, $sql);
                    
                       if (mysqli_num_rows($result) > 0) {
                            
                             while($row = mysqli_fetch_assoc($result)) { 
                                 
                                 $discount=0;
                                 $movid=$row["mov"];
                                 
                                 //Calculate discount on each movie
                                 
                                 
                                 //Find all booking for that movie
                                 $sql2="SELECT Movie.MovieID, Booking.BookingID AS booking, Promotion.PromotionCode AS promocode, Promotion.DiscountTHB AS thb, Promotion.DiscountPercent AS pc 
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
                                 AND Showtime.StartDateTime BETWEEN \"2022-$month-01\" AND \"2022-$month-31 23:59:59\"
                                 AND Booking.PromotionCode = Promotion.PromotionCode 
                                 AND Movie.MovieID = \"$movid\"
                                 GROUP BY Booking.BookingID;";
                                 
                                 $result2 = mysqli_query($con, $sql2);
                                 
                                 while($row2 = mysqli_fetch_assoc($result2))
                                 {
                                     if($row2["promocode"]!='0')
                                     {
                                         if($row2["thb"]!='0'&&$row2["thb"]!=NULL)
                                             {
                                                     $discount+=$row2["thb"];
                                                 }
                                         else if($row2["pc"]!='0'&&$row2["pc"]!=NULL)
                                            {
                                                 $boo = $row2["booking"];
               
                
                                                        $sql3="SELECT Booking.BookingID , SUM(SeatType.SeatPrice+TheaterType.TopUpPrice) AS B 
                                                        FROM Payment, BookingSeat, Booking, Seat, SeatType, Theater, TheaterType 
                                                         WHERE Payment.BookingID = BookingSeat.BookingID 
                                                         AND BookingSeat.BookingID = Booking.BookingID 
                                                             AND BookingSeat.SeatID = Seat.SeatID 
                                                          AND Seat.SeatTypeName=SeatType.SeatTypeName 
                                                          AND Seat.TheaterID = Theater.TheaterID
                                                           AND Theater.TheaterTypeName = TheaterType.TheaterTypeName
                                                          AND Payment.PaymentStatus='1'
                                                             AND Booking.BookingID ='$boo';";
                                                    
                                                      $result3 = mysqli_query($con, $sql3);
                                                     $row3 = mysqli_fetch_assoc($result3);
                    
                                                    $discount+=$row3["B"]*$row2["pc"]/100;
                    
                                                  } 
                                
                                     }
                                
                                 }
                                 
                                 
                                 
                                 $totalincome2=$row["INCOME"]-$discount;
                                 
                                 
                                 
                                 array_push($movieid,$row["MOVIE"]);
                                 array_push($totalincome,$totalincome2);
                                 array_push($seat,$row["SEAT"]);
                                 
                                 
                                  //  echo "<div class=\"grid-item\">".$row["MOVIE"]."</div>";
                                  //  echo " <div class=\"grid-item\">".$row["SEAT"]."</div>";
                                   // echo "<div class=\"grid-item\">".$row["INCOME"]."</div>";
                                
                            }
                        }
                        
                   $temp1=0;     
                        
                        
                        $n=mysqli_num_rows($result);
                       
                       
                       for($k=0;$k<$n;$k++)
                        {
                        for($j=0;$j<$n-1-$k;$j++)
                        {
                            if($totalincome[$j]>$totalincome[$j+1])
                            {
                                $temp1 = $totalincome[$j];
                                $totalincome[$j] =$totalincome[$j+1];
                                $totalincome[$j+1] = $temp1;
                                
                                 $temp1 = $movieid[$j];
                                $movieid[$j] =$movieid[$j+1];
                                $movieid[$j+1] = $temp1;
                                
                                 $temp1 = $seat[$j];
                                $seat[$j] =$seat[$j+1];
                                $seat[$j+1] = $temp1;
                            }
                            
                        }
                        }
                        
                        
                        
                        
                        for($i=$n-1;$i>=$n-10;$i--)
                        {
                            
                              echo "<div class=\"grid-item\">".$movieid[$i]."</div>";
                            echo " <div class=\"grid-item\">".$seat[$i]."</div>";
                            echo "<div class=\"grid-item\">".$totalincome[$i]."</div>";
                            
                            
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
      let pricemovie = document.getElementById('price-movie');
     
     
      pricemovie.classList.toggle("active");
        
         pricemovie.style.display = "block";
       
      
      
      
      
      
      
      
          
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