<?php
require_once("../../connectionclass.php");
$regid=$_POST['id'];
$Pdf_File=$_FILES['file']['name'];
$obj=new ConnectionClass();
if(!empty($_FILES['file']['name']))
{
  $apath="../pdf/filess/";
      $aextns=explode(".",$Pdf_File);
      $aextension=end($aextns);

          $files=time().".".$aextension;
         // echo $aimgname;
      if(move_uploaded_file($_FILES['file']['tmp_name'],$apath.$files))
      {
    $query="update pdf_resources set file_path='$files' where resourse_id='$regid'"; 
    $re=$obj->Manipulation($query);
    //var_dump($re);
    if($re['status']=='true')
{
  echo $obj->alert("Successfully Updated","../view_pdf.php");
}

else
{
  echo $obj->alert("Something Went Wrong ","../view_pdf.php");
}
}
}
?>