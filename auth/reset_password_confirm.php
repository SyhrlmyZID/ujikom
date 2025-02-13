<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Luxe Task - Update Password Confirm</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- tailwind.config.js -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        primary: ['Roboto', 'sans-serif']
                    },
                    colors: {
                        primary: "#344CB7",
                        primary_hover: "#2446dd"
                    }
                }
            }
        }
    </script>
</head>

<body class="font-primary">

    <!-- Update Password Form -->
    <div class="min-h-screen flex items-center justify-center py-6 px-4">
        <div class="border border-gray-300 rounded-lg p-6 max-w-md w-full shadow-md">
            <form class="space-y-4" id="update-password-form" action="#" method="POST">
                <div class="mb-8">
                    <h3 class="text-gray-800 text-3xl font-bold">Update Password</h3>
                    <p class="text-gray-500 text-sm mt-4">Masukkan password baru Anda untuk memperbarui akun Anda.</p>
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Password Baru</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                            placeholder="Masukkan password baru Anda" />
                        <button type="button"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 toggle-password">
                            <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="#bbb" viewBox="0 0 128 128"
                                class="w-5 h-5 hidden">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" />
                            </svg>
                            <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="#bbb" viewBox="0 0 24 24"
                                class="w-5 h-5">
                                <path
                                    d="M12 4.5C7.305 4.5 3.262 7.233 1 11.5c2.262 4.267 6.305 7 11 7s8.738-2.733 11-7c-2.262-4.267-6.305-7-11-7zm0 11.5c-2.487 0-4.5-2.014-4.5-4.5S9.513 7 12 7s4.5 2.014 4.5 4.5-2.013 4.5-4.5 4.5zm0-8a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm7.25-4.72a1 1 0 10-1.5 1.32A16.939 16.939 0 0118 6.56a1 1 0 00.93-1.78 19.074 19.074 0 00-2.68-1.44z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Konfirmasi Password</label>
                    <div class="relative">
                        <input id="confirm-password" name="confirm-password" type="password" required
                            class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                            placeholder="Konfirmasi password baru Anda" />
                        <button type="button"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 toggle-password">
                            <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="#bbb" viewBox="0 0 128 128"
                                class="w-5 h-5 hidden">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" />
                            </svg>
                            <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="#bbb" viewBox="0 0 24 24"
                                class="w-5 h-5">
                                <path
                                    d="M12 4.5C7.305 4.5 3.262 7.233 1 11.5c2.262 4.267 6.305 7 11 7s8.738-2.733 11-7c-2.262-4.267-6.305-7-11-7zm0 11.5c-2.487 0-4.5-2.014-4.5-4.5S9.513 7 12 7s4.5 2.014 4.5 4.5-2.013 4.5-4.5 4.5zm0-8a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm7.25-4.72a1 1 0 10-1.5 1.32A16.939 16.939 0 0118 6.56a1 1 0 00.93-1.78 19.074 19.074 0 00-2.68-1.44z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-2.5 px-4 text-sm text-white bg-primary hover:bg-primary_hover rounded-lg transition duration-500">
                    Update Password
                </button>
            </form>
        </div>
    </div> <!-- End - Update Password Form -->

    <!-- JavaScript -->
    <script src="../assets/js/auth/reset_password_confirm.js"></script>

</body>

</html>