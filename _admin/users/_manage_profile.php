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

function _update_profile()
{
    require_once '../../config/db_connect.php';
    $adminId=$_SESSION['admin_id'];
    $adminName=mysqli_real_escape_string($conn,$_POST['adminName']);
   
    $query='';
    $query="UPDATE `all_admins` SET `name` = '$adminName',";
    
   
    if(!empty($_FILES['profilePhoto']['name']))
    {
        $logoName=$_FILES['profilePhoto']['name'];
        $file_ext = strtolower(pathinfo($logoName,PATHINFO_EXTENSION));
        $extensions= array("jpeg","jpg","png","webp");
        if(in_array($file_ext,$extensions)=== true)
        {
            $uploadedPath='../uploads/profile';
            $name=iRename($logoName);
            $uploadedFile=$uploadedPath.'/'.$name;
            // Create directory if it does not exist
            if(!is_dir($uploadedPath)) {
                mkdir($uploadedPath);
            }
            if(move_uploaded_file($_FILES['profilePhoto']['tmp_name'],$uploadedFile))
            {
                if(!empty($_POST['old_profile']))
                {
                    $oldProfile=mysqli_real_escape_string($conn,$_POST['old_profile']);
                    $uploadedFile=$uploadedPath.'/'.$oldProfile;
                    echo $uploadedFile;
                    unlink( $uploadedFile);
                }
                $query.="`profile_photo` = '$name',";
            }
        }
        else
        {
            $_SESSION['session-msg']='Select Valid Photo Type';
            $_SESSION['session-type']='danger';
            header("location:userProfile.php");die;
        }
    }
    $query=rtrim($query,",");
     $query.=" WHERE `all_admins`.`email` ='$adminId'";
     $result=mysqli_query($conn,$query);
     if($result)
     {
        $_SESSION['session-msg']='Profile Updated Successfully';
        header("location:userProfile.php");die;
     }
     else
     {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:userProfile.php");die;
     }
    
}

?>