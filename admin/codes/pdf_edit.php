<?php
// session_start();
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$regid=$_POST['id'];
    $uname=$_POST['title'];
    //echo $uname."<br>";
    $adds=$_POST['des'];
    //echo $adds."<br>";
    // $file=$_POST['file'];
    //echo $num."<br>";
   
    $query = "update pdf_resources set title='$uname', description='$adds' where resourse_id='$regid'";
    $exeupdate=$obj->Manipulation($query);
    // var_dump($regid);
    // die;

    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../view_pdf.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong $uname,$adds,","../view_pdf.php");
	}
    
    ?>