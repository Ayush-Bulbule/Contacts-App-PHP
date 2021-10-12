<?php include_once './common/header.php'
?>
<div class="container box">
    <?php
    if (!empty($_SESSION['user'])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo "Login Success!"
            ?>
        </div>
        <h5>Hello</h5>
    <?php
    }
    ?>
</div>

<?php include_once './common/footer.php'
?>