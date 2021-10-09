<?php
ob_start();

session_start();
require_once 'includes/config.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Hello, world!</title>
    <style>
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
                    <i class="bi bi-person-badge-fill"></i> iContacts
                </a>
                <form class="col-12 col-lg-auto  ms-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <!-- <button type="button" class="btn btn-outline-light me-2">Login</button> -->
                    <a type="button" href=<?php echo SIGNUPURL ?> class="btn-sm btn btn-warning">Sign-up</a>
                </div>
            </div>
        </div>
    </header>