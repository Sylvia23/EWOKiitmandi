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
		    exit();
	  	}

	  	else
	  	{
	  		echo "Welcome! You have logged in successfully";
	  	


	  	//$qryid = $_SESSION["UserId"];
	  	echo $qryid;
	  	
	  	$qryname = mysqli_query($con, "SELECT Name FROM profiles WHERE UserId = '".$qryid."'");
		$qryname = $qryname->fetch_assoc()["Name"];
		echo $qryname;

		$qrygender = mysqli_query($con, "SELECT Gender FROM profiles WHERE UserId = '".$qryid."'");
		$qrygender = $qrygender->fetch_assoc()["Gender"];

		$qryvillage =  mysqli_query($con, "SELECT Village FROM profiles WHERE UserId = '".$qryid."'");
		$qryvillage = $qryvillage->fetch_assoc()["Village"];

		$qrydistrict = mysqli_query($con, "SELECT District FROM profiles WHERE UserId = '".$qryid."'");
		$qrydistrict = $qrydistrict->fetch_assoc()["District"];

		$qrystate = mysqli_query($con, "SELECT State FROM profiles WHERE UserId = '".$qryid."'");
		$qrystate = $qrystate->fetch_assoc()["State"];

		$qrypro = mysqli_query($con, "SELECT Profession FROM profiles WHERE UserId = '".$qryid."'");
		$qrypro = $qrypro->fetch_assoc()["Profession"];

		$qryskills = mysqli_query($con, "SELECT OtherSkills FROM profiles WHERE UserId = '".$qryid."'");
		$qryskills = $qryskills->fetch_assoc()["OtherSkills"];

		$qrydesc = mysqli_query($con, "SELECT Description FROM profiles WHERE UserId = '".$qryid."'");
		$qrydesc = $qrydesc->fetch_assoc()["Description"];

		// $qryimg = mysqli_query($con, "SELECT Location FROM photos WHERE UserId = '".$qryid."'");
		// $qryimg = $qryimg->fetch_assoc()["Location"];
		// //echo $qryimg;

		// $qryimg = mysqli_query($con, "SELECT * FROM photos WHERE UserId = '".$qryid."'");
 	// 	while($data = mysql_fetch_array($qryimg))
  //   	{
	 //        $qryimg = $data["Location"];
	        
	 //        $comment = '<img src="$qryimg" alt="pic" style="width:304px;height:228px";><hr/>'; 
	 //    	echo $comment;
	 //    }
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
		<!-- <form action = "profile.php" method = "POST" enctype="multipart/form-data"> -->

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
			<form action="upload.php" method="post" enctype="multipart/form-data"> -->
			    Select image to upload:
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			</form>

		</br>
		//Already Uploaded Photos
		<!-- <img src="$qryimg" alt="pic" style="width:304px;height:228px";> -->

		<?php

		//echo "syl";

		$qryimg = mysqli_query($con, "SELECT * FROM photos WHERE UserId = '".$qryid."'");
 		
	    while ($row = $qryimg->fetch_assoc())
    	{	
    		//echo "abhi";
	        
	        $comment = '<img src=' . $row["Location"] . ' alt="pic" style="width:300px;height:228px";>'; 
	    	echo $comment;
	    	// echo "<img src='.$qryimg.'>";
	    }

	?>

		</br>
		<a href="#">Edit Profile</a>	
		</br>
		<a href="#"> Change Password</a>
		<!-- </form>	 -->

</body>
</html>