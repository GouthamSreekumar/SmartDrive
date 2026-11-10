<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$id=$_GET['id'];
$batch_id = $_POST['batch'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];
// echo $que;

$qry = "insert into schedule(sch_date,sch1_time,sch_time,batch_id)values('$date','$start','$end','$batch_id')";
$res = $obj->Manipulation($qry);
// var_dump($res);
// die;
if ($res['status'] == "true") {
  echo $obj->alert("successfully inserted");
  $redirect_url = "../time_schedule_view.php";

  header('Location: ' . $redirect_url);
} 
else {
  echo $obj->alert("not inserted");
}

?>
