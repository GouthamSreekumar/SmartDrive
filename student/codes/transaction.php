<?php
require_once('../../connectionclass.php');
require_once(__DIR__ . '/../../mail_config.php');
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$obj = new Connectionclass();

// Retrieve form data
$title = $_POST['Name'];
$Number = $_POST['Number'];
$CVV = $_POST['CVV'];
$Amount = $_POST['Amount'];
$Remark = $_POST['Remark'];
$Date = $_POST['Date'];
$dateTime = date('Y-m-d');

session_start();
$email = $_SESSION['email'];

// Validate card details
$qry1 = "SELECT * FROM bank WHERE card_number = '$Number'";
$res1 = $obj->GetSingleRow($qry1);

if ($res1 && $Date == $res1['expiry'] && $CVV == $res1['cvv'] && $Number == $res1['card_number'] && $title == $res1['name']) {
    // Insert transaction
    $qry2 = "INSERT INTO client_transaction (fk_client_email, trans_date, amount, remarks) VALUES ('$email', '$dateTime', '$Amount', '$Remark')";
    $result = $obj->Manipulation($qry2);

    if ($result['status'] == "true") {
        // Send confirmation email
        if (sendConfirmationEmail($email, $Amount, $dateTime)) {
            echo $obj->alert("Transaction successful and confirmation email sent.", "../view_payment.php");
        } else {
            echo $obj->alert("Transaction successful, but failed to send confirmation email.", "../view_payment.php");
        }
    } else {
        echo $obj->alert("Transaction failed: " . $result['Message'], "../my_transactions.php");
    }
} else {
    echo $obj->alert("Invalid card details.", "../my_transactions.php");
}

function sendConfirmationEmail($email, $amount, $date) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = (int)SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Transaction Confirmation';
        $mail->Body    = "Your transaction of $amount on $date has been successful. Thank you for using our service!";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Failed to send confirmation email. Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>