<?php
// session_start();
require_once('../../connectionclass.php');
$obj = new Connectionclass();
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$contactno = $_POST['contact'];

// Check if the user already exists
$qry1 = "SELECT COUNT(*) FROM login WHERE username = '$email'";
$count = $obj->GetSingleData($qry1);

if ($count > 0) {
    echo $obj->alert("You already have an account", "../instructorview.php");
} else {
    // Insert into login table
    $qry2 = "INSERT INTO login(username, password, usertype, status) VALUES ('$email', '$password', 'instructor', 'active')";
    $exe2 = $obj->Manipulation($qry2);

    if ($exe2['status'] == "true") {
        // Insert into registration table
        $qry_reg = "INSERT INTO registration(st_name, address, email, password, contact_no,usertype) VALUES ('$name', '$address', '$email', '$password', '$contactno','instructor')";
        $res_reg = $obj->Manipulation($qry_reg);

        // Insert into instructor table
        $qry_instructor = "INSERT INTO instructor(st_name, address, email, password, contact_no) VALUES ('$name', '$address', '$email', '$password', '$contactno')";
        $res_instructor = $obj->Manipulation($qry_instructor);

        if ($res_reg['status'] == 'true' && $res_instructor['status'] == 'true') {
            echo $obj->alert("Success", "../instructorview.php");
        } else {
            echo $obj->alert("Failed to insert into registration and instructor tables", "../instructorview.php");
        }
    } else {
        echo $obj->alert("Error inserting into login table", "../instructorview.php");
    }
}
?>
