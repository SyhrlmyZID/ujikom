<?php

// Proses login dari form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Ambil data user berdasarkan email
    $query = $conn->prepare("SELECT user_id, name, email, password, role FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Set cookie jika 'remember me' dicentang
            $expiry_time = $remember ? time() + (7 * 24 * 60 * 60) : time() + (1 * 60 * 60); // 7 hari atau 1 jam
            setcookie("user_id", $user['user_id'], $expiry_time, "/");
            setcookie("name", $user['name'], $expiry_time, "/");
            setcookie("email", $user['email'], $expiry_time, "/");
            setcookie("role", $user['role'], $expiry_time, "/");

            // Redirect berdasarkan role
            if ($user['role'] === "admin") {
                echo json_encode(["status" => "success", "redirect" => "../admin/dashboard_beranda.php"]);
            } else if ($user['role'] === "pengguna") {
                echo json_encode(["status" => "success", "redirect" => "../pages/dashboard_beranda.php"]);
            }
            exit();
        } else {
            // Password salah
            echo json_encode(["status" => "error", "message" => "Password anda salah!"]);
            exit();
        }
    } else {
        // Email tidak ditemukan
        echo json_encode(["status" => "error", "message" => "Email belum terdaftar!"]);
        exit();
    }
}
?>
