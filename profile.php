<?php
include_once './common/header.php';
require_once './includes/db.php';
?>
<div class="container box d-flex align-items-center justify-content-center">

    <?php
    if (empty($_SESSION['user'])) {
        header('location:' . LOGINURL);
        exit();
    }
    $userId = $_SESSION['user']['id'];
    $conn = db_connect();
    $sql = "SELECT * FROM `users` WHERE `id` = $userId";
    $sqlResult = mysqli_query($conn, $sql);
    if (mysqli_num_rows($sqlResult) > 0) {
        $userInfo = mysqli_fetch_assoc($sqlResult);
    } else {
        echo "User not found";
    }
    ?>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">
                <img src="./public/images/user3.png" class="rounded profile-img" alt="userimg">
                <?php
                echo $userInfo['first_name'] . " " . $userInfo['last_name'];
                ?>
            </h5>
            <p class="card-text">Email: <?php echo $userInfo['email']; ?></p>
        </div>
        <div class="card-footer text-muted">
            <a href=<?php echo LOGOUTURL ?> class="text-danger">Logout</a>
        </div>
    </div>


</div>

<?php include_once './common/footer.php'
?>