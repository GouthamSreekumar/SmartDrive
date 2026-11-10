<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$id=$_GET['id'];
$qry="DELETE from schedule WHERE sch_id='$id' ";
$data=$obj->Manipulation($qry);
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../time_schedule_view.php");
}
else{
    echo $obj->alert("somthing went wrong","../time_schedule_view.php");   
}

?>