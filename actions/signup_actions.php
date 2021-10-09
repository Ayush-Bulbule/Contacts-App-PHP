<?php

ob_start();
session_start();

require_once '../includes/db.php';
require_once '../includes/config.php';

if (isset($_POST)) {
    print_arr($_POST);
    $fristname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['cpassword']);


    //validate

    if (empty($fristname)) {
        $errors[] = "Frist name can't be blank";
    }
    if (empty($lastname)) {
        $errors[] = "Last name can't be empty";
    }
    if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email can't be empty";
    }
    if (empty($password)) {
        $errors[] = "Password can't be empty";
    }

    if (!empty($password) && !empty($confirmpassword) && $password != $confirmpassword) {
        $errors[] = "Confirm password dosn't match.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:' . SIGNUPURL);
        exit();
    }

    //Saving data if all is good
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (first_name,last_name,email,password) VALUES ('{$fristname}','{$lastname}','{$email}','{$passwordHash}')";

    $conn = db_connect();

    if (mysqli_query($conn, $sql)) {
        db_close($conn);
        $message = "Your registration is successfull!";
        $_SESSION['success'] = $message;
        header('location:' . SIGNUPURL);
    } else {
        echo "error";
        print_r($conn);
    }
}
