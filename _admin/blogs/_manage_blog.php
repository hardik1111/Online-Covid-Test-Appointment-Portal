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

function add_blog()
{
    $conn=$GLOBALS['conn'];
    $heading=mysqli_real_escape_string($conn,$_POST['heading']);
    $content=mysqli_real_escape_string($conn,$_POST['content']);
    $date=date("Y-m-d");
    $query="INSERT INTO `blog` (`blog_heading`, `blog_content`,`blog_date`)
     VALUES ('$heading', '$content','$date')";
     
     $result=mysqli_query($conn,$query);
     if($result)
     {
        $_SESSION['session-msg']='Blog Added Successfully';
        header("location:blogs.php");die;
     }
     else
     {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:blogs.php");die;
     }
    
}


function blog_delete()
{
   $conn=$GLOBALS['conn'];
   $items= $_POST['checkItem'];
   $ids = implode(',', $items); 
    $query="DELETE from blog WHERE blog_id IN ($ids)";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        $_SESSION['session-msg']='Record Deleted Successfully';
        $_SESSION['session-type']='danger';
        header("location:blogs.php");die;
    }
    else
    {
        $_SESSION['session-msg']='Somthing went Wrong';
        $_SESSION['session-type']='danger';
        header("location:blogs.php");die;
    }
     
    
}

?>