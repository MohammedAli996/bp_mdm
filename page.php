<?php
session_start();
error_reporting(0);
include('inc/config.php');
?>
<?php $title = 'Page'; ?>
<?php $currentPage = 'page'; ?>
<?php require_once(__DIR__.'/inc/head.php'); ?>
<body>
    <!--Nav Bar-->
    <?php require_once(__DIR__.'/inc/navbar.php'); ?>
    <!--/Nav Bar-->

    <!-- Footer -->
    <?php require_once(__DIR__.'/inc/footer.php'); ?>
    <!-- /Footer -->

    <!-- all your content here -->

    <!--Login-Form -->
    <?php require_once(__DIR__.'/inc/login.php'); ?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php require_once(__DIR__.'/inc/registration.php'); ?>
    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php require_once(__DIR__.'/inc/login.php'); ?>
    <!--/Forgot-password-Form -->
</body>

<?php require_once(__DIR__.'/inc/allescript.php'); ?>
