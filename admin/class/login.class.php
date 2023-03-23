<?php
require_once('dbh.class.php');

if (isset($_POST['login'])){

    $email = $_POST['username'];
    $password = md5($_POST['password']);
}
?>