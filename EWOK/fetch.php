<?php
//fetch.php
    $connect = mysqli_connect('127.0.0.1','sylvia');

    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      //you need to exit the script, if there is an error
      exit();
    }
    if(!$connect)
    {
      echo 'Not connected to server';
      exit(); 
    }
    if(!mysqli_select_db($connect, 'essp'))
    {
      echo 'Database not selected';
      exit();
    }
// $connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);  
 $query = "SELECT * FROM profiles WHERE Name LIKE '%".$search."%' OR Profession LIKE '%".$search."%' OR OtherSkills LIKE '%".$search."%' OR  Gender LIKE '%".$search."%' OR  MaritalStatus LIKE '%".$search."%' OR EducationStatus LIKE '%".$search."%' OR District LIKE '%".$search."%' OR Village LIKE '%".$search."%' OR Description LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM profiles ORDER BY ProfileId";
}
$result = mysqli_query($connect, $query);
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
