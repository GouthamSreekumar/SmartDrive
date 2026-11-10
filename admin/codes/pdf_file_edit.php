<?php
// session_start();
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$regid=$_POST['id'];
    //echo $adds."<br>";
    $file=$_FILES['file'];
    //echo $num."<br>";
    $targetDirectory = "../pdf/filess/"; // Specify the directory where you want to save the uploaded files.
    $targetFile = $targetDirectory . basename($selectfile["name"]);
    // var_dump($selectfile);
    // die;
    $selectfile_name=$selectfile["name"];
    $query = "update pdf_resources set file_path='$selectfile_name' where resourse_id='$regid'";
    $exeupdate=$obj->Manipulation($query);
    var_dump($regid);
    die;

 //    if($exeupdate['status']=='true')
	// {
	// 	echo $obj->alert("Successfully Updated","../view_pdf.php");
	// }
	// else
	// {
	//     echo $obj->alert("Something Went Wrong ","../view_pdf.php");
	// }
?>