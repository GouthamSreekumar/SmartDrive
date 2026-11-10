<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$regid=$_POST['id'];
    $uname=$_POST['name'];
    //echo $uname."<br>";
    $rate=$_POST['rate'];
    //echo $rate."<br>";
    $duration=$_POST['duration'];
    //echo $duration."<br>";
    $sts=$_POST['status'];
    //echo $sts."<br>";
    $query = "update course set name='$uname', rate='$rate', duration='$duration', c_status='$sts' where course_id='$regid'";
    $exeupdate=$obj->Manipulation($query);
    //var_dump($exeupdate);
    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../course_view.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../course_view.php");
	}
?>