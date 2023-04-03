<?php $title = 'Home'; ?>
<?php
// Include necessary file
include_once './class/dbh.class.php';

// Check if user is not logged in
if (!$user->is_logged_in()) {
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
                        <a href="#">Home</a>
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
