<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$feedback_id=$_REQUEST['id'];
$qry="DELETE from feedback WHERE feedback_id='$feedback_id' ";
$data=$obj->Manipulation($qry);
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../view_feedback.php");
}
else{
    echo $obj->alert("somthing went wrong","../view_feedback.php");   
}

?>