<?php
session_start();
require_once('../../connectionclass.php');
$obj=new ConnectionClass();
$page_action=$_REQUEST['action'];
//--------------------------------------------------------------------------------------

if($page_action=='insert')
{
//$uname=$_POST['services_name'];
//var_dump($uname);
$regid=$_REQUEST['bid'];
//echo $regid."<br>";
$qry1="select max_no_student from batch where batch_id='$regid'";
$exe1=$obj->GetSingleData($qry1);
//echo $exe1."<br>";
$qry0="select count(student_id) from batch_student where batch_id='$regid'";
$exe0=$obj->GetSingleData($qry0);
//echo $exe0."<br>";
if(!empty($_REQUEST['checkboxs']))
{
$flag="false";
foreach ($_REQUEST['checkboxs'] as $r) {
	$qry="select count(*) from batch_student where student_id ='$r'";
	$exe=$obj->GetSingleData($qry);
	if($exe!=0)
	{
		echo $obj->alert("already existed","../view_batch_student.php?id=".$regid);
	}
	else
	{
		if($exe1<=$exe0)
		{
		    echo $obj->alert("Number Exceed","../view_batch_student.php?id=".$regid);

		}
		else
		{
				$qry2="insert into batch_student(batch_id,student_id)values('$regid','$r')";
				$exe2=$obj->Manipulation($qry2);
				//var_dump($exe2);
				if($exe2['status']=='true')
					{
						$flag='true';
					}
					else
					{
						$flag='false';
					}
		}
    }
		
			if($flag=='true')
			{
				$obj->alert("Success","../view_batch_student.php?id=".$regid);
			}
			else
			{
				$obj->alert("Failed","../view_batch_student.php?id=".$regid);
			}
		}
	}
		else
		{
			echo $obj->alert("select at least one","../view_batch_student.php?id=".$regid);
		}
	}


//======================================================================================================
elseif($page_action=='delete')
{
	$batchstudent=$_REQUEST['rid'];
	$regid=$_REQUEST['id'];

$qry2="delete from batch_student where batch_student_id='$batchstudent'";
   $exe2=$obj->Manipulation($qry2);
	//var_dump($exe2);
	if($exe2['status']=='true')
	{
		//echo "deleted";
	  $obj->alert("Success","../view_batch_student.php?id=".$regid);
	}
	else
	{
	//	echo "failed";
	 $obj->alert("Failed","../view_batch_student.php?id=".$regid);	
	}

}

//==========================================================================================
?>