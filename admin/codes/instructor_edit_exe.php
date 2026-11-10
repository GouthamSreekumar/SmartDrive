<?php
// session_start();
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$regid=$_POST['id'];
    $uname=$_POST['name'];
    //echo $uname."<br>";
    $adds=$_POST['address'];
    //echo $adds."<br>";
    $num=$_POST['contact'];
    //echo $num."<br>";
   
    $query = "update registration set st_name='$uname', contact_no='$num', address='$adds' where registration_id='$regid'";
    $exeupdate=$obj->Manipulation($query);
    //var_dump($exeupdate);

    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../instructorview.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../instructorview.php");
	}
    
    ?>