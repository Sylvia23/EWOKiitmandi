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
  		exit();	
  	}
    else {
      echo 'Connected';
    }

  	if(!mysqli_select_db($con, 'essp'))
  	{
  		echo 'Database not selected';
  		exit();
  	}

  	//$UserId = $_SESSION['UserId'];
  	$Username = $_POST['phonenum'];
  	$Password = $_POST['psw'];
  	//echo ($Password);
  	$encPW = MD5($Password);
  	//echo ($encPw);

  	//$con->query
  	
  	$qryid = mysqli_query($con, "SELECT UserId FROM users WHERE Username = '".$Username."'");
	$qryid = $qryid->fetch_assoc()["UserId"];
	echo $qryid;
	$_SESSION['UserId'] = $qryid;

	$qryusername = mysqli_query($con, "SELECT Username FROM users WHERE Username = '".$Username."'");
  	//echo "$result";
  	//error_log( var_dump($result));
  	$qryusername->fetch_assoc()["Username"];

  	if(mysqli_num_rows($qryusername) == 0) 
  	{
     	// row not found, 
  		echo("Oops! Username not found! Try again. or Register first ");
	    error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
	    exit();
	} 

	else 
	{
	    $qry = mysqli_query($con, "SELECT Password FROM users WHERE Username = '".$Username."'");
	    $qry = $qry->fetch_assoc()["Password"];
	    //echo $qry->fetch_assoc()["Password"];	
	    //echo ($qry);
	  	if ($qry != $encPW)
	  	{
	  		echo("Oops! Password did not match! Try again. ");
		    error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
		    header ("Location: login.html ");
		    //exit();
	  	}

	  	else
	  	{
	  		echo "Welcome! You have logged in successfully";
	  	


		header ("Location: profile_page.php?id=" .$qryid);
		}

	}

  	
?>
