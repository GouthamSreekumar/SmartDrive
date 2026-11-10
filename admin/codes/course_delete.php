<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$course_id = $_GET['rid'];
$qry = "DELETE FROM course
WHERE course_id = '$course_id'
AND NOT EXISTS (
  SELECT 1
  FROM batch
  WHERE course_id = '$course_id'
);
";
$data = $obj->Manipulation($qry);
if ($data['status'] == "true") {
    echo $obj->alert("delete successfully", "../course_view.php");
} else {
    echo $obj->alert("somthing went wrong", "../course_view.php");
}
