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
		<h1>Hello <?php echo $_POST["name"];?> !</h1>
		<h2>Welcome to your EWOK Profile .</h2>

		Your username is <?php echo $_POST["phonenum"];?></br>

		<p>Name : <?php echo $_POST["name"];?> </p>
		<p>Father's Name : <?php echo $_POST["father"];?></p>
		<p>Gender : <?php echo $_POST["gender"];?></p>		
		<p>Martial Status : <?php echo $_POST["martial"];?></p>			 
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
		<p>Description : <?php echo $_POST["Description"];?></p>			
					 
		<a href="#"> Change Password</a>
					
		

</body>
</html>