<?php
$name = $_POST['name'];
$rate = $_POST['rate'];
$duration = $_POST['duration'];
$status = $_POST['status'];

require_once('../../connectionclass.php');
$obj = new Connectionclass();
$qry = "insert into course(name,rate,duration,c_status)values('$name','$rate','$duration','$status')";
$res = $obj->Manipulation($qry);
if ($res['status'] == "true") {
  echo $obj->alert("successfully inserted");
  $redirect_url = "../course_view.php";

  header('Location: ' . $redirect_url);
} else {
  echo $obj->alert("not inserted");
}

?>