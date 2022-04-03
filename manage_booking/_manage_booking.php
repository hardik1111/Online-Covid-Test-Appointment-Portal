<?php session_start();
require_once '../config/db_connect.php';
if(isset($_POST['action']))
{
    $function = $_POST['action'];
    $function();
}
else
{
    session_destroy();
    session_start();
    $_SESSION['session-msg']='Unauthorized Access';
    $_SESSION['session-type']='danger';
    header("location:index.php");
}

function add_booking()
{
    $conn=$GLOBALS['conn'];
    $name=mysqli_real_escape_string($conn,$_POST['name']); 
    $age=mysqli_real_escape_string($conn,$_POST['age']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $number=mysqli_real_escape_string($conn,$_POST['number']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    
    $hospitalId=mysqli_real_escape_string($conn,$_POST['hospitalId']);
    $appoinmentDate=mysqli_real_escape_string($conn,$_POST['appoinmentDate']);
    $slotId=mysqli_real_escape_string($conn,$_POST['time_slot']);

    $appoinmentId=time();

    date_default_timezone_set('Europe/Berlin');
    $bookingDateTime = date('d-m-Y h:i:s a', time());

    $query="INSERT INTO `appointments` (`appointment_id`,`name`, `age`,`email`, `contact`,`address`,`hospital_id`,`slot_time_id`,`appointment_date`,`appointment_date_time`)
     VALUES ('$appoinmentId','$name', '$age','$email','$number', '$address','$hospitalId','$slotId','$appoinmentDate','$bookingDateTime')";
     $result=mysqli_query($conn,$query);
     if($result)
     {
        $lastId=mysqli_insert_id($conn);
        $sql="SELECT appointments.*,hospital.*,slot_times.start_time,slot_times.end_time FROM appointments INNER JOIN hospital ON appointments.hospital_id=hospital.hospital_id INNER JOIN slot_times ON appointments.slot_time_id=slot_times.slot_time_id WHERE appointments.apt_id=$lastId";
        $result=mysqli_query($conn,$sql);
        $record=mysqli_fetch_assoc($result);
        $appoinmentId=$record['appointment_id'];
        $name=$record['name'];
        $age=$record['age'];
        $email=$record['email'];
        $appointmentdate=$record['appointment_date'];
        $bookingDateTime=$record['appointment_date_time'];
        $slot_start=$record['start_time'];
        $slot_end=$record['end_time'];
        $hospitalName=$record['hospital_name'];
        $hospitalAddress=$record['hospital_address'];
        $zip=$record['hospital_pincode'];
        
        include "sendEmail.php";

        $_SESSION['session-msg']='Appointment Booked Successfully';

        
        header("location:../index.php");die;
     }
     else
     {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:../index.php");die;
     }
    
}


?>