<?php
include_once './controllers/BeritaControllers.php';
include_once './config/db.php';

$beritaController = new BeritaControllers($connect);

$halaman = isset($_GET['halaman']) && is_numeric($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$halaman = max($halaman, 1);
$offset = ($halaman - 1) * 5;

$beritaaaa = [];
$totalHotNews = 0;
$totalPages = 1;

if (isset($_GET['kategori']) && !empty($_GET['kategori'])) {
    $kategori = $_GET['kategori'];
    $beritaaaa = $beritaController->getBeritaByKategori($kategori, 5, $offset);
    $totalHotNews = $beritaController->countBeritaByKategori($kategori);
    $totalPages = ceil($totalHotNews / 5);
} elseif (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];
    $beritaaaa = $beritaController->searchBeritaBySlug($query, 5, $offset);
    $totalHotNews = $beritaController->countBeritaBySlug($query);
    $totalPages = ceil($totalHotNews / 5);
} else {
    $beritaaaa = $beritaController->getBeritaOld(5, $offset);
    $totalHotNews = $beritaController->countBerita();
    $totalPages = ceil($totalHotNews / 5);
}

function formatTimeTag($datetime)
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
    $isoDatetime = date('Y-m-d\TH:i:s', $timestamp);
    $displayText = "{$hari} {$bulan} {$tahun}, {$jamMenit} WIB";
    return "<span>Dipublikasikan: <time datetime=\"{$isoDatetime}\">{$displayText}</time></span>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Merah Putih</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4 sm:px-6 py-8 pt-24">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-2">

            <?php include 'bagian/template/kategori.php'; ?>

            <main class="lg:col-span-3 bg-white p-6 rounded-lg shadow-lg space-y-8">
                <?php foreach ($beritaaaa as $item): ?>
                    <article class="border border-yellow-400 rounded-lg p-4 shadow hover:shadow-lg transition duration-300">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">
                            <?= htmlspecialchars($item['judul']) ?>
                        </h1>
                        <div class="text-sm text-gray-600 mb-4">
                            <?= formatTimeTag($item['created_at']) ?> |
                            <span>Oleh: <?= htmlspecialchars($item['author']) ?></span>
                        </div>
                        <figure class="mb-4">
                            <img src="./upload/<?= htmlspecialchars($item['image']) ?>" alt="Detail"
                                class="w-full h-auto rounded-md shadow-md border-2 border-yellow-400 mb-3">
                            <?php
                            $deskripsiFull = strip_tags($item['description']);
                            $deskripsiPreview = $deskripsiFull;
                            $isLong = false;
                            if (strlen($deskripsiFull) > 200) {
                                $deskripsiPreview = substr($deskripsiFull, 0, 200) . '...';
                                $isLong = true;
                            }
                            ?>
                            <figcaption class="text-justify text-sm md:text-base text-gray-600 leading-relaxed mb-2">
                                <span><?= nl2br(htmlspecialchars($deskripsiPreview)) ?></span>
                            </figcaption>
                        </figure>
                    </article>
                <?php endforeach; ?>

                <div class="flex justify-center mt-8 space-x-2">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php
                        $queryParams = ['page' => 'home', 'halaman' => $i];
                        if (isset($_GET['kategori'])) {
                            $queryParams['kategori'] = $_GET['kategori'];
                        }
                        if (isset($_GET['query'])) {
                            $queryParams['query'] = $_GET['query'];
                        }
                        $url = '?' . http_build_query($queryParams);
                        ?>
                        <a href="<?= $url ?>"
                            class="px-3 py-1 border <?= $i == $halaman ? 'bg-red-600 text-white' : 'bg-white text-red-600 border-red-600' ?> rounded hover:bg-red-700 hover:text-white transition">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </main>

            <?php include 'bagian/template/hotnews.php'; ?>

        </div>
    </div>

    <?php include 'bagian/template/footer.php'; ?>
</body>

</html>