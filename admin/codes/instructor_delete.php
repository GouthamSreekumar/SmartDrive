<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$registration_id=$_GET['rid'];
$qry="delete from registration where registration_id='$registration_id' ";
$data=$obj->Manipulation($qry);
// var_dump($data);
// die;
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../instructorview.php");
}
else{
    echo $obj->alert("somthing went wrong","../instructorview.php");   
}

?>