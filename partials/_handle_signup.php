<?php

    // if signup button is clicked then do signup here
    $showError = "false";
    if(isset($_POST['btn-signup'])){
        include '_dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $user_pass = $_POST['signupPassword'];
        $cpass = $_POST['signupcPassword'];

        // check whether this email exists
        $sql = "SELECT * FROM `users` WHERE user_email='$user_email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows > 0){
            $showError = "This Username \"".$user_email."\" already exists";
        }else{
            if($user_pass == $cpass){
                $hash = password_hash($user_pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users`(`user_email`,`user_pass`)VALUES('$user_email','$hash')";
                $qry = mysqli_query($conn, $sql);
                if($qry){
                    header("location: /forum/index.php?signup=true");
                    exit();
                }else{
                    $showError = mysqli_error($conn);
                }
            }else{
                $showError = "Passwords do not match";
            }
        }
    }
    
    header("location: /forum/index.php?signup=false&error=$showError");
?>