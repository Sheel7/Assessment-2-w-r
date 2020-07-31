<?php
session_start();
session_destroy();
header("location:home.php"); //redirecting to login page
?>