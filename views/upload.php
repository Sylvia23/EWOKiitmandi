<!-- /* 
Filename : ../views/upload.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 20-05-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
    
    session_start();

    require_once ('config.php');
    // require_once ('localisation.php');
    // require_once ('language_session.php');


    // $con = mysqli_connect('127.0.0.1','sylvia');

    // if (mysqli_connect_errno())
    // {
    //   echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //   //you need to exit the script, if there is an error
    //   exit();
    // }

    // if(!$con)
    // {
    //     echo 'Not connected to server';
    // }
    // else {
    //   echo 'Connected';
    // }

    // if(!mysqli_select_db($con, 'essp'))
    // {
    //     echo 'Database not selected';
    // }



    $qryid = $_SESSION['UserId'];
    echo $qryid;
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //$UserId = $_SESSION['UserId'];

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

        $sqli = 'INSERT INTO photos(UserID, Location, Updated_by) VALUES ('.$qryid.',"uploads/' . $_FILES["fileToUpload"]["name"] . '",'.$qryid .')';
            //$sqli = 'INSERT into users values ("uploads/$_FILES["fileToUpload"]["name"])';
        //echo $sqli;
            $con->query($sqli);

        error_log ('Error! Not Inserted. Error description: ' . mysqli_error($con), 0);

        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
//$conn->close();
?>
