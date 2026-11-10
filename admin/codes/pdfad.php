<?php
$title = $_POST['Title'];
$description = $_POST['Description'];
$selectfile = $_FILES['file'];
$targetDirectory = "../pdf/filess/"; // Specify the directory where you want to save the uploaded files.
$targetFile = $targetDirectory . basename($selectfile["name"]);
// var_dump($selectfile);
// die;
$selectfile_name=$selectfile["name"];
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$qry = "insert into pdf_resources(title,description,file_path)values('$title','$description','$selectfile_name')";
$res = $obj->Manipulation($qry);
var_dump($res);
die;
if ($res['status'] == "true") {
  move_uploaded_file($selectfile["tmp_name"], $targetFile);
      echo $obj->alert( "Sucess","../view_pdf.php");

  }
  
  
 else {
  echo $obj->alert("Failed");
  $redirect_url = "../view_pdf.php";

  header('Location: ' . $redirect_url);
}

?>