<?php
    $showError = "false";
    
    // check if btn-login is clicked
    if(isset($_POST['btn-login'])){
        require'_dbconnect.php';
        $login_email = $_POST['loginEmail'];
        $login_password = $_POST['loginPassword'];
        
        $sql = "SELECT * FROM users WHERE user_email='$login_email'";
        $results = mysqli_query($conn, $sql);
        if(mysqli_num_rows($results)>0){
            $row = mysqli_fetch_assoc($results);
            if(password_verify($login_password, $row['user_pass'])){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_email'] = $row['user_email'];
                header("location: /forum/index.php");
                exit();
            }else{
                $showError = "Incorrect Password";
            }
        }else{
            $showError = "Inccorrect Username";
        }
    }
    
    header("location: /forum/index.php?login=false&error=$showError");
 

?>