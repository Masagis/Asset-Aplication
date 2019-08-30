<?php
session_start(); // Start session nya
session_destroy(); // Hapus semua session
header("location: ../login.php?pesan=logout"); // Redirect ke halaman awal atau login
?>