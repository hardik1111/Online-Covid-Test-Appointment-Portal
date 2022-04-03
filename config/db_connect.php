<?php
    $host="localhost";        # host name or ip address
    $user="root";            # database user name
    $pass="";    # database password
    $database="corona";     #dateabase name with which you want to connect
    
    # get connection with mysql
    $conn = mysqli_connect($host,$user,$pass,$database);
    if($conn)
    {
        $GLOBALS['conn']=$conn;
        require_once 'autoLoad.php';
        require_once 'configuration.php';
    }
    else
    {
        echo 'error';
        die;
    }
?>