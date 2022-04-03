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

function admin_login()
{
    $conn=$GLOBALS['conn'];
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=mysqli_real_escape_string($conn,$_POST['password']);
    $password=md5($pass);
    
    if(empty($_POST['email']))
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
        $query="SELECT email FROM `all_admins` WHERE email='$email'";
        $result=mysqli_query($conn,$query);
        $numRows=mysqli_num_rows($result);
        if($numRows<1 || $numRows>=2)
        {
            $_SESSION['session-msg']='Your Username /Email incorrect';
            $_SESSION['session-type']='danger';
            header("location:index.php");die;
        }
        else
        {
            $query="SELECT pass FROM `all_admins` WHERE pass='$password' AND email='$email'";
            $result=mysqli_query($conn,$query);
            $numRows=mysqli_num_rows($result);
            if($numRows<1 || $numRows>=2)
            {
                $_SESSION['session-msg']='Incorrect Password ! Please Enter Valid Password';
                $_SESSION['session-type']='danger';
                header("location:index.php");die;
            }
            else
            {
                //echo "Login";die;
                $query="SELECT *FROM `all_admins` WHERE email='$email' AND pass='$password'";
                $result=mysqli_query($conn,$query);
                $data=mysqli_fetch_assoc($result);
                $_SESSION['admin_id']=$data['email'];
                $_SESSION['admin_role']=$data['role'];
                $_SESSION['admin_name']=$data['name'];
                $_SESSION['admin_photo']=$data['profile_photo'];

                $_SESSION['session-msg']='You are logged in Successfully';
                header("location:../dashboard/dashboard.php");die;
            }
        }
    }
}

function change_password()
{
    $conn=$GLOBALS['conn'];
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $current_password=mysqli_real_escape_string($conn,$_POST['current_password']);
    $new_password=mysqli_real_escape_string($conn,$_POST['new_password']);

    $password=md5($current_password);
    $newPassword=md5($new_password);
    if(empty($_POST['current_password']))
    {
        $_SESSION['session-msg']='Please Enter Valid Current Password';
        $_SESSION['session-type']='danger';
        header("location:change-password.php");die;

    }
    elseif(empty($_POST['new_password']))
    {
        $_SESSION['session-msg']='Please Valid New Password';
        $_SESSION['session-type']='danger';
        header("location:change-password.php");die;

    }
    else
    {
        $query="SELECT email,pass FROM `all_admins` WHERE email='$email' AND pass='$password'";
        $result=mysqli_query($conn,$query);
        $numRows=mysqli_num_rows($result);
        if($numRows==1)
        {
            $userId=$_SESSION['admin_id'];
            $query="UPDATE `all_admins` SET `email` = '$userId', `pass` = '$newPassword', `last_update_password` = '$currentDate' WHERE `all_admins`.`email` = '$userId'";
            $result=mysqli_query($conn,$query);
            if($result){
            session_destroy();
            session_start();
            $_SESSION['session-msg']='Password Changed Successfully Login to continue..';
            header("location:index.php");die;
            }
            else
            {
                $_SESSION['session-msg']='Somthing Error Occurd Please try again';
                $_SESSION['session-type']='danger';
                header("location:change-password.php");die;

            }
        }
        else
        {
            $_SESSION['session-msg']='Your Current Password Password is Incorrect';
            $_SESSION['session-type']='danger';
            header("location:change-password.php");die;
        }
    }
}
?>