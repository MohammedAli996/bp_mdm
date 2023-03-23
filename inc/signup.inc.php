<?php
require_once('../class/dbh.class.php');

if(isset($_POST['signup'])){

    // Grabbing the data
    $fname=$_POST['fullname'];
    $email=$_POST['emailid'];
    $mobile=$_POST['mobileno'];
    $password=md5($_POST['password']);

    // Innstantiate Signupconter class
    include "../class/signup.class.php";
    include "../class/signup-control.class.php";
    $signup = new SignupContr($fname, $email, $mobile, $password,);
    // Running error handlers and user signup

    //Going to back to from page
}

?>