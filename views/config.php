<!-- /* 
Filename : ../views/config.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 20-09-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php

    require_once ('../config/configuration.php');

    $con = mysqli_connect("$host","$username");

    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      //you need to exit the script, if there is an error
      exit();
    }
    if(!$con)
    {
      echo 'Not connected to server';
      exit(); 
    }
    else {
      //echo 'Connected';
    }

    if(!mysqli_select_db($con, "$database"))
    {
      echo 'Database not selected';
      exit();
    }

?>

