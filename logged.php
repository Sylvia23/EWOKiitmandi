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
		<h1>Welcome <?php echo $_POST["name"];?>  !</h1>
		<h2>Thanks for login.</h2>

		Your username is <?php echo $_POST["phonenum"];?></br>

		<a href="profile.php">Edit Profile</a>		

</body>
</html>