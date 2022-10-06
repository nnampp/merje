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
     <link rel="stylesheet" href="../css/style2.css"/>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
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

      <div class="movie-admin">
        <h2>MOVIE</h2>

        <input type="search" class="search-box-admin" placeholder="Search" />

        <form name="movie" id="detial-movie" method="post" enctype="multipart/form-data" >
          <div class="detial-movie">
            <div class="detial-movie-left">
            
              <label for="title">Title</label>
              <input type="text" class="detialmovie-box" id="title" name="title" required/>

              <label for="poster">Poster</label>
              <input type="file" class="detialmovie-box2" id="poster" name="poster" required/>

              <label for="trailer">Trailer</label>
              <input type="file" class="detialmovie-box2" name="trailer" id="trailer"/>

              <label for="directer">Director</label>
              <input type="text" class="detialmovie-box" name="director" id="director" required/>

              <label for="cast">Cast</label>
              <input type="text" class="detialmovie-box" id="cast" name="cast" required/>

              <label for="period-movie">Period Movie(mins)</label>
              <input type="text" class="detialmovie-box" id="period" name="period" required />
              
              
              <label for="dateIn">DateIn</label>
              <input type="date" class="detialmovie-box" name="datein" id="datein" required />

              <label for="dateOut">DateOut</label>
              <input type="date" class="detialmovie-box" name="dateout" id="dateout" required/>

              <label for="synopsis">Synopsis</label>
              <input type="text" class="detialmovie-box" name="synopsis" id="synopsis" required/>

              <label for="rate">Rate</label>
              <select name="rate" id="rate" class="detialmovie-box">
                <option disabled selected value></option>
                <option value="G">G</option>
                <option value="PG">PG</option>
                <option value="PG-13">PG-13</option>
                <option value="R">R</option>
                <option value="NC-17">NC-17</option>
              </select>

              <input type="reset" value="Clear" class="clear-btn" />
            </div>

            <div class="detial-movie-right">
              <label for="Genre">Genre</label>
         
           
            <div class="genre">
              <input type="checkbox" id="genre1" name="genre1" value="Action">
              <label for="genre1">Action</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre2" name="genre2" value="Adventure">
              <label for="genre2">Adventure</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre3" name="genre3" value="Biography">
              <label for="genre3">Biography</label> 
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre4" name="genre4" value="Comedy">
              <label for="genre4">Comedy</label>
            </div>
            
            <div class="genre">
              <input type="checkbox" id="genre5" name="genre5" value="Crime">
              <label for="genre5">Crime</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre6" name="genre6" value="Detective">
              <label for="genre6">Detective</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre7" name="genre7" value="Drama">
              <label for="genre7">Drama</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre8" name="genre8" value="Fantasy">
              <label for="genre8">Fantasy</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre9" name="genre9" value="History">
              <label for="genre9">History</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre10" name="genre10" value="Horror">
              <label for="genre10">Horror</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre11" name="genre11" value="Musical">
              <label for="genre11">Musical</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre12" name="genre12" value="Mystery">
              <label for="genre12">Mystery</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre13" name="genre13" value="Romance">
              <label for="genre13">Romance</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre14" name="genre14" value="Sci-Fi">
              <label for="genre14">Sci-Fi</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre15" name="genre15" value="Sport">
              <label for="genre15">Sport</label>
            </div>
            
            <div class="genre">
              <input type="checkbox" id="genre16" name="genre16" value="Thriller">
              <label for="genre16">Thriller</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre17" name="genre17" value="War">
              <label for="genre17">War</label>
            </div>
              
            <div class="genre">
              <input type="checkbox" id="genre18" name="genre18" value="Western">
              <label for="genre18">Western</label>
            </div>
              
            </div>
            
          </div>
           
        <div class="btn-basic">
             <input class="btn-add-movie" type="submit" value="ADD" name="submit" style="margin:0px auto; display:block;" >
        
          
          
        </form>

       
         </div>
 <script>
          	function submitForm() {
            	document.getElementById("detial-movie").submit();
            }
          </script>



    <?php
  
if (isset($_POST['submit'])){
  
$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");

    $movieid = uniqid("MOV");
    $title = mysqli_real_escape_string($con, $_POST['title']);
	
	$trailer = mysqli_real_escape_string($con, $_POST['trailer']);
    $director = mysqli_real_escape_string($con, $_POST['director']);
    $cast = mysqli_real_escape_string($con, $_POST['cast']);
    $period = mysqli_real_escape_string($con, $_POST['period']);
	
    $datein = mysqli_real_escape_string($con, $_POST['datein']);
    $dateout = mysqli_real_escape_string($con, $_POST['dateout']);
    $synopsis = mysqli_real_escape_string($con, $_POST['synopsis']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $upfile = $_FILES['poster']['name'];
    
    $pathposter="/pic/$movieid.png";
    
    if(is_uploaded_file($_FILES['trailer']['tmp_name'])!=NULL)
    {
    $pathtrailer="/pic/TR$movieid";
        	move_uploaded_file($_FILES['trailer']['tmp_name'], "/home/a5.cpe231.cpe.kmutt.ac.th/public_html/pic/TR$movieid");
    }
    else $pathtrailer=NULL;
    
	
	    
	
    
    //part genre
    $genre1 = mysqli_real_escape_string($con, $_POST['genre1']);
    $genre2 = mysqli_real_escape_string($con, $_POST['genre2']);
    $genre3 = mysqli_real_escape_string($con, $_POST['genre3']);
    $genre4 = mysqli_real_escape_string($con, $_POST['genre4']);
    $genre5 = mysqli_real_escape_string($con, $_POST['genre5']);
    $genre6 = mysqli_real_escape_string($con, $_POST['genre6']);
    $genre7 = mysqli_real_escape_string($con, $_POST['genre7']);
    $genre8 = mysqli_real_escape_string($con, $_POST['genre8']);
    $genre9 = mysqli_real_escape_string($con, $_POST['genre9']);
     $genre10 = mysqli_real_escape_string($con, $_POST['genre10']);
    $genre11 = mysqli_real_escape_string($con, $_POST['genre11']);
    $genre12 = mysqli_real_escape_string($con, $_POST['genre12']);
    $genre13 = mysqli_real_escape_string($con, $_POST['genre13']);
    $genre14 = mysqli_real_escape_string($con, $_POST['genre14']);
    $genre15 = mysqli_real_escape_string($con, $_POST['genre15']);
    $genre16 = mysqli_real_escape_string($con, $_POST['genre16']);
    $genre17 = mysqli_real_escape_string($con, $_POST['genre17']);
    $genre18 = mysqli_real_escape_string($con, $_POST['genre18']);
    
    
    
    /*echo $rate;
    echo $upfile;*/




	$sql="INSERT INTO Movie (MovieID,MovieTitle,Poster,Trailer,Director,Cast,Synopsis,DateIn,DateOut,Period,Rate)
	VALUES ('$movieid','$title','$pathposter','$pathtrailer','$director','$cast','$synopsis','$datein','$dateout','$period','$rate')";
	

	

	is_uploaded_file($_FILES['poster']['tmp_name']);
	

	move_uploaded_file($_FILES['poster']['tmp_name'], "/home/a5.cpe231.cpe.kmutt.ac.th/public_html/pic/$movieid.png");

	
	
		
		if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
	}
	
//Add GENRE	
$con=mysqli_connect("localhost","a5_test1","merje5","a5_test1");

   
  if($genre1!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre1')";
    mysqli_query($con,$sql2);}
    
     if($genre2!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre2')";
    mysqli_query($con,$sql2);} 
    
     if($genre3!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre3')";
    mysqli_query($con,$sql2);} 
    
    if($genre4!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre4')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre5!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre5')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre6!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre6')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre7!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre7')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre8!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre8')";
    mysqli_query($con,$sql2);} 
    
    if($genre9!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre9')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre10!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre10')";
    mysqli_query($con,$sql2);} 
    
    if($genre11!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre11')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre12!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre12')";
    mysqli_query($con,$sql2);} 
    
    if($genre13!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre13')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre14!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre14')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre15!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre15')";
    mysqli_query($con,$sql2);} 
    
    if($genre16!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre16')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre17!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre17')";
    mysqli_query($con,$sql2);} 
    
    
    if($genre18!=NULL) 
   { $genreofmovieid = uniqid("");
    $sql2="INSERT INTO EachGenreOfMovie (GenreOfMovieID,MovieID,GenreName)
	VALUES ('$genreofmovieid','$movieid','$genre18')";
    mysqli_query($con,$sql2);} 
 
 
    
}
 
   
    ?>

      
        </div>
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

    </div>

    <script>
      let btn = document.querySelector("#btn-slidetab");
      let sidebar = document.querySelector(".sidebar");

      btn.onclick = function () {
        sidebar.classList.toggle("active");
      };
    </script>
  </body>
</html>

