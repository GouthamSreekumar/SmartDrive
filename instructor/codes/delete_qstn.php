<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$que_id=$_GET['qid'];
$qry="DELETE from demo_exam WHERE demo_exam_id='$que_id' ";
$data=$obj->Manipulation($qry);
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../viewquestions.php");
}
else{
    echo $obj->alert("somthing went wrong","../viewquestions.php");   
}

?>