<?php
session_start();
require_once("../connectionclass.php");

// Retrieve session variable and POST parameters
$email = $_SESSION['email_id'];
$new_password = isset($_POST['pass']) ? $_POST['pass'] : null;
$con = isset($_POST['cpass']) ? $_POST['cpass'] : null;

// Check if new password and confirmation password are provided
if ($new_password === null || $con === null) {
    echo "Both password fields are required.";
    exit();
}

// Initialize database connection
$obj = new Connectionclass();

// Check if the new password and confirmation password match
if ($new_password === $con) {
    // Update the password in the database
    $qry = "UPDATE login SET password = '$new_password' WHERE username = '$email'";

    // Debugging: Output the query
    echo "Query: " . $qry . "<br>";

    $result = $obj->Manipulation($qry);

    // Debugging: Check the result of the query execution
    if ($result === false) {
        echo "Query execution failed: " . $obj->error;
    } elseif ($result['status'] === "true") {
        echo $obj->alert("Password successfully updated", "../login.php");
    } else {
        // echo $obj->alert("Password update failed. Please try again.", "../resetpassword.php");
        echo "Result: ";
        print_r($result);
    }
} else {
    // Passwords do not match
    echo $obj->alert("Passwords do not match", "../resetpassword.php");
}
?>
