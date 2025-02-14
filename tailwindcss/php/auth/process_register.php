<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Content-Type: application/json');

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = 'pengguna';

    if (strlen($password) < 5) {
        echo json_encode(["status" => "error", "message" => "Password harus minimal 5    karakter."]);
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        $check_email->close();
        echo json_encode(["status" => "error", "message" => "Email sudah terdaftar."]);
        exit();
    }

    $check_email->close();

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Registrasi berhasil!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Registrasi gagal. Silakan coba lagi."]);
    }

    $stmt->close();
    $conn->close();
    exit();
}

?>
