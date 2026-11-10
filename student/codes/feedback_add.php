<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$title = $_POST['title'];
$description = $_POST['des'];
$postdate= date('Y-m-d');
session_start();
$addedby = $_SESSION['email']; 
$qry = "insert into feedback(title,description,added_by,date)values('$title','$description','$addedby','$postdate')";
$res = $obj->Manipulation($qry);
if ($res['status'] == "true") {

  echo $obj->alert("Sucess","../view_feedback.php");

} else {
  echo $obj->alert("Failed","../view_feedback.php");

}
?>