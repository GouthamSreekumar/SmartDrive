<?php
    require_once('../../connectionclass.php');
    $obj = new Connectionclass();
    $id=$_REQUEST['id'];
    $date = $_POST['date'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $query = "update schedule set sch_date='$date', sch1_time='$start', sch_time='$end' where sch_id='$id'";
    $exeupdate=$obj->Manipulation($query);
    
      
    if($exeupdate['status']=='true')
	{
		echo $obj->alert("Successfully Updated","../time_schedule_view.php");
	}
	else
	{
	    echo $obj->alert("Something Went Wrong","../time_schedule_view.php");
	}