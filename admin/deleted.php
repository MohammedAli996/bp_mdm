<?php
require 'includes/config.php';
$id = $_GET['id'];
$sql = 'DELETE FROM admin WHERE id=:id';
$statement = $dbh->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("Location: ./deleted-user.php");
}