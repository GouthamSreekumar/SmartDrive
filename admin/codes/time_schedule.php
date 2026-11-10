<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
if (isset($_REQUEST['id'])) {
$id=$_REQUEST['id'];
} else {
  $id = $_POST['id'];
}
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];
// echo $que;

$qry = "insert into schedule(sch_date,sch1_time,sch_time,batch_id)values('$date','$start','$end','$id')";
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
