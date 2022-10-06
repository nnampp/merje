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
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="/pic/merjeth.png">
    <link rel="stylesheet" href="..\css\style.css">
   <script src="..\script.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   
  
  <!--for carousel -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" crossorigin="anonymous" />
		<script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
  
  
  
  
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
                <li><img src = "/pic/merje+.png" height="78" width="125" <?php if((isset($_SESSION['RegisterID']))&&($_SESSION['MembercardID']!=NULL)) echo "onclick=\"openPage('client-merje-plus-mem.php');\""; else echo "onclick=\"openPage('client-merje-plus-no-mem.php');\""; ?> /></li>
              </ul>
            </div>
            <div class ="Search-Profile">
              <div class = "Search">
                <input type="search" class="search-box" placeholder="Search">
                <img src = "/pic/search.png" height="20" width="20"/>
              </div>
              <div class = "Profile">
                 <img onclick="openForm()" src = "/pic/profilepic.png"/>
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
                  
      
    
    
    <section class="homebody">
      

    <div class="img-slider">
      <div class="slide active">
        <img src="/pic/homebanner1.png" width="1250" height="500">
      </div>
      <div class="slide">
        <img src="/pic/thbanner.png" width="1250" height="500">
      </div>
      <div class="slide">
        <img src="/pic/homebanner2.png" width="1250" height="500">
      </div>
      
      
      <div class="navigation">
        <div class="btn active"></div>
        <div class="btn"></div>
        <div class="btn"></div>
      </div>
    </div>

                  

    <script type="text/javascript">
    var slides = document.querySelectorAll('.slide');
    var btns = document.querySelectorAll('.btn');
    let currentSlide = 1;

    // Javascript for image slider manual navigation
    var manualNav = function(manual){
      slides.forEach((slide) => {
        slide.classList.remove('active');

        btns.forEach((btn) => {
          btn.classList.remove('active');
        });
      });

      slides[manual].classList.add('active');
      btns[manual].classList.add('active');
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        manualNav(i);
        currentSlide = i;
      });
    });

    // Javascript for image slider autoplay navigation
    var repeat = function(activeClass){
      let active = document.getElementsByClassName('active');
      let i = 1;

      var repeater = () => {
        setTimeout(function(){
          [...active].forEach((activeSlide) => {
            activeSlide.classList.remove('active');
          });

        slides[i].classList.add('active');
        btns[i].classList.add('active');
        i++;

        if(slides.length == i){
          i = 0;
        }
        if(i >= slides.length){
          return;
        }
        repeater();
      }, 10000);
      }
      repeater();
    }
    repeat();
    </script>
    </section>
  
    
    <br><br><br>
    
    
    <style>
    
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');

    </style>


<?php 

 $sql = "SELECT MovieID,Poster, MovieTitle, DateIn, DateOut FROM Movie";
                  $result = mysqli_query($con, $sql);
           
           //echo mysqli_num_rows($result);
           $today = date("Y-m-d");
          // echo $today;


echo "<h1 class=\"h1home\">NOW SHOWING</h1><br>";
 echo "<div class=\"homecontainer\">";   
    echo "<div class=\"container\">";
			echo "<div class=\"row\">";
				echo "<div class=\"col-lg-12\">";
					echo "<div id=\"news-slider\" class=\"owl-carousel\">";



                 
           
            if (mysqli_num_rows($result) > 0) {
                     
                    while($row = mysqli_fetch_assoc($result)) 
                    {            
                        //Date out greater than today so they're still in cinema.
                     if(($row["DateOut"] > $today)&&($row["DateIn"] < $today)) {
			               // echo "yeah" ; 
			               echo "<div class=\"news-grid\">";
                            echo "<div class=\"news-grid-image\">";
                                echo "<a href=\"client-booking.php?movieid="; 
                       				echo $row['MovieID'];
                       					echo "\">";
                                   echo "<img src=\"..".$row['Poster']."\">" ;
                                echo "</a>";
			               echo "<div class=\"news-grid-box\">";
			                echo "<h1>";
			                     echo  date("d",strtotime($row['DateIn']));
			                echo "</h1>";
			               echo "<p>";
			                     echo  date("M",strtotime($row['DateIn']));
			               echo "</p>";  
			              echo "</div>";
			              echo "</div>";
			              
			              echo "<div class=\"news-grid-txt\">";
			                echo "<h2>";
			                    echo $row["MovieTitle"];
			                echo "</h2>";
			             echo "</div>";   
			         echo "</div>";
                            }
                    }
             }
 echo "</div>"; 
 echo "</div>";
  echo "</div>";
   echo "</div>";
    echo "</div>";
    
    
    
    //COMING SOON
    
 $sql = "SELECT Poster, MovieTitle, DateIn, DateOut FROM Movie";
                  $result = mysqli_query($con, $sql);
    
echo "<h1 class=\"h1home\">COMING SOON</h1><br>";
 echo "<div class=\"homecontainer\">";   
    echo "<div class=\"container\">";
			echo "<div class=\"row\">";
				echo "<div class=\"col-lg-12\">";
					echo "<div id=\"slider2\" class=\"owl-carousel\">";

           
            if (mysqli_num_rows($result) > 0) {
                     
                    while($row = mysqli_fetch_assoc($result)) 
                    {            
                        
                     if($row["DateIn"] > $today) {
			               // echo "yeah" ; 
			               echo "<div class=\"news-grid\">";
                            echo "<div class=\"news-grid-image\">";
                                echo "<a href=\"#\">" ;
                                   echo "<img src=\"..".$row['Poster']."\">" ;
                                echo "</a>";
			               echo "<div class=\"news-grid-box\">";
			                echo "<h1>";
			                     echo  date("d",strtotime($row['DateIn']));
			                echo "</h1>";
			               echo "<p>";
			                     echo  date("M",strtotime($row['DateIn']));
			               echo "</p>";  
			              echo "</div>";
			              echo "</div>";
			              
			              echo "<div class=\"news-grid-txt\">";
			                echo "<h2>";
			                    echo $row["MovieTitle"];
			                echo "</h2>";
			             echo "</div>";   
			         echo "</div>";
                            }
                    }
             }
 echo "</div>"; 
 echo "</div>";
  echo "</div>";
   echo "</div>";
    echo "</div>";
    
    
    

                    ?>
														
												
   <!-- Script-Section -->
												<script type="text/javascript">
													$(document).ready(function(){
														$("#news-slider").owlCarousel({
															items:3,
															navigation:true,
															navigationText:["",""],
															autoPlay:false
														});
													});
												</script>
    
    
    
    <br><br><br><br>
    
    <br><br>
    <!-- Script-Section -->
												<script type="text/javascript">
													$(document).ready(function(){
														$("#slider2").owlCarousel({
															items:3,
															navigation:true,
															navigationText:["",""],
															autoPlay:false
														});
													});
												</script>
    
    
    
   
    <footer>
      <p>COPYRIGHT RESERVED  2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    
    
    
    
    
    
    
    
    
  </body>
</html> 


