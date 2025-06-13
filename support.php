<?php
// support.php

// Jangan output HTML apapun sebelum DOCTYPE
include_once './koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dukungan | LiputanNews</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Offset agar konten tidak tertutup navbar fixed (asumsi navbar tinggi ~64px) */
        body {
            padding-top: 4rem;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">

    <!-- Navbar fixed di atas -->
    <?php include_once './bagian/template/navbar.php'; ?>

    <div class="flex flex-1">
        <!-- Sidebar kategori (fixed) -->
        <?php include_once './bagian/template/kategori.php'; ?>

        <!-- Konten Utama: beri margin kiri untuk sidebar lg:ml-64 -->
        <main class="flex-1 lg:ml-10 p-4">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <!-- Card Utama Lebih Lebar -->
                <!-- Ganti max-w-4xl sesuai kebutuhan; e.g. max-w-3xl atau max-w-5xl -->
                <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-1 overflow-hidden">
                    <!-- Header Card dengan gradasi kuning -->
                    <div class="bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-300 p-6">
                        <h1 class="text-3xl font-extrabold text-white text-center">Dukungan Pengguna</h1>
                        <p class="mt-2 text-center text-yellow-100">
                            Isi formulir di bawah jika ada kendala, atau hubungi langsung kontak yang tersedia.
                        </p>
                    </div>
                    <!-- Konten Card -->
                    <div class="p-8">
                        <!-- Formulir dalam grid untuk tampilan responsif -->
                        <form method="POST" action="support_handler.php" class="space-y-6">
                            <div>
                                <label for="nama" class="block text-gray-700 font-medium mb-1">Nama Anda</label>
                                <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" />
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-1">Email Anda</label>
                                <input type="email" id="email" name="email" placeholder="contoh@domain.com" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition" />
                            </div>
                            <div>
                                <label for="pesan" class="block text-gray-700 font-medium mb-1">Pesan / Kendala</label>
                                <textarea id="pesan" name="pesan" rows="6"
                                    placeholder="Tulis pesan atau kendala Anda..." required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="inline-flex items-center bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                                    <!-- Icon kirim -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>

                        <!-- Divider -->
                        <div class="my-8 border-t border-gray-200"></div>

                        <!-- Informasi kontak tambahan -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 mb-3">Kontak Langsung</h2>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M2 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.285 3.856a1 1 0 01-.217.95L6.414 10.414a11.037 11.037 0 005.172 5.172l1.934-1.934a1 1 0 01.95-.217l3.856 1.285a1 1 0 01.684.949V16a2 2 0 01-2 2h-1C7.82 18 2 12.18 2 5V5z" />
                                        </svg>
                                        <span>WhatsApp: <a href="https://wa.me/6281234567890"
                                                class="text-yellow-600 hover:underline">+62 812-3456-7890</a></span>
                                    </li>
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.867 8.166 6.839 9.489.5.092.682-.217.682-.483 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.34-3.369-1.34-.455-1.157-1.11-1.466-1.11-1.466-.908-.62.069-.607.069-.607 1.004.071 1.532 1.032 1.532 1.032.893 1.53 2.341 1.088 2.91.832.091-.647.35-1.088.636-1.338-2.22-.252-4.555-1.111-4.555-4.944 0-1.091.39-1.984 1.03-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.338 1.909-1.294 2.748-1.025 2.748-1.025.546 1.377.202 2.394.099 2.647.64.699 1.03 1.592 1.03 2.683 0 3.842-2.337 4.688-4.565 4.935.36.31.682.92.682 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.003 10.003 0 0022 12c0-5.523-4.477-10-10-10z" />
                                        </svg>
                                        <span>Email: <a href="mailto:support@liputannews.com"
                                                class="text-yellow-600 hover:underline">support@liputannews.com</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 mb-3">Alamat Kantor</h2>
                                <p class="text-gray-700">
                                    Jl. Pendidikan No. 10,<br>
                                    Medan, Sumatera Utara<br>
                                    Indonesia
                                </p>
                                <!-- Bisa menambahkan embed peta di sini -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <?php include_once './bagian/template/footer.php'; ?>

</body>

</html>