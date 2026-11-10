<?php
$title = $_POST['title'];
$max = $_POST['max'];
$instructor = $_POST['Insrtuctor'];
$status = $_POST['status'];
$course_id=$_POST['Course'];

require_once('../../connectionclass.php');
$obj = new Connectionclass();
$qry = "insert into batch(title,max_no_student,instructor_id,b_status,course_id)values('$title','$max','$instructor','$status','$course_id')";
$res = $obj->Manipulation($qry);
if ($res['status'] == "true") {

  echo $obj->alert("Sucess");
  $redirect_url = "../batch_view.php";

  header('Location: ' . $redirect_url);
} else {
  echo $obj->alert("Failed");
  $redirect_url = "../batch_view.php";

  header('Location: ' . $redirect_url);
}

?>