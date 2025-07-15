<?php
session_start();
include 'module/koneksi.php';
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit;
}
// Contoh set role manual (di login nanti ambil dari DB)
// if (!isset($_SESSION['role'])) {
//     $_SESSION['role'] = 'user'; // nanti ini di-set otomatis saat login
// }
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - SMK Mandiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- fa fa icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-900 text-white min-h-screen">

    <?php if ($_SESSION['role'] === 'user'): ?>

        <!-- Navbar -->
        <?php include 'module/navbar.php'; ?>

        <!-- Welcome -->
        <section class="text-center py-10">
            <h2 class="text-3xl font-bold text-blue-500 mb-2">Selamat Datang, <?= htmlspecialchars($username) ?>!</h2>
            <p class="text-gray-300">Gunakan menu di bawah untuk mengakses layanan fotokopi.</p>
        </section>

        <!-- Card Menu -->
        <section class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
            <!-- Upload -->
            <a href="fotocopy/upload.php" class="bg-gray-800 border-2 border-blue-600 rounded-xl p-6 hover:scale-105 hover:shadow-lg transition-all">
                <h3 class="text-xl font-bold text-blue-400 mb-2">📤 Upload File</h3>
                <p class="text-gray-300 text-sm">Kirim file yang ingin dicetak.</p>
            </a>

            <!-- Riwayat -->
            <a href="fotocopy/riwayat.php" class="bg-gray-800 border-2 border-blue-600 rounded-xl p-6 hover:scale-105 hover:shadow-lg transition-all">
                <h3 class="text-xl font-bold text-blue-400 mb-2">📁 Riwayat Cetak</h3>
                <p class="text-gray-300 text-sm">Lihat file yang sudah kamu kirim dan statusnya.</p>
            </a>

            <!-- Profil -->
            <a href="fotocopy/profil.php" class="bg-gray-800 border-2 border-blue-600 rounded-xl p-6 hover:scale-105 hover:shadow-lg transition-all">
                <h3 class="text-xl font-bold text-blue-400 mb-2">⚙️ Profil</h3>
                <p class="text-gray-300 text-sm">Ubah password atau username kamu.</p>
            </a>
        </section>

        <div class="fixed bottom-0 right-0 left-0">
            <?php include 'module/footer.php'; ?>
        </div>

    <?php
    else: ?>
        <?php

        if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
            header("Location:login-register/login.php");
            exit;
        }        
        $tittle = "Admin Panel - MyPrint Mandiri";
        // Hitung data
        $totalUser = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM users"))[0];
        $totalFile = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM files"))[0];
        $uploadHariIni = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM files WHERE tanggal_upload = CURDATE()"))[0];
        $totalJilid = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) FROM files WHERE jilid = 'ya'"))[0];
        // 3 file terakhir
        $recentFiles = mysqli_query($koneksi, "SELECT nama_file, tanggal_upload FROM files ORDER BY id DESC LIMIT 3");
        ?>
        <!-- hal admin -->

            <?php include 'module/navbar_admin.php'; ?>
        
        <main class="p-6 max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-blue-300">Statistik Umum</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
                <div class="bg-gray-800 p-4 rounded shadow text-center">
                    <h3 class="text-xl font-semibold text-blue-400">👤 <?= $totalUser ?></h3>
                    <p>Total Pengguna</p>
                </div>
                <div class="bg-gray-800 p-4 rounded shadow text-center">
                    <h3 class="text-xl font-semibold text-blue-400">📄 <?= $totalFile ?></h3>
                    <p>Total File</p>
                </div>
                <div class="bg-gray-800 p-4 rounded shadow text-center">
                    <h3 class="text-xl font-semibold text-blue-400">📆 <?= $uploadHariIni ?></h3>
                    <p>Upload Hari Ini</p>
                </div>
                <div class="bg-gray-800 p-4 rounded shadow text-center">
                    <h3 class="text-xl font-semibold text-blue-400">📚 <?= $totalJilid ?></h3>
                    <p>Total Jilid</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-800 p-6 rounded shadow">
                    <h3 class="text-xl font-semibold mb-3 text-blue-400">🔁 Navigasi Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="admin/pesanan.php" class="text-blue-300 hover:underline"><i class="fa fa-file-text-o mr-2"></i> Kelola Pesanan</a></li>
                        <li><a href="admin/user.php" class="text-blue-300 hover:underline"><i class="fa fa-users mr-2"></i> Kelola Pengguna</a></li>
                    </ul>
                </div>

                <div class="bg-gray-800 p-6 rounded shadow">
                    <h3 class="text-xl font-semibold mb-3 text-blue-400">📁 Upload Terbaru</h3>
                    <ul class="space-y-2">
                        <?php while ($f = mysqli_fetch_assoc($recentFiles)) : ?>
                            <li class="text-sm text-gray-300">
                                <?= $f['nama_file'] ?> <span class="text-gray-500">(<?= $f['tanggal_upload'] ?>)</span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </main>

    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>