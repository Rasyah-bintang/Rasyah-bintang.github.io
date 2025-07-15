<?php
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

// if (isset($_SESSION['username'])) {
//     header("location:dashboard.php");
//     exit;
// }



?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>SMK Mandiri - landing page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-900">
    <header>
        <nav class="flex justify-between items-center px-4 py-3 bg-gray-800 text-white">
            <div class="text-2xl font-bold"><i class="bi bi-printer-fill text-blue-500 w-16 h-16"> MyPrint Mandiri</i></div>
            <div class="dropdown">
                <button class=" dropdown-toggle px-4 py-2 bg-gray-700 rounded hover:bg-gray-600 text-blue-500 font-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Login'  ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark mt-3 ">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a class="dropdown-item text-blue-400" href="upload.php"><i class="fa fa-upload me-2"></i> Upload Baru</a></li>
                        <li><a class="dropdown-item text-blue-400" href="riwayat.php"><i class="fa fa-history me-2"></i> Riwayat</a></li>
                        <li><a class="dropdown-item text-blue-400" href="profil.php"><i class="fa fa-user me-2"></i> Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-blue-400" href="logout.php"><i class="fa fa-sign-out me-2"></i> Logout</a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item text-blue-400" href="login-register/login.php"><i class="fa fa-sign-in me-2"></i> Login</a></li>
                        <li><a class="dropdown-item text-blue-400" href="login-register/register.php"><i class="fa fa-user-plus me-2"></i>Register</a></li>
                        <li><a class="dropdown-item text-blue-400" href="#alamat"><i class="bi bi-geo-alt-fill me-2"></i> Alamat</a></li>
                        <li><a class="dropdown-item text-blue-400" href="#alamat"><i class="bi bi-globe me-2"></i> Social Media</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <section class="relative flex-col items-center justify-center text-center h-screen text-white object-cover p-6"
        style="background: url(img/smk-mandiri.jpg); background-size: cover; background-position: center;">
        <div class="absolute inset-0 backdrop-blur-sm bg-black/60 flex flex-col items-center justify-center ">
            <h1 class="text-5xl font-bold mb-4 animate-bounce text-blue-500">Yuk Mulai Cetak & Fotocopy Sekarang</h1>
            <p class="text-lg mb-6 text-blue-400">Butuh Cetak Cepat? Kami Solusinya.</p>
            <a href="login-register/login.php"
                class="px-6 py-3 bg-blue-600 border-none text-gray-200 font-bold rounded-lg hover:bg-blue-700 hover:-translate-y-2 hover:scale-103 transition-all">
                Mulai Sekarang
            </a>
        </div>
    </section>
    <section class="relative bg-gray-800 text-white py-16">
        <h2 data-aos="zoom-in-up" data-aos-duration="800" class="text-4xl font-bold mb-8 text-center relative z-10 text-blue-500">Apa Jasa Yang Kami Sediakan?</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10 text-blue-500">
            <div data-aos="zoom-in-up" data-aos-duration="1500" data-aos-delay="400" class="bg-gray-700 p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
                <h3 class="text-xl font-bold ">Cetak & Fotokopi Mudah</h3>
                <p class="mt-2 text-blue-400">Upload dokumen dari rumah, cetak langsung, tinggal ambil di tempat fotokopi sekolah.</p>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="1500" data-aos-delay="400" class="bg-gray-700 p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
                <h3 class="text-xl font-bold">Upload File Langsung</h3>
                <p class="mt-2 text-blue-400">Enggak perlu bawa flashdisk — kirim file langsung lewat website ini.</p>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="1500" data-aos-delay="400" class="bg-gray-700 p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
                <h3 class="text-xl font-bold">Akses Mudah & Online</h3>
                <p class="mt-2 text-blue-400">Buka website ini dari HP, laptop, atau warnet — kapan saja, di mana saja!</p>
            </div>
        </div>
    </section>

    <section class="relative bg-gray-800 text-white py-16">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-800 to-transparent"></div>
        <h1 data-aos="fade-right" data-aos-duration="800" class="text-4xl font-bold mb-8 text-start relative z-10 text-blue-500" style="margin-left: 380px ;">Bagaimana Cara Menggunakannya?</h1>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10 text-blue-500">
            <div data-aos="zoom-in-up" data-aos-duration="1500" data-aos-delay="400" class="bg-gray-700 p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 11.25V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v5.25M9 8.25V4.5m0 0H7.5m1.5 0h1.5m3 15v-5.25m0 0h1.5m-1.5 0H12m4.5-14.25h1.5m-1.5 0h-4.5 0m0 0V3m0 5.25H7.5m4.5 0h3m0 0V8.25m-1.5 0L11.25 6m0 0L6 10.5M16.5 10.5h2.25m-2.25 0H18m-1.5-5.25H21"></path>
                        </svg>
                    </div>
                    <h2 class="text-blue-500 text-xl font-bold ml-4">1. Upload File</h2>
                </div>
                <p class="text-blue-400">Upload file yang ingin dicetak atau print.</p>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="1500" data-aos-delay="400" class="bg-gray-700 p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h1m0 0h1v4h-1zm2-7h-4m2-2v3m-4 1h6M9 18h6M5 18h14v2H5z"></path>
                        </svg>
                    </div>
                    <h2 class="text-blue-500 text-xl font-bold ml-4">2. Memilih pilihan yang tersedia</h2>
                </div>
                <p class="text-blue-400">Mengisi form yang tersedia seperti catatan, warna print, dan jilid.</p>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="1500" data-aos-delay="400" class="bg-gray-700 p-6 rounded-lg shadow-lg hover:scale-105 transition-all">
                <div class="flex items-center mb-4">
                    <div class="bg-pink-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v8m0 0H8m4 0h4m-8 4c0 .88-.396 1.676-1 2.243M16 20c0 .88.396 1.676 1 2.243M12 4c0-.88.396-1.676 1-2.243M8 4C7.396 1.676 6 1 5 1H6M12 1h0c1 0 2 .676 3 2.243M16 10c1.604 0 3-.676 4-2.243M12 12h0c-1 0-2 .676-3 2.243m6 0H16c-1 0-2 .676-3 2.243"></path>
                        </svg>
                    </div>
                    <h2 class="text-blue-500 text-xl font-bold ml-4">3. Pengambilan</h2>
                </div>
                <p class="text-blue-400">Mengambilan hasil dari print dan cetak ke fotocopy yang alamatnya tertera di halaman utama</p>
            </div>
        </div>
    </section>

    <footer class="bg-gradient-to-tr from-gray-800 via-gray-900 to-black/40 text-white py-7 mb-0">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex space-x-4">
                <p class="text-blue-500 relative">Contact Me :</p>
                <a href="https://www.instagram.com/smkmandiriofficial?igsh=c2p6NjNxc2gxanFp"
                    class="text-blue-500 relative before:absolute before:w-0 before:h-1 before:bg-blue-500 before:bottom-0 before:left-1/2 before:transition-all before:duration-300 before:origin-center hover:before:w-full hover:before:left-0 "><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                <a href="#"
                    class="text-blue-500 relative before:absolute before:w-0 before:h-1 before:bg-blue-500 before:bottom-0 before:left-1/2 before:transition-all before:duration-300 before:origin-center hover:before:w-full hover:before:left-0 "><i class="bi bi-tiktok"></i> Tiktok</a>
                <a href="https://youtube.com/@smkswastamandiri2219?si=eb4r1noMv8blCCMb"
                    class="text-blue-500 relative before:absolute before:w-0 before:h-1 before:bg-blue-500 before:bottom-0 before:left-1/2 before:transition-all before:duration-300 before:origin-center hover:before:w-full hover:before:left-0 "><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
                <a href="https://maps.app.goo.gl/pXGbqJg31XiSPNuf6"
                    id="alamat" class="text-blue-500 relative before:absolute before:w-0 before:h-1 before:bg-blue-500 before:bottom-0 before:left-1/2 before:transition-all before:duration-300 before:origin-center hover:before:w-full hover:before:left-0 "><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Maps</a>
            </div>

            <p class="text-blue-500 text-sm">&copy; 2025 MyPrint Mandiri. All rights reserved.</p>
        </div>
    </footer>
    <!-- biar ga bisa backward -->
    <!-- <script>
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.go(1);
        };
    </script> -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>