<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$reg_id=$_POST['id'];
    $uname=$_POST['name'];
    //echo $uname."<br>";
    $address=$_POST['address'];
    //echo $rate."<br>";
    $number=$_POST['number'];
    //echo $duration."<br>";
    $dob=$_POST['dob'];
    //echo $sts."<br>";
    $query = "update registration set st_name='$uname',address='$address',contact_no='$number',dob='$dob' where registration_id='$reg_id'";
    $exeupdate=$obj->Manipulation($query);
    // var_dump($exeupdate);
    // die;
    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../student_profile.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../student_profile.php");
	}
?>