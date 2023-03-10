<?php
session_start();
include('inc/config.php');
error_reporting(0);

?>
<?php $title = 'product'; ?>
<?php $currentPage = 'index'; ?>
<?php require_once(__DIR__.'/inc/head.php'); ?>
<body>
    <!--Nav Bar-->
    <?php require_once(__DIR__.'/inc/navbar.php'); ?>
    <!--/Nav Bar-->

    <!-- Sort-Product -->
    <?php require_once(__DIR__.'/inc/product.php'); ?>
    <!-- /Sort-Productt -->

    <!-- Footer -->
    <?php require_once(__DIR__.'/inc/footer.php'); ?>
    <!-- /Footer -->

    <!-- all your content here -->

    <!--Login-Form -->
    <?php require_once(__DIR__.'/inc/login.php'); ?>
    <!--/Login-Form -->

    <!--Register-Form -->
    <?php require_once(__DIR__.'/inc/login.php'); ?>
    <!--/Register-Form -->

    <!--Forgot-password-Form -->
    <?php require_once(__DIR__.'/inc/login.php'); ?>
    <!--/Forgot-password-Form -->
</body>

<?php require_once(__DIR__.'/inc/allescript.php'); ?>
