<!-- /* 
Filename : ../views/login.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 14-05-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
session_start();
require_once ('config.php');
require_once ('localisation.php');
require_once ('language_session.php');
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.lime-amber.min.css" />
  <link rel="stylesheet" href="../public/css/stylelogin.css">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" /> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css"> 
   <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.brown-red.min.css" /> 

   <style type="text/css">
     @media screen and (max-width: 800px) {

      #form {
        width: 90% !important;
        margin-left: 5% !important;
        font-size: 100% !important;
      }

     }
   </style>
</head>

<body>

<!-- <div style="margin-top: 0px;">
  Languages : 
  <a href="?lang=en">En</a>
  <a href="?lang=hi">Hi</a> -->

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row" style="background: rgba(0,0,0,0.5);">
      <!-- Title -->
      <span class="mdl-layout-title"><a href="index.php" style="color: white; text-decoration: none;">EWOK - Enabling Women of Kamand</a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
      <!-- <a class="mdl-navigation__link" href="#" role="button" ><i class="material-icons">face</i><?php echo $t15;?></a> -->
        <a class="mdl-navigation__link" href="register.php" role="button" ><i class="material-icons">account_circle</i> <?php echo $t13;?></a>
        <a class="mdl-navigation__link" href="?lang=en" role="button" ><i class="material-icons">language</i> English</a>
        <a class="mdl-navigation__link" href="?lang=hi" role="button" ><i class="material-icons">language</i> हिंदी</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer" >
    <span class="mdl-layout-title" >EWOK</span>
    <nav class="mdl-navigation" >
      <a class="mdl-navigation__link" href="register.php" >Register</a>
      <a class="mdl-navigation__link" href="#" >View Registered User's Profiles</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <img src="../public/img/EWOKLogo-1.png" alt="EWOKLogo" style="background-attachment:fixed; height: 80%; width: 70%; margin-left: 15%; padding-top: 1.2%; opacity: 0.05; position: fixed;">


    <form id="form" action = "authenticate_login.php" method = "POST"  style="margin-left:25%;margin-top:6.5%;background-color: rgba(0,0,0,0.7); width: 50%; height: 60%; z-index: 10;">
      <div style="padding-top: 6%; text-align: center; color: white;">

      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label id="form" class="mdl-textfield__label" for="phonenum" style="font-size: 140%;color: white;"><b><?php echo $t9;?></b></label></br>
      <input class="mdl-textfield__input" id="phonenum" type="text" placeholder="<?php echo $t14;?> <?php echo $t9;?>" name="phonenum" style="font-size: 100%;" required>
      </div>

      </br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
      <label id="form" class="mdl-textfield__label" style="font-size: 140%;color: white;"><b><?php echo $t10;?></b></label></br>
      <input class="mdl-textfield__input" type="password" placeholder="<?php echo $t14;?> <?php echo $t10;?>" name="psw" required style="font-size: 100%;">
      </div>
      </br>

       
      </br>

      <a href="index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" class="button"><?php echo $t12;?></a>
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" class="signupbtn"><?php echo $t16;?></button>
      </div>
    </form>
  
  </main>
  
  </div>
</body>
</html>