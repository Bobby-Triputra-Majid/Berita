<?php
include_once './koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tentang Pembuat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100">

    <?php include_once './bagian/template/navbar.php'; ?>

    <div class="flex flex-1">
        <?php include_once './bagian/template/kategori.php'; ?>

        <main class="flex-1 pt-20 lg:ml-10">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-400 p-6">
                        <h1 class="text-3xl font-bold text-white text-center">Pembuat Website</h1>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <div class="flex-shrink-0">
                                <img src="./upload/self.jpg" alt="Foto Pembuat"
                                    class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg ring-2 ring-yellow-400">
                            </div>
                            <div class="flex-1">
                                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Bobby Triputra Majid</h2>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-user text-yellow-400"></i>
                                        <span><strong>Nama:</strong> Bobby Triputra Majid</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-envelope text-yellow-400"></i>
                                        <span><strong>Email:</strong> bobytriputramajid@gmail.com</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-map-marker-alt text-yellow-400"></i>
                                        <span><strong>Asal:</strong> Medan, Indonesia</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-graduation-cap text-yellow-400"></i>
                                        <span><strong>Pendidikan:</strong> Mahasiswa Teknik Informatika</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-code text-yellow-400"></i>
                                        <span><strong>Keahlian:</strong> Web Developer (HTML, CSS, PHP, MySQL)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="prose prose-indigo mx-auto">
                            <p>
                                Saya adalah seorang pengembang web yang sedang belajar membangun aplikasi web dinamis
                                menggunakan PHP dan MySQL. Website ini merupakan bagian dari proyek pribadi untuk
                                menampilkan berita dan informasi terkini dengan kategori yang beragam.
                            </p>
                            <p>
                                Beberapa poin pengalaman dan tujuan:
                            </p>
                            <ul class="list-disc list-inside">
                                <li>Menguasai dasar-dasar PHP &amp; MySQL untuk CRUD, autentikasi, dan keamanan
                                    sederhana.</li>
                                <li>Menggunakan Tailwind CSS untuk desain responsif dan konsisten.</li>
                                <li>Bertujuan membangun portal berita sederhana dengan kategori, pagination, dan fitur
                                    pencarian.</li>
                                <li>Terbuka untuk kolaborasi, saran, atau kritik konstruktif untuk perbaikan proyek.
                                </li>
                            </ul>
                        </div>

                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Temukan Saya di:</h3>
                            <div class="flex items-center space-x-4">
                                <a href="https://github.com/Bobby-Triputra-Majid" class="black" target="_blank"
                                    class="flex items-center gap-2 text-yellow-400 hover:text-indigo-800">
                                    <i class="fab fa-github text-2xl"></i>
                                    <span>GitHub</span>
                                </a>
                                <a href="https://linkedin.com/in/username" target="_blank"
                                    class="flex items-center gap-2 text-indigo-400 hover:text-blue-800">
                                    <i class="fab fa-linkedin text-2xl"></i>
                                    <span>LinkedIn</span>
                                </a>
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