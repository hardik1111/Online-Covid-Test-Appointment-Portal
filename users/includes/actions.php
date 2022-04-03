<?php session_start();
require_once '../../config/db_connect.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['action']))
{
    $function = $_POST['action'];
    $function();
}
// else
// {
//     $_SESSION['session-msg']='Unauthorized Access';
//     $_SESSION['session-type']='danger';
//     header("location:index.php");
// }

function profile_update()
{
             $conn=$GLOBALS['conn'];
             $name=mysqli_real_escape_string($conn,$_POST['name']);
             $email=mysqli_real_escape_string($conn,$_POST['email']);
             $address=mysqli_real_escape_string($conn,$_POST['address']);
             $empId=mysqli_real_escape_string($conn,$_POST['empId']);
            $photo=$_FILES['photo']['name'];
            if($photo=="")
            {

                 $query="update employees set name='$name',email='$email',address='$address' where emp_id='$empId'";
            }else
            {
                  $file_size =$_FILES['photo']['size'];
                  $file_tmp =$_FILES['photo']['tmp_name'];
                  $file_type=$_FILES['photo']['type'];
                  $exp=explode('.',$photo);
                  $file_ext=strtolower(end($exp));
                  $extensions= array("jpeg","jpg","png","gif","tiff","svg");
                  $newfilename = round(microtime(true)) . '.' . end($exp);

                  if(in_array($file_ext,$extensions)=== false){
                     $errors="extension not allowed, please choose a JPEG or PNG file.";
                  }
                  if($file_size>2097152)
                  {
                  $errors="Please select image size less than 2MB";   
                  }
                  if(empty($errors)==true)
                  {  
                    $query="update employees set name='$name',email='$email',address='$address',photo='$newfilename' where emp_id='$empId'";
                    move_uploaded_file($file_tmp,"../../uploads/users/".$newfilename);
                  }
                  else{
                    $_SESSION['session-msg']=$errors;
                    $_SESSION['session-type']='danger';
                    header("location:../dashboard/employee-profile.php");die;
                  }

          }

        $result=mysqli_query($conn,$query);
        if($result)
        {
            $_SESSION['session-msg']='You have updated your profile successfully';
            header("location:../dashboard/employee-profile.php");die; 
        }else
        {
            $_SESSION['session-msg']='Something went wrong!';
            $_SESSION['session-type']='danger';
            header("location:../dashboard/employee-profile.php");die;   
        }       
            
}

function add_information()
{
             $conn=$GLOBALS['conn'];
             $name=mysqli_real_escape_string($conn,$_POST['name']);
             $email=mysqli_real_escape_string($conn,$_POST['email']);
             $address=mysqli_real_escape_string($conn,$_POST['address']);
             $shopname=mysqli_real_escape_string($conn,$_POST['shopname']);
             $phone=mysqli_real_escape_string($conn,$_POST['phone']);
             $whatsapp=mysqli_real_escape_string($conn,$_POST['whatsapp']);
             $description=mysqli_real_escape_string($conn,$_POST['description']);
            $pincode=mysqli_real_escape_string($conn,$_POST['pincode']); 
             $date=mysqli_real_escape_string($conn,$_POST['date']);
            $emp_id=mysqli_real_escape_string($conn,$_POST['emp_id']);
            $source=mysqli_real_escape_string($conn,$_POST['source']);
            $status=mysqli_real_escape_string($conn,$_POST['status']);
            if(isset($_POST['conversation']))
            {
                $convers=mysqli_real_escape_string($conn,$_POST['conversation']);
            }else{$convers="";}
            if(isset($_POST['followupDate']))
            {
                $followupDa=mysqli_real_escape_string($conn,$_POST['followupDate']);
            }else
            {
                $followupDa="";
            }
            $followupDate=$followupDa=="" ? "" : $followupDa;
            if(isset($_POST['closeType']))
            {
                 $closeTy=mysqli_real_escape_string($conn,$_POST['closeType']);
                 $close_date=date("Y-m-d"); 
            }
            else
            {
                $closeTy="";$close_date="";
            }
            $closeType=$closeTy=="" ? "" : $closeTy;
            $query="insert into information(emp_id,name,shop_name,phone,whatsapp,email,address,pincode,description,status,date,followup_date,referral,close_type,close_date) values('$emp_id','$name','$shopname','$phone','$whatsapp','$email','$address','$pincode','$description','$status','$date','$followupDate','$source','$closeType','$close_date')";
            $result=mysqli_query($conn,$query);
            if ($result) {
                $last_id = mysqli_insert_id($conn);
            } 
            if($convers!=="")
            {
                 mysqli_query($conn,"insert into lead_conversation(lead_id,emp_id,conversation,date) values('$last_id','$emp_id','$convers','$date')");
            }
            
            $_SESSION['session-msg']='Lead added successfully';
            $_SESSION['session-type']='success';
            header("location:../leads/all_leads.php");die; 
}

function update_client()
{
             $conn=$GLOBALS['conn'];
             $name=mysqli_real_escape_string($conn,$_POST['name']);
             $email=mysqli_real_escape_string($conn,$_POST['email']);
             $address=mysqli_real_escape_string($conn,$_POST['address']);
             $shopname=mysqli_real_escape_string($conn,$_POST['shopname']);
             $phone=mysqli_real_escape_string($conn,$_POST['phone']);
             $whatsapp=mysqli_real_escape_string($conn,$_POST['whatsapp']);
            $pincode=mysqli_real_escape_string($conn,$_POST['pincode']);  
            $date=mysqli_real_escape_string($conn,$_POST['date']);
            $leadId=mysqli_real_escape_string($conn,$_POST['leadId']);
            $empId=mysqli_real_escape_string($conn,$_POST['empId']);   
            $query="update information set name='$name',shop_name='$shopname',phone='$phone',whatsapp='$whatsapp',email='$email',address='$address',pincode='$pincode' where info_id='$leadId' and emp_id='$empId'";
            $result=mysqli_query($conn,$query);
            
            $_SESSION['session-msg']='Client Updated successfully';
            $_SESSION['session-type']='success';
            header("location:../leads/all_leads.php");die; 
}

function update_lead()
{
             $conn=$GLOBALS['conn'];
             $description=mysqli_real_escape_string($conn,$_POST['description']);
             $date=mysqli_real_escape_string($conn,$_POST['date']);
             $emp_id=mysqli_real_escape_string($conn,$_POST['empId']);
             $leadId=mysqli_real_escape_string($conn,$_POST['leadId']);
             $status=mysqli_real_escape_string($conn,$_POST['status']);

            if(isset($_POST['conversation']))
            {
                $convers=mysqli_real_escape_string($conn,$_POST['conversation']);
            }else{$convers="";}

            $query1="";
            if(isset($_POST['closeType']))
            {
                 $closeTy=mysqli_real_escape_string($conn,$_POST['closeType']);
                 $close_date=date("Y-m-d");
                 $query1=",close_type='$closeTy',close_date='$close_date' ";
            }
            //follow Up date 
            if(isset($_POST['followupDate']) and $_POST['followupDate']!="")
            {
                $followupDate=mysqli_real_escape_string($conn,$_POST['followupDate']);
                $query1.=" ,followup_date='$followupDate' ";
            }else
            {
                $followupDate="";
            }
            $query="update information set description='$description',status='$status'".$query1." where info_id='$leadId' and emp_id='$emp_id'";
            
            mysqli_query($conn,$query);

            if($convers!=="")
            {
                 mysqli_query($conn,"insert into lead_conversation(lead_id,emp_id,conversation,date) values('$leadId','$emp_id','$convers','$date')");
            }

            
            $_SESSION['session-msg']='Lead added successfully';
            $_SESSION['session-type']='success';
            header("location:../leads/all_leads.php");die; 
}

?>