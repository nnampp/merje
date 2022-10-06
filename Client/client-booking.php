<?php
  $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
  // Check connection
  if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	session_start();

	if(isset($_POST['submitsignin'])){ //check if form was submitted
            $_SESSION['submitsignin'] = $_POST['submitsignin'];
            $_SESSION['email'] = $_POST['email']; //get input text
            $_SESSION['password'] = $_POST['password'];
        }

    	$sql = "SELECT * FROM Register WHERE Email = '".$_SESSION['email']."' AND Password = '".$_SESSION['password']."' ";
          	$result = mysqli_query($con,$sql);
          
          	if(mysqli_num_rows($result)==1) {
              $row = mysqli_fetch_array($result);
              $_SESSION['RegisterID'] = $row['RegisterID'];
              $_SESSION['Name'] = $row['Name'];
              $_SESSION['MembercardID'] = $row['MembercardID'];              
        }
    
        if(isset($_POST['submitsignout'])) {
            session_unset();
            session_destroy();
        }

		if(isset($_GET['movieid'])){
        	//echo $_GET['movieid'];
          	$_SESSION['MovieChoose'] = $_GET['movieid']; 
            $moviechoose = $_SESSION['MovieChoose'];
          //session doesn't work in the next page but i sent it through ajax
        }

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <script src="../script.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>
  <body>
    <header class = "Navbar">
      <div class = "Navbar-container">
        <div class ="Menu">
           <div class ="logo">
            <img src = "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678"/>
          </div>
            <div class ="Menu-content">
              <ul class="nav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="client-theater.php">THEATER</a></li>
                <li><a href="client-news.php">NEWS</a></li>
                <li><a href="client-promotion.php">PROMOTIONS</a></li>
                <li><a href="#faq">FAQ</a></li> 
                <li><img src = "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/_______________2565_02_04______20_55_1.png?v=1650037162676" height="78" width="125" <?php if((isset($_SESSION['RegisterID']))&&($_SESSION['MembercardID']!=NULL)) echo "onclick=\"openPage('client-merje-plus-mem.php');\""; else echo "onclick=\"openPage('client-merje-plus-no-mem.php');\""; ?>/></li>
              </ul>
            </div>
            <div class ="Search-Profile">
              <div class = "Search">
                <input type="search" class="search-box" placeholder="Search">
                <img src = "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector_16.png?v=1650040678922" height="20" width="20"/>
              </div>
              <div class = "Profile">
                 <img onclick="openForm()" src = "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/275290341_1406417199817189_5767133339777551664_n%207.png?v=1650040748846"/>
              </div>
            </div>
        </div>
      </div>
        
    </header>
    
    <div class="form-popup" id="myForm">
  <form class="form-container" method="POST">
    <?php 
      if(isset($_SESSION['RegisterID'])) {
        echo "<br>&nbsp;&nbsp;&nbsp;You're signed in !!<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo $_SESSION['Name'];
        echo "  ";
        if($_SESSION['MembercardID']!=NULL) echo "(Membership)";
        echo "<br><br>";
        echo "<div class=\"pls\">";
        echo "<button type=\"submit\" class=\"btn\" name=\"submitsignout\">sign out</button>
                <button type=\"button\" class=\"btn cancel\" name=\"cancel\" onclick=\"closeForm();\">Cancel</button>
            </div>";
      }
      else {
        echo "<input type=\"Email\" class=\"LoginBox\" placeholder=\"Email\" name=\"email\" required>";
        echo "<input type=\"Password\" class=\"LoginBox\" placeholder=\"Password\" name=\"password\" required>";
        echo "<div class=\"pls\">";
        echo "<button type=\"submit\" class=\"btn\" name=\"submitsignin\">sign in</button>
                <a href=\"client-register.php\"><button type=\"button\" class=\"btn cancel\" >Register</button></a>
                <button type=\"button\" class=\"btn cancel\" name=\"cancel\" onclick=\"closeForm();\">Cancel</button>
            </div>";
        if(isset($_SESSION['submitsignin']))
          echo "<script> alert(\"Email or Password is incorrect\"); </script>";
      		session_unset();
      }

    ?>
  </form>
</div> 
 
    <div class= "booking">
      <div class= "Main-Detail-Movie-Booking">
        <?php
        		$sql_mv = "SELECT * FROM Movie WHERE MovieID='$moviechoose'";
        		$result_mv = mysqli_query($con,$sql_mv);
        		$row_mv = mysqli_fetch_array($result_mv);
        
        		echo "<img class=\"img-movie\" src=\"..".$row_mv['Poster']."\" width=\"212px\" height=\"313px\"/>
                    <div class=\"All-Detail-Movie\">
                      <p class =\"Start-Date\">".$row_mv['DateIn']."</p>
                      <h1 class=\"Name-Movie\">".$row_mv['MovieTitle']."</h1>
                      <div class=\"Genre\">
                        <h1>Genre : </h1>
                        <p>Action, Adventure, Sci-Fi howwwww idkkkkkkkkkk</p>
                      </div>
                      <div class=\"Rate-Sub\">
                        <h1>Rate : </h1>
                        <p>".$row_mv['Rate']."</p>
                      </div>
                      <div class=\"Period\">
                        <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Time.png?v=1650298090142\" width=\"22px\" height=\"22px\"/>
                        <p>".$row_mv['Period']."</p>
                        <p>mins</p>
                      </div>
                        <button onclick=\"myMove()\" class=\"dropdown-btn\">
                          Detail
                          <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Icon%20color.png?v=1650298528750\" width=\"12px\" height=\"7px\"/>
                        </button>
                    </div>
              </div>
            </div>";
        ?>
      
    
    
             <div class="Tab-Date">
          
           <!--<img class="Arrow-left" onclick="Dateback()" id="select-back" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/CaretCircleRight.png?v=1650563814200" width=" 79px" height="80px" />-->
          <div class="Date-Sile-Bar">
            
            <div class="Today">
              <div class="component-Date">
                <a href="#tas"  onclick="getBranchdrop(0);">
                  <h1 class="Tital-Day">TODAY</h1>
                  <p class="Date-Day" id="Date-Day"></p>
                </a>
              </div>
            </div>
            <div class="Today-1">
              <div class="component-Date">
                <a href="#tas"  onclick="getBranchdrop(1);">
                  <h1 class="Tital-Day" id="Tital-Day-1"></h1>
                  <p class="Date-Day" id="Date-Day-1"></p>
                </a>
              </div>
            </div>
            <div class="Today-2">
              <div class="component-Date">
                <a href="#tas"  onclick="getBranchdrop(2);">
                  <h1 class="Tital-Day" id="Tital-Day-2"></h1>
                  <p class="Date-Day" id="Date-Day-2"></p>
                </a>
              </div>
            </div>
            <div class="Today-3">
              <div class="component-Date">
                <a href="#tas"  onclick="getBranchdrop(3);">
                  <h1 class="Tital-Day" id="Tital-Day-3"></h1>
                  <p class="Date-Day" id="Date-Day-3"></p>
                </a>
              </div>
            </div>
            <div class="Today-4">
              <div class="component-Date">
                <a href="#tas"  onclick="getBranchdrop(4);">
                  <h1 class="Tital-Day" id="Tital-Day-4"></h1>
                  <p class="Date-Day" id="Date-Day-4"></p>
                </a>
              </div>
            </div>
            <div class="Today-5">
              <div class="component-Date">
                <a href="#tas"  onclick="getBranchdrop(5);">
                  <h1 class="Tital-Day" id="Tital-Day-5"></h1>
                  <p class="Date-Day" id="Date-Day-5"></p>
                </a>
              </div>
            </div>
          </div>
         <!--<img class="Arrow-right" onclick="Datenext()" id="select-next" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/CaretCircleRight.png?v=1650563814200" width=" 79px" height="80px" />-->
        </div>
    
    
    
    
      <!-- Dropdown -->
      <div class="booking">
        <div class="theater-and-showtime" id="tas">
          <br><br>
          <h3 id="ddate">(PLEASE SELECT DATE)</h3>
            <h1>
              BOOKING
            </h1>
            <form>
              <div class="group-dd">
                <label>Choose Branch</label>
                <select name="branch" id="branch" onchange="dropbtnmenu()" class="booking-dropdown">
                  <option disabled selected value></option>
                </select>
                  
              </div>
              <div class="group-dd">
                <label>Choose Showtime</label>
                <select name="showtime" onchange="dropbtnmenu()" id="showtime" class="booking-dropdown">
                  <option disabled selected value></option>
                </select>
                  
              </div>
            </form> 
          </div>
      </div>
    

      <div class= "container-booking-seat" >
        <div class= "booking-seat">
        <div class= "booking-seat-left">
          <div class ="example-seat">
            <div class="type" id="type-deluxe">
              <div class="type-ex-box"></div>
              <h1>Deluxe</h1>
              <h1 id="del-plus-top">230 THB</h1>
            </div>
            <div class="type" id="type-premium">
              <div class="type-ex-box"></div>
              <h1>Premium</h1>
              <h1 id="pre-plus-top">250 THB</h1>
            </div>
            <div class="type" id="type-pair">
              <div class="type-ex-box"></div>
              <h1>SofaSweet (Pair)</h1>
              <h1 id="sof-plus-top">650 THB</h1>
            </div>
          </div>
          
          <div class = "select-seat" >
            
            <div class="img-screen">
              <img src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/imgscreen.png?v=1651999887984" >
            </div>
            
            <ul class="showcase">
              <li>
                <div class="seat selected"></div>
                <small>Selected</small>
              </li>
              <li>
                <div class="seat occupied"></div>
                <small>Occupied</small>
              </li>    
            </ul>
            
            <div class="select-booking-seat">
              <div class="row-number">
                <div class="tital-number-seat">1</div>
                <div class="tital-number-seat">2</div>
                <div class="tital-number-seat">3</div>
                <div class="tital-number-seat">4</div>
                <div class="tital-number-seat">5</div>
                <div class="tital-number-seat">6</div>
                <div class="tital-number-seat">7</div>
                <div class="tital-number-seat">8</div>
                <div class="tital-number-seat">9</div>
                <div class="tital-number-seat">10</div>
                <div class="tital-number-seat">11</div>
                <div class="tital-number-seat">12</div>
              </div>
              <div class="row" id="G">
               <h1 class="seat-text">G</h1>
                <div class="seat-g" id="G1"></div>
                <div class="seat-g" id="G2"></div>
                <div class="seat-g" id="G3"></div>
                <div class="seat-g" id="G4"></div>
                <div class="seat-g" id="G5"></div>
                <div class="seat-g" id="G6"></div>
                <div class="seat-g" id="G7"></div>
                <div class="seat-g" id="G8"></div>
                <div class="seat-g" id="G9"></div>
                <div class="seat-g" id="G10"></div>
                <div class="seat-g" id="G11"></div>
                <div class="seat-g"  id="G12"></div>
              </div>
              <div class="row" id="F">
                <h1>F</h1>
                <div class="seat-f" id="F1"></div>
                <div class="seat-f" id="F2"></div>
                <div class="seat-f" id="F3"></div>
                <div class="seat-f" id="F4" ></div>
                <div class="seat-f" id="F5"></div>
                <div class="seat-f" id="F6"></div>
                <div class="seat-f" id="F7"></div>
                <div class="seat-f" id="F8"></div>
                <div class="seat-f" id="F9"></div>
                <div class="seat-f" id="F10"></div>
                <div class="seat-f" id="F11"></div>
                <div class="seat-f" id="F12"></div>
              </div>
              <div class="row" id="E">
                <h1>E</h1>
                <div class="seat-e" id="E1"></div>
                <div class="seat-e" id="E2"></div>
                <div class="seat-e" id="E3"></div>
                <div class="seat-e" id="E4"></div>
                <div class="seat-e" id="E5"></div>
                <div class="seat-e" id="E6"></div>
                <div class="seat-e" id="E7"></div>
                <div class="seat-e" id="E8"></div>
                <div class="seat-e" id="E9"></div>
                <div class="seat-e" id="E10"></div>
                <div class="seat-e" id="E11"></div>
                <div class="seat-e" id="E12"></div>
              </div>
              <div class="row" id="D">
                <h1>D</h1>
                <div class="seat-d" id="D1"></div>
                <div class="seat-d" id="D2"></div>
                <div class="seat-d" id="D3"></div>
                <div class="seat-d" id="D4"></div>
                <div class="seat-d" id="D5"></div>
                <div class="seat-d" id="D6"></div>
                <div class="seat-d" id="D7"></div>
                <div class="seat-d" id="D8"></div>
                <div class="seat-d" id="D9"></div>
                <div class="seat-d" id="D10"></div>
                <div class="seat-d" id="D11"></div>
                <div class="seat-d" id="D12"></div>
              </div> 
              <div class="row" id="C">
                <h1>C</h1>
                <div class="seat-c" id="C1"></div>
                <div class="seat-c" id="C2"></div>
                <div class="seat-c" id="C3"></div>
                <div class="seat-c" id="C4"></div>
                <div class="seat-c" id="C5"></div>
                <div class="seat-c" id="C6"></div>
                <div class="seat-c" id="C7"></div>
                <div class="seat-c" id="C8"></div>
                <div class="seat-c" id="C9"></div>
                <div class="seat-c" id="C10"></div>
                <div class="seat-c" id="C11"></div>
                <div class="seat-c" id="C12"></div>
              </div>
              <div class="row" id="ฺB">
                <h1>B</h1>
                <div class="tital-number-seat"></div>
                <div class="seat-premium-b" id="B1"></div>
                <div class="seat-premium-b" id="B2"></div>
                <div class="seat-premium-b" id="B3"></div>
                <div class="seat-premium-b" id="B4"></div>
                <div class="seat-premium-b" id="B5"></div>
                <div class="seat-premium-b" id="B6"></div>
                <div class="seat-premium-b" id="B7"></div>
                <div class="seat-premium-b" id="B8"></div>
                <div class="seat-premium-b" id="B9"></div>
                <div class="seat-premium-b" id="B10"></div>
                <div class="tital-number-seat" ></div>
              </div>
              <div class="row" id="ฺA">
                <h1>A</h1>
                <div class="tital-number-seat"></div>
                <div class="seat-premium-a" id="A1"></div>
                <div class="seat-premium-a" id="A2"></div>
                <div class="seat-premium-a" id="A3"></div>
                <div class="seat-premium-a" id="A4"></div>
                <div class="seat-premium-a" id="A5"></div>
                <div class="seat-premium-a" id="A6"></div>
                <div class="seat-premium-a" id="A7"></div>
                <div class="seat-premium-a" id="A8"></div>
                <div class="seat-premium-a" id="A9"></div>
                <div class="seat-premium-a" id="A10"></div>
                <div class="tital-number-seat"></div>
              </div>
              <div class="row" id="ฺBB">
                <h1>BB</h1>
                <div class="tital-number-seat" ></div>
                <div class="tital-number-seat" ></div>
              
                
                <div class="seat-pair-b " id="BB1">
                   <div class="seat-pair-b " id="BB2"></div>
                </div>
                
                <div class="seat-pair-b" id="BB3">
                  <div class="seat-pair-b " id="BB4"></div>
                </div>
                
                <div class="seat-pair-b " id="BB5">
                  <div class="seat-pair-b " id="BB6"></div>
                </div>
                
                <div class="seat-pair-b " id="BB7">
                  <div class="seat-pair-b " id="BB8"></div>
                </div>
                
                <div class="tital-number-seat"></div>
                <div class="tital-number-seat"></div>
                
              </div>
              <div class="row" id="ฺAA">
                <h1>AA</h1>
                <div class="tital-number-seat"></div>
                <div class="tital-number-seat"></div>
                
                <div class="seat-pair-a " id="AA1">
                 <div class="seat-pair-a " id="AA2"></div>
                </div>
                  
                <div class="seat-pair-a " id="AA3">
                   <div class="seat-pair-a " id="AA4"></div>
                </div>
                  
                <div class="seat-pair-a " id="AA5">
                  <div class="seat-pair-a " id="AA6"></div>
                </div>
     
                <div class="seat-pair-a " id="AA7">
                  <div class="seat-pair-a " id="AA8"></div>
                </div>
                
                <div class="tital-number-seat"></div>
                <div class="tital-number-seat"></div>
              </div>
            </div>
          </div>
        </div>
      <div class= "booking-summary">
          <h1>SUMMARY</h1>
          <div class="All-Summary">
           <div class="Card-Summary">
            <div class="Header-Summary">
              <img src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Spider.png?v=1651997450503" width="108px" height="160px"/>
              <div class="Header-Summary-Detail">
                <h1><?php echo $row_mv['MovieTitle'] ?></h1>
                <div class="Sound-Sub-Type">
                  <img class="img-Sound" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector5.png?v=1650114974053" width="21" height="19"/>
                  <p id="Sub"></p>
                  <img
                    id="img-Type"
                    class="img-Type"
                    src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%2022.png?v=1650299750909" width="47" height="35"/>
                </div>
                <div class="Time-Rate">
                  <div class="Time">
                    <img
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector2.png?v=1650114872990" width="22" height="20"/>
                    <h1 class="time-movie"><?php echo $row_mv['Period']; echo " mins"; ?></h1>
                  </div>
                  <div class="Rate">
                    <h1>Rate :</h1>
                    <h2><?php echo $row_mv['Rate']; ?></h2>
                  </div>
                </div>
              </div>
              </div>
              <div class="Detail-Summary">
                <div class="Showtime">
                  <h1 class="title-showtime">SHOWTIME</h1>
                  <div class="Address">
                    <img
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector.png?v=1650114818460" height="17" width="16"/>
                    <h1 id="BrachBooking"></h1>
                  </div>
                  <div class="Date">
                    <img
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/calendar.png?v=1650114803910" height="27" width="27"/>
                    <h1 id="showdate"></h1>
                  </div>
                  <div class="Number-Theater">
                    <h1 id="showthea"></h1>
                  </div>
                </div>
                <div class="Start-Time">
                  <h1 id="Start-time"></h1>
                </div>
                <div class="Seat">
                  <h1 class="title-Seat">SEAT</h1>
                  <div class="Seat-Deluxe">
                    <h1>Deluxe -</h1>
                    <p id="number-deluxe-g"></p>
                    <p id="number-deluxe-f"></p>
                    <p id="number-deluxe-e"></p>
                    <p id="number-deluxe-d"></p>
                    <p id="number-deluxe-c"></p>
                  </div>
                  <div class="Seat-Premium">
                    <h1>Premium -</h1>
                    <p id="number-premium-b"></p>
                    <p id="number-premium-a"></p>
                  </div>
                  <div class="Seat-SofaSweet">
                    <h1>SofaSweet -</h1>
                    <p id="number-pair-b"></p>
                    <p id="number-pair-a"></p>
                  </div>
                </div>
                <div class="Total-Price">
                  <h1>TOTAL PRICE</h1>
                  <h2 id="sumtotal"></h2>                 
                  <h3>THB</h3>
                </div><h2 id="dist" style="margin:0;text-align:center;font-weight: 400;"></h2>
                <div class="Promotion">
                  <button type="button" class="Promotion-btn" onclick="inputCode()">
                    <div class="Promotion-btn-detail">
                      <img
                    src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/discounts%20101.png?v=1651585191575" height="55" width="60"
                  />
                      Discounts and promotions 
                    </div>
                  </button>
                  <input type="text" id="Code-Promo-Box" class="Code-Promo-Box"/>
                  <button class="clear-value" id="clear-value" onclick ="ClearValue()">Clear</button>
                </div>
                  <button class="btn-continue" id="btn-continue" onclick ="Continue()">CONTINUE</button>
              </div>
            </div>
          </div>
        </div>
  
    </div>
    </div>
      
    <footer>
      <p>COPYRIGHT RESERVED © 2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    
    <script>
        const container = document.querySelector('.select-seat');
        const seatsG = document.querySelectorAll('.row .seat-g');
        const seatsF = document.querySelectorAll('.row .seat-f');
        const seatsE = document.querySelectorAll('.row .seat-e');
        const seatsD = document.querySelectorAll('.row .seat-d');
        const seatsC = document.querySelectorAll('.row .seat-c');
      
        const seatspreA = document.querySelectorAll('.row .seat-premium-a');
        const seatspreB = document.querySelectorAll('.row .seat-premium-b');
      
        const seatspairB = document.querySelectorAll('.row .seat-pair-b');
        const seatspairA = document.querySelectorAll('.row .seat-pair-a');
      
        const deluxeG = document.getElementById('number-deluxe-g');
        const deluxeF = document.getElementById('number-deluxe-f');
        const deluxeE = document.getElementById('number-deluxe-e');
        const deluxeD = document.getElementById('number-deluxe-d');
        const deluxeC = document.getElementById('number-deluxe-c');
        
        const premiumB = document.getElementById('number-premium-b');
        const premiumA = document.getElementById('number-premium-a');
        const pairB = document.getElementById('number-pair-b');
        const pairA = document.getElementById('number-pair-a');
        
        const movieSelect = document.getElementById('movie');
        const total = document.getElementById('sumtotal');
        const Promocode =  document.getElementById("Code-Promo-Box");
      
  //Update total and count
  function updateSelectedG() {
  const selectedSeats = document.querySelectorAll('.row .seat-g.selected');
  const seatsIndex =  [...selectedSeats].map((seat) => "G"+ ([...seatsG].indexOf(seat)+1));
  deluxeG.innerText = seatsIndex;
    return seatsIndex.length;
    seatsIndex.target.classList.toggle('occupied');
  }
      
  function updateSelectedF() {
  const selectedSeats = document.querySelectorAll('.row .seat-f.selected');
  const seatsIndex =  [...selectedSeats].map((seat) => "F"+ ([...seatsF].indexOf(seat)+1));
  deluxeF.innerText = seatsIndex;
  return seatsIndex.length;
  }
  function updateSelectedE() {
  const selectedSeats = document.querySelectorAll('.row .seat-e.selected');
  const seatsIndex =  [...selectedSeats].map((seat) => "E"+ ([...seatsE].indexOf(seat)+1));
  deluxeE.innerText = seatsIndex;
  return seatsIndex.length;
  }
  function updateSelectedD() {
  const selectedSeats = document.querySelectorAll('.row .seat-d.selected');
  const seatsIndex =  [...selectedSeats].map((seat) => "D"+ ([...seatsD].indexOf(seat)+1));
  deluxeD.innerText = seatsIndex;
  return seatsIndex.length;
}
  function updateSelectedC() {
  const selectedSeats = document.querySelectorAll('.row .seat-c.selected');
  const seatsIndex =  [...selectedSeats].map((seat) => "C"+ ([...seatsC].indexOf(seat)+1));
  deluxeC.innerText = seatsIndex;
 return seatsIndex.length;
}
      
/*------------Type Premium---------*/      
function updateSelectedPreA() {
   const selectedSeatspremium = document.querySelectorAll('.row .seat-premium-a.selected');
   const seatsIndexpremium = [...selectedSeatspremium].map((seat) => "A"+ ([...seatspreA].indexOf(seat)+1));
   premiumA.innerText = seatsIndexpremium;
   return seatsIndexpremium.length;
}
function updateSelectedPreB() {
   const selectedSeatspremium = document.querySelectorAll('.row .seat-premium-b.selected');
   const seatsIndexpremium = [...selectedSeatspremium].map((seat) => "B"+ ([...seatspreB].indexOf(seat)+1));
   premiumB.innerText = seatsIndexpremium;
   return seatsIndexpremium.length;
}
/*------------Type Pair--------*/      
function updateSelectedPairBB() {
    const selectedSeatspair = document.querySelectorAll('.row .seat-pair-b.selected');
    const seatsIndexpair = [...selectedSeatspair].map((seat) => "BB"+ ([...seatspairB].indexOf(seat)+1)+ "," + "BB"+ ([...seatspairB].indexOf(seat)+2));
    pairB.innerText = seatsIndexpair;
  return seatsIndexpair.length;
}
function updateSelectedPairAA() {
    const selectedSeatspair = document.querySelectorAll('.row .seat-pair-a.selected');
    const seatsIndexpair = [...selectedSeatspair].map((seat) =>  "AA"+ ([...seatspairA].indexOf(seat)+1)+ "," + "AA"+ ([...seatspairA].indexOf(seat)+2));
    pairA.innerText = seatsIndexpair;
    return seatsIndexpair.length;
}      
   
 let topup = 0;
 let TotalPrice = 0;
 let DeluxePrice = 0;
 let PremiumPrice = 0;
 let PairPrice = 0;     
//Seat click eventนด้ลวเปนสี้แใชฟัก์ัน
        container.addEventListener('click', e => {
          if (e.target.classList.contains('seat-g') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected');
              updateSelectedG();
          }
          
          if (e.target.classList.contains('seat-f') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected'); 
            updateSelectedF();
          }
         
          if (e.target.classList.contains('seat-e') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected'); 
            updateSelectedE();
          }
          
          if (e.target.classList.contains('seat-d') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected'); 
             updateSelectedD();
          }
         
          if (e.target.classList.contains('seat-c') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected');
            updateSelectedC();
          }
          
          /*------------Type Premium---------*/
          if (e.target.classList.contains('seat-premium-a') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected');
            updateSelectedPreA();
          }
          if (e.target.classList.contains('seat-premium-b') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected');
            updateSelectedPreB();
          }
          
        /*------------Type Pair---------*/
          if (e.target.classList.contains('seat-pair-b') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected');
             updateSelectedPairBB();
          }
         
          if (e.target.classList.contains('seat-pair-a') && !e.target.classList.contains('occupied')) {
              e.target.classList.toggle('selected');
            updateSelectedPairAA();
          }
          /*--------SumTotal-------------*/
          let SumSeatDeluxe = updateSelectedG()+updateSelectedF()+updateSelectedE()+updateSelectedD()+updateSelectedC();
          let SumSeatPremium = updateSelectedPreB()+updateSelectedPreA();
          let SumSeatPair = updateSelectedPairBB()+updateSelectedPairAA();
          DeluxePrice = SumSeatDeluxe*(230+topup);
          PremiumPrice = SumSeatPremium*(250+topup);
          PairPrice = SumSeatPair*(650+topup);
          TotalPrice = DeluxePrice+PremiumPrice+PairPrice;
          total.innerText = TotalPrice;
          
          
        });
      
     /*---------Promotion Code -------------*/
      function inputCode() {
  if(document.getElementById("Code-Promo-Box").style.opacity == 0) {
    document.getElementById("Code-Promo-Box").style.opacity = 1;
    document.getElementById("Code-Promo-Box").style.zIndex = "1";
    document.getElementById("clear-value").style.opacity = 1;
    document.getElementById("clear-value").style.zIndex = "1";
    const Promocode =  document.getElementById("Code-Promo-Box");
  }
}
      function ClearValue(){
  const  Promocode_val = Promocode.value;
  if(Promocode_val !==''){
    $("#dist").html("");
    document.getElementById("Code-Promo-Box").value = document.getElementById("Code-Promo-Box").defaultValue;
  }
}
      /*---------Tab Date -------------*/
      
      const getDayName = (dayIndex) =>{
      let daysArray = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      return daysArray[dayIndex];
      }
     const getMonthName = (monthIndex) =>{
        let monthsArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return monthsArray[monthIndex];
      }
      let day_1 = getDayName(new Date().getDay()+1);
      let day_2 = getDayName(new Date().getDay()+2);
      let day_3 = getDayName(new Date().getDay()+3);
      let day_4 = getDayName(new Date().getDay()+4);
      let day_5 = getDayName(new Date().getDay()+5);
       const monthName = getMonthName(new Date().getMonth());
      var today = new Date();
      var date = today.getDate()+' '+(monthName)+' '+today.getFullYear();
      var date_1 = today.getDate()+1+' '+(monthName)+' '+today.getFullYear();
      var date_2 = today.getDate()+2+' '+(monthName)+' '+today.getFullYear();
      var date_3 = today.getDate()+3+' '+(monthName)+' '+today.getFullYear();
      var date_4 = today.getDate()+4+' '+(monthName)+' '+today.getFullYear();
      var date_5 = today.getDate()+5+' '+(monthName)+' '+today.getFullYear();
      
      document.getElementById("Tital-Day-1").innerHTML = day_1;
      document.getElementById("Tital-Day-2").innerHTML = day_2;
      document.getElementById("Tital-Day-3").innerHTML = day_3;
      document.getElementById("Tital-Day-4").innerHTML = day_4;
      document.getElementById("Tital-Day-5").innerHTML = day_5;
      
      document.getElementById("Date-Day").innerHTML = date;
      document.getElementById("Date-Day-1").innerHTML = date_1;
      document.getElementById("Date-Day-2").innerHTML = date_2;
      document.getElementById("Date-Day-3").innerHTML = date_3;
      document.getElementById("Date-Day-4").innerHTML = date_4;
      document.getElementById("Date-Day-5").innerHTML = date_5;
      
      
          /*---------selectBranch-----------*/
       const BranceSelect = document.getElementById('branch');
       let BrachText = document.getElementById('BrachBooking');
       const bookingseat = document.querySelector('.container-booking-seat');
       let ShowtimeSelect = document.getElementById('showtime');
       let ShowtimeText = document.getElementById('Start-time');
      
       /*------------------------------------------------------------------------------- AJAX AREA -------------------------------------------------------------------------------*/
		
     var date_ajax;
      <?php echo "var mid = \"".$moviechoose."\";"?>
      
      //branch dropdown
      function getBranchdrop(plus) {
        let full_date = new Date();
        full_date.setDate(full_date.getDate() + plus);
        
        let just_day = full_date.getDate();
        let just_month = full_date.getMonth()+1;
        let just_year = full_date.getFullYear();

        if(just_day<10) just_day = "0"+just_day;
        if(just_month<10) just_month = "0"+just_month;
        
        date_ajax = just_year.toString()+"-"+just_month.toString()+"-"+just_day.toString();
        $("#ddate").html(date_ajax);
            $.ajax({
                url: '../AjaxCall/getBranchBooking.php',
                type: 'post',
                data: {temp:0},
                dataType: 'JSON',
                success:function(response){
                	var len = response.length;
				
                    $("#branch").empty();
                  $("#branch").append("<option disabled selected value></option>");
                    for( var i = 0; i<len; i++){
                        var id = response[i]['branchid'];
                        var name = response[i]['branchname'];

                        $("#branch").append("<option value='"+id+"'>"+name+"</option>");
                    }
                    },
              error: function (request, error) {
                    console.log(arguments);
                    alert(" Can't do because: " + error);
                }
               });
      }
      
      
      //showtime dropdown
      $("#branch").change(function(){
        	
        	BrachText.innerText = $("#branch :selected").text();
        	var branchsht = $("#branch :selected").val();
        	/*console.log(date_ajax);
            console.log(branchsht);
            console.log(mid);*/
        	ClearwhenChange();
        	$.ajax({
            url: '../AjaxCall/getShowtimeBooking.php',
            type: 'post',
            data: {'date':date_ajax,'brch':branchsht,'mov':mid},
            dataType: 'JSON',
            success:function(response){

                var len = response.length;

                $("#showtime").empty();
              $("#showtime").append("<option disabled selected value></option>");
                for( var i = 0; i<len; i++){
                    var showtimeid = response[i]['showtimeid'];
                    var ttname = response[i]['theatername'];
                    var tttypename = response[i]['theatertypename'];
                    var startdt = response[i]['startdatetime'];
                    var subtt; 
                    if(response[i]['issubtitles']==1)
                  		subtt = "EN/TH";
                    else subtt= "TH/--";

                    $("#showtime").append("<option value='"+showtimeid+"'>"+ttname+" | "+tttypename+" | "+subtt+" | "+startdt.slice(11,16)+"</option>");

                }
            },
          error: function (request, error) {
                console.log(arguments);
            	console.log("AJAX ERROR:", data);
                alert(" Can't do because: " + error);
            }
        });
      });
      
      //select showtime already, show seat and booking detail
      $("#showtime").change(function(){
        	var shtchooseid = $(this).val();
			ClearwhenChange();
        
        	$.ajax({
            url: '../AjaxCall/getSeatMapandDetail.php',
            type: 'post',
            data: {'shtchooseid':shtchooseid},
            dataType: 'JSON',
            success:function(response){

                var last = response.length-1;
				var sdt = response[0]['startdatetime'];
              
              	if(response[0]['issubtitles']==1)
                  $("#Sub").html("EN/TH"); 
              	else $("#Sub").html("TH/--");
              
              if(response[0]['theatertypename']=='digital2D') $("#img-Type").attr("src","../pic/2D.png");
              else if(response[0]['theatertypename']=='4DX') $("#img-Type").attr("src","../pic/4D.png");
              else if(response[0]['theatertypename']=='IMAX') $("#img-Type").attr("src","../pic/IMAX.jpg");
              
              var full_date = sdt.slice(8,10)+" "+getMonthName(parseInt(sdt.slice(5,7)))+" "+sdt.slice(0,4);
              $("#showdate").html(full_date);
              $("#showthea").html(response[0]['theatername']);
              ShowtimeText.innerText = sdt.slice(11,13)+" : "+sdt.slice(14,16);
              
              topup=parseInt(response[0]['topupprice']);
              $("#del-plus-top").html(230+topup+" THB");
              $("#pre-plus-top").html(250+topup+" THB");
              $("#sof-plus-top").html(650+topup+" THB");
              
              for(var i=1;i<=last;i++)
              {
                $("#"+response[i]['seatno']).addClass('occupied');
              }
              
            },
          error: function (request, error) {
                console.log(arguments);
            	console.log("AJAX ERROR:", data);
                alert(" Can't do because: " + error);
            }
        });
      });
      
      //promotion apply
      $("#Code-Promo-Box").keyup(function(){
        var code = $(this).val();
        $.ajax({
            url: '../AjaxCall/findPromotion.php',
            type: 'post',
            data: {'code':code},
            dataType: 'JSON',
            success:function(response){
              
              if(response.length==0) { 
              	$("#dist").html("");
              }
              else {
              if(response[0]['discountthb']!=null)
              {
                $("#dist").html("(-"+response[0]['discountthb']+") *not discount yet");
              }
              else if(response[0]['discountpercent']!=null)
               {
                $("#dist").html("(-"+response[0]['discountpercent']+"%) *not discount yet");
              }
              else{
                $("#dist").html("");
              }
              }
            },
          error: function (request, error) {
                console.log(arguments);
            	console.log("AJAX ERROR:", data);
                alert(" Can't do because: " + error);
            }
        });
      });
      
      function ClearwhenChange() {
      	$(".select-booking-seat div").removeClass('occupied selected');
        $("#Sub").html(""); 
        $("#img-Type").attr("src","");
        $("#showdate").html("");
        ShowtimeText.innerText = "";
        topup=0;
        $("#del-plus-top").html(" THB");
        $("#pre-plus-top").html(" THB");
        $("#sof-plus-top").html(" THB");
        total.innerText ="";
        $(".Seat p").html("");
      }
      
      function dropbtnmenu(){
        if(BranceSelect.value != '' && ShowtimeSelect.value != ''){
          //ShowtimeText.innerText = ShowtimeSelect.value;
          bookingseat.style.display ="block";
       }
      }
       
      function Continue(){
        	var sseat1 = '';
        	var sseat2 = '';
        	var sseat3 = '';
        	var brc = '';
            var shtc = '';
        	var prc = '';
            var movc = '';
            var pro = '';
            
        	if($("#number-deluxe-c").html()!='') sseat1 += $("#number-deluxe-c").html();
        	
        	if($("#number-deluxe-d").html()!='' && $("#number-deluxe-c").html()=='') sseat1 += $("#number-deluxe-d").html();
        	else if($("#number-deluxe-d").html()!='') sseat1 += "," + $("#number-deluxe-d").html();
        
            if($("#number-deluxe-e").html()!=''&&$("#number-deluxe-d").html()=='' && $("#number-deluxe-c").html()=='') sseat1 += $("#number-deluxe-e").html();
        	else if($("#number-deluxe-e").html()!='') sseat1 += ","+$("#number-deluxe-e").html();
        
            if($("#number-deluxe-f").html()!=''&&$("#number-deluxe-e").html()==''&&$("#number-deluxe-d").html()=='' && $("#number-deluxe-c").html()=='') sseat1 += $("#number-deluxe-f").html();
        	else if($("#number-deluxe-f").html()!='') sseat1 += ","+$("#number-deluxe-f").html();
        
            if($("#number-deluxe-g").html()!=''&&$("#number-deluxe-f").html()==''&&$("#number-deluxe-e").html()==''&&$("#number-deluxe-d").html()=='' && $("#number-deluxe-c").html()=='') 
              sseat1 += $("#number-deluxe-g").html();
        	else if($("#number-deluxe-g").html()!='') sseat1 += ","+$("#number-deluxe-g").html();
        
        
        
        	if($("#number-premium-a").html()!='') sseat2 += $("#number-premium-a").html();
        
        	if($("#number-premium-b").html()!=''&&$("#number-premium-a").html()=='') 
              sseat2 += $("#number-premium-b").html();
        	else if($("#number-premium-b").html()!='') sseat2 += ","+$("#number-premium-b").html();
        
        
        
        	if($("#number-pair-a").html()!='') sseat3 += $("#number-pair-a").html();
        
        	if($("#number-pair-b").html()!=''&&$("#number-pair-a").html()=='') 
              sseat3 += $("#number-pair-b").html();
        	else if($("#number-pair-b").html()!='') sseat3 += ","+$("#number-pair-b").html();
        
               
        	brc = $("#branch").val();
        	shtc = $("#showtime").val();
            prc = TotalPrice;
            movc = <?php echo "'$moviechoose'"; ?>;
            pro = $("#Code-Promo-Box").val();
            /*console.log(sseat1);
        	console.log(sseat2);
        	console.log(sseat3);
        	console.log(brc);
        	console.log(shtc);
        	console.log(prc);*/
        	       
      		$.ajax({
            url: '../AjaxCall/keepBookinginSession.php',
            type: 'post',
            data: {'sseat1':sseat1,'sseat2':sseat2,'sseat3':sseat3,'brc':brc,'shtc':shtc,'prc':prc,'movc':movc,'pro':pro},
            dataType: 'JSON',
            success:function(response){
					console.log("Keep session OK");	
              		window.location.href = 'client-summary-bf-payment.php';
            },
          error: function (request, error) {
                console.log(arguments);
            	console.log("AJAX ERROR:", data);
                alert(" Can't do because: " + error);
            }
        });
      }

    </script>
  </body>
</html>