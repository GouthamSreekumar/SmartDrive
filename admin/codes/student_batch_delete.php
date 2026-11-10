<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$id = $_REQUEST['id'];
$qry = "DELETE from batch_student WHERE student_id='$id' ";
$data = $obj->Manipulation($qry);
if ($data['status'] == "true") {
    echo $obj->alert("delete successfully", "../student_batch_view.php");
} else {
    echo $obj->alert("somthing went wrong", "../student_batch_view.php");
}
