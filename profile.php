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

  	$qryid = $_SESSION["UserId"];
  	echo $qryid;
  	
  	$qryname = mysqli_query($con, "SELECT Name FROM profiles WHERE UserId = '".$qryid."'");
	$qryname = $qryname->fetch_assoc()["Name"];

	$qrygender = mysqli_query($con, "SELECT Gender FROM profiles WHERE UserId = '".$qryid."'");
	$qrygender = $qryname->fetch_assoc()["Gender"];

	$qryvillage =  mysqli_query($con, "SELECT Village FROM profiles WHERE UserId = '".$qryid."'");
	$qryvillage = $qryname->fetch_assoc()["village"];

	$qrydistrict = mysqli_query($con, "SELECT District FROM profiles WHERE UserId = '".$qryid."'");
	$qrydistrict = $qryname->fetch_assoc()["District"];

	$qrystate = mysqli_query($con, "SELECT State FROM profiles WHERE UserId = '".$qryid."'");
	$qrystate = $qryname->fetch_assoc()["State"];

	$qrypro = mysqli_query($con, "SELECT Profession FROM profiles WHERE UserId = '".$qryid."'");
	$qrypro = $qryname->fetch_assoc()["Profession"];

	$qryskills = mysqli_query($con, "SELECT OtherSkills FROM profiles WHERE UserId = '".$qryid."'");
	$qryskills = $qryname->fetch_assoc()["OtherSkills"];

	$qrydesc = mysqli_query($con, "SELECT Description FROM profiles WHERE UserId = '".$qryid."'");
	$qrydesc = $qryname->fetch_assoc()["Description"];

?>
