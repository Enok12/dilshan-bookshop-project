<?php
session_start();
unset($_SESSION["AdminUser_name"]);
echo "<script>alert('Logged Out');</script>";
header("refresh:0; url=Admin_login.php");
?>