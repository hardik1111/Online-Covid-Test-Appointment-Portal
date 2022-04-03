<!-- type "composer require phpmailer/phpmailer" in the terminal where the domain is saved -->
<!-- move phpmailer one folder up to match the path mentioned below -->
<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'autoload.php';

    
    $subject = "Appointment Confirmation";
    $body_content= "Dear ".$name."\n\nYour appointment is scheduled.\n Details are as follows:\n\nAppointment id: ".$appoinmentId."\nDate: ".$appointmentdate."\nTime slot: ".$slot_start."-".$slot_end."\nTest Center: ".$hospitalName."\nAddress: ".$hospitalAddress."\nZip code: ".$zip;
    $body_content=$body_content."\n\n\n\n\n This is a system generated Email. Please do not reply to this.";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = gethostname();
    $mail->SMTPAuth = true;
    $mail->Username = 'parthdesai@infocryptsolution.com';
    $mail->Password = 'parthdesai123@';
    $mail->setFrom('donotreply@parthdesai.com');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body =$body_content;

    if ($mail->send()) {
        $status = "success";
        $response = "Email sent!";
    } else {
        $status = "failed";
        $response = $mail->ErrorInfo;
    }

    // exit(json_encode(array("status" => $status, "response" => $response)));
?>