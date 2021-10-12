<!doctype html>
<html lang="en">

<head>
    <?php
    ob_start();
    session_start();
    require_once './includes/config.php';
    $user = !empty($_SESSION['user']) ? $_SESSION['user'] : [];
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Hello, world!</title>
    <style>
        a {
            text-decoration: none;
        }

        .wrapper {
            margin-top: 45px;
            margin-bottom: 45px;
        }
    </style>
</head>

<body>

    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href=<?php echo SITEURL ?> style="font-size:1.5rem;" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <i class="fa fa-address-book me-3"></i> iContacts
                </a>
                <form class="col-12 col-lg-auto  ms-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="fa form-control p-2 form-control-dark" placeholder="&#xf002; Search..." aria-label="Search">
                </form>
                <?php
                if (!empty($user)) {
                ?>
                    <div class="text-end">
                        <a href=<?php echo PROFILEURL ?> class=" text-light">Profile</a>
                        <a href=<?php echo LOGOUTURL ?> class="text-light ms-3">Logout</a>
                        <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
                    <?php
                } else {
                    ?>
                        <a type="button" href=<?php echo LOGINURL ?> class="btn-sm btn btn-warning">Login</a>
                        <a type="button" href=<?php echo SIGNUPURL ?> class="btn-sm ms-2 btn-outline-warning btn">Sign-up</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </header>