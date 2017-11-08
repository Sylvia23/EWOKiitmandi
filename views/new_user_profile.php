<!-- /* 
Filename : ../views/new_user_profile.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 15-05-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
  session_start();
  require_once ('config.php');
  //require_once ('language_session.php');
  require_once ('localisation.php');


 //  	$UserId = value_of_auto_increment_field();
	// $_SESSION['UserId'] = $UserId;
  	$Username = $_POST['phonenum'];

  	$Password = $_POST['psw'];
  	$encPW = MD5($Password);
  	// $escapedPW = mysql_real_escape_string($_POST['psw']);
  	// $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
  	// $saltedPW =  $escapedPW . $salt;
  	// $hashedPW = hash('sha256', $saltedPW);

  	$RePassword = $_POST['psw-repeat'];

  	if ($Password != $RePassword)
	{
	    echo("Oops! Password did not match! Try again. ");
	    error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
	    exit();
	}

	else
	{

	  	$sql = "INSERT INTO users (Username,Password,UPDATED_BY) VALUES ('$Username','$encPW','$Username')";

	  	if(!mysqli_query($con, $sql))
	  	{
	  		error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
	  		echo 'Username already exsists! Try with other Username.';
	  		exit();	
	  	}
	  	else
	  	{
	  		//echo 'Congrats! Successfully Registered.';
	  	}

  	}

  	 $UserId = "SELECT UserId FROM users WHERE Username = '$Username'"; 
  	 $resultid = mysqli_query($con, $UserId);
  	 $UserId = $resultid -> fetch_assoc()["UserId"];
  	 $_SESSION['UserId'] = $UserId;
  	 //echo $UserId;

  	// header ("refresh:5; url=register.html");

  ?>


  
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Fill Profile</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.lime-amber.min.css" />
<!--  <link rel="stylesheet" href="css/material.min.css">
 -->  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" /> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css"> 
   <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.brown-red.min.css" /> 

  <style type="text/css">
    /* fallback */
      @font-face {
        font-family: 'Material Icons';
        font-style: normal;
        font-weight: 400;
        src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v22/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
      }

      .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -moz-font-feature-settings: 'liga';
        -moz-osx-font-smoothing: grayscale;
      }

      .demo-list-two {
        width: 300px;
      }

      .demo-layout-transparent {
        background: url('../public/img/3.JPG') center / cover;
        background-attachment: fixed;
        opacity: 1;
      }
      .demo-layout-transparent .mdl-layout__header,
      .demo-layout-transparent .mdl-layout__drawer-button {
        /* This background is dark, so we set text to white. Use 87% black instead if
           your background is light. */
        color: white;
      }

      .image { 
         position: relative; 
         width: 100%; /* for IE 6 */
      }

      /*.button { 
         position: absolute; 
         top: 55%; 
         left: 0; 
         width: 100%;
         text-align: center;
         color: white;
         font-family: 'Roboto Condensed', sans-serif;
      }
*/
      h2{
        text-align: center;
         color: white;
         font-family: 'Roboto Condensed', sans-serif;
      }

      a.button {
      -webkit-appearance: button;
      -moz-appearance: button;
      appearance: button;

      text-decoration: none;
      color: initial;

  </style>
</head>
<body>


<div style="margin-top: 0px;">
  <!-- Languages : 
  <a href="?lang=en">En</a>
  <a href="?lang=hi">Hi</a> -->

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent" >
    <div class="mdl-layout__header-row" >
      <!-- Title -->
      <span class="mdl-layout-title"><a href="index.php" style="color: white; text-decoration: none;">EWOK - Enabling Women of Kamand</a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
      <!-- <a class="mdl-navigation__link" href="#" role="button" ><i class="material-icons">face</i> <?php echo $t15;?></a> -->
       <!--  <a class="mdl-navigation__link" href="register.html" role="button" ><i class="material-icons">account_circle</i> Register</a> -->
       <!-- <a class="mdl-navigation__link" href="?lang=en" role="button" ><i class="material-icons">language</i> English</a>
        <a class="mdl-navigation__link" href="?lang=hi" role="button" ><i class="material-icons">language</i> हिंदी</a> -->
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer" >
    <span class="mdl-layout-title" >EWOK</span>
    <nav class="mdl-navigation" >
      <a class="mdl-navigation__link" href="register.php" ><?php echo $t13;?></a>
      <a class="mdl-navigation__link" href="#" ><?php echo $t15;?></a>
    </nav>
  </div>
  <main class="mdl-layout__content">

    <img src="../public/img/EWOKLogo-1.png" alt="EWOKLogo" style=" background-attachment:fixed; height: 80%; width: 70%; margin-left: 17%; padding-top: 3.2%; opacity: 0.05; position: fixed;">
   
    <div style="padding-top: 1%; margin-left: 20%;">

   <form action = "registered.php" method = "POST" enctype="multipart/form-data" style="background-color: rgba(0,0,0,0.8); width: 75%; height: 330%; z-index: 10;">
    <div class="regform" style="padding-top: 2%; text-align: center; ">

    <h1 style="text-align: center; color: white;"><?php echo $t17;?></h1>
    <h2 style="text-align: center; color: white;"><?php echo $t18;?></h2>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" for="name" style="color: white; font-size: 140%;"><b><?php echo $t19;?></b></label></br>
      <input class="mdl-textfield__input" type="text" name="name" placeholder="<?php echo $t14;?> <?php echo $t19;?>" style="color: white; font-size: 100%;" required> 
    </div>

      </br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" for="name" style="color: white; font-size: 140%;"><b><?php echo $t20;?></b></label></br>
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" type="text" name="father" placeholder="<?php echo $t14;?> <?php echo $t20;?>">
    </div>

      </br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">    
      <label class="mdl-textfield__label" for="name" style="color: white; font-size: 140%;" for="gender"><b><?php echo $t21;?></b></label></br></br>
      <div style="color: white;">
      <input type="radio" name="gender" value="m"><?php echo $t22;?>
      <input type="radio" name="gender" value="f" checked=""><?php echo $t23;?>
      </div>
    </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">    
      <div class="radio">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;" for="marital"><b><?php echo $t24;?></b></label></br></br>
      <div style="color: white;">
      <input type="radio" name="marital" value="married"><?php echo $t25;?>
      <input type="radio" name="marital" value="unmarried"><?php echo $t26;?>
      <input type="radio" name="marital" value="widow"><?php echo $t27;?>
      <input type="radio" name="marital" value="unmarried"><?php echo $t28;?>
      <input type="radio" name="marital" value="others" checked=""><?php echo $t29;?>
      </div>
      </div>
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t30;?></b></label></br><!-- //if (married == true) -->
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" type="text" name="husband" placeholder="<?php echo $t14;?> <?php echo $t30;?>">
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;" for="phonenum"><b><?php echo $t31;?></b></label></br>
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" id="phonenum" type="text" placeholder="<?php echo $t14;?> <?php echo $t31;?>" name="phonenum" required >
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t32;?></b></label></br></br>
        <div class="mdl-textfield__input" style="color: white; font-size: 100%;" class="dob">
        <select name="DOBMonth">
        <option> - <?php echo $t33;?> - </option>
        <option value="January"><?php echo $t34;?></option>
        <option value="Febuary"><?php echo $t35;?></option>
        <option value="March"><?php echo $t36;?></option>
        <option value="April"><?php echo $t37;?></option>
        <option value="May"><?php echo $t38;?></option>
        <option value="June"><?php echo $t39;?></option>
        <option value="July"><?php echo $t40;?></option>
        <option value="August"><?php echo $t41;?></option>
        <option value="September"><?php echo $t42;?></option>
        <option value="October"><?php echo $t43;?></option>
        <option value="November"><?php echo $t44;?></option>
        <option value="December"><?php echo $t45;?></option>
      </select>

      <select name="DOBDay">
        <option> - <?php echo $t46;?> - </option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>

      <select name="DOBYear">
        <option> - <?php echo $t47;?> - </option>
        <option value="2005">2005</option>
        <option value="2004">2004</option>
        <option value="2003">2003</option>
        <option value="2002">2002</option>
        <option value="2001">2001</option>
        <option value="2000">2000</option>
        <option value="1999">1999</option>
        <option value="1998">1998</option>
        <option value="1997">1997</option>
        <option value="1996">1996</option>
        <option value="1995">1995</option>
        <option value="1994">1994</option>
        <option value="1993">1993</option>
        <option value="1992">1992</option>
        <option value="1991">1991</option>
        <option value="1990">1990</option>
        <option value="1989">1989</option>
        <option value="1988">1988</option>
        <option value="1987">1987</option>
        <option value="1986">1986</option>
        <option value="1985">1985</option>
        <option value="1984">1984</option>
        <option value="1983">1983</option>
        <option value="1982">1982</option>
        <option value="1981">1981</option>
        <option value="1980">1980</option>
        <option value="1979">1979</option>
        <option value="1978">1978</option>
        <option value="1977">1977</option>
        <option value="1976">1976</option>
        <option value="1975">1975</option>
        <option value="1974">1974</option>
        <option value="1973">1973</option>
        <option value="1972">1972</option>
        <option value="1971">1971</option>
        <option value="1970">1970</option>
        <option value="1969">1969</option>
        <option value="1968">1968</option>
        <option value="1967">1967</option>
        <option value="1966">1966</option>
        <option value="1965">1965</option>
        <option value="1964">1964</option>
        <option value="1963">1963</option>
        <option value="1962">1962</option>
        <option value="1961">1961</option>
        <option value="1960">1960</option>
        <option value="1959">1959</option>
        <option value="1958">1958</option>
        <option value="1957">1957</option>
        <option value="1956">1956</option>
        <option value="1955">1955</option>
        <option value="1954">1954</option>
        <option value="1953">1953</option>
        <option value="1952">1952</option>
        <option value="1951">1951</option>
        <option value="1950">1950</option>
        <option value="1949">1949</option>
        <option value="1948">1948</option>
        <option value="1947">1947</option>
      </select>
      </div></div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t48;?></b></label></br></br>
      <select class="mdl-textfield__input" style="color: white; font-size: 100%;" name="education">
        <option>-<?php echo $t49;?>-</option>
        <option value="fifth"><?php echo $t50;?></option>
        <option value="eighth"><?php echo $t51;?></option>
        <option value="tenth"><?php echo $t52;?></option>
        <option value="twelveth"><?php echo $t53;?></option>
        <option value="graduate"><?php echo $t54;?></option>
        <option value="post"><?php echo $t55;?></option>
        <option value="other"><?php echo $t29;?></option>
      </select>
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t56;?></b></label></br>
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" type="text" name="address" placeholder="<?php echo $t14;?> <?php echo $t56;?>">
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t57;?></b></label></br>
      <select class="mdl-textfield__input" style="color: white; font-size: 100%;" name="state">
        <option>-<?php echo $t58;?> <?php echo $t57;?>-</option>
        <option value="hp">Himachal Pradesh</option>
        <option value="jk">Jammu and Kashmir</option>
        <option value="haryana">Haryana</option>
        <option value="punjab">Punjab</option>
        <option value="up">Uttar Pradesh</option>
      </select>
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t59;?></b></label></br>
      <select class="mdl-textfield__input" style="color: white; font-size: 100%;" name="city">
        <option>-<?php echo $t58;?> <?php echo $t59;?>-</option>
        <option value="mandi">Mandi</option>
        <option value="shimla">Shimla</option>
        <option value="kullu">Kullu</option>
        <option value="manali">Manali</option>
        <option value="dharamshala">Dharamshala</option>
      </select><!-- //the city dropdown appear accordingly as the state chosen. -->
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t60;?></b></label></br>
      <select class="mdl-textfield__input" style="color: white; font-size: 100%;" name="village">
        <option>-<?php echo $t58;?> <?php echo $t60;?>-</option>
        <option value="riyagadi">Riyagadi</option>
        <option value="katindi">Katindi</option>
        <option value="neri">Neri</option>
        <option value="kamand">Kamand Valley</option>
        <option value="kanahar">Kanahar</option>
      </select><!-- //the village dropdown appear accordingly as the city chosen. -->
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t61;?></b></label></br>
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" type="text" name="pro" placeholder="<?php echo $t14;?> <?php echo $t61;?>">
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t62;?></b></label></br>
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" type="text" name="skills" placeholder="<?php echo $t14;?> <?php echo $t62;?>">
      <!-- //Add more dynamically -->
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t63;?></b></label></br>
      <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
          <div class="mdl-textfield__input" style="color: white; font-size: 100%;">
          <h6 style="color: black;"><?php echo $t64;?></h6>
          <input  type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" value="Upload Image" name="submit">
          </div>
      <!-- </form> -->

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label class="mdl-textfield__label" style="color: white; font-size: 140%;"><b><?php echo $t65;?></b></label></br>
      <input class="mdl-textfield__input" style="color: white; font-size: 100%;" type="text" name="description" placeholder="<?php echo $t14;?> <?php echo $t65;?>">
      <!-- <textarea rows="4" cols="50" name="description" form="usrform">Write Description Here.</textarea> -->
      </div>


      </br></br></br></br>
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="Submit" style="left:35%;"><?php echo $t66;?></button>
      
      </div> 
    </form>
    </div>
  
  </main>
  
  </div>

  
</body>
</html>