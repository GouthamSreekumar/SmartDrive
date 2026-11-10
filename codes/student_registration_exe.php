<?php
session_start();
require_once('../connectionclass.php');
$obj=new ConnectionClass();
// $page_action=$_REQUEST['action'];
$uname=$_POST['username'];
//echo $uname."<br>";
$adds=$_POST['address'];
//echo $adds."<br>";
$eaddress=$_POST['email'];
//echo $eaddress."<br>";
$contact=$_POST['contact_no'];
//echo $contact."<br">;
$dob=$_POST['dob'];
$dob."<br>";
$gender=$_POST['gender'];
//echo $gender."<br>";
$pass=$_POST['password'];
//echo $pass."<br>";
$id=$_POST['course_id'];
//echo $id."<br>";
$files=$_FILES['fileToUpload']['name'];
//echo $files."<br>";
$imgpath="../admin/documents/zip/";
$img_path=str_replace("\\","/",$imgpath);
$extension=end(explode(".",$files));
$files=time().".".$extension;
try
{
move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$img_path.$files);
//var_dump($_POST);
$qry="select count(*) from login where username='$eaddress'";
$value=$obj->GetSingleData($qry);
if($value==0)
{
	//echo "Balance code continue.....";
	date("Y-m-d", strtotime($dob) );
   // $dob='1981-10-07';
    $diff = (date('Y') - date('Y',strtotime($dob)));
    //echo $diff;
    if($diff<=17)
    {
    	echo $obj->alert("you are not eligible","../student_registration.php");
    }
    else
    {
    	 //echo "Enter code for insertion.....";
    	$qry2="insert into login(username,password,usertype,status)values('$eaddress','$pass','student','inactive')";
	$exe2=$obj->Manipulation($qry2);
	//var_dump($exe2);
	$qry3="insert into registration(st_name,address,email,contact_no,dob,gender,password,course_id,usertype,file_path)values('$uname','$adds','$eaddress','$contact','$dob','$gender','$pass','$id','student','$files')";
		$exe3=$obj->Manipulation($qry3);
		// var_dump($exe3);
		// die;
		if($exe3['status']=="true" && $exe2['status']=="true")
		{
			//echo "success";
			echo $obj->alert("Success","../index.php");
		}
		else
		{
			//echo "failed";
		echo $obj->alert("Success","../index.php");	
		}

    }

}
else
{
	echo $obj->alert("Email is already existed","../student_registration.php");
}
}
catch(Exception $e)
 {
echo $e.getMessage();
 }

    //this is a comment?>