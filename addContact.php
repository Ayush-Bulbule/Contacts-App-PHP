<?php include_once './common/header.php'
?>
<div class="container box">
    <main role="main" class="container">
        <div class="row justify-content-center wrapper">
            <div class="col-md-6">
                <?php
                if (!empty($_SESSION['success'])) {
                ?>
                    <div class="alert alert-success">
                        <?php
                        print_r($_SESSION['success']);
                        ?>
                    </div>
                <?php
                    unset($_SESSION['success']);
                } ?>
                <?php
                if (!empty($_SESSION['errors'])) {
                ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php
                            foreach ($_SESSION['errors'] as $error) {
                                print '<li>' . $error . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                    unset($_SESSION['errors']);
                } ?>
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Add/Edit Contact</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action=<?php echo SITEURL . 'actions/addContact_action.php'  ?> enctype="multipart/form-data">
                            <div class="form-row row">
                                <div class="col form-group mb-2">
                                    <label>First Name </label>
                                    <input type="text" name="fname" value="" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col form-group mb-2">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label>Email Address</label>
                                <input type="email" name="email" value="" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group mb-2">
                                <label>Phone No.</label>
                                <input type="text" name="phone" value="" class="form-control" placeholder="Contact">
                            </div>
                            <div class="form-group mb-2">
                                <label>Address</label>
                                <input type="text" name="address" value="" class="form-control" placeholder="Address">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Photo</label>
                                <input class="form-control" name="photo" type="file" id="formFile">
                            </div>
                            <div class="form-group mb-2">
                                <input type="hidden" name="contactid" value="" />
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>

        </div>

    </main>
</div>

<?php include_once './common/footer.php'
?>