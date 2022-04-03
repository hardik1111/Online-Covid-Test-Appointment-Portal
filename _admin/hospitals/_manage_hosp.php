<?php session_start();
require_once '../../config/db_connect.php';
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

function add_hospital()
{
     $conn=$GLOBALS['conn'];
    $hos_name=mysqli_real_escape_string($conn,$_POST['hos_name']);
    $hos_number=mysqli_real_escape_string($conn,$_POST['hos_number']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
    
    $query="INSERT INTO `hospital` (`hospital_name`, `hospital_address`,`hospital_pincode`, `hospital_number`)
     VALUES ('$hos_name', '$address','$pincode', '$hos_number')";
     
     $result=mysqli_query($conn,$query);
     if($result)
     {
        $_SESSION['session-msg']='Hospital Added Successfully';
        header("location:hospital.php");die;
     }
     else
     {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:hospital.php");die;
     }
    
}

function _update_hospital()
{
    $conn=$GLOBALS['conn'];
    if(empty($_POST['hospId']))
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:employee.php");die;
    }
    else
    {
        $hospId=mysqli_real_escape_string($conn,$_POST['hospId']);
        $hos_name=mysqli_real_escape_string($conn,$_POST['hos_name']);
        $hos_number=mysqli_real_escape_string($conn,$_POST['hos_number']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
        
        $query="UPDATE `hospital` SET `hospital_name` = '$hos_name', `hospital_number` = '$hos_number', `hospital_address` = '$address', `hospital_pincode` = '$pincode' WHERE `hospital_id` = $hospId";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $_SESSION['session-msg']='Record Updated Successfully';
            header("location:hospital.php");die;
        }
        else
        {
            $_SESSION['session-msg']='Somthing went Wrong';
            $_SESSION['session-type']='danger';
            header("location:hospital.php");die;
        }
    }
    
}


function hospital_delete()
{
    $conn=$GLOBALS['conn'];
    $items= $_POST['checkItem'];
    $ids = implode(',', $items);
    $query="DELETE from hospital WHERE hospital_id IN ($ids)";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        $_SESSION['session-msg']='Record Deleted Successfully';
        $_SESSION['session-type']='danger';
        header("location:hospital.php");die;
    }
    else
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:hospital.php");die;
    }
     
    
}

?>