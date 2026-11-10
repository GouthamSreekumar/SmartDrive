<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$batch_id=$_GET['rid'];
$qry="DELETE from batch WHERE batch_id='$batch_id' ";
$data=$obj->Manipulation($qry);
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../batch_view.php");
}
else{
    echo $obj->alert("somthing went wrong","../batch_view.php");   
}

?>