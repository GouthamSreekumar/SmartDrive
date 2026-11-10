<?php
require_once('../../connectionclass.php');
$obj = new Connectionclass();

// Retrieve POST data with correct field names
$uname = $_POST['title'];
$description = $_POST['description']; // Corrected spelling
$instructor = $_POST['instructor'];  // Corrected case
$date = $_POST['date'];
$sts = $_POST['status'];
$batch = $_POST['batch'];

// Insert query with the corrected field names
$query = "INSERT INTO notification (n_title, description, instructor_id, n_status, batch_id, post_date) 
          VALUES ('$uname', '$description', '$instructor', '$sts', '$batch', '$date')";
$exeupdate = $obj->Manipulation($query);

// Check if the query executed successfully
if ($exeupdate['status'] == 'true') {
    echo $obj->alert("Successfully added", "../notification_view.php");
} else {
    echo $obj->alert($exeupdate, "../notification_view.php");
}
?>
