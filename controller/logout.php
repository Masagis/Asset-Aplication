<?php
session_start(); // Start session nya
session_destroy(); // Hapus semua session
header("location: ../views/login.php"); // Redirect ke halaman awal atau login
?>