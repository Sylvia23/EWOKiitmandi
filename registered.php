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
      echo 'Connected';
    }

  	if(!mysqli_select_db($con, 'essp'))
  	{
  		echo 'Database not selected';
  	}

  	// $UserId = $_SESSION['UserId'];
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

  	$sql = "INSERT INTO profiles (UserId, Name, FatherName, Gender, MaritalStatus, HusbandName, PhoneNum, DOB, EducationStatus, Address, State, District, Village, Profession, OtherSkills, Description, Updated_by) VALUES (1, '$Name', '$FatherName', '$Gender', '$MaritalStatus', '$HusbandName', '$PhoneNum', '$DOB', '$EducationStatus', '$Address', '$State', '$District', '$Village', '$Profession', '$OtherSkills', '$Description', '$Updated_by')";

  	// if ($num_rows > 0) {

  	// 	mysqli_query($sql);
  	// }

  	if(!mysqli_query($con, $sql))
  	{
  		error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
  	}
  	else
  	{
  		echo 'Congrats! Successfully Registered.';
  	}

    //Uploadin' Photo;

  	 $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) 
    {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check !== false) 
        {
            echo "File is an image - " . $check["mime"] . ".";
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

    if ($uploadOk == 0)
    {
         echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 

    else 
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {        
    		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            $sqli = 'INSERT INTO photos(UserId, Location, Updated_by) VALUES(1,"uploads/' . $_FILES["fileToUpload"]["name"] . '", 1)';
    		//$sqli = 'INSERT into users values ("uploads/$_FILES["fileToUpload"]["name"])';
    		$con->query($sqli);

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
	<title>Registered</title>
	<style type="text/css">
		* {
			text-align: center;
		}

		.h1 {
			
		}

		.h2 {
			
		}
	</style>
</head>
<body>
		<h1>Welcome <?php echo $_POST["name"];?> !</h1>
		<h2>Thanks for registering.</h2>

		Your username is <?php echo $_POST["phonenum"];?></br>

		<p>Name : <?php echo $_POST["name"];?> </p>
		<p>Father's Name : <?php echo $_POST["father"];?></p>
		<p>Gender : <?php echo $_POST["gender"];?></p>		
		<p>Marital Status : <?php echo $_POST["marital"];?></p>			 
		<p>Husband's Name : <?php echo $_POST["husband"];?> </p>			 
		<p>Phone Number : <?php echo $_POST["phonenum"];?></p>			
		<p>Date of Birth : <?php echo $_POST["DOBDay"];?> - <?php echo $_POST["DOBMonth"];?> - <?php echo $_POST["DOBYear"];?></p>					
		<p>Education Status : <?php echo $_POST["education"];?></p>			
		<p>Address : <?php echo $_POST["address"];?></p>			
		<p>State : <?php echo $_POST["state"];?></p>			
		<p>City : <?php echo $_POST["city"];?></p>			
		<p>Village : <?php echo $_POST["village"];?></p>			
		<p>Profession : <?php echo $_POST["pro"];?></p>			
		<p>Other Skills : <?php echo $_POST["skills"];?> </p>	
		<p>Description :  <?php echo $_POST['description'];?> </p>		
		
		<a href="#"> Change Password</a>

		</br>
		<a href="login.html">Login Here.</a>
					
		

</body>
</html>