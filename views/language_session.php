<!-- /* 
Filename : ../views/language_session.php
@Author: Sylvia Mittal B16038 IIT Mandi
@Date: 23-09-2017
@Last modified by: Sylvia Mittal B16038 IIT Mandi
@Last modified on : 8-10-2017
*/ -->

<?php
if($_GET["lang"]=="hi" || $_GET["lang"]=="en"){
  if($_SESSION["lang"]!=$_GET["lang"]){  
      $_SESSION["lang"] = $_GET["lang"];
  }
}
else{
  if($_SESSION["lang"]=="hi"){
    header("location: ?lang=hi");
    exit;
  }
  else if($_SESSION["lang"]=="en"){
    header("location: ?lang=en");
    exit;
  }
  else{
    header("location: ?lang=hi");
  }
}
?>