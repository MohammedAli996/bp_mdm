<?php
// Begin/resume session
session_start();

// Include necessary file
include_once 'user.class.php';

// Define variable for custom error messages
$errors = [];

// Define key variables for connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'mdm_db';

// Establish a new connection using PDO
try {
    $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    array_push($errors, $e->getMessage());
}

// Make use of database with users
$user = new User($db_conn);