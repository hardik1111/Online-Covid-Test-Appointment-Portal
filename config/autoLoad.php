<?php
//File are include in db_connect.php

function hours()
{
    $option_list='<option value="">Select Hour</option>';
    for($i=1;$i<=12;$i++)
    {
        if($i<=9)
        {
            $i="0".$i;
        }
        $option_list.="<option value=$i>$i</option>";
    }
    return $option_list;
}
function minutes()
{
    $option_list='<option value="">Select Minutes</option>';
    for($i=0;$i<=59;$i++)
    {
        if($i<=9)
        {
            $i="0".$i;
        }
        $option_list.="<option value=$i>$i</option>";
    }
    return $option_list;
}
function timeCat()
{
    $timeCate=array('AM'=>'AM','PM'=>'PM');
    $option_list='<option value="">Select Minutes</option>';
    foreach($timeCate as $value)
    {
        $option_list.="<option value=$value>$value</option>";
    }
    return $option_list;
}
function iEdit($dataArray)
{
    $conn=$GLOBALS['conn'];
    if(!empty($dataArray['conditions']) && !empty($dataArray['tableName']))
    {
       
        $tableName=$dataArray['tableName'];
        $conditions=$dataArray['conditions'];
        $query="SELECT *FROM $tableName $conditions";
        $result=mysqli_query($conn,$query);
        $numRows=mysqli_num_rows($result);
        if($numRows==0)
        {
            return 0;
        }
        {
            $record=mysqli_fetch_assoc($result);
            return $record;
        }
    }
    else
    {
        echo "Invalid Arguments";
    } 
} 

function iFetch($dataArray)
{
    $conn=$GLOBALS['conn'];
    if(!empty($dataArray['conditions']) && !empty($dataArray['tableName']))
    {
       
        $tableName=$dataArray['tableName'];
        $conditions=$dataArray['conditions'];
        $query="SELECT *FROM $tableName $conditions";
        $result=mysqli_query($conn,$query);
        $numRows=mysqli_num_rows($result);
        if($numRows==0)
        {
            return 0;
        }
        {
            $record=mysqli_fetch_assoc($result);
            return $record;
        }
    }
    else
    {
        echo "Invalid Arguments";
    } 
}
function iFetchAll($query)
{
    $conn=$GLOBALS['conn'];
    if(!empty($query))
    {
        $query=$query;
        $result=mysqli_query($conn,$query);
        $numRows=mysqli_num_rows($result);
        if($numRows==0)
        {
            return 0;
        }
        {
            while($row = mysqli_fetch_assoc($result)){
                $record[] = $row;
             }
            // $record=mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $record;
        }
    }
    else
    {
        echo "Invalid Arguments";
    } 
}
function iFormat($date)
{
    $dateValue=date_create($date);
    $date=date_format($dateValue,"d-m-Y");
    return $date;
} 
function iRename($name)
{
    $data=$name;
    $dataArray=explode('.',$data);
    $name=$dataArray[0].time().'.'.end($dataArray);
    return $name;
}

function get_option_list($table,$col_id,$col_name,$sel)
{
       $conn=$GLOBALS['conn'];
       $sql="select * from $table";
       $option_list="<option value=''>Select</option>";
       $rs=mysqli_query($conn,$sql)or die(mysqli_error());
       while($data=mysqli_fetch_assoc($rs))
       {
       if($data[$col_id]==$sel)
       $option_list.="<option value='$data[$col_id]' selected>$data[$col_name]</option>";
       else
       $option_list.="<option value='$data[$col_id]'>$data[$col_name]</option>";
       }
       return $option_list;
}

function iCount($dataArray)
{
    $conn=$GLOBALS['conn'];
    if(!empty($dataArray['conditions']) && !empty($dataArray['tableName']))
    {
       
        $tableName=$dataArray['tableName'];
        $conditions=$dataArray['conditions'];
        $query="SELECT *FROM $tableName $conditions";
        //return $query;
        $result=mysqli_query($conn,$query);
        $numRows=mysqli_num_rows($result);
        $TotalRecord=$numRows;
        return $TotalRecord;
    }
    else
    {
        echo "Invalid Arguments";
    } 
}
//End My Function



?>