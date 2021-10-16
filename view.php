<?php
include_once './common/header.php';
require_once './includes/db.php';
require_once './includes/config.php';


//Authenticqate
$userId = (!empty($_SESSION['user']) && !empty($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : 0;
if (empty($userId) || $userId == 0) {
    header('location:' . LOGINURL);
    exit();
}

$contactId = $_GET['id'];
if (!empty($contactId)) {
    $conn = db_connect();
    $contact_id = mysqli_real_escape_string($conn, $contactId);
    $sql = "SELECT * FROM `contacts` WHERE `id` = {$contact_id} AND `owner_id` = {$userId}";
    $sqlResult = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($sqlResult);
    $userImg = '';
    if ($rows > 0) {
        $contactResult = mysqli_fetch_assoc($sqlResult);
        $userImg = !empty($contactResult['photo']) ? SITEURL . "uploads/photos/" . $contactResult['photo'] : "https://via.placeholder.com/50.png/09f/666";
    } else {
        echo "Record dosen't match";
        exit();
    }
} else {
    echo "Invalid contact id";
    exit();
}
?>
<div class="container box">
    <div class="row border">
        <div class="col-sm-6  col-md-4">
            <img src=<?php echo $userImg ?> width="150" class="img-thumbnail" />
        </div>
        <div class="col-sm-6 col-md-8">
            <h4 class="text-primary"><?php echo $contactResult['first_name']; ?></h4>
            <p class="text-secondary">
                <i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $contactResult['first_name']; ?><br />
                <i class="fa fa-phone" aria-hidden="true"></i><?php echo $contactResult['email']; ?><br />
                <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $contactResult['phone']; ?>
            </p>
            <!-- Split button -->
        </div>
    </div>

</div>

<?php
include_once './common/footer.php'
?>