<?php
include_once __DIR__ . '/../../config/db.php';
include_once __DIR__ . '/../../controllers/BeritaControllers.php';

$beritaController = new BeritaControllers($connect);

// Konfigurasi pagination
$perPage = 7;
$page = isset($_GET['hotpage']) ? (int) $_GET['hotpage'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $perPage;

// Ambil semua data hot news
$hotNewsAll = $beritaController->getBerita();
$totalHotNews = count($hotNewsAll);
$totalPages = ceil($totalHotNews / $perPage);

// Potong data hot news sesuai halaman
$hotNews = array_slice($hotNewsAll, $offset, $perPage);

// Fungsi untuk potong teks
function truncateText($text, $maxLength)
{
    return strlen($text) <= $maxLength ? $text : substr($text, 0, $maxLength) . '...';
}
?>


<aside class="lg:col-span-1 animate-fadeIn" style="animation-delay: 0.4s;">
    <div class="bg-white p-5 rounded-xl shadow-md border border-red-100">
        <h2 class="text-2xl font-bold text-red-700 mb-4 border-b-2 border-red-200 pb-2">🔥 Hot News</h2>

        <!-- Container Hot News dan Pagination -->
        <div id="hot-news-container">
            <div id="hot-news-list" class="space-y-4">
                <?php foreach ($hotNews as $item): ?>
                    <div class="hot-news-item flex items-start space-x-3 group hover:bg-red-50 p-2 rounded-md transition">
                        <img src="./upload/<?= htmlspecialchars($item['image']) ?>"
                            alt="Thumbnail <?= htmlspecialchars($item['judul']) ?>"
                            class="w-20 h-20 object-cover rounded-md border border-red-200 shadow-sm group-hover:scale-105 transition duration-300 ease-in-out">

                        <div class="flex-1">
                            <a href="berita.php?slug=<?= urlencode($item['slug']) ?>"
                                class="text-sm font-semibold text-gray-800 hover:text-red-600 leading-tight block transition">
                                <?= htmlspecialchars(truncateText($item['judul'], 50)) ?>
                            </a>
                            <p class="text-xs text-gray-500 mt-1 italic">
                                <?= htmlspecialchars(truncateText($item['description'], 25)) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($totalPages > 1): ?>
                <div class="flex justify-center mt-4 space-x-1" id="hot-news-pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <button
                            class="hotnews-page-btn px-2 py-1 border text-xs font-medium rounded 
                            <?= $i == $page ? 'bg-red-600 text-white border-red-600' : 'text-red-600 border-red-300 hover:bg-red-100' ?>"
                            data-page="<?= $i ?>">
                            <?= $i ?>
                        </button>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        function attachPaginationEvents() {
            document.querySelectorAll(".hotnews-page-btn").forEach(button => {
                button.addEventListener("click", () => {
                    const page = button.getAttribute("data-page");
                    fetch(`bagian/template/hotnews.php?hotpage=${page}`)
                        .then(res => res.text())
                        .then(html => {
                            const tempDiv = document.createElement("div");
                            tempDiv.innerHTML = html;
                            const newList = tempDiv.querySelector("#hot-news-list");
                            const newPagination = tempDiv.querySelector("#hot-news-pagination");

                            document.getElementById("hot-news-list").innerHTML = newList.innerHTML;
                            document.getElementById("hot-news-pagination").innerHTML = newPagination.innerHTML;
                            attachPaginationEvents();
                        })
                        .catch(() => {
                            document.getElementById("hot-news-list").innerHTML =
                                "<p class='text-red-500 text-center'>Gagal memuat Hot News</p>";
                        });
                });
            });
        }

        attachPaginationEvents();
    });
</script>