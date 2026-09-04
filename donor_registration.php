<?php

session_start();
include '../config/db.php';

$id=$_SESSION['user'];

mysqli_query($conn,
"UPDATE users
SET module_level=2
WHERE id='$id'");

echo "Module Completed";
?>