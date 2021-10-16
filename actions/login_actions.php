<?php

ob_start();
session_start();
require_once '../includes/config.php';
require_once '../includes/db.php';

if (isset($_POST)) {
    // print_r($_POST);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors[] = "Email can't be empty!!";
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email address";
    }
    if (empty($password)) {
        $errors[] = "Password can't be blank";
    }


    //IF No error
    if (!empty($email) && !empty($password)) {
        $conn = db_connect();
        $sanitizeEmail = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM `users` WHERE `email` ='{$sanitizeEmail}'";
        $sqlResult = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sqlResult) > 0) {
            $userInfo = mysqli_fetch_assoc($sqlResult);

            if (!empty($userInfo)) {
                $passwordInDb = $userInfo['password'];
                if (password_verify($password, $passwordInDb)) {
                    $_SESSION['user'] = $userInfo;
                    $_SESSION['success'] = "Login Success!";
                    header('location:' . SITEURL);
                } else {
                    $errors[] = "Login Failed";
                    $_SESSION['error'] = $errors;
                    // header('location:' . LOGINURL);
                }
            }
        }
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:' . LOGINURL);
        exit();
    }
}
