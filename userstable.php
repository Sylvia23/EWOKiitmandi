<?php

  	global $con;

    $con = mysqli_connect('127.0.0.1','sylvia');

    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      //you need to exit the script, if there is an error
      exit();
    }
  	if(!con)
  	{
  		echo 'Not connected to server';
  	}
    else {
      echo 'Connected';
    }

  	if(!mysqli_select_db($con, 'essp'))
  	{
  		echo 'Database not selected';
  	}

  	$Username = $_POST['phonenum'];
  	$Password = $_POST['psw'];

  	$sql = "INSERT INTO users (Username,Password,UPDATED_BY) VALUES ('$Username','$Password','$Username')";

  	if(!mysqli_query($con, $sql))
  	{
  		echo 'Error! Not Inserted';
  	}
  	else
  	{
  		echo 'Congrats! Successfully Registered.';
  	}

  	header ("refresh:5; url=register.html");

  ?>

