<?php
    $conn = mysqli_connect("localhost", "root", "", "chat");

    if(!$conn){
        echo "Error! Failure to connect - ".mysqli_connect_error;
    }
?>