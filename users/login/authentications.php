<?php session_start();
require_once '../../config/db_connect.php';

if(isset($_POST['action']))
{
    $function = $_POST['action'];
    $function();
}
else
{
    $_SESSION['session-msg']='Unauthorized Access';
    $_SESSION['session-type']='danger';
    header("location:index.php");
}

function employee_login()
{
    $conn=$GLOBALS['conn'];
    $empId=mysqli_real_escape_string($conn,$_POST['empId']);
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
    $password=md5($pass);
    
    if(empty($_POST['empId']))
    {
        $_SESSION['session-msg']='Please Enter Valid Email/Username';
        $_SESSION['session-type']='danger';
        header("location:index.php");die;

    }
    elseif(empty($_POST['password']))
    {
        $_SESSION['session-msg']='Please Enter Valid Password';
        $_SESSION['session-type']='danger';
        header("location:index.php");die;

    }
        else
        {
                    $query="SELECT * FROM `employees` WHERE emp_id='$empId' AND passwords='$password'";
                    $result=mysqli_query($conn,$query);
                    $data=mysqli_fetch_assoc($result);
                    if(mysqli_num_rows($result)>0)
                    {
                        $_SESSION['user_id']=$data['emp_id'];
                        $_SESSION['user_status']=$data['status'];
                        $_SESSION['user_role']=$data['emp_type'];
                        $_SESSION['user_name']=$data['name'];
                       $_SESSION['user_email']=$data['email'];
                       $_SESSION['user_photo']=$data['photo'];
                        $_SESSION['session-msg']='You are logged in Successfully';
                        
                        header("location:../dashboard/dashboard.php");die; 
                    }else
                    {
                        $_SESSION['session-msg']='Entered login information does not exist with us';
                        $_SESSION['session-type']='danger';
                        header("location:index.php");die;   
                    }

                   
                
            
        }
}


?>