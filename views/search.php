<!-- /* 
Filename : ../views/search.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 15-08-2017
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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.lime-amber.min.css" />
  <link rel="stylesheet" href="../public/css/material.min.css">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" /> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css"> 
   <link rel="stylesheet" href="../public/css/stylehome.css">
   <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
 <link href="../public/css/bootstrap.min.css" rel="stylesheet" />
  <style type="text/css">
    tr:hover td {background:#000}

  </style>
</head>
<body>

<div style="margin-top: 0px;">
  <!-- Languages : 
  <a href="?lang=en">En</a>
  <a href="?lang=hi">Hi</a> -->

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row" style="background: rgba(0,0,0,0.5);">
      <!-- Title -->
      <span class="mdl-layout-title""><a href="index.php" style="color: white;font-size: 150%; text-decoration: none;">EWOK - Enabling Women of Kamand</a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
      <!-- <a class="mdl-navigation__link" href="#" role="button" ><i class="material-icons">face</i> View Registered User's Profile</a> -->
        <a class="mdl-navigation__link" href="register.php" role="button" ><i class="material-icons">account_circle</i> Register</a>
        <a class="mdl-navigation__link" href="login.php" role="button" ><i class="material-icons">exit_to_app</i> Login</a>
        <a class="mdl-navigation__link" href="?lang=en" role="button" ><i class="material-icons">language</i> English</a>
        <a class="mdl-navigation__link" href="?lang=hi" role="button" ><i class="material-icons">language</i> हिंदी</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer" >
    <span class="mdl-layout-title" >EWOK</span>
    <nav class="mdl-navigation" >
      <a class="mdl-navigation__link" href="register.php" >Register</a>
      <a class="mdl-navigation__link" href="login.php" >Login</a>
     <!--  <a class="mdl-navigation__link" href="#" >View Registered User's Profiles</a> -->
      <a class="mdl-navigation__link" href="?lang=en" role="button" ><i class="material-icons">language</i> English</a>
        <a class="mdl-navigation__link" href="?lang=hi" role="button" ><i class="material-icons">language</i> हिंदी</a>
    </nav>
  </div>
  <main class="mdl-layout__content" >
  
    <!-- <img src="../public/img/EWOKLogo-1.png" alt="EWOKLogo" style="background-attachment:fixed; height: 100%; width: 100%; padding-top: 1.2%; opacity: 0.1; position: fixed;"> -->

    <div class="container"></br></br>
   <div class="form-group" style="position: fixed; width: 60%; margin-left: 15%;">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Name, Profession, Skill, Gender, Village, District" class="form-control" />
    </div>
   </div>
   <br/><br/>
   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 20%;">
      <label class="mdl-textfield__label" style="color: black; font-size: 100%;"><b><?php echo $t74;?> <?php echo $t61;?> </b></label></br>
      <select class="mdl-textfield__input" id="papa" style="color: black; font-size: 100%;" name="pro">
        <option>-<?php echo $t58;?> <?php echo $t61;?>-</option>
        <option value="tailor" class="beta" ><?php echo $t75;?> </option>
        <option value="cook"><?php echo $t76;?></option>
        <option value="sew"><?php echo $t77;?></option>
        <option value="farmer"><?php echo $t78;?></option>
        <option value="teacher"><?php echo $t79;?></option>
      </select>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 20%;">
      <label class="mdl-textfield__label" style="color: black; font-size: 100%;"><b><?php echo $t74;?> <?php echo $t24;?></b></label></br>
      <select class="mdl-textfield__input" id="chote_papa" style="color: black; font-size: 100%;" name="state">
        <option>-<?php echo $t58;?> <?php echo $t24;?>-</option>
        <option value="married"><?php echo $t25;?></option>
        <option value="unmarried"><?php echo $t26;?></option>
        <option value="widow"><?php echo $t27;?></option>
        <option value="divorce"><?php echo $t28;?></option>
      </select>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 20%;">
      <label class="mdl-textfield__label" style="color: black; font-size: 100%;"><b><?php echo $t74;?> <?php echo $t48;?></b></label></br>
      <select class="mdl-textfield__input" id="edu" style="color: black; font-size: 100%;" name="education">
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
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 20%;">
      <label class="mdl-textfield__label" style="color: black; font-size: 100%;"><b><?php echo $t74;?> <?php echo $t59;?></b></label></br>
      <select class="mdl-textfield__input" id="city" style="color: black; font-size: 100%;" name="city">
        <option>-<?php echo $t58;?> <?php echo $t59;?>-</option>
        <option value="mandi">Mandi</option>
        <option value="shimla">Shimla</option>
        <option value="kullu">Kullu</option>
        <option value="manali">Manali</option>
        <option value="dharamshala">Dharamshala</option>
      </select><!-- //the city dropdown appear accordingly as the state chosen. -->
      </div>
   <br/>
   <div id="result" style="background-color: rgba(0,0,0,0.7); color: white; font-size: 100%;"></div>
  </div>

  </main>
</div>
</body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 $('#beta').click(function(e){
 //    var prof = $('#papa').val();
 //    if(prof == "-Choose Profession-"){
 //      $('#search_text').val('');
 //      $('#search_text').keyup();
 //      return;
 //    }
 //    $('#search_text').val(prof);
 //    $('#search_text').keyup();
 // });
  $('#papa').click(function(e){
    var prof = $('#papa').val();
    $('#search_text').val(prof);
    $('#search_text').keyup();
 });
});
  $('#chote_papa').click(function(e){
    var prof = $('#chote_papa').val();
    $('#search_text').val(prof);
    $('#search_text').keyup();
 });
  $('#papa').click(function(e){
    var prof = $('#papa').val();
    $('#search_text').val(prof);
    $('#search_text').keyup();
 });
  $('#edu').click(function(e){
    var prof = $('#edu').val();
    $('#search_text').val(prof);
    $('#search_text').keyup();
 });
  $('#city').click(function(e){
    var prof = $('#city').val();
    $('#search_text').val(prof);
    $('#search_text').keyup();
 });
});
</script>