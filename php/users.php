<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn , "SELECT * FROM users EXCEPT SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']} ORDER BY status");
    $output = "";

    if(mysqli_num_rows($sql)>0){
        include "data.php";
    }else{
        $output .= "No users are avaliable to chat";
    }
    echo $output
?>