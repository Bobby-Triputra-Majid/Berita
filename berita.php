<?php
include_once './koneksi.php';
include_once './bagian/template/navbar.php';
include_once './bagian/template/kategori.php';
include_once './controllers/BeritaControllers.php';

$beritaController = new BeritaControllers($connect);

if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    echo "<h1>Slug tidak ditemukan</h1>";
    exit;
}

$slug = $_GET['slug'];
$berita = $beritaController->getBeritaBySlug($slug);

if (!$berita) {
    echo "<h1>Berita tidak ditemukan</h1>";
    exit;
}

function formatTanggalIndo($datetime)
{
    $bulanIndo = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    $timestamp = strtotime($datetime);
    $hari = date('j', $timestamp);
    $bulan = $bulanIndo[(int) date('n', $timestamp)];
    $tahun = date('Y', $timestamp);
    $jamMenit = date('H:i', $timestamp);

    return "{$hari} {$bulan} {$tahun}, {$jamMenit} WIB";
}
?>

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($berita['judul']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="container mx-auto px-4 pt-24">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- Sidebar Kategori -->
            <aside class="lg:col-span-2">
                <?php include_once './bagian/template/kategori.php'; ?>
            </aside>

            <!-- Konten Berita -->
            <main class="lg:col-span-7">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h1 class="text-3xl font-bold text-red-700 mb-4"><?= htmlspecialchars($berita['judul']) ?></h1>
                    <p class="text-sm text-gray-600 mb-2">
                        Dipublikasikan: <?= formatTanggalIndo($berita['created_at']) ?> | Oleh:
                        <?= htmlspecialchars($berita['author']) ?>
                    </p>
                    <img src="./upload/<?= htmlspecialchars($berita['image']) ?>" alt="Gambar Berita"
                        class="w-full h-auto rounded-md shadow mb-4 border border-red-200">
                    <div class="text-justify leading-relaxed text-base">
                        <?= nl2br(htmlspecialchars($berita['description'])) ?>
                    </div>
                </div>
            </main>

            <!-- Hot News -->
            <aside class="lg:col-span-3">
                <?php include_once './bagian/template/hotnews.php'; ?>
            </aside>

        </div>
    </div>


    <?php include_once './bagian/template/footer.php'; ?>

</body>

</html>