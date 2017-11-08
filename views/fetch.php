<!-- /* 
Filename : ../views/fetch.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 10-06-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
//fetch.php
    session_start();
    require_once ('config.php');
    require_once ('localisation.php');
    // require_once ('language_session.php');
    // $con = mysqli_con('127.0.0.1','sylvia');

    // if (mysqli_con_errno())
    // {
    //   echo "Failed to con to MySQL: " . mysqli_con_error();
    //   //you need to exit the script, if there is an error
    //   exit();
    // }
    // if(!$con)
    // {
    //   echo 'Not coned to server';
    //   exit(); 
    // }
    // if(!mysqli_select_db($con, 'essp'))
    // {
    //   echo 'Database not selected';
    //   exit();
    // }
// $con = mysqli_con("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);  
 $query = "SELECT * FROM profiles WHERE Name LIKE '%".$search."%' OR Profession LIKE '%".$search."%' OR OtherSkills LIKE '%".$search."%' OR  Gender LIKE '%".$search."%' OR  MaritalStatus LIKE '%".$search."%' OR EducationStatus LIKE '%".$search."%' OR District LIKE '%".$search."%' OR Village LIKE '%".$search."%' OR Description LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM profiles ORDER BY ProfileId";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
  {
   $output .= '
    <div class="table-responsive">
     <table class="table table bordered">
      <tr>
       <th>Name</th>
       <th>Profession</th>
       <th>Skills</th>
       <th>Gender</th>
       <th>Marital Status</th>
       <th>Education</th>
       <th>District</th>
       <th>Village</th>
       <th>Description</th>
      </tr>
   ';
   while($row = mysqli_fetch_array($result))
   {
    $output .= '
    <tbody>
     <tr style="font-size: 117%;">
      <td>'.$row["Name"].'</td>
      <td>'.$row["Profession"].'</td>
      <td>'.$row["Skills"].'</td>
      <td>'.$row["Gender"].'</td>
      <td>'.$row["MaritalStatus"].'</td>
      <td>'.$row["Education"].'</td>
      <td>'.$row["District"].'</td>
      <td>'.$row["Village"].'</td>
      <td>'.$row["Description"].'</td>
     </tr>
    </tbody>
    ';
   }
   echo $output;
  }
else
  {
   echo 'Data Not Found.';
  }

?>
