<?php
require_once '../connection/Connection.php';
require_once 'validate.php';

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $username = validate($_POST['username']);
    $user_type= validate($_POST['user_type']);
    $pharmacy_name= validate($_POST['pharmacy_name']);
    $sqlc = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sqlc);
    if(mysqli_num_rows($result)>0){
        $respons['success'] = true;
        $respons['message'] = "successfuly";
    }else{
        $sql = "INSERT INTO `users` (`user_id`, `email`, `password`,
        `username`, `user_type`, `pharmacy_name`) VALUES 
        (NULL,'$email','$password',
        '$username','$user_type','$pharmacy_name')";
if(mysqli_query($conn,$sql)){
    $respons['success'] = true;
    $respons['message'] = " successfuly";
}else {
    $respons['success'] = false;
    $respons['message'] = $conn->error;
}
       
       
       
    }
    echo json_encode($respons,JSON_PRETTY_PRINT);

?>
