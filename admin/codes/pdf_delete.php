<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$id=$_REQUEST['ids'];
$qry="DELETE from pdf_resources WHERE resourse_id='$id' ";
$data=$obj->Manipulation($qry);
if($data['status']=="true")
{
    echo $obj->alert("delete successfully","../view_pdf.php");
}
else{
    echo $obj->alert("somthing went wrong","../view_pdf.php");   
}

?>