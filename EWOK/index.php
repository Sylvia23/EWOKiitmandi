<!-- Sylvia Mittal
IIT Mandi
B16038
html -->

<?php
$lang = $_GET['lang'];
$langarray = array('en','hi');
$found = false;

if (in_array($lang, $langarray)) {
	$found = true;
}

if (!$found) {
	$lang = 'en';
}

$xml=simplexml_load_file("languages.xml") or die("xml not found!");
$title=$xml->title->$lang;
$t1=$xml->t1->$lang;
$t2=$xml->t2->$lang;
$t3=$xml->t3->$lang;
$t4=$xml->t4->$lang;
$t5=$xml->t5->$lang;
$t6=$xml->t6->$lang;
$t7=$xml->t7->$lang;
$t8=$xml->t8->$lang;
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.lime-amber.min.css" />
  <link rel="stylesheet" href="public/css/material.min.css">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" /> 
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css"> 
   <link rel="stylesheet" href="public/css/stylehome.css">
</head>

<body>


<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row" style="background: rgba(0,0,0,0.5);">
      <!-- Title -->
      <span class="mdl-layout-title""><a href="index.php" style="color: white;font-size: 150%; text-decoration: none;">EWOK - Enabling Women of Kamand</a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation"">
        <a class="mdl-navigation__link" href="?lang=en" role="button" ><i class="material-icons">face</i> English</a>
        <a class="mdl-navigation__link" href="?lang=hi" role="button" ><i class="material-icons">face</i> Hindi</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer" >
    <span class="mdl-layout-title" >EWOK</span>
    <nav class="mdl-navigation" >
      <a class="mdl-navigation__link" href="register.php" >Register</a>
      <a class="mdl-navigation__link" href="login.php" >Login</a>
      <a class="mdl-navigation__link" href="#" >View Registered User's Profiles</a>
    </nav>
  </div>
  <main class="mdl-layout__content" >
  <div class="wrapper">

     <img src="public/img/EWOKLogo-1.png" alt="EWOKLogo" style="background-attachment:fixed; height: 100%; width: 100%; padding-top: 1.2%; opacity: 0.01; margin-left: -50.5%; position: fixed;">

    <div id="one">
    	<h4 style="color: white;"><?php echo $t1;?></h4>
    	<p style="color: white;font-size: 130%; padding-left: 2%;padding-right: 2%;"> <?php echo $t2;?></p>
    	<h4 style="color: white;"><?php echo $t3;?></h4></br>
    	<h4 style="color: white;"><?php echo $t4;?></h4>
    	<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="#" role="button" style="padding-top: 2%; padding-bottom: 2%; padding-right: 8.5%; padding-left: 8.5%;" ><i class="material-icons">face</i> View Here</a></br></br>
    	<h4 style="color: white; display: inline-block;	"><?php echo $t5;?> </h4>
    	<a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href="search.php" role="button"><i class="material-icons">search</i></a>
	</div>

    <div id="two">
    	<h4 style="color: white;"><?php echo $t6;?></h4></br>
    	<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="register.php" role="button" style="padding-top: 2%; padding-bottom: 2%; padding-right: 8.5%; padding-left: 8.5%;" ><i class="material-icons">account_circle</i> Register</a></br></br></br></br>
    	<h4 style="color: white;"><?php echo $t7;?></br> <?php echo $t8;?></h4></br>
    	<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="login.php" role="button" style="padding-top: 2%; padding-bottom: 2%; padding-right: 8.5%; padding-left: 8.5%;" ><i class="material-icons">exit_to_app</i> Login</a></br></br></br></br>
    </div>
</div>
  </main>
</div>
</body>
</html>