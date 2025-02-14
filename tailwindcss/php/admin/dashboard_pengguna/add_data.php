<?php

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Validasi jika tidak ada data yang di isi
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        $message = "Semua kolom tidak boleh kosong.";
    } else {
        // Pengecekan email dari database
        $checkStmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $message = "Email sudah terdaftar. Gunakan email lain.";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssss", $name, $email, $hashedPassword, $role);

            // Validasi ketika berhasil menambahkan data
            if ($stmt->execute()) {
                $message = "Pengguna berhasil ditambahkan.";
                $success = true;
                // Validasi ketika terjadi error
            } else {
                $message = "Terjadi kesalahan. Silakan coba lagi.";
            }
            $stmt->close();
        }
        $checkStmt->close();
    }
}

?>