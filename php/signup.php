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
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.' $img_name);
                    $img_ext = end($img_explode);

                    $extentions = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extentions) === true){
                        $time = time();

                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $status = "Active now";
                            $random_id =  ran(time(), 10000000);

                            
                        }
                        
                    }else{
                        echo "Please select an Image file - jpeg, jpg, png!"
                    }
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