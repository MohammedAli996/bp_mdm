<?php
// Include necessary file
include_once './class/dbh.class.php';
// Check if user is not logged in
if (!$user->update()) {
    $user->redirect('index.php');
}

try {
    // Define query to select values from the users table
    $sql = "SELECT * FROM tblusers WHERE user_id=:user_id";

    // Prepare the statement
    $query = $db_conn->prepare($sql);

    // Bind the parameters
    $query->bindParam(':user_id', $_SESSION['user_session']);

    // Execute the query
    $query->execute();

    // Return row as an array indexed by both column name
    $returned_row = $query->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    array_push($errors, $e->getMessage());
}

?>
<?php $title = 'Profail'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/inc/head.php'); ?>
<body>
    <!--Nav Bar-->
    <?php require_once(__DIR__.'/inc/navbar.php'); ?>
    <!--/Nav Bar-->
    <!-- Top back -->
    <a id="button"></a>
    <!-- /Top back -->
    <!--Page Header-->
    <section class="page-header profile_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Your Profile</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->
    <section>
        <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?= $returned_row['FullName']; ?></span><span class="text-black-50"><?= $returned_row['EmailId']; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Full Name" value="<?= $returned_row['FullName']; ?>" /></div>
                    <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" value="" placeholder="Email" value="<?= $returned_row['EmailId']; ?>" /></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?= $returned_row['ContactNo']; ?>" /></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="date" class="form-control" placeholder="dob" value="<?= $returned_row['dob']; ?>" /></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="Address" value="<?= $returned_row['Address']; ?>" /></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="Postcode" value="<?= $returned_row['Postcode']; ?>" /></div>                    <div class="col-md-12">
                        <label class="labels">State</label><input type="password" class="form-control" placeholder="Password" value="<?= $returned_row['Password']; ?>" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="<?= $returned_row['Postcode']; ?>" /></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>

</div>
    </section>
    <!-- Footer -->
    <?php require_once(__DIR__.'/inc/footer.php'); ?>
    <!-- /Footer -->
    <h1>
        welkom <?= $returned_row['FullName']; ?>
    </h1>
    <!-- all your content here -->

    <!--Login-Form -->
    <?php require_once(__DIR__.'/inc/login.php'); ?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php require_once(__DIR__.'/inc/registration.php'); ?>
    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php require_once(__DIR__.'/inc/forgotpassword.php'); ?>
    <!--/Forgot-password-Form -->
</body>

<?php require_once(__DIR__.'/inc/allescript.php'); ?>
<?php

?>