<?php
    include_once "config.php";
    session_start();
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = '';
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' OR CONCAT(fname, ' ', lname) LIKE '%{$searchTerm}%' EXCEPT SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else{
        $output .= "No user found related to your search term";
    }

    echo $output;
?>