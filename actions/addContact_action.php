<?php
ob_start();
session_start();
require_once '../includes/config.php';
require_once '../includes/db.php';
$errors = [];


if (isset($_POST) && !empty($_SESSION['user'])) {
    // print_arr($_POST);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    // $file = $_FILES['']
    $photofile = !empty($_FILES['photo']) ? $_FILES['photo'] : [];


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

    //Uploading User Photo
    $photoName = '';
    print_arr($photofile);
    if (!empty($photofile['name'])) {
        $fileTempPath = $photofile['tmp_name'];
        $filename = $photofile['name'];
        $fileNameCmp = explode('.', $filename);
        $fileExtn = strtolower(end($fileNameCmp));
        $fileNewName = md5(time() . $filename) . '.' . $fileExtn;
        $photoName = $fileNewName;

        //allowed extensions
        $allowed_Extns = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileExtn, $allowed_Extns)) {
            $uploadFileDir = "../uploads/photos/";
            $destinationFilePath = $uploadFileDir . $photoName;
            if (move_uploaded_file($fileTempPath, $destinationFilePath)) {
                $success = "File Uploaded Success!";
            } else {
                $errors[] = "File not uploaded";
            }
        } else {
            $errors[] = "Invalid file type!";
        }

        $ownerId = (!empty($_SESSION['user']) && !empty($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0);
        $sql = "INSERT INTO `contacts`(`first_name`, `last_name`, `email`, `phone`, `address`, `photo`, `owner_id`) VALUES ('{$fname}','{$lname}','{$email}','{$phone}','{$address}','{$photoName}','{$ownerId}')";


        $conn = db_connect();
        if (mysqli_query($conn, $sql)) {
            db_close($conn);
            $message = "Contact has been saved!!";
            $_SESSION['success'] = $message;
            header('location:' . SITEURL);
            exit();
        }
    }



    // $_SESSION['success'] = "Data Get sucess" . print_r($_FILES);
}
