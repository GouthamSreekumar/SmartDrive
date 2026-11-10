<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$que = $_POST['question'];
$op1 = $_POST['option1'];
$op2 = $_POST['option2'];
$op3 = $_POST['option3'];
$ans = $_POST['answer'];
// echo $que;

$qry = "insert into demo_exam(question_text,option1,option2,option3,answer)values('$que','$op1','$op2','$op3','$ans')";
$res = $obj->Manipulation($qry);
// var_dump($res);
// die;
if ($res['status'] == "true") {
  echo $obj->alert("successfully inserted");
  $redirect_url = "../viewquestions.php";

  header('Location: ' . $redirect_url);
} 
else {
  echo $obj->alert("not inserted");
}

?>