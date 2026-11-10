<?php
session_start();
require_once('../../connectionclass.php');
$obj=new ConnectionClass();
$page_action=$_REQUEST['action'];
$uname=$_REQUEST['name'];

if($page_action=='delete')
{
	$qry="select status from login where username='$uname'";
	$exe=$obj->GetSingleData($qry);
	//var_dump($exe);
	//echo $exe;
	$qry1="delete from login where username='$uname'";
	$exe1=$obj->Manipulation($qry1);
	//var_dump($exe1);
	if($exe1['status']=='true')
	{
		if($exe=="active")
		{
			echo $obj->alert("Successfully Deleted","../view_registraed_students.php?type=active");
		}
		elseif($exe=="inactive")
		{
			echo $obj->alert("Successfully Deleted","../view_registraed_students.php?type=inactive");
		}
		else
		{
			echo $obj->alert("Successfully Deleted","../view_registraed_students.php?type=rejected");
		}
		
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../view_registraed_students.php?type='$exe'");
	}
}
?>