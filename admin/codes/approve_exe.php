<?php
session_start();
require_once('../../connectionclass.php');
$obj=new ConnectionClass();
// $page_action=$_REQUEST['action'];
 $uname=$_REQUEST['name'];
 $qry="select status from login where username='$uname'";
 $exe=$obj->GetSingleData($qry);
    
        if($exe=='inactive')
        {
            $qry2="update login set status='active' where username='$uname' and status='$exe'";
            $exe2=$obj->Manipulation($qry2);
            //var_dump($exe2);
            if($exe2['status']=='true')
            {
                echo $obj->alert("Approved","../view_registraed_students.php?type=active");
            }
            else
            {
                echo $obj->alert("Something Went Wrong","../view_registraed_students.php?type=inactive");
            }
        }
   
        ?>