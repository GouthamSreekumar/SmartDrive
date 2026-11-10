<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$batch_id=$_POST['id'];
    $uname=$_POST['title'];
    //echo $uname."<br>";
    $max=$_POST['max'];
    //echo $rate."<br>";
    $Instructor=$_POST['Instructor'];
    //echo $duration."<br>";
    $sts=$_POST['status'];
    //echo $sts."<br>";
    $course_id=$_POST['course'];
    $query = "update batch set title='$uname', max_no_student='$max', instructor_id='$Instructor', b_status='$sts',course_id=$course_id where batch_id='$batch_id'";
    $exeupdate=$obj->Manipulation($query);
    //var_dump($exeupdate);
    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../batch_view.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../batch_view.php");
	}
?>