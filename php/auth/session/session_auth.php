<?php

session_start();

// Pengecekan User Sudah Login
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ../admin/dashboard_beranda.php");
    } elseif ($_SESSION['role'] == 'pengguna') {
        header("Location: ../pages/dashboard_beranda.php");
    }
    exit();
}

?>