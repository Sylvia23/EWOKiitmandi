<!-- /* 
Filename : ../views/profile.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 18-05-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
	
	session_start();

  require_once ('config.php');
  require_once ('localisation.php');
	require_once ('language_session.php');


  	$qryid = $_SESSION["UserId"];
  	echo $qry;
  	
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
