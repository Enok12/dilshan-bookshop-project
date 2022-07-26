<?php
session_start();
unset($_SESSION["customerusername"]);
echo "<script>alert('Logged Out');</script>";
header("refresh:0; url=Home.php");
?>