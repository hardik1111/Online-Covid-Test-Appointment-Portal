<?php session_start();
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

function _add_employee()
{
    require_once '../../config/db_connect.php';
    $empId=mysqli_real_escape_string($conn,$_POST['empId']);
    $empDigit=mysqli_real_escape_string($conn,$_POST['empDigit']);
    $empType=mysqli_real_escape_string($conn,$_POST['empType']);
    $empName=mysqli_real_escape_string($conn,$_POST['empName']);
    $empDob=mysqli_real_escape_string($conn,$_POST['empDob']);
    $empDoj=mysqli_real_escape_string($conn,$_POST['empDoj']);
    $empAddr=mysqli_real_escape_string($conn,$_POST['empAddr']);
    $empContact=mysqli_real_escape_string($conn,$_POST['empContact']);
    $empEmail=mysqli_real_escape_string($conn,$_POST['empEmail']);
    $empPass=mysqli_real_escape_string($conn,$_POST['empPass']);
    $password=md5($empPass);
    
    $query="INSERT INTO `employees` (`emp_id`,`emp_digit`, `email`,`contact`, `name`, `address`, `emp_type`, `doj`, `dob`, `passwords`, `reg_date`)
     VALUES ('$empId','$empDigit', '$empEmail','$empContact', '$empName', '$empAddr', '$empType', '$empDoj', '$empDob','$password','$currentDate');";
     $result=mysqli_query($conn,$query);
     if($result)
     {
        $_SESSION['session-msg']='Data Added Successfully';
        header("location:employee.php");die;
     }
     else
     {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:employee.php");die;
     }
    
}

function _update_employee()
{
    require_once '../../config/db_connect.php';
    if(empty($_POST['empId']))
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:employee.php");die;
    }
    else
    {
        $empId=mysqli_real_escape_string($conn,$_POST['empId']);
        $empType=mysqli_real_escape_string($conn,$_POST['empType']);
        $empName=mysqli_real_escape_string($conn,$_POST['empName']);
        $empDob=mysqli_real_escape_string($conn,$_POST['empDob']);
        $empAddr=mysqli_real_escape_string($conn,$_POST['empAddr']);
        $empContact=mysqli_real_escape_string($conn,$_POST['empContact']);
        $empEmail=mysqli_real_escape_string($conn,$_POST['empEmail']);
        
        $query="UPDATE `employees` SET `email` = '$empEmail', `contact` = '$empContact', `name` = '$empName', `address` = '$empAddr', `emp_type` = '$empType', `dob` = '$empDob', `update_date` = '$currentDate' WHERE `employees`.`id` = $empId";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $_SESSION['session-msg']='Record Updated Successfully';
            header("location:employee.php");die;
        }
        else
        {
            $_SESSION['session-msg']='Somthing went Wrong';
            $_SESSION['session-type']='danger';
            header("location:employee.php");die;
        }
    }
    
}


function _delete_employee()
{
    require_once '../../config/db_connect.php';
    $items= $_POST['checkItem'];
    $ids = implode(',', $items);
    $query="DELETE from employees WHERE id IN ($ids)";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        $_SESSION['session-msg']='Record Deleted Successfully';
        $_SESSION['session-type']='danger';
        header("location:employee.php");die;
    }
    else
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:employee.php");die;
    }
     
    
}

?>