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

 //  	$UserId = value_of_auto_increment_field();
	// $_SESSION['UserId'] = $UserId;
  	$Username = $_POST['phonenum'];

  	$Password = $_POST['psw'];
  	$encPW = MD5($Password);
  	// $escapedPW = mysql_real_escape_string($_POST['psw']);
  	// $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
  	// $saltedPW =  $escapedPW . $salt;
  	// $hashedPW = hash('sha256', $saltedPW);

  	$RePassword = $_POST['psw-repeat'];

  	if ($Password != $RePassword)
	{
	    echo("Oops! Password did not match! Try again. ");
	    error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);
	    exit();
	}

	else
	{

	  	$sql = "INSERT INTO users (Username,Password,UPDATED_BY) VALUES ('$Username','$encPW','$Username')";

	  	if(!mysqli_query($con, $sql))
	  	{
	  		error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);	
	  	}
	  	else
	  	{
	  		echo 'Congrats! Successfully Registered.';
	  	}

  	}

  	 $UserId = "SELECT UserId FROM users WHERE Username = '$Username'"; 
  	 $resultid = mysqli_query($con, $UserId);
  	 $UserId = $resultid -> fetch_assoc()["UserId"];
  	 $_SESSION['UserId'] = $UserId;
  	 echo $UserId;

  	// header ("refresh:5; url=register.html");

  ?>


  


  	<!DOCTYPE html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Fill Profile</title>

	<!-- 	<style type="text/css">
			* {
				/*overflow-x: hidden;*/
				text-align: left;
				margin-left: 2%;
			}

			/*.regform{
				text-align: left;
				margin-left: 10%;		
				padding : 1%;
			}*/

			label{
				left : 20%;
				/*margin-left: 10%;
				position: absolute;*/
				/*padding-right: 10%;*/
				padding: 8px 16px;
			    margin: 8px 0;
			    display: inline-block;
			    /*border: 1px solid #ccc;*/
			    box-sizing: border-box;

			}

			input[type=text], input[type=tel], select {
				position: absolute;
				width: 40%;
				left: 35%;
				text-align: center;
			    padding: 8px 16px;
			    margin: 8px 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    box-sizing: border-box;
			}

			button {
				width: 50%;
				text-align: center;
				padding: 8px 16px;
			    margin: 8px 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    box-sizing: border-box;
			}

			.radio {
				padding: 1%;

			}

			.radio.input {
				padding: 10%;
			}

			dob.select {
				width: 2%;
			}
		</style> -->
	</head>
	<body>
			<h1 style="text-align: center;">More About You !</h1>
			<h2 style="text-align: center;">Fill your Profile</h2>

		<form action = "registered.php" method = "POST" enctype="multipart/form-data">
		<div class="regform">
			<label for="name"><b>Name</b></label>
			<input type="text" name="name" placeholder="Enter Name" required>	

			</br>
			<label><b>Father's Name</b></label>
			<input type="text" name="father" placeholder="Enter Father's Name">

			</br>
			<label for="gender"><b>Gender</b></label>
			<input type="radio" name="gender" value="m">Male
			<input type="radio" name="gender" value="f" checked="">Female

			</br>
			<div class="radio">
			<label for="marital"><b>Marital Status</b></label>
			<input type="radio" name="marital" value="married">Married
			<input type="radio" name="marital" value="unmarried">Unmarried
			<input type="radio" name="marital" value="widow">Widow
			<input type="radio" name="marital" value="unmarried">Divorce/Separated
			<input type="radio" name="marital" value="others" checked="">Others
			</div>

			</br>
			
			<label><b>Enter Husband's Name</b></label>//if (married == true)
			<input type="text" name="husband" placeholder="Enter Husband's Name">
			
			</br>
			<label for="phonenum"><b>Phone Number</b></label>
	  		<input id="phonenum" type="text" placeholder="Enter Phone Number" name="phonenum" required >

	  		</br>
	  		<label><b>Date of Birth</b></label>
	  		<div class="dob">
	  		<select name="DOBMonth">
				<option> - Month - </option>
				<option value="January">January</option>
				<option value="Febuary">Febuary</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
			</select>

			<select name="DOBDay">
				<option> - Day - </option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>

			<select name="DOBYear">
				<option> - Year - </option>
				<option value="2005">2005</option>
				<option value="2004">2004</option>
				<option value="2003">2003</option>
				<option value="2002">2002</option>
				<option value="2001">2001</option>
				<option value="2000">2000</option>
				<option value="1999">1999</option>
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
			</select>
			</div>

			</br>
			<label><b>Education Status</b></label>
			<select name="education">
				<option>-Education-</option>
				<option value="fifth">Completed 5th standard</option>
				<option value="eighth">Completed 8th standard</option>
				<option value="tenth">Completed 10th standard</option>
				<option value="twelveth">Completed 12th standard</option>
				<option value="graduate">Graduate</option>
				<option value="post">Post Graduate</option>
				<option value="other">Others</option>
			</select>

			</br>
			<label><b>Address</b></label>
			<input type="text" name="address" placeholder="Enter Address">

			</br>
			<label><b>State</b></label>
			<select name="state">
				<option>-Choose State-</option>
				<option value="hp">Himachal Pradesh</option>
				<option value="jk">Jammu and Kashmir</option>
				<option value="haryana">Haryana</option>
				<option value="punjab">Punjab</option>
				<option value="up">Uttar Pradesh</option>
			</select>


			</br>
			<label><b>City</b></label>
			<select name="city">
				<option>-Choose City-</option>
				<option value="mandi">Mandi</option>
				<option value="shimla">Shimla</option>
				<option value="kullu">Kullu</option>
				<option value="manali">Manali</option>
				<option value="dharamshala">Dharamshala</option>
			</select>//the city dropdown appear accordingly as the state chosen.

			</br>
			<label><b>Village</b></label>
			<select name="village">
				<option>-Choose Village-</option>
				<option value="riyagadi">Riyagadi</option>
				<option value="katindi">Katindi</option>
				<option value="neri">Neri</option>
				<option value="kamand">Kamand Valley</option>
				<option value="kanahar">Kanahar</option>
			</select>//the village dropdown appear accordingly as the city chosen.

			</br>
			<label><b>Profession</b></label>
			<input type="text" name="pro" placeholder="Enter Profession">

			</br>
			<label><b>Other Skills</b></label>
			<input type="text" name="skills" placeholder="Enter Skills Here">
			//Add more dynamically

			</br>
			<label><b>Uplaod Photos</b></label>
			<!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
			    Select image to upload:
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			<!-- </form> -->

			</br>
			<label><b>Description</b></label>
			<input type="text" name="description" placeholder="Write Description Here.">
			<!-- <textarea rows="4" cols="50" name="description" form="usrform">Write Description Here.</textarea> -->


			</br></br>
			<button type="Submit">Submit</button>
			
	  	</div> 
		</form>
	</body>
	</html>