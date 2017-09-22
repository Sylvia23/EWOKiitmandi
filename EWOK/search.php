<!-- Sylvia Mittal
IIT Mandi
B16038
html -->

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.lime-amber.min.css" />
  <link rel="stylesheet" href="public/css/material.min.css">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" /> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css"> 
   <link rel="stylesheet" href="public/css/stylehome.css">
   <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
 <link href="public/css/bootstrap.min.css" rel="stylesheet" />
  <style type="text/css">
    tr:hover td {background:#000}
  </style>
</head>
<body>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row" style="background: rgba(0,0,0,0.5);">
      <!-- Title -->
      <span class="mdl-layout-title""><a href="index.html" style="color: white;font-size: 150%; text-decoration: none;">EWOK - Enabling Women of Kamand</a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
      <!-- <a class="mdl-navigation__link" href="#" role="button" ><i class="material-icons">face</i> View Registered User's Profile</a> -->
        <a class="mdl-navigation__link" href="register.html" role="button" ><i class="material-icons">account_circle</i> Register</a>
        <a class="mdl-navigation__link" href="login.html" role="button" ><i class="material-icons">exit_to_app</i> Login</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer" >
    <span class="mdl-layout-title" >EWOK</span>
    <nav class="mdl-navigation" >
      <a class="mdl-navigation__link" href="register.html" >Register</a>
      <a class="mdl-navigation__link" href="login.html" >Login</a>
      <a class="mdl-navigation__link" href="#" >View Registered User's Profiles</a>
    </nav>
  </div>
  <main class="mdl-layout__content" >
  
    <!-- <img src="public/img/EWOKLogo-1.png" alt="EWOKLogo" style="background-attachment:fixed; height: 100%; width: 100%; padding-top: 1.2%; opacity: 0.1; position: fixed;"> -->

    <div class="container"></br></br>
   <div class="form-group" style="position: fixed; width: 60%; margin-left: 15%;">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Name, Profession, Skill, Gender, Village, District" class="form-control" />
    </div>
   </div>
   <br/><br/><br/>
   <div id="result" style="background-color: rgba(0,0,0,0.5); color: white; font-size: 100%;"></div>
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
});
</script>