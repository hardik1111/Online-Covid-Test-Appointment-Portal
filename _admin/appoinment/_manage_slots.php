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

function _adding_slots()
{
    require_once '../../config/db_connect.php';
    
    if(!empty($_POST['hospitalId']) AND !empty($_POST['date']))
    {
        if(!empty($_POST['slot_time_id']))
        {
            $hospitalId=mysqli_real_escape_string($conn,$_POST['hospitalId']);
            $date=mysqli_real_escape_string($conn,$_POST['date']);
            $query="INSERT INTO `slots` (`hospital_id`, `slot_date`) VALUES ('$hospitalId', '$date')";
            $result=mysqli_query($conn,$query);
            $slotId=mysqli_insert_id($conn);
            if($slotId!=0)
            {
                $slotTimes=$_POST['slot_time_id'];
                //print_r($slotTimes);
                $numRecord=count($slotTimes);
                $values="";
                for($i=0; $i<$numRecord; $i++)
                {
                    $slotTimeId=$slotTimes[$i];
                    $values.="($slotId,$slotTimeId),";
                }
                $value=rtrim($values, ",");
                $ins_all="INSERT INTO `slot_records` (`slot_id`, `slot_time_id`) VALUES ".$value;
                $result=mysqli_query($conn,$ins_all);
                if($result)
                {
                    $_SESSION['session-msg']='Slot Added Successfully';
                    header("location:slot.php");die;
                }
                else
                {
                    $_SESSION['session-msg']='Somthing went Wrong';
                    $_SESSION['session-type']='danger';
                    header("location:add_slot.php");die;
                }
            }
        }
        else
        {
            $_SESSION['session-msg']='Please Select at least one slot';
            $_SESSION['session-type']='danger';
            header("location:add_slot.php");die;
        }
    }
    else
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:slot.php");die;
    }
    
}

function _update_slots()
{
    require_once '../../config/db_connect.php';
    
    if(!empty($_POST['slotId']))
    {
        if(!empty($_POST['slot_time_id']))
        {
            $slotId=mysqli_real_escape_string($conn,$_POST['slotId']);
            $query="DELETE FROM `slot_records` WHERE `slot_records`.`slot_id` = $slotId";
            $result=mysqli_query($conn,$query);
            if($slotId!=0)
            {
                $slotTimes=$_POST['slot_time_id'];
                //print_r($slotTimes);
                $numRecord=count($slotTimes);
                $values="";
                for($i=0; $i<$numRecord; $i++)
                {
                    $slotTimeId=$slotTimes[$i];
                    $values.="($slotId,$slotTimeId),";
                }
                $value=rtrim($values, ",");
                $ins_all="INSERT INTO `slot_records` (`slot_id`, `slot_time_id`) VALUES ".$value;
                $result=mysqli_query($conn,$ins_all);
                if($result)
                {
                    $_SESSION['session-msg']='Slot Updated Successfully';
                    header("location:slot.php");die;
                }
                else
                {
                    $_SESSION['session-msg']='Somthing went Wrong';
                    $_SESSION['session-type']='danger';
                    header("location:slot.php");die;
                }
            }
        }
        else
        {
            $slotId=mysqli_real_escape_string($conn,$_POST['slotId']);
            $query="DELETE FROM `slots` WHERE `slots`.`slot_id` = $slotId";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                $query="DELETE FROM `slot_records` WHERE `slot_records`.`slot_id` = $slotId";
                $result=mysqli_query($conn,$query);
                if($result)
                {
                    $_SESSION['session-msg']='All Slots are Deleted !';
                    $_SESSION['session-type']='danger';
                    header("location:slot.php");die;
                }

            }
        }
    }
    else
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:slot.php");die;
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