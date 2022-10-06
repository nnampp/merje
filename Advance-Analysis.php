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
          <a href="#">
            <i class="fas fa-chart-pie"></i>
            <span class="links_name">Overview</span>
            <span class="tooltip">Overview</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="fas fa-building"></i>
            <span class="links_name">Branch</span>
            <span class="tooltip">Branch</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="fas fa-theater-masks"></i>
            <span class="links_name">Theater</span>
            <span class="tooltip">Theater</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class="fas fa-ticket-alt"></i>
            <span class="links_name">Movie</span>
            <span class="tooltip">Movie</span>
          </a>
        </li>
        
        <li>
          <a href="#">
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
          <a href="#">
            <i class="fas fa-percent"></i>
            <span class="links_name">Promotion</span>
            <span class="tooltip">Promotion</span>
          </a>
        </li>
        
        <li>
          <a href="#">
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
                <option disabled selected value></option>
                <option value="priceBranch">The daily income from movie tickets of each branch</option>
                <option value="priceMovie">Income data for each movie</option>
                <option value="Topten">Top 10 movies that can generate the most income each month</option>
                <option value="priceFood">Show sales, net income of beverages, popcorn, etc.</option>
              </select>
          </div>
          <div class="select-content_2"  id="select-content_2" disabled>
            <select id="dropbtn2" onclick="dropbtnchoose()" class="dropbtn" disabled>
                <i class="fas fa-angle-down"></i>
                <option disabled selected value></option>
                
                
              <!--  <option value="bangmod" id="choice_one">Merje Cinema Bangmod</option>
                <option value="samyan" id="choice_two">Merje Cinema Samyan</option>
                <option value="ladkrabang" id="choice_three">Merje Cinema Ladkrabang</option> -->
                
              </select>
          </div>
        </div>
        <div class="select-date">
          <p>Time range : </p>
          <div class="select-Date">
            <input type="text" name="daterange" id="daterange" class="date-input"/>
          </div>
        </div>
      </div>
      
      <!-- analysis 2 -->
      <div class="detail-content-analy" id="price-branch">
        <div class="grid-container">
          <div class="grid-item">Branch Name</div>
          <div class="grid-item">Total seats</div>
          <div class="grid-item">Income from movie tickets</div> 
          <!--1st row-->
          <div class="grid-item" id="name-branch"></div>
          <div class="grid-item" id="sum-seat"></div>
          <div class="grid-item" id="total-price-branch"></div>
          <!--2nd row-->
          
          <!--3rd row-->
          
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
                <h1>Total imcome</h1>
              </div>
              
            </div>
          </div> 
          <!--1st row-->
          <div class="grid-item">Spider-Man: No way home</div>
          <div class="grid-item">43,450</div>
          <div class="grid-item">8,695,100</div>
          <!--2nd row-->
          <div class="grid-item">House of Gucci</div>
          <div class="grid-item">41,321</div>
          <div class="grid-item">8,520,100</div> 
          <!--3rd row-->
          
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
                <h1>Total sale</h1>
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
          <div class="grid-item">Mon 07/02/22</div>
          <div class="grid-item">503</div>
          <div class="grid-item">25,150</div>
          <!--2nd row-->
          <div class="grid-item">Tue 08/02/22</div>
          <div class="grid-item">491</div>
          <div class="grid-item">23,rr077</div> 
          <!--3rd row-->
          
        </div>
      </div>
      
    </div>
    <div class="home_content">
        <div class="detail-staff">
          <div class="bar-before-name"></div>
          <h1 class="name-staff">Monthida A.</h1>
          <img class="img-staff" src="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B8%96%E0%B9%88%E0%B8%B2%E0%B8%A2%E0%B8%AB%E0%B8%99%E0%B9%89%E0%B8%B2%E0%B8%88%E0%B8%AD%202565-03-16%20%E0%B9%80%E0%B8%A7%E0%B8%A5%E0%B8%B2%2015.38%201.png?v=1650801961025"/>
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
      
      let dropbtn = document.getElementById('dropbtn');
      let dropbtn2 = document.getElementById('dropbtn2');
      
     
      let pricebranch = document.getElementById('price-branch');
      let graphmovie = document.getElementById('graph-movie');
      let pricemovie = document.getElementById('price-movie');
      let foodmovie = document.getElementById('food-movie');
      let select2 = document.getElementById('select-content_2');
     


     
      
   /*   
      let choiceone = document.getElementById('choice_one');
      let choicetwo = document.getElementById('choice_two');
      let choicethree = document.getElementById('choice_three');\
    */
      
      
      
      
      /*-------------Array analysis 2---------------*/
      
      /*I will use select all branch and reorder in acending order****/
      
      const branch_name = ["Merje Cinema Bangmod", "Merje Cinema Samyan", "Merje Cinema Ladkrabang"];
      const sum_seat = ["892", "50", "500"];
      const total_price = ["210,500", "10,000", "100,000"];
      
      
      
      
      
      /*-------------Array analysis 3---------------*/ 
      let boxone = document.getElementById('sum-seat-sell');
      let boxtwo = document.getElementById('number-movie-sell');
      let boxthree = document.getElementById('total-price-sell');
      const name_movie = ["Spider-Man: No Way Home", "The Batman", "The Desperate Hour"];
      const sum_seat_sell = ["12,345", "10,000", "5,000"];
      const number_movie_sell = ["312", "300", "250"]
      const total_price_sell = ["109 M THB", "90 M THB", "50 M THB"]
      
       function dropbtnmenu(){
       if(dropbtn.value === "priceBranch"){
         dropbtn2.style.background = "#DCD4B3";
         select2.disabled = false;
         dropbtn2.disabled = false;
         dropbtn2.value = dropbtn2.defaultValue;
         dropbtn2.style.cursor = "pointer";
         pricebranch.style.display = "block";
         graphmovie.style.display = "none";
         foodmovie.style.display = "none";
         pricemovie.style.display = "none";
         
        
         $("#dropbtn2").empty();
         $("#dropbtn2").append("<option disabled selected value></option>");
         <?php
                 $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
                
                 $sql = "SELECT BranchName, BranchID, Region, BranchAddress FROM Branch ORDER BY BranchName";
                $result = mysqli_query($con, $sql);
                    
                       if (mysqli_num_rows($result) > 0) {
                            
                             while($row = mysqli_fetch_assoc($result)) { 
                                
                              if($row['BranchID']!='0') 
                                echo "$(\"#dropbtn2\").append(\"<option value =\'".$row["BranchID"]."\'>".$row["BranchName"]."</option>\");";  

                            }
                        }
            
            ?>
            
         /*choiceone.innerHTML = branch_name[0];
         choiceone.value ="branch1";
         choicetwo.innerHTML = branch_name[1];
         choicetwo.value ="branch2";
         choicethree.innerHTML = branch_name[2];
         choicethree.value ="branch3";*/
         
        
       }
        
       else if(dropbtn.value === "priceMovie"){
         dropbtn2.style.background = "#DCD4B3";
         select2.disabled = false;
         dropbtn2.disabled = false;
         dropbtn2.value = dropbtn2.defaultValue;
         dropbtn2.style.cursor = "pointer";
         pricebranch.style.display = "none";
         graphmovie.style.display = "block";
         foodmovie.style.display = "none";
         pricemovie.style.display = "none";
         
         $("#dropbtn2").empty();
         $("#dropbtn2").append("<option disabled selected value></option>");
         <?php
                 $con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");
                
                 $sql = "SELECT MovieID,MovieTitle FROM Movie ORDER BY MovieTitle";
                $result = mysqli_query($con, $sql);
                    
                       if (mysqli_num_rows($result) > 0) {
                            
                             while($row = mysqli_fetch_assoc($result)) { 
                                
                              if($row['BranchID']!='0') 
                                echo "$(\"#dropbtn2\").append(\"<option value =\'".$row["MovieID"]."\'>".$row["MovieTitle"]."</option>\");";  

                            }
                        }
                        
            
            ?>
            
         /*choiceone.innerHTML = name_movie[0]
         choiceone.value ="movie1";
         choicetwo.innerHTML = name_movie[1];
         choicetwo.value ="movie2";
         choicethree.innerHTML = name_movie[2];
         choicethree.value ="movie3";*/
         
         
         
       }
       else if(dropbtn.value === "Topten"){
         pricemovie.classList.toggle("active");
         dropbtn2.style.background = "#cccccc";
         dropbtn2.style.cursor = "no-drop";
         select2.disabled = true;
         dropbtn2.disabled = true;
         pricebranch.style.display = "none";
         graphmovie.style.display = "none";
         pricemovie.style.display = "block";
         foodmovie.style.display = "none";
         
         
       }
       else if(dropbtn.value === "priceFood"){
         foodmovie.classList.toggle("active");
         dropbtn2.style.background = "#cccccc";
         dropbtn2.style.cursor = "no-drop";
         select2.disabled = true;
         dropbtn2.disabled = true;
         pricebranch.style.display = "none";
         graphmovie.style.display = "none";
         pricemovie.style.display = "none";
         foodmovie.style.display = "block";
         
         
         console.log(dropbtn.value);
         
         
          let daterange = document.getElementById('daterange');
         console.log(daterange.value);
        
             $.ajax({
               url: 'AjaxCall/Ajax-Advance4.php',
               type: 'post',
               data: {daterange:daterange.value},
               dataType: 'json',
                   error:function(request,error){
                   console.log(arguments);
                   alert("can't: "+error);
               },
               success:function(response){

              // var len = response.length;
              
            // for( var i = 0; i<len; i++){
                    var date = response[0]['date'];
                    var sum = response[0]['sumprice'];
                    var sale = response[0]['sales'];
 console.log(sum);
                    $("#food-movie").append("<div class=\"grid-item\">"+date+"</div>\
                                             <div class=\"grid-item\">"+sum+"</div>\
                                             <div class=\"grid-item\">"+sale+"</div>");
    
                //}
            }
                 
             });
     }
       }
      
      function dropbtnchoose(){
        let namebranch = document.getElementById('name-branch');
        let sumseat = document.getElementById('sum-seat');
        let totalprice = document.getElementById('total-price-branch');
        
        if(dropbtn.value === "priceBranch"){
             console.log(dropbtn2.value);
            
            
     /*       
      $.ajax({
            url: '/AjaxCall/Ajax-Advance1.php',
            type: 'post',
            data: {brch:dropbtn2.value,date:},
            dataType: 'JSON',
            success:function(response){


            /*
              namebranch.innerHTML = branchname; //เอามา dropdown
            sumseat.innerHTML = response[0]; //นวณม้ว
            totalprice.innerHTML = response[1];
             
                }
            });*/
        
        
            
            

            
        }
        
        
        
        
        
        
        
        
          if(dropbtn2.value === "branch1"){
            namebranch.innerHTML = branch_name[0];
            sumseat.innerHTML = sum_seat[0];
            totalprice.innerHTML = total_price[0];
            pricebranch.classList.toggle("active");
          }
        else if(dropbtn2.value === "branch2"){
            namebranch.innerHTML = branch_name[1];
            sumseat.innerHTML = sum_seat[1];
            totalprice.innerHTML = total_price[1];
            pricebranch.classList.toggle("active");
          
          }
        else if(dropbtn2.value === "branch3"){
            namebranch.innerHTML = branch_name[2];
            sumseat.innerHTML = sum_seat[2];
            totalprice.innerHTML = total_price[2];
            pricebranch.classList.toggle("active");
          }
        else if(dropbtn2.value === "movie1"){
          var xValues = [50,60,70,80,90,100,110,120,130,140,150];
          var yValues = [7,8,8,9,9,9,10,11,14,14,15];
            boxone.innerHTML = sum_seat_sell[0];
            boxtwo.innerHTML = number_movie_sell[0];
            boxthree.innerHTML = total_price_sell[0];
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
            labels: 'ว',
          }]
        },
        options: {
          legend: {display: false},
          scales: {
            yAxes: [{ticks: {min: 0, max:16}}],
          },
          title: {
          display: true,
          text: "ข้มลง่ง",
          fontSize: 24,
          fontFamily:"Kanit",
          fontColor: "#252733",
          verticalAlign: "top", 
          horizontalAlign: "left"
          }
        }
    });
            
          }
        else if(dropbtn2.value === "movie2"){
          var xValues = [10,20,70,80,90,100,110,120,130,140,150];
          var yValues = [1,8,7,9,9,9,10,11,14,14,15];
            boxone.innerHTML = sum_seat_sell[1];
            boxtwo.innerHTML = number_movie_sell[1];
            boxthree.innerHTML = total_price_sell[1];
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
            labels: 'วอ',
          }]
        },
        options: {
          legend: {display: false},
          scales: {
            yAxes: [{ticks: {min: 0, max:16}}],
          },
          title: {
          display: true,
          text: "าหัตลเ",
          fontSize: 24,
          fontFamily:"Kanit",
          fontColor: "#252733",
          verticalAlign: "top", 
          horizontalAlign: "left"
          }
        }
    });
          }
        else if(dropbtn2.value === "movie3"){
          var xValues = ['A',60,70,80,90,100,110,100,130,140,150];
          var yValues = [7,8,8,9,9,9,10,11,14,14,15];
            boxone.innerHTML = sum_seat_sell[2];
            boxtwo.innerHTML = number_movie_sell[2];
            boxthree.innerHTML = total_price_sell[2];
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
            labels: 'จวรอ',
          }]
        },
        options: {
          legend: {display: false},
          scales: {
            yAxes: [{ticks: {min: 0, max:16}}],
          },
          title: {
          display: true,
          text: "ขมัแเรง",
          fontSize: 24,
          fontFamily:"Kanit",
          fontColor: "#252733",
          verticalAlign: "top", 
          horizontalAlign: "left"
          }
        }
    });
          }
      }

      </script>

    
    
  </body>
  
      
    
</html>