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

function config_update()
{
    require_once '../../config/db_connect.php';
    $site_name=mysqli_real_escape_string($conn,$_POST['site_name']);
    $org_name=mysqli_real_escape_string($conn,$_POST['org_name']);
    $domain=mysqli_real_escape_string($conn,$_POST['domain']);
    $work_hour=mysqli_real_escape_string($conn,$_POST['work_hour']);
    $org_email=mysqli_real_escape_string($conn,$_POST['org_email']);
    $org_phone=mysqli_real_escape_string($conn,$_POST['org_phone']);
    $email1=mysqli_real_escape_string($conn,$_POST['email1']);
    $email2=mysqli_real_escape_string($conn,$_POST['email2']);
    $phone1=mysqli_real_escape_string($conn,$_POST['phone1']);
    $phone2=mysqli_real_escape_string($conn,$_POST['phone2']);
    $office_address=mysqli_real_escape_string($conn,$_POST['office_address']);
    $address1=mysqli_real_escape_string($conn,$_POST['address1']);
    $address2=mysqli_real_escape_string($conn,$_POST['address2']);
    $facebook_link=mysqli_real_escape_string($conn,$_POST['facebook_link']);
    $whatsapp_link=mysqli_real_escape_string($conn,$_POST['whatsapp_link']);
    $insta_link=mysqli_real_escape_string($conn,$_POST['insta_link']);
    $linked_link=mysqli_real_escape_string($conn,$_POST['linked_link']);
   
    $query='';
    $query="UPDATE `configurations` SET `site_name` = '$site_name', `organization_name` = '$org_name', `domain_name` = '$domain', `working_hour` = '$work_hour',
     `organization_email` = '$org_email', `organization_phone` = '$org_phone', `email1` = '$email1', `email2` = '$email2', `phone1` = '$phone1', `phone2` = '$phone2', 
     `address` = '$office_address', `address1` = '$address1', `address2` = '$address2', `facebook` = '$facebook_link', `whatsapp` = '$whatsapp_link', `instagram` = '$insta_link',
      `linkedin` = '$linked_link',";
    
   
    if(!empty($_FILES['site_logo']['name']))
    {
        $logoName=$_FILES['site_logo']['name'];
        $file_ext = strtolower(pathinfo($logoName,PATHINFO_EXTENSION));
        $extensions= array("jpeg","jpg","png","webp");
        if(in_array($file_ext,$extensions)=== true)
        {
            $uploadedPath='../../uploads/logos/';
            $name=iRename($logoName);
            $uploadedFile='../../uploads/logos/'.$name;
            // Create directory if it does not exist
            if(!is_dir($uploadedPath)) {
                mkdir($uploadedPath);
            }
            if(move_uploaded_file($_FILES['site_logo']['tmp_name'],$uploadedFile))
            {
                if(!empty($_POST['old_logo']))
                {
                    $oldLogo=mysqli_real_escape_string($conn,$_POST['old_logo']);
                    $uploadedFile='../../uploads/logos/'.$oldLogo;
                    echo $uploadedFile;
                    unlink( $uploadedFile);
                }
                $query.="`logo` = '$name',";
            }
        }
        else
        {
            $_SESSION['session-msg']='Select Valid Photo Type';
            $_SESSION['session-type']='danger';
            header("location:site_configuration.php");die;
        }
    }
    if(!empty($_FILES['site_favicon']['name']))
    {
        $logoName=$_FILES['site_favicon']['name'];
        $file_ext = strtolower(pathinfo($logoName,PATHINFO_EXTENSION));
        $extensions= array("jpeg","jpg","png","webp");
        if(in_array($file_ext,$extensions)=== true)
        {
            $uploadedPath='../../uploads/logos/';
            $favicon=iRename($logoName);
            $uploadedFile='../../uploads/logos/'.$favicon;
            // Create directory if it does not exist
            if(!is_dir($uploadedPath)) {
                mkdir($uploadedPath);
            }
            if(move_uploaded_file($_FILES['site_favicon']['tmp_name'],$uploadedFile))
            {
                if(!empty($_POST['old_favicon']))
                {
                    $oldFavicon=mysqli_real_escape_string($conn,$_POST['old_favicon']);
                    $uploadedFile='../../uploads/logos/'.$oldFavicon;
                    echo $uploadedFile;
                    unlink( $uploadedFile);
                }
                $query.="`favicon` = '$favicon',";
            }
        }
        else
        {
            $_SESSION['session-msg']='Select Valid Photo Type';
            $_SESSION['session-type']='danger';
            header("location:site_configuration.php");die;
        }
    }
    $query=rtrim($query,",");
     $query.=" WHERE `configurations`.`id` = 1";
     $result=mysqli_query($conn,$query);
     if($result)
     {
        $_SESSION['session-msg']='Configurations Updated Successfully';
        header("location:site_configuration.php");die;
     }
     else
     {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:site_configuration.php");die;
     }
    
}

?>