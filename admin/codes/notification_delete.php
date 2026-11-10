<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$notifid=$_GET['rid'];
$qry="delete from notification where notif_id='$notifid' ";
$data=$obj->Manipulation($qry);
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../notification_view.php");
}
else{
    echo $obj->alert("somthing went wrong","../notification_view.php");   
}

?>