<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$checked_values = $_POST['check'];
$batch_id = $_REQUEST['bid'];

foreach ($checked_values as $value) {
  $qry1="select max_no_student from batch where batch_id='$batch_id'";
  $res1 = $obj->GetSingleData($qry1);
  $qry2 = "SELECT COUNT(*) FROM batch_student WHERE batch_id = $batch_id";
  $res2 = $obj->GetSingleData($qry2);
  if($res2<$res1){
    $qry = "insert into batch_student(batch_id,student_id)values('$batch_id','$value')";
    $res3 = $obj->Manipulation($qry);
  }else{
    echo $obj->alert("Max no of student reached");
  }
 
  }
if ($res3['status'] == "true") {
  echo $obj->alert("Sucess");
  $redirect_url = "../student_batch_view.php";
  header('Location: ' . $redirect_url);
} else {
  echo $obj->alert("Failed");
  $redirect_url = "../batch_view.php";

  header('Location: ' . $redirect_url);
}

?>