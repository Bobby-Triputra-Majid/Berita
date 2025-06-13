<?php
$kategoriAktif = isset($_GET['kategori']) ? $_GET['kategori'] : '';

$kategoriList = [
    'Politik' => 'politik',
    'Hukum dan Kriminal' => 'ekonomi',
    'Teknologi' => 'teknologi',
    'Pendidikan' => 'hiburan',
    'Otomotif' => 'gayahidup',
    'Kesehatan' => 'olahraga',
];

$kategoriIcons = [
    'politik' => 'fas fa-landmark',
    'ekonomi' => 'fas fa-balance-scale',
    'teknologi' => 'fas fa-microchip',
    'hiburan' => 'fas fa-book-reader',
    'gayahidup' => 'fas fa-car',
    'olahraga' => 'fas fa-heartbeat',
];
?>

<style>
    .sidebar {
        margin-top: 64px;
    }
</style>

<!-- Sidebar -->
<aside
    class="fixed left-0 top-16 w-64 h-[calc(100vh-4rem)] bg-[#2c3e50] p-4 shadow-lg border-r border-gray-800 overflow-y-auto z-10 text-white">
    <h2 class="text-xl font-bold text-yellow-400 mb-4 pb-2 border-b border-yellow-400">Kategori</h2>
    <ul class="space-y-1">
        <?php foreach ($kategoriList as $nama => $slug): ?>
            <li>
                <a href="?page=home&kategori=<?= $slug ?>" class="flex items-center gap-2 p-2 rounded-md transition-all duration-200
                  <?= $kategoriAktif === $slug
                      ? 'bg-yellow-100 border-l-4 border-yellow-400 text-[#2c3e50] font-semibold'
                      : 'hover:bg-[#34495e] hover:text-yellow-400 text-white' ?>">
                    <i class="<?= $kategoriIcons[$slug] ?? 'fas fa-tag' ?> w-5 text-sm"></i>
                    <span><?= htmlspecialchars($nama) ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>

<main class="ml-64 pt-2 px-1">
    ...
</main>