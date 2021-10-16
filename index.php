<?php
include_once './common/header.php';
require_once './includes/db.php';
require_once './includes/config.php';



$userId = (!empty($_SESSION['user']) && !empty($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : 0;
if (empty($userId) || $userId == 0) {
    header('location:' . LOGINURL);
}

?>
<div class="container box">
    <?php
    if (!empty($_SESSION['success'])) {
    ?>
        <div class="alert p-2 m-2 alert-success alert-dismissible fade show">
            <?php
            echo "Login Success!"
            ?>
            <button type="button" class="p-2 m-0 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['success']);
    }


    //get user's contacts
    $currentPage = !empty($_GET['page']) ? $_GET['page'] : 1;
    $limit = 2;
    $offset = ($currentPage - 1) * $limit;

    $countSql = "SELECT * FROM `contacts` WHERE `owner_id` = $userId";
    $contactsSql = "SELECT * FROM `contacts` WHERE `owner_id` = $userId ORDER BY first_name ASC LIMIT {$offset}, {$limit}";
    $conn = db_connect();
    $contactsResult = mysqli_query($conn, $contactsSql);
    $contactsNumRows = mysqli_num_rows($contactsResult);

    $countResult = mysqli_query($conn, $countSql);
    $numRows = mysqli_num_rows($countResult);


    if ($contactsNumRows > 0) {

    ?>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Profile</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = mysqli_fetch_assoc($contactsResult)) {
                    $userImg = !empty($row['photo']) ? SITEURL . "uploads/photos/" . $row['photo'] : "https://via.placeholder.com/50.png/09f/666";

                ?>
                    <tr>
                        <td class="align-middle"><img src=<?php echo $userImg ?> style="width:75px;height:75px;" class="img-thumbnail img-list" /></td>
                        <td class="align-middle"><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                        <td class="align-middle">
                            <a href=<?php echo VIEW . '?id=' . $row['id']; ?> class="btn btn-success">View</a>
                            <a href="/contactbook/addcontact.php?id=9" class="btn btn-primary">Edit</a>
                            <a href="/contactbook/delete.php?id=9" class="btn btn-danger" onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

            </tbody>
        </table>

        <?php

        getPagination($numRows, $currentPage);

        ?>
</div>

<?php
include_once './common/footer.php'
?>