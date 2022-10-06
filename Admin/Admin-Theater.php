<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERJE</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.glitch.global/c4abddf4-df42-4a5d-9919-6041695585c5/image%203.png?v=1650035975678">
    <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/style2.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="all-in-admin">
       <!-------------sidebar------------------->
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <img src="/pic/merjeth.png" width="123px" height="53px"/>
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
      <div class="all-in-theater">
        <h2>THEATER</h2>
      <input type="search" class="search-box-admin" placeholder="Search" />
        <form name="theater" id="detial-theater" method="post" enctype="multipart/form-data">
          <div class="detail-theater">
        
          <div class="detail-theateri-inform">
            <div class="select-theater-branchname">
                <h1>Branch Name</h1>
                  <select id="dropbtn-branchname" class="dropbtn">
                    <i class="fas fa-angle-down"></i>
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
            </div>
            
            <div class="select-theater-theatername">
                <h1>Select Theater Name</h1>
                  <select id="dropbtn-theatername" class="dropbtn" >
                    <i class="fas fa-angle-down"></i>
                    <option disabled selected value></option>
                    <option class="menu-theater-name">Hong Hong</option>
                  </select>
            </div>
            <div class="new-theater-name">
              <h1>Theater Name</h1>
              <input type="text" id="newnametheater" name="Cname" class="input-box" >
            </div>
            <div class="theater-type">
              <h1>Theater Type</h1>
              <div class="theater-type-form">
                <!--<form>-->
                  <label>
                    <input type="radio" name="typetheater" value="digital2D" class="typetheater">
                    <img src="/pic/2d31.png">
                  </label>

                  <label>
                    <input type="radio" name="typetheater" value="4DX" class="typetheater">
                    <img src="/pic/4dx09.png">
                  </label>

                  <label>
                    <input type="radio" name="typetheater" value="IMAX" class="typetheater">
                    <img src="/pic/imax14.png">
                  </label>
                <!--</form>-->
              </div>
            </div>
            
          </div>
        <!--</form>-->
        <div class="btn-theater">
            <button  class="btn-basic-theater" id="btn-add" onclick="add()">ADD</button>
            
        </div>  
        <div class="btn-clear-theater">
            <button class="clear" onclick="clearall()">Clear</button>
        </div>
        
          
        </div>
        
        <div class="btn-save-theater">
            <button type="submit" class="Save">Save</button>
        </div>
        </form>
     </div>   
    <div class="home_content">
        <div class="detail-staff">
          <div class="bar-before-name"></div>
          <h1 class="name-staff">Monthida A.</h1>
          <img class="img-staff" src="/pic/profilepic.png"/>
        </div>
    </div>  
    </div>
    <script>
      var sta = '0';
      let btn = document.querySelector("#btn-slidetab");
      let sidebar = document.querySelector(".sidebar");
      
     btn.onclick = function(){
       sidebar.classList.toggle("active");
     }
      
      let dropbtn_branchname = document.getElementById('dropbtn-branchname');
      let newtheater = document.querySelector(".new-theater-name");
      let theatertype = document.querySelector(".theater-type");
      let theatername = document.querySelector(".select-theater-theatername");
      
      let btn_add = document.getElementById('btn-add');
      let btn_edit = document.getElementById('btn-edit');
      let btn_delete = document.getElementById('btn-delete');
      
      let boxnewname = document.getElementById('newnametheater');
      let radioButtons = document.querySelectorAll('input[name="typetheater"]');
      let theatertypename = document.querySelector(".typetheater");
      let selecttheatername = document.getElementById('dropbtn-theatername');
      function add(){
        window.sta = '1';
        console.log(sta);
        if(dropbtn_branchname.value !== ''){
          newtheater.style.display = "block";
          theatertype.style.display = "block";
          btn_add.disabled = true;
          btn_edit.disabled = true;
          btn_delete.disabled = true;
          btn_add.style.cursor = "no-drop";
          btn_edit.style.cursor = "no-drop";
          btn_delete.style.cursor = "no-drop";
        }
      }
      
     /* function edit(){
        window.sta = '2';
        console.log(sta);
        if(dropbtn_branchname.value !== ''){
          theatername.style.display = "block";
          theatertype.style.display = "block";
          btn_add.disabled = true;
          btn_edit.disabled = true;
          btn_delete.disabled = true;
          btn_add.style.cursor = "no-drop";
          btn_edit.style.cursor = "no-drop";
          btn_delete.style.cursor = "no-drop";  
          
        }
      }
      
      function deletetheater(){
        window.sta = '3';
        console.log(sta);
        if(dropbtn_branchname.value !== ''){
          theatername.style.display = "block";  
          btn_add.disabled = true;
          btn_edit.disabled = true;
          btn_delete.disabled = true;
          btn_add.style.cursor = "no-drop";
          btn_edit.style.cursor = "no-drop";
          btn_delete.style.cursor = "no-drop";
        }
      }*/
      
      function clearall(){
        if(boxnewname.value !== '' || radioButtons.value !== ''|| selecttheatername.value !== ''){
          boxnewname.value = boxnewname.defaultValue;
          radioButtons.value = radioButtons.defaultValue;
          selecttheatername.value = selecttheatername.defaultValue;
          newtheater.style.display = "none";
          theatertype.style.display = "none";
          theatername.style.display = "none";
        }
          btn_add.disabled = false;
          btn_edit.disabled = false;
          btn_delete.disabled = false;
          btn_add.style.cursor = "pointer";
          btn_edit.style.cursor = "pointer";
          btn_delete.style.cursor = "pointer";
      }   
      
      $("#dropbtn-branchname").change(function(){
        var branchid = $(this).val();
		console.log(branchid);
        $.ajax({
            url: '../AjaxCall/getTheaterOfBranch.php',
            type: 'post',
            data: {brch:branchid},
            dataType: 'JSON',
            success:function(response){

                var len = response.length;
				
                $("#dropbtn-theatername").empty();
              $("#dropbtn-theatername").append("<option disabled selected value></option>");
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#dropbtn-theatername").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });
      
      $("#detial-theater").on('submit',function(){
        var statu = sta;
        var branchi = $("#dropbtn-branchname").val();
        //var atheate = $("#dropbtn-theatername").val();
        var ttnam = $("#newnametheater").val();
        var typet = $('input[name="typetheater"]:checked').val();
        //alert(statu+branchi+ttnam+typet);
        $.ajax({
            url: '../AjaxCall/AEDofTheater.php',
            type: 'post',
            data: {status:statu,branchid:branchi,ttname:ttnam,typett:typet},
            dataType: 'JSON',
            success:function(){

                //alert(status+" success");

                },
    error: function (request, status, error) {
       // alert(request.responseText);
    }
            
        });
    });
      
    </script>
  </body>
  
      
    
</html>