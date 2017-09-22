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
$t9=$xml->t9->$lang;
$t10=$xml->t10->$lang;
$t11=$xml->t11->$lang;
$t12=$xml->t12->$lang;
$t13=$xml->t13->$lang;
$t14=$xml->t14->$lang;
$t15=$xml->t15->$lang;
$t16=$xml->t16->$lang;
$t17=$xml->t17->$lang;
$t18=$xml->t18->$lang;
$t19=$xml->t19->$lang;
$t20=$xml->t20->$lang;
$t21=$xml->t21->$lang;
$t22=$xml->t22->$lang;
$t23=$xml->t23->$lang;
$t24=$xml->t24->$lang;
$t25=$xml->t25->$lang;
$t26=$xml->t26->$lang;
$t27=$xml->t27->$lang;
$t28=$xml->t28->$lang;
$t29=$xml->t29->$lang;
$t30=$xml->t30->$lang;
$t31=$xml->t31->$lang;
$t32=$xml->t32->$lang;
$t33=$xml->t33->$lang;
$t34=$xml->t34->$lang;
$t35=$xml->t35->$lang;
$t36=$xml->t36->$lang;
$t37=$xml->t37->$lang;
$t38=$xml->t38->$lang;
$t39=$xml->t39->$lang;
$t40=$xml->t40->$lang;
$t41=$xml->t41->$lang;
$t42=$xml->t42->$lang;
$t43=$xml->t43->$lang;
$t44=$xml->t44->$lang;
$t45=$xml->t45->$lang;
$t46=$xml->t46->$lang;
$t47=$xml->t47->$lang;
$t48=$xml->t48->$lang;
$t49=$xml->t49->$lang;
$t50=$xml->t50->$lang;
$t51=$xml->t51->$lang;
$t52=$xml->t52->$lang;
$t53=$xml->t53->$lang;
$t54=$xml->t54->$lang;
$t55=$xml->t55->$lang;
$t56=$xml->t56->$lang;
$t57=$xml->t57->$lang;
$t58=$xml->t58->$lang;
$t59=$xml->t59->$lang;
$t60=$xml->t60->$lang;
$t61=$xml->t61->$lang;
$t62=$xml->t62->$lang;
$t63=$xml->t63->$lang;
$t64=$xml->t64->$lang;
$t65=$xml->t65->$lang;
$t66=$xml->t66->$lang;
$t67=$xml->t67->$lang;
$t68=$xml->t68->$lang;
$t69=$xml->t69->$lang;
$t70=$xml->t70->$lang;
$t71=$xml->t71->$lang;
$t72=$xml->t72->$lang;
$t73=$xml->t73->$lang;
?>

<?php
  
  session_start();

    $con = mysqli_connect('127.0.0.1','sylvia');

    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      //you need to exit the script, if there is an error
      exit();
    }
    if(!$con)
    {
      echo 'Not connected to server';
    }
    else {
      //echo 'Connected';
    }

    if(!mysqli_select_db($con, 'essp'))
    {
      echo 'Database not selected';
    }

  $UserId = $_SESSION['UserId'];
  //echo $UserId;
  $Name = $_POST['name'];
  $FatherName = $_POST['father'];
  $Gender = $_POST['gender']; 
  $MaritalStatus = $_POST['marital']; 
  $HusbandName = $_POST['husband'];
  $PhoneNum = $_POST['phonenum'];

  date_default_timezone_set('UTC');
  $DOBYear = $_POST['DOBYear'];
  $DOBMonth = $_POST['DOBMonth'];
  $DOBDay = $_POST['DOBDay'];
  $dob = $DOBYear - $DOBMonth - $DOBDay;
  $timestamp = strtotime($dob);
  $DOB = date("Y-m-d", $timestamp);

  $EducationStatus = $_POST['education'];
  $Address = $_POST['address'];
  $State = $_POST['state'];
  $District = $_POST['city'];
  $Village = $_POST['village'];
  $Profession = $_POST['pro'];
  $OtherSkills = $_POST['skills']; 
  $Description = $_POST['description'];
  $Updated_by = $_POST['phonenum']; 

  // $qry = "SELECT * FROM users WHERE UserId = $UserId"; 

  // $id = mysqli_query($qry);
  // $num_rows = mysqli_num_rows($id);

    $sql = "INSERT INTO profiles (UserId, Name, FatherName, Gender, MaritalStatus, HusbandName, PhoneNum, DOB, EducationStatus, Address, State, District, Village, Profession, OtherSkills, Description, Updated_by) VALUES ('$UserId', '$Name', '$FatherName', '$Gender', '$MaritalStatus', '$HusbandName', '$PhoneNum', '$DOB', '$EducationStatus', '$Address', '$State', '$District', '$Village', '$Profession', '$OtherSkills', '$Description', '$Updated_by')";

    // if ($num_rows > 0) {

    //  mysqli_query($sql);
    // }

    if(!mysqli_query($con, $sql))
    {
      error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
    }
    else
    {
      //echo 'Congrats! Successfully Registered.';
    }

    //Uploadin' Photo;

     $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //$UserId = $_SESSION['UserId'];

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) 
    {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check !== false) 
        {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } 
        else 
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file))
    {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) 
    {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
    {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    //$upload_image = "uploads/$_FILES["fileToUpload"]["name"]";

    //echo $UserId;

    if ($uploadOk == 0)
    {
         echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 

    else 
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {        
          //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        $sqli = 'INSERT INTO photos(UserID, Location, Updated_by) VALUES ('.$UserId.',"uploads/' . $_FILES["fileToUpload"]["name"] . '",'.$UserId.')';
        //$sqli = 'INSERT into users values ("uploads/$_FILES["fileToUpload"]["name"])';
        //echo $sqli;
        $con->query($sqli);

        error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);

      } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    // header ("refresh:5; url=register.html");

  ?>




<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registered</title>
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
        background: url('public/img/gender.jpg') center / cover;
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

      .profile {

      }

  </style>
</head>
<body>


<div style="margin-top: 0px;">
  Languages : 
  <a href="?lang=en">En</a>
  <a href="?lang=hi">Hi</a>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent" >
    <div class="mdl-layout__header-row" >
      <!-- Title -->
      <span class="mdl-layout-title"><a href="index.php" style="color: white; text-decoration: none;">EWOK - Enabling Women of Kamand</a></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="#" role="button" ><i class="material-icons">face</i><?php echo $t15;?></a>
       <a class="mdl-navigation__link" href="index.php" role="button" ><i class="material-icons">exit_to_app</i> <?php echo $t67;?></a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer" >
    <span class="mdl-layout-title" >EWOK</span>
    <nav class="mdl-navigation" >
      <a class="mdl-navigation__link" href="index.php" ><?php echo $t67;?></a>
      <a class="mdl-navigation__link" href="#" ><?php echo $t15;?></a>
    </nav>
  </div>
  <main class="mdl-layout__content">

    <img src="public/img/EWOKLogo-1.png" alt="EWOKLogo" style=" background-attachment:fixed; height: 80%; width: 70%; margin-left: 15%; padding-top: 3.2%; opacity: 0.05; position: fixed;">

    <div style="padding-top: 1%; margin-left: 12%;">
   <form style="background-color: rgba(0,0,0,0.8); width: 90%; height: 300%;z-index: 10;">
    <div style="padding-top: 2%; text-align: center; color: white; ">

    <h1><?php echo $t70;?> <?php echo $_POST["name"];?> !</h1>
    <h2><?php echo $t71;?> </h2>

    <?php echo $t72;?>  <?php echo $_POST["phonenum"];?></br>

    <h5><?php echo $t19;?> : <?php echo $_POST["name"];?> </h5>
    <h5><?php echo $t20;?> : <?php echo $_POST["father"];?></h5>
    <h5><?php echo $t21;?> : <?php echo $_POST["gender"];?></h5>    
    <h5><?php echo $t24;?> : <?php echo $_POST["marital"];?></h5>      
    <h5><?php echo $t30;?> : <?php echo $_POST["husband"];?> </h5>       
    <h5><?php echo $t31;?> : <?php echo $_POST["phonenum"];?></h5>      
    <h5><?php echo $t32;?> : <?php echo $_POST["DOBDay"];?> - <?php echo $_POST["DOBMonth"];?> - <?php echo $_POST["DOBYear"];?></h5>          
    <h5><?php echo $t48;?> : <?php echo $_POST["education"];?></h5>     
    <h5><?php echo $t56;?> : <?php echo $_POST["address"];?></h5>      
    <h5><?php echo $t57;?> : <?php echo $_POST["state"];?></h5>      
    <h5><?php echo $t59;?> : <?php echo $_POST["city"];?></h5>      
    <h5><?php echo $t60;?> : <?php echo $_POST["village"];?></h5>      
    <h5><?php echo $t61;?> : <?php echo $_POST["pro"];?></h5>     
    <h5><?php echo $t62;?> : <?php echo $_POST["skills"];?> </h5> 
    <h5><?php echo $t65;?> :  <?php echo $_POST['description'];?> </h5>    
    </br>
    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="#"> <?php echo $t68;?> <?php echo $t10;?></a>
    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="login.php"><?php echo $t69;?></a>


      </div> 
    </form>
    </div>
  
  </main>
  
  </div>

          

  
</body>


</html>