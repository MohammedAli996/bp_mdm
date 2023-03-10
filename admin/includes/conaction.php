<?php
session_start();
error_reporting(0);
include('config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

?>
<?php } ?>
