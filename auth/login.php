<?php

// Session auth
include '../php/auth/session/session_auth.php';

// Koneksi Database
include '../config/connection.php';

// Proses Login
include '../php/auth/process_login.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title -->
    <title>Luxe Task | Login</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/favicons/luxetask.png" type="image/x-icon">

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../tailwindcss/src/output.css">

    <!-- Vendor Files -->
    <link rel="stylesheet" href="../assets/vendor/FontAwesome6Pro/css/all.min.css">
    <link rel="stylesheet" href="../tailwindcss/src/poppins.css">

</head>

<body class="bg-blue-50 flex items-center justify-center min-h-screen">
    
    <!-- Login Form -->
    <div class="bg-white shadow-lg rounded-md p-8 max-w-md w-full">
        <h2 class="text-3xl font-bold text-gray-700 mb-6">Masuk ke <span class="text-[#5a67d8]">Luxe
                Task</span></h2>
        <p class="text-gray-700 mb-8 text-base">Masukkan akun Anda untuk masuk dan mulai bekerja.</p>

        <form action="login.php" method="POST" class="space-y-4">
            <!-- Error Message -->
            <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 p-3 rounded-md">
                <p id="error-text"></p>
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <input type="email" id="email" name="email" required placeholder="Masukkan email Anda"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <i class="fas fa-envelope absolute right-4 top-4 text-gray-400"></i>
                </div>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required placeholder="Masukkan password Anda"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none" autocomplete="off">
                    <button type="button" id="toggle-password" class="absolute right-4 top-3.5">
                        <i id="eye-icon" class="fas fa-eye text-gray-400"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-700">
                    <input type="checkbox" name="#" class="h-4 w-4 text-[#5a67d8] border-gray-300 rounded mr-2">
                    Ingat Saya
                </label>
                <a href="#" class="text-sm text-[#5a67d8] hover:underline">Lupa Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-[#5a67d8] hover:bg-[#4953aa] text-white font-semibold py-3 rounded-md transition-all duration-300">
                Masuk Sekarang
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-5">
            Belum punya akun? <a href="register.php" class="text-[#5a67d8] font-medium hover:underline">Daftar
                sekarang</a>.
        </p>
    </div> <!-- End - Login Form -->

    <!-- Right Content -->
    <div class="hidden md:block md:w-1/2 flex items-center justify-center">
        <img src="../assets/svg/Secure-login-pana.svg" alt="Ilustrasi Login" class="max-w-full h-auto p-8" />
    </div> <!-- End - Right Content -->

    <!-- Javascript Main -->
    <script src="../assets/js/auth/main.js"></script>
    
    <!-- Javascript Pages -->
    <script>
        // Proses Login JS
        document.querySelector("form").addEventListener("submit", async function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            let response = await fetch("login.php", {
                method: "POST",
                body: formData
            });

            let result = await response.json();

            // Validasi Pesan Error
            let errorMessage = document.getElementById("error-message");
            let errorText = document.getElementById("error-text");

            if (result.status === "error") {
                errorText.textContent = result.message;
                errorMessage.classList.remove("hidden");
            } else {
                window.location.href = "../pages/dashboard_beranda.php";
            }
        });
    </script>

</body>

</html>