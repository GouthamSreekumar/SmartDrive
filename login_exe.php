<?php
session_start();
   require_once(__DIR__ . '/connectionclass.php');
   $obj=new connectionclass();
   $username=$_POST['username'];
   $password=$_POST['password'];
   $qry="select*from login where username='$username' and password='$password' and status='active'";
   $res=$obj->GetSingleRow($qry);
   $_SESSION['username']=$res['username'];
   $_SESSION['email']=$res['username'];
   // var_dump($_SESSION['username']);
   // die;
   if($res!=NULL)
   {
   if($res['usertype']=='admin')
   {
   $url="admin/index.php";
   echo $obj->alert("Welcome",$url);
   }
   elseif($res['usertype']=='instructor')
   {
   $url="instructor/index.php";
   echo $obj->alert("Welcome",$url);
   }
   elseif($res['usertype']=='student')
   {
   $url="student/index.php";
   echo $obj->alert("Welcome",$url);
   }
   else{
    $url="login.php";
    echo $obj->alert("Incorrect login credentials ",$url);
   }
}
else{
    $url="login.php";
    echo $obj->alert("Incorrect login credentials ",$url);
   }

   ?>