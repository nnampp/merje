<?php
  $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
  // Check connection
  if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	session_start();

	//temp for payment (waiting for complex booking) can't use whyyyyyyyyyyy

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

		$moviechoose = $_SESSION['movc'];
		$sseat1 = $_SESSION['sseat1'];
		$sseat2 = $_SESSION['sseat2'];
		$sseat3 = $_SESSION['sseat3'];
		$brc = $_SESSION['brc'];
        $shtc = $_SESSION['shtc'];
        $prc = $_SESSION['prc'];
        $movc = $_SESSION['movc'];
		$pro = $_SESSION['pro'];
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
                <a href=\"register.php\"><button type=\"button\" class=\"btn cancel\" >Register</button></a>
                <button type=\"button\" class=\"btn cancel\" name=\"cancel\" onclick=\"closeForm();\">Cancel</button>
            </div>";
        if(isset($_SESSION['submitsignin']))
          echo "<script> alert(\"Email or Password is incorrect\"); </script>";
      		session_unset();
      }

    ?>
  </form>
</div>
    
    <?php
        		$sql_mv = "SELECT * FROM Movie WHERE MovieID='$moviechoose'";
        		$result_mv = mysqli_query($con,$sql_mv);
        		$row_mv = mysqli_fetch_array($result_mv);
        
        		$sql_sht = "SELECT * FROM Showtime WHERE ShowtimeID='$shtc'";
        		$result_sht = mysqli_query($con,$sql_sht);
        		$row_sht = mysqli_fetch_array($result_sht);
        
        		 
                $sql_b = "SELECT * FROM Branch WHERE BranchID='$brc'";
                $result_b = mysqli_query($con,$sql_b);
                $row_b = mysqli_fetch_array($result_b);
        
        		$sql_tt = "SELECT * FROM Theater t,TheaterType tt WHERE TheaterID IN (SELECT TheaterID FROM Showtime WHERE ShowtimeID='$shtc') AND t.TheaterTypeName = tt.TheaterTypeName";
                $result_tt = mysqli_query($con,$sql_tt);
                $row_tt = mysqli_fetch_array($result_tt);
                
        		$sql_pro = "SELECT * FROM Promotion WHERE PromotionCode='$pro'";
                $result_pro = mysqli_query($con,$sql_pro);
                $row_pro = mysqli_fetch_array($result_pro);
    ?>
    
    <!-------------------------Payment----------------------------------------------->
    <div class="Complete">
     <section class="Payment">
    <div class="main-Payment">
      <div class="img-main-Payment">
        <img src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/visa-master-icon-5%201.png?v=1650113139804" height="97" width="381"/>
        <div class="time">
          <p id="counter">15:00</p>
        </div>
      </div>
        <form id="frm1"  class="detail-payment" method="POST">
          <div class="Name-Card">
            <h1 class="detail-form" >Name on Card</h1>
            <input type="text" id="NameCard-Box" class="NameCard-Box" required/>
          </div>
          <div class="Number-Card">
            <h1 class="detail-form">Card Number</h1>
            <input type="text" id="NumberCard-Box" class="NumberCard-Box" required/>
          </div>
          <div class="Expire-Secur">
            <div class="Expire-Date">
              <h1 class="detail-form">Expire Date</h1>
              <input type="month" id="Expire-Box" class="Expire-Box" required/>
            </div>
            <div class="Secur-Code">
              <h1 class= "detail-form">Security Code</h1>
              <input type="password" id="pwd" name="pwd" maxlength="3" class="Secur-Box" required/>
            </div>
          </div>
          <div class="submit" >
            <button class="submit-btn" id="open" onclick="payPopUp()" type="submit" name="submitpay">PAY NOW</button>
          </div>
          <?php
          	if(isset($_POST['submitpay'])){
            	$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
            	// Check connection

              	$total = $prc;
                if($row_pro['DiscountTHB']!==NULL)
                  $total = $prc-$row_pro['DiscountTHB'];

                else if($row_pro['DiscountPercent']!==NULL)
                  $total = $prc*(1-($row_pro['DiscountPercent']/100));
              
                $paymentid = uniqid("PM");
                $paymentmethod = "Credit/Debit";
                $bookingid = $_SESSION['BookingID'];
                $paymentstatus = 1;
                $sql="INSERT INTO Payment (PaymentID,PaymentMethod,BookingID,PaymentStatus)
                VALUES ('$paymentid','$paymentmethod','$bookingid','$paymentstatus')";
              	
              	$result = mysqli_query($con, $sql);
              
                $total = $_SESSION['Total'];
              	$sql="SELECT RegisterID,MembercardID FROM Register WHERE RegisterID IN (SELECT RegisterID FROM Booking WHERE BookingID='".$bookingid."')";
                $result = mysqli_query($con, $sql);
              	$row = mysqli_fetch_assoc($result);
                $regisid = $row['RegisterID'];
                if($row['MembercardID']!=NULL) $point = 2*floor($total/50);
                else $point = floor($total/50);
              
              	$sql="UPDATE Register SET Point=Point + $point WHERE RegisterID = '".$regisid."'";
              	$result = mysqli_query($con, $sql);
            }
          ?>
        </form>
        
      </div>
      
       
       
    <!-------------------------Summary----------------------------------------------->
      
      <div class="Summary">
        <div class="All-Summary">
          <h1 class="summary">SUMMARY</h1>
          <div class="Card-Summary">
            <div class="Header-Summary">
              <img src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Spider.png?v=1651997450503" width="108px" height="160px"/>
              <div class="Header-Summary-Detail">
                <h1><?php echo $row_mv['MovieTitle']; ?></h1>
                <div class="Sound-Sub-Type">
                  <img class="img-Sound" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector5.png?v=1650114974053" width="21" height="19"/>
                  <p id="Sub"><?php
                    	if($row_sht['IsSubtitles']==1)
                          echo "EN/TH";
                    	else
                          echo "TH/--";
                    ?></p>
                  <img class="img-Type"
                    src="<?php 
                          if($row_tt['TheaterTypeName']=='digital2D') echo "../pic/2D.png";
                          if($row_tt['TheaterTypeName']=='4DX') echo "../pic/4D.png";
                          if($row_tt['TheaterTypeName']=='IMAX') echo "../pic/IMAX.jpg";
                          ?>"; width="47" height="35"
                  />
                </div>
                <div class="Time-Rate">
                  <div class="Time">
                    <img
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector2.png?v=1650114872990" width="22" height="20"
                    />
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
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/address%20101.png?v=1651585009846" height="17" width="16"
                    />
                    <h1><?php echo $row_b['BranchName']; ?></h1>
                  </div>
                  <div class="Date">
                    <img
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/calendar.png?v=1650114803910" height="27" width="27"
                    />
                    <h1><?php echo substr($row_sht['StartDateTime'],0,10); ?></h1>
                  </div>
                  <div class="Number-Theater">
                    <h1><?php echo $row_tt['TheaterName']; ?></h1>
                  </div>
                </div>
                <div class="Start-Time">
                  <h1><?php echo substr($row_sht['StartDateTime'],11,16);  ?></h1>
                </div>
                <div class="Seat">
                  <h1 class="title-Seat">SEAT</h1>
                  <div class="Seat-Deluxe">
                    <h1>Deluxe -</h1>
                    <p><?php echo $sseat1; ?></p>
                  </div>
                  <div class="Seat-Premium">
                    <h1>Premium -</h1>
                    <p><?php echo $sseat2; ?></p>
                  </div>
                  <div class="Seat-SofaSweet">
                    <h1>SofaSweet -</h1>
                    <p><?php echo $sseat3; ?></p>
                  </div>
                </div>
                <div class="Total-Price">
                  <h1>TOTAL PRICE</h1>
                  <h2 id="sumtotal"><?php
                    //echo $sql_pro;
                    $total = $prc;
                            if($row_pro['DiscountTHB']!==NULL)
                              $total = $prc-$row_pro['DiscountTHB'];
                            
                            else if($row_pro['DiscountPercent']!==NULL)
                              $total = $prc*(1-($row_pro['DiscountPercent']/100));
                    
                              echo $total;
	
                    ?></h2>
                  <h3>THB</h3>
                </div>
                <div class="Promotion">
                  <!--<button type="button" class="Promotion-btn" onclick="inputCode()">
                    <div class="Promotion-btn-detail">
                      <img
                    src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/discounts%20101.png?v=1651585191575" height="55" width="60"
                  />
                      Discounts and promotions 
                    </div>
                  </button>-->
                  <label><?php
                      //if(mysqli_fetch_array($result_pro)>0){
                           if($row_pro['DiscountTHB']!==NULL) {
								echo "(-";
                  				echo $row_pro['DiscountTHB'];
                      			echo ") already applied";
                           }
                      		else if($row_pro['DiscountPercent']!==NULL) {
								echo "(-";
                  				echo $row_pro['DiscountPercent'];
                      			echo "%) already applied";
                           }
                      //}
                    ?></label>
                  <!--<input type="text" id="Code-Promo-Box" class="Code-Promo-Box"/>
                  <button class="clear-value" id="clear-value" onclick ="ClearValue()">Clear</button>-->
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="PopUp" id="Popup">
      <div class="PopUp-Payment">
        <h1>Payment successful</h1>
        <p>We will send booking details to your email</p>
        <button class="Close-btn" id="close" onclick="closePopUp()" >close</button>
      </div>
    </section> 
    </div>
    
    <footer>
      <p>COPYRIGHT RESERVED  2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    <script src="../script1.js"></script>
    <script>
    <?php
      if(!isset($_SESSION['RegisterID']))
      {
        echo "alert(\"please sign in\");";
        echo "window.location.href = \"home.php\";";
      }
      ?>
</script>
  </body>
</html>