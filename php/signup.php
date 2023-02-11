<?php
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows()>0){
                echo "$email - This email already exist!";
            }else{
                if(isset($_FILES['file'])){
                    
                }else{
                    echo "Please select an image file"
                }
            }
            
        }else{
            echo "$email - This is not a valid email address";
        }
    }else{
        echo "All input field are required";
    }
?>