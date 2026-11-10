
<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$title = $_POST['Title'];
$description = $_POST['Description'];
//echo $dis."<br>";
$files=$_FILES['file']['name'];
//echo $files."<br>";
$filepath="../pdf/filess/";
$img_path=str_replace("\\","/",$filepath);
$exp_files=explode(".",$files);   
$extension=end($exp_files);
$files=time().".".$extension;
try
{
move_uploaded_file($_FILES['file']['tmp_name'],$img_path.$files);
//var_dump($_POST);
 $qry="insert into pdf_resources(title,description,file_path)values('$title','$description','$files')";
$exe=$obj->Manipulation($qry);
	//var_dump($exe);
	if($exe['status']=='true')
	{
		
		echo $obj->alert("Success","../view_pdf.php");
	}
}
catch(Exception $e)
 {
echo $e.getMessage();
 }
 ?>