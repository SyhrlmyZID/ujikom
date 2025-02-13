<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Luxe Task - Reset Password</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap"
        rel="stylesheet">

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

    <!-- Reset Password Form -->
    <div class="min-h-screen flex items-center justify-center py-6 px-4">
        <div class="border border-gray-300 rounded-lg p-6 max-w-md w-full shadow-md">
            <form class="space-y-4" action="#" method="POST">
                <div class="mb-8">
                    <h3 class="text-gray-800 text-3xl font-bold">Reset Password</h3>
                    <p class="text-gray-500 text-sm mt-4">Masukkan email Anda untuk menerima tautan reset password.</p>
                </div>

                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Email</label>
                    <div class="relative">
                        <input name="email" type="email" required
                            class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                            placeholder="Masukkan email Anda" />
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" viewBox="0 0 24 24"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5">
                            <path d="M12 12l9-6-9-6-9 6 9 6zm0 1.5L2 7.5v9c0 1.104.896 2 2 2h16c1.104 0 2-.896 2-2v-9l-10 6.5z" />
                        </svg>
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-2.5 px-4 text-sm text-white bg-primary hover:bg-primary_hover rounded-lg transition duration-500">
                    Kirim Tautan Reset
                </button>

                <p class="text-sm text-center text-gray-500 mt-4">Kembali ke <a href="login.php"
                        class="text-primary hover:underline hover:text-primary_hover">Login</a></p>
            </form>
        </div>
    </div> <!-- End - Reset Password Form -->

</body>

</html>
