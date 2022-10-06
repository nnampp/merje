<?php
  $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
  // Check connection
  if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	session_start();

  if(isset($_GET['branchid']))
  { $bid =  $_GET['branchid']; }

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
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body onload="chooseDateforquery(0)">
    <header class = "Navbar">
      <div class = "Navbar-container">
        <div class ="Menu">
           <div class ="logo">
            <img src = "/pic/merjeth.png"/>
          </div>
            <div class ="Menu-content">
              <ul class="nav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="client-theater.php">THEATER</a></li>
                <li><a href="client-news.php">NEWS</a></li>
                <li><a href="client-promotion.php">PROMOTIONS</a></li>
                <li><a href="#faq">FAQ</a></li> 
                <li><img src = "/pic/merje+.png" height="78" width="125" <?php if((isset($_SESSION['RegisterID']))&&($_SESSION['MembercardID']!=NULL)) echo "onclick=\"openPage('client-merje-plus-mem.php');\""; else echo "onclick=\"openPage('client-merje-plus-no-mem.php');\""; ?>/></li>
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
    
    <section class="Header-Subtheater">
      <div class="container-Header-Subtheater">
        <img src="..\pic\header-subtheater.png" width="100%" height="433"/>
        <div class="Tab-Date">
          
          <!--<img class="Arrow-left" onclick="Dateback()" id="select-back" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/CaretCircleRight.png?v=1650563814200" width=" 79px" height="80px" />-->
          <div class="Date-Sile-Bar">
            
            <div class="Today">
              <div class="component-Date">
                <a href="#container-Detail-Subtheater" onclick="chooseDateforquery(0)">
                  <h1 class="Tital-Day">Today</h1>
                  <p class="Date-Day" id="Date-Day">12 FEB 2022</p>
                </a>
              </div>
            </div>
            <div class="Today-1">
              <div class="component-Date">
                <a href="#container-Detail-Subtheater" onclick="chooseDateforquery(1)">
                  <h1 class="Tital-Day" id="Tital-Day-1">Today</h1>
                  <p class="Date-Day" id="Date-Day-1">12 FEB 2022</p>
                </a>
              </div>
            </div>
            <div class="Today-2">
              <div class="component-Date">
                <a href="#container-Detail-Subtheater" onclick="chooseDateforquery(2)">
                  <h1 class="Tital-Day" id="Tital-Day-2">Today</h1>
                  <p class="Date-Day" id="Date-Day-2">12 FEB 2022</p>
                </a>
              </div>
            </div>
            <div class="Today-3">
              <div class="component-Date">
                <a href="#container-Detail-Subtheater" onclick="chooseDateforquery(3)">
                  <h1 class="Tital-Day" id="Tital-Day-3">Today</h1>
                  <p class="Date-Day" id="Date-Day-3">12 FEB 2022</p>
                </a>
              </div>
            </div>
            <div class="Today-4">
              <div class="component-Date">
                <a href="#container-Detail-Subtheater" onclick="chooseDateforquery(4)">
                  <h1 class="Tital-Day" id="Tital-Day-4">Today</h1>
                  <p class="Date-Day" id="Date-Day-4">12 FEB 2022</p>
                </a>
              </div>
            </div>
            <div class="Today-5">
              <div class="component-Date" onclick="chooseDateforquery(5)">
                <a href="#container-Detail-Subtheater">
                  <h1 class="Tital-Day" id="Tital-Day-5">Today</h1>
                  <p class="Date-Day" id="Date-Day-5">12 FEB 2022</p>
                </a>
              </div>
            </div>
          </div>
          <!--<img class="Arrow-right" onclick="Datenext()" id="select-next" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/CaretCircleRight.png?v=1650563814200" width=" 79px" height="80px" />-->
        </div>
      </div>
	<?php
        	$sql = "SELECT BranchName FROM Branch WHERE BranchID='".$bid."'";
        
        	$result = mysqli_query($con,$sql);
     		$row = mysqli_fetch_array($result);
        
        	echo "<h1 style=\" text-align:center;font-size:3em;\">".$row['BranchName']."</h1>";
        ?>
      <div class="container-Detail-Subtheater" id="container-Detail-Subtheater">
        
      </div>
      <br><br><br>
    </section>
    
    <footer>
      <p>COPYRIGHT RESERVED © 2019 MERJE CINEMA GROUP PLC. ALL RIGHTS RESERVED.</p>
      
    </footer>
    <script>
      
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
      let next = document.getElementById('select-next');
      let back = document.getElementById('select-back');
       let clicks = 0;
      function Datenext(){
        clicks += 1;
        if(clicks<=1){
          day_1 = getDayName(new Date().getDay()+6+clicks);
          day_2 = getDayName(new Date().getDay()+6+clicks);
          day_3 = getDayName(new Date().getDay()+6+clicks);
          day_4 = getDayName(new Date().getDay()+6+clicks);
          day_5 = getDayName(new Date().getDay()+6+clicks);
          date = today.getDate()+5+clicks+' '+(monthName)+' '+today.getFullYear();
          date_1 = today.getDate()+6+clicks+' '+(monthName)+' '+today.getFullYear();
          date_2 = today.getDate()+7+clicks+' '+(monthName)+' '+today.getFullYear();
          date_3 = today.getDate()+8+clicks+' '+(monthName)+' '+today.getFullYear();
          date_4 = today.getDate()+9+clicks+' '+(monthName)+' '+today.getFullYear();
          date_5 = today.getDate()+10+clicks+' '+(monthName)+' '+today.getFullYear();
        
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
          next.disabled = true;
          next.style.cursor = "no-drop";
        }
        
        
        
      }
      
      function Dateback(){
        clicks += 1;
        console.log(clicks);
        day_1 = getDayName(new Date().getDay()+1-clicks);
        day_2 = getDayName(new Date().getDay()+2-clicks);
        day_3 = getDayName(new Date().getDay()+3-clicks);
        day_4 = getDayName(new Date().getDay()+4-clicks);
        day_5 = getDayName(new Date().getDay()+5-clicks);
        
        date = today.getDate()-clicks+' '+(monthName)+' '+today.getFullYear();
        date_1 = today.getDate()-1-clicks+' '+(monthName)+' '+today.getFullYear();
        date_2 = today.getDate()-2-clicks+' '+(monthName)+' '+today.getFullYear();
        date_3 = today.getDate()-3-clicks+' '+(monthName)+' '+today.getFullYear();
        date_4 = today.getDate()-4-clicks+' '+(monthName)+' '+today.getFullYear();
        date_5 = today.getDate()-5-clicks+' '+(monthName)+' '+today.getFullYear();
        
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
      }
    
      //for ajax

      
      function chooseDateforquery(plus) {
        let full_date = new Date();
        full_date.setDate(full_date.getDate() + plus);
        
        let just_day = full_date.getDate();
        let just_month = full_date.getMonth()+1;
        let just_year = full_date.getFullYear();

        if(just_day<10) just_day = "0"+just_day;
        if(just_month<10) just_month = "0"+just_month;
        
        var date_ajax = just_year.toString()+"-"+just_month.toString()+"-"+just_day.toString();
        <?php echo "var bid = \"".$bid."\";"?>
        console.log(date_ajax);
        //console.log(bid);
        
        $("#container-Detail-Subtheater").html("");
        $("#container-Detail-Subtheater").append("<h2>"+ date_ajax +"</h2>");
        
      $(document).ready(function (){  
        $.ajax({
            url: '../AjaxCall/getAllShowtime.php',
            type: 'post',
            data: {date:date_ajax,brchid:bid},
            dataType: 'JSON',
            success:function(response){
              
             var len = response.length;
              var sub;
              var type_pic;
              
              console.log(len);
              
              for( var i = 0; i<len; i++){
                
                // subtitles
                if(response[i]['issubtitles'] == 1)
                    sub = "EN/TH";
                else 
                   sub = "TH/--";
                
                // theater type
                if(response[i]['theatertypename'] === "digital2D")
                {   type_pic = "..\\pic\\2D.png"; }
                else if(response[i]['theatertypename'] === "4DX")
                {   type_pic = "..\\pic\\4D.png"; }
                else if(response[i]['theatertypename'] === "IMAX") 
                {    type_pic = "..\\pic\\IMAX.jpg"; }
                //console.log(type_pic);
                
               if(i!==0 && response[i]['movieid'] === response[i-1]['movieid'] && response[i]['theaterid'] === response[i-1]['theaterid'] && response[i]['issubtitles'] === response[i-1]['issubtitles'])
               {
              			$("#"+ response[i]['movieid'] + response[i]['theaterid'] + response[i]['issubtitles']).append("<div class=\"Second-Time\">\
                                              			<div class=\"box-Time\" >\
                                                		<h1>"+ response[i]['startdatetime'].slice(11,13) + " : " + response[i]['startdatetime'].slice(14,16) +"</h1>\
                                                      </div>\
                                                      </div>");   	
               }
               else if(i!==0 && response[i]['movieid'] === response[i-1]['movieid'])
               {
              			$("#"+ response[i-1]['movieid']).append("<div class=\"first\">\
                                          <div class=\"Detail-Movie-Theater\">\
                                            <div class=\"TheaterNumber\">\
                                              <p>"+ response[i]['theatername'] +"</p>\
                                            </div>\
                                            <div class=\"bar\"></div>\
                                              <div class=\"Sound-Sub\">\
                                                <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector5.png?v=1650114974053\" width=\"38px\" height=\"34px\"/>\
                                                <p>"+ sub +"</p>\
                                              </div>\
                                            <div class=\"bar\"></div>\
                                            <img src=\""+ type_pic +"\" width=\"72px\" height=\"47px\"/>\
                                          </div>\
                                          <div class=\"Time-Detail-Movie\">\
                                            <div class=\"Second-Time\">\
                                              <div class=\"box-Time\" >\
                                                <h1>"+ response[i]['startdatetime'].slice(11,13) + " : " + response[i]['startdatetime'].slice(14,16) +"</h1>\
                                              </div>\
                                            </div>\
                                          </div>\
                                        </div>");   	
               }
              else {  
              $("#container-Detail-Subtheater").append("<div class=\'Movie\'>\
                                                       <div class=\'Main-Detail-Movie\'> \
							<img class=\"img-movie\" src=\".."+ response[i]['poster'] +"\" width=\"212px\" height=\"313px\"/> \
							<div class=\"All-Detail-Movie\">\
								<p class =\"Start-Date\">"+ response[i]['datein'] +"</p>\
                                       <h1 class=\"Name-Movie\">"+ response[i]['movietitle'] +"</h1>\
                                        <div class=\"Genre\">\
                                          <h1>Genre : </h1>\
                                          <p id=\"genr\"></p>\
                                       </div>\
										<div class=\"Rate-Sub\">\
                                          <h1>Rate : </h1>\
                                          <p>"+ response[i]['rate'] +"</p>\
                                        </div>\
										<div class=\"Period\">\
                                          <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Time.png?v=1650298090142\" width=\"22px\" height=\"22px\"/>\
                                          <p>"+ response[i]['period'] +"</p>\
                                          <p>mins</p>\
                                        </div>\
										<button onclick=\"myMove()\" class=\"dropdown-btn\">\
                                            Detail\
                                            <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Icon%20color.png?v=1650298528750\" width=\"12px\" height=\"7px\"/>\
                                          </button>\
										</div></div>\
      									<!-------------Silderbar------------->\
										<div class=\"Silderbar-Detail-Movie\" id =\"animate\">\
                                      <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678\" width=\"101px\" height=\"60px\"/>\
                                      <div class=\"Theater-Number\" id=\""+ response[i]['movieid'] +"\">\
                                        <div class=\"first\">\
                                          <div class=\"Detail-Movie-Theater\">\
                                            <div class=\"TheaterNumber\">\
                                              <p>"+ response[i]['theatername'] +"</p>\
                                            </div>\
                                            <div class=\"bar\"></div>\
                                              <div class=\"Sound-Sub\">\
                                                <img src=\"https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/Vector5.png?v=1650114974053\" width=\"38px\" height=\"34px\"/>\
                                                <p>"+ sub +"</p>\
                                              </div>\
                                            <div class=\"bar\"></div>\
                                            <img src=\""+ type_pic +"\" width=\"72px\" height=\"47px\"/>\
                                          </div>\
                                          <div class=\"Time-Detail-Movie\" id=\""+ response[i]['movieid'] + response[i]['theaterid'] + response[i]['issubtitles'] +"\">\
                                            <div class=\"Second-Time\">\
                                              <div class=\"box-Time\" >\
                                                <h1>"+ response[i]['startdatetime'].slice(11,13) + " : " + response[i]['startdatetime'].slice(14,16) +"</h1>\
                                              </div>\
                                            </div>\
                                          </div>\
                                        </div></div></div>\
      							</div>");
                 //append end
                				
                				/*var mvid = response[i]['movieid'];
                				$.ajax({
                                    url: '../AjaxCall/getGenre.php',
                                    type: 'post',
                                    data: {mmid:mvid},
                                    dataType: 'JSON',
                                    success:function(responsed){
                                        var len = responsed.length;

                                        for( var j = 0; j<len; j++){
                                            var gn = responsed[j]['gen'];
											var iid = "genr"+mvid;
                 
                                            if(j!=0) $("#genr"+mvid).html() += ","+gn;
                                          	else $("#genr"+mvid).html() += gn;
                                        }
                                        },
                                  error: function (request, error) {
                                        console.log(arguments);
                                        alert(" Can't do because: " + error);
                                    }
                                   });*/
      					}
              }
              console.log(response[1]['showtimeid']);
              console.log("it's work");
            },
          error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            }
        });
        });
      }
    
      
      function chooseDateforquery1() { date_ajax = date_1; }
      function chooseDateforquery2() { date_ajax = date_2; }
      function chooseDateforquery3() { date_ajax = date_3; }
      function chooseDateforquery4() { date_ajax = date_4; }
      function chooseDateforquery5() { date_ajax = date_5; }
    </script>
  </body>
</html>