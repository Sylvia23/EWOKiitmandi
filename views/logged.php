<!-- /* 
Filename : ../views/logged.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 15-05-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
	session_start();
	require_once ('config.php');
	require_once ('language_session.php');
	require_once ('localisation.php');

	session_start();

  	//$UserId = $_SESSION['UserId'];
  	$Username = $_POST['phonenum'];
  	$Password = $_POST['psw'];
  	//echo ($Password);
  	$encPW = MD5($Password);
  	//echo ($encPw);

  	//$con->query
  	
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
		    exit();
	  	}

	  	else
	  	{
	  		echo "Welcome! You have logged in successfully";
	  	}

  }

  	
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Registered</title>
	<style type="text/css">
		* {
			text-align: center;
		}

	</style>
</head>
<body>
		<form action = "profile.php" method = "POST" enctype="multipart/form-data">

		<h1>Welcome <?php echo $qryname;?>  !</h1>
		<h2>Thanks for login.</h2>
		<h2>Welcome to your EWOK Profile .</h2>

		Your username is <?php echo $_POST["phonenum"];?></br>
		
		<p>Name : <?php echo $qryname;?> </p>
		
		<p>Gender : <?php echo $qrygender;?></p>		
		<p>Village : <?php echo $qryvillage;?></p>
		<p>District : <?php echo $qrydistrict;?></p>
		<p>State : <?php echo $qrystate;?></p>			
					
					
		<p>Profession : <?php echo $qrypro;?></p>			
		<p>Other Skills : <?php echo $qryskills;?> </p>			
		<p>Description : <?php echo $qrydesc;?></p>

		</br>
			<label><b>Uplaod Photos</b></label>
			<!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
			    Select image to upload:
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			<!-- </form> -->

		</br>
		//Already Uploaded Photos
		</br>
		<a href="#">Edit Profile</a>	
		</br>
		<a href="#"> Change Password</a>	

</body>
</html>