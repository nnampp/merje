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
        
        $rgtid = $_SESSION['RegisterID'];
        $moviechoose = $_SESSION['movc'];
		$sseat1 = $_SESSION['sseat1'];
		$sseat2 = $_SESSION['sseat2'];
		$sseat3 = $_SESSION['sseat3'];
		$brc = $_SESSION['brc'];
        $shtc = $_SESSION['shtc'];
        $prc = $_SESSION['prc'];
        $movc = $_SESSION['movc'];
		$pro = $_SESSION['pro'];
		//echo $_SESSION['sseat1'];
        //echo $_SESSION['MovieChoose'];
		//print_r($_SESSION);

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
                <li><a href="client-promotions.php">PROMOTIONS</a></li>
                <li><a href="#faq">FAQ</a></li> 
                <li><img src = "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/_______________2565_02_04______20_55_1.png?v=1650037162676" height="78" width="125"
                         <?php if((isset($_SESSION['RegisterID']))&&($_SESSION['MembercardID']!=NULL)) echo "onclick=\"openPage('client-merje-plus-mem.php');\""; else echo "onclick=\"openPage('client-merje-plus-no-mem.php');\""; ?>
                         /></li>
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
    
    <div class= "sum-bf-payment"> 
      <div class="Main-Detail-Movie-bfpayment">
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
            </div>";
        ?>
      
      <div class= "tsc-summary">
        <div class= "left-tsc-summary">
          <div class= "topic-tsc">
            <div class= "topic-tsc-text">
              <h1>TRANSACTION SUMMARY</h1> 
            </div>
          </div>
          
          <div class= "quantity">
            <h1>
              <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Ellipse%202.png?v=1650604340743" height="21" width="21"/>
              QUANTITY
            </h1>
            <div class= "sum-seat">
              <div class= "sum-seat-line1">
                <div class="pic-seat">
                  <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Deluxe.png?v=1652519074897" height="78" width="78"/>
                </div>
                <div class= "type-seat">
                  <h3>Deluxe</h3>
                  <h3><?php echo $sseat1; ?></h3>
                </div>
                <div class= "price-seat">
                  <h3><?php 
                     if($sseat1=='') echo "0 THB";
                    else {
                    	$s1 = explode(',',$sseat1);
                    	echo COUNT($s1)*(230+$row_tt['TopUpPrice']);
                    	echo " THB"; }
                    ?></h3>
                </div>
              </div>
              
              <div class= "sum-seat-line2">
                <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Line%206.png?v=1650605110532" height="13" width="851"/>
              </div>
              
              <div class= "sum-seat-line1">
                <div class="pic-seat">
                  <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%207.png?v=1650605311991" height="69" width="69"/>
                </div>
                <div class= "type-seat">
                  <h3>Premium</h3>
                  <h3><?php echo $sseat2; ?></h3>
                </div>
                <div class= "price-seat">
                  <h3><?php 
                     if($sseat2=='') echo "0 THB";
                    else {
                    	$s2 = explode(',',$sseat2);
                    	echo COUNT($s2)*(250+$row_tt['TopUpPrice']);
                    	echo " THB"; }
                    ?></h3>
                </div>
              </div>
            
              <div class= "sum-seat-line2">
                <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Line%206.png?v=1650605110532" height="13" width="851"/>
              </div>
              
              <div class= "sum-seat-line1" >
                <div class="pic-seat">
                  <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Pair.png?v=1652519074897" height="78" width="78"/>
                </div>
                <div class= "type-seat" id="sum-seat-pair">
                  <h3>SofaSweet (Pair)</h3>
                  <h3><?php echo $sseat3; ?></h3>
                </div>
                <div class= "price-seat">
                  <h3><?php 
                    if($sseat3=='') echo "0 THB";
                    else {
                    	$s3 = explode(',',$sseat3);
                    	echo COUNT($s3)*(325+($row_tt['TopUpPrice']/2));
                    	echo " THB"; }
                    ?></h3>
                </div>
              </div>
              
              <div class= "total-price">
                <div class= "total-price-left">
                  <h4>TOTAL</h4>
                </div>
                <div class= "total-price-right">
                  <h4><?php echo $prc; echo " THB"; ?></h4>
                </div>
              </div>
            </div>
          </div>
          
          <div class= "confirmation">
            <h1>
              <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Ellipse%202.png?v=1650604340743" height="21" width="21"/>
              COMFIRMATION
            </h1>
            <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please fill in the information below for receiving tickets</h4>
            <form name="confirm_regist" method="post" action="confirm_regist.php" class="ConfirmForm">
              <table width="60%" cellpadding="0" cellspacing="0" align="center">
                <tr>
                  <td height="30" width="100%" align="left" colspan="3"><input type="text" id="cf_email" name="cf_email" class="ConfirmBox" placeholder="Email Address"></td>
                </tr>
                
                <tr>
                  <td height="30" width="100%" align="left" colspan="3"><br><input type="text" id="cf_mobile" name="cf_mobile" class="ConfirmBox" placeholder="Mobile"></td>
                </tr>
              </table>
            </form>
           
          </div>
          
          <div class= "selected-payment-method">
            <h1>
              <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Ellipse%202.png?v=1650604340743" height="21" width="21"/>
              SELECTED PAYMENT METHOD
            </h1>
            
            <div class= "method" >
              <div class= "each-method" id="credit">
                <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%2099.png?v=1650606585864" height="65" width="67"/>
                <h2>Credit/Debit</h2>
              </div>
              
              <div class= "each-method" id="kbank" disabled>
                <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%20101.png?v=1650606588901" height="65" width="63"/>
                <h2>KBank</h2>
              </div>
              
              <div class= "each-method" id="shopee" disabled>
                <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%20100.png?v=1650606593317" height="65" width="64"/>
                <h2>ShopeePay</h2>
              </div>
            
              <div class= "each-method" id="true" disabled>
                <img src= "https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%20102.png?v=1650606597411" height="65" width="64"/>
                <h2>TrueMoney Wallet</h2>
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
                <h1><?php echo $row_mv['MovieTitle']; ?></h1>
                <div class="Sound-Sub-Type">
                  <img class="img-Sound" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector5.png?v=1650114974053" width="21" height="19"/>
                  <p id="Sub"><?php if($row_sht['IsSubtitles']==1) echo "EN/TH"; else echo "TH/--"; ?></p>
                  <img
                    class="img-Type"
                     src="<?php 
                          if($row_tt['TheaterTypeName']=='digital2D') echo "../pic/2D.png";
                          if($row_tt['TheaterTypeName']=='4DX') echo "../pic/4D.png";
                          if($row_tt['TheaterTypeName']=='IMAX') echo "../pic/IMAX.jpg";
                          ?>";
                     width="47" height="35"/>
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
                    <h1 id="BrachBooking"><?php echo $row_b['BranchName']; ?></h1>
                  </div>
                  <div class="Date">
                    <img
                      src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/calendar.png?v=1650114803910" height="27" width="27"/>
                    <h1><?php echo substr($row_sht['StartDateTime'],0,10); ?></h1>
                  </div>
                  <div class="Number-Theater">
                    <h1><?php echo $row_tt['TheaterName']; ?></h1>
                  </div>
                </div>
                <div class="Start-Time">
                  <h1 id="Start-time"><?php echo substr($row_sht['StartDateTime'],11,16);  ?></h1>
                </div>
                <div class="Seat">
                  <h1 class="title-Seat">SEAT</h1>
                  <div class="Seat-Deluxe">
                    <h1>Deluxe -</h1>
                    <p id="number-deluxe"><?php echo $sseat1; ?></p>
                  </div>
                  <div class="Seat-Premium">
                    <h1>Premium -</h1>
                    <p id="number-premium"><?php echo $sseat2; ?></p>
                  </div>
                  <div class="Seat-SofaSweet">
                    <h1>SofaSweet -</h1>
                    <p id="number-pair"><?php echo $sseat3; ?></p>
                  </div>
                </div>
                <div class="Total-Price">
                  <h1>TOTAL PRICE</h1>
                  <h2 id="sumtotal">
                    <?php
                    //echo $sql_pro;
                    $total = $prc;
                            if($row_pro['DiscountTHB']!==NULL)
                              $total = $prc-$row_pro['DiscountTHB'];
                            
                            else if($row_pro['DiscountPercent']!==NULL)
                              $total = $prc*(1-($row_pro['DiscountPercent']/100));
                    
                              echo $total;
	
                    ?>
                  </h2>
                  <h3>THB</h3>
                </div>
                <div class="Promotion" style="margin:auto;text-align:center;">
                   
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
                  <!--<input type="text" id="Code-Promo-Box" class="Code-Promo-Box"/>-->
                  <!--<button class="clear-value" id="clear-value" onclick ="ClearValue()">Clear</button>-->
                </div>
                  <button class="btn-continue" id="btn-continue" onclick ="complexBooking()">CONTINUE</button> <!-- if login, it'll work -->
              </div>
            </div>
          </div>
        </div>
        </div> 
      
      </div>
    
    
    <br><br>
    
    <footer>
      <p>COPYRIGHT RESERVED © 2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    <script>
      
       function inputCode() {
  if(document.getElementById("Code-Promo-Box").style.opacity == 0) {
    document.getElementById("Code-Promo-Box").style.opacity = 1;
    document.getElementById("Code-Promo-Box").style.zIndex = "1";
    document.getElementById("clear-value").style.opacity = 1;
    document.getElementById("clear-value").style.zIndex = "1";
    const Promocode =  document.getElementById("Code-Promo-Box");
  }
}
      const Promocode =  document.getElementById("Code-Promo-Box");
      function ClearValue(){
  const  Promocode_val = Promocode.value;
  if(Promocode_val !==''){
    document.getElementById("Code-Promo-Box").value = document.getElementById("Code-Promo-Box").defaultValue;
  }
}
     let Credit =  document.querySelector("#credit");
     var myBox = Credit.addEventListener("click", function() {
        this.classList.toggle('yyyy');
      });
      
      function complexBooking() {
      	var seatcom = '';
        var regis = "<?php echo $rgtid; ?>";
        var shtm = "<?php echo $shtc; ?>";
        var ttal = "<?php echo $total; ?>";
        var pmcd = '0';
        var cfmaild = $("#cf_email").val();
        var cfteld = $("#cf_mobile").val();
        
        <?php
        	if($prc > $total)
              echo "pmcd = '$pro';";
        ?>

        if($("#number-deluxe").html()!='') seatcom += $("#number-deluxe").html();
        
        if($("#number-premium").html()!=''&&$("#number-deluxe").html()=='') seatcom += $("#number-premium").html();
        else if($("#number-premium").html()!='') seatcom += "," + $("#number-premium").html();
        
         if($("#number-pair").html()!=''&&$("#number-premium").html()==''&&$("#number-deluxe").html()=='') seatcom += $("#number-pair").html();
        else if($("#number-pair").html()!='') seatcom += "," + $("#number-pair").html();
        
        console.log(seatcom);
        console.log(regis); //use session
        console.log(shtm); //use session
        console.log(pmcd);
        console.log(cfmaild);
        console.log(cfteld);
        
        if(regis == '') alert("please sign in");
        else if(cfmaild == '') alert("please fill in email");
        else if(cfteld == '') alert("please fill in tel no");
        else if(!$('#credit').hasClass('yyyy')) alert("please select payment method");
        else {
                    $.ajax({
                      url: '../AjaxCall/complexBooking.php',
                      type: 'post',
                      data: {pmc:pmcd,cfmail:cfmaild,cftel:cfteld,totl:ttal},
                      dataType: 'JSON',
                      success:function(response){
                        console.log("complex done!!!!");
						window.location.href = "client-payment.php";
                      },
                    error: function (request, error) {
                          console.log(arguments);
                          console.log("AJAX ERROR:", data);
                          alert(" Can't do because: " + error);
                      }
                  });

        }
      }
      
    </script>
  </body>
</html>