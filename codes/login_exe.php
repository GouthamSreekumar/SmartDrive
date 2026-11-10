<?php
session_start();
require_once('../connectionclass.php');
$obj = new ConnectionClass();
$uname = $_POST['username'];
// echo $uname."<br>";
$pass = $_POST['password'];
// echo $pass;
$_SESSION['email'] = $uname;
$qry1= "select usertype from login where username ='$uname' and password ='$pass' and status ='active'";

$usertype = $obj->GetSingleData($qry1);
// var_dump($usertype);
// echo $usertype;
// die;
if ($usertype == 'admin') {
	header("location:../admin/index.php");
} elseif ($usertype == 'student') {
	header("location:../student/index.php");
} elseif ($usertype == 'instructor') {
	header("location:../instructor/index.php");
} else {
	echo $obj->alert("$usertype", "../login.php");
}
