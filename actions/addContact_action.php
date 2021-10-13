<?php
ob_start();
session_start();
require_once '../includes/config.php';
require_once '../includes/db.php';
$errors = [];


if (isset($_POST)) {
    // print_arr($_POST);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    // $file = $_FILES['']

    if (empty($fname)) {
        $errors[] = "Frist name could not be empty!!";
    }
    if (empty($lname)) {
        $errors[] = "Last name could not be empty!!";
    }
    if (empty($email)) {
        $errors[] = "Email could not be empty!!";
    }
    //Email Validation
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid Email!";
    }
    if (empty($phone)) {
        $errors[] = "Phone could not be empty!!";
    }
    //Phone Validation 
    if (!empty($phone) && (strlen($phone) > 10 || strlen($phone) < 10) && !is_numeric($phone)) {
        $errors[] = "Phone Number not valid!!";
    }
    if (empty($address)) {
        $errors[] = "Address could not be empty!!";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:' . ADDCONTACT);
        exit();
    }
    $_SESSION['success'] = "Data Get sucess" . print_r($_FILES);
    header('location:' . ADDCONTACT);
    exit();
}
