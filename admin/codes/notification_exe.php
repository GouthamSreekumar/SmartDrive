<?php
// session_start();
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$regid=$_POST['id'];
    $uname=$_POST['title'];
    //echo $uname."<br>";
    $adds=$_POST['desc'];
    //echo $adds."<br>";
    $date=$_POST['date'];
    //echo $num."<br>";
    $ins=$_POST['ins'];
    $batch=$_POST['batch'];
    $sts=$_POST['sts'];
    $query = "update notification set n_title='$uname', description='$adds', post_date='$date', instructor_id='$ins',batch_id='$batch',n_status='$sts' where notif_id='$regid'";
    $exeupdate=$obj->Manipulation($query);
    //var_dump($exeupdate);

    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../notification_view.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../notification_view.php");
	}
    
    ?>