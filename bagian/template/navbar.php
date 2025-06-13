<?php
include_once './controllers/AuthController.php';
$auth = new AuthController($connect);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #f1c40f;
        --text-color: #ffffff;
        --search-bg: #ffffff;
        --search-text: #333333;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
        background-color: var(--primary-color);
        color: var(--text-color);
        padding: 12px 20px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }

    .logo {
        font-weight: bold;
        font-size: 1.5rem;
        color: var(--text-color);
        text-decoration: none;
    }

    .nav-container {
        display: flex;
        align-items: center;
        flex-grow: 1;
        justify-content: space-between;
    }

    .nav-menu {
        display: flex;
        gap: 10px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 8px 12px;
        border-radius: 4px;
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--text-color);
        font-size: 0.95rem;
    }

    .nav-item:hover {
        background-color: var(--secondary-color);
        color: var(--accent-color);
    }

    .nav-icon {
        font-size: 1rem;
    }

    /* Search Bar Styles from the first program */
    .search-container {
        position: relative;
        display: flex;
        align-items: center;
    }

    #search-navbar-input {
        padding: 8px 15px 8px 35px;
        border-radius: 20px;
        border: none;
        outline: none;
        width: 200px;
        transition: all 0.3s;
        background-color: rgba(255, 255, 255, 0.9);
        color: #333;
        font-size: 0.9rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    #search-navbar-input:focus {
        width: 250px;
        box-shadow: 0 0 5px rgba(241, 196, 15, 0.5);
        background-color: white;
    }

    .search-icon {
        position: absolute;
        left: 12px;
        color: #7f8c8d;
        pointer-events: none;
    }

    #search-form button[type="submit"] {
        margin-left: 8px;
        padding: 8px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    #search-form button[type="submit"]:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }

    #reset-search-button {
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        padding: 2px 6px;
        font-size: 0.75rem;
        background-color: #f1f1f1;
        color: #333;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    #reset-search-button:hover {
        background-color: #e0e0e0;
    }

    /* Active Menu Styling */
    .active {
        background-color: var(--secondary-color);
        color: var(--accent-color);
        font-weight: 500;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .navbar {
            gap: 15px;
            padding: 10px 15px;
        }

        .nav-container {
            flex-direction: column;
            gap: 15px;
        }

        .nav-menu {
            width: 100%;
            justify-content: space-between;
        }

        .search-container {
            width: 100%;
        }

        #search-navbar-input {
            width: 100%;
        }

        #search-navbar-input:focus {
            width: 100%;
        }

        #reset-search-button {
            right: 0;
            top: 100%;
            transform: none;
            margin-top: 5px;
        }
    }

    /* Dropdown container */
    .dropdown {
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: var(--primary-color);
        min-width: 160px;
        z-index: 1;
        top: 100%;
        left: 0;
        border-radius: 4px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        flex-direction: column;
    }

    .dropdown-content a {
        color: var(--text-color);
        padding: 10px 15px;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s ease;
        font-size: 0.9rem;
    }

    .dropdown-content a:hover {
        background-color: var(--secondary-color);
        color: var(--accent-color);
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: flex;
    }
</style>
</head>

<body>
    <nav class="navbar">
        <div class="flex-shrink-0 flex items-center ">
            <a href="index.php?page=home" class="flex items-center space-x-2 group">
                <svg xmlns="" width="50" height="50" viewBox="0 0 32 32">
                    <path
                        d="M 10.519531 3 C 9.1395313 3 8.0195312 4.12 8.0195312 5.5 C 8.0195313 6.73 8.9100781 7.7509375 10.080078 7.9609375 C 8.8000781 10.080937 8.0195312 12.9 8.0195312 16 L 9.0195312 16 C 9.0195312 12.97 10.940625 10.389922 13.640625 9.4199219 C 14.100625 7.3199219 14.769531 6 15.519531 6 C 16.009531 6 16.459844 6.5595313 16.839844 7.5195312 C 18.459844 7.5395312 20.34 7.6892969 22 8.0292969 C 20.54 5.5592969 18.399531 4 16.019531 4 C 14.929531 4 13.899219 4.3201563 12.949219 4.9101562 C 12.689219 3.8101562 11.699531 3 10.519531 3 z M 16 8 L 16 9 C 19.03 9 21.610078 10.919141 22.580078 13.619141 C 24.680078 14.079141 26 14.75 26 15.5 C 26 15.99 25.440469 16.440313 24.480469 16.820312 C 24.460469 18.440312 24.310703 20.320469 23.970703 21.980469 C 26.440703 20.520469 28 18.38 28 16 C 28 14.91 27.679844 13.879688 27.089844 12.929688 C 28.189844 12.669688 29 11.68 29 10.5 C 29 9.12 27.88 8 26.5 8 C 25.27 8 24.249063 8.8905469 24.039062 10.060547 C 21.919062 8.7805469 19.1 8 16 8 z M 8.0292969 10.019531 C 5.5592969 11.479531 4 13.62 4 16 C 4 17.09 4.3201563 18.120313 4.9101562 19.070312 C 3.8101562 19.330312 3 20.32 3 21.5 C 3 22.88 4.12 24 5.5 24 C 6.73 24 7.7509375 23.109453 7.9609375 21.939453 C 10.080937 23.219453 12.9 24 16 24 L 16 23 C 12.97 23 10.389922 21.080859 9.4199219 18.380859 C 7.3199219 17.920859 6 17.25 6 16.5 C 6 16.01 6.5595312 15.559688 7.5195312 15.179688 C 7.5395313 13.559688 7.6892969 11.679531 8.0292969 10.019531 z M 22.980469 16 C 22.980469 19.03 21.059375 21.610078 18.359375 22.580078 C 17.899375 24.680078 17.230469 26 16.480469 26 C 15.990469 26 15.540156 25.440469 15.160156 24.480469 C 13.540156 24.460469 11.66 24.310703 10 23.970703 C 11.46 26.440703 13.600469 28 15.980469 28 C 17.070469 28 18.100781 27.679844 19.050781 27.089844 C 19.310781 28.189844 20.300469 29 21.480469 29 C 22.860469 29 23.980469 27.88 23.980469 26.5 C 23.980469 25.27 23.089922 24.249063 21.919922 24.039062 C 23.199922 21.919062 23.980469 19.1 23.980469 16 L 22.980469 16 z">
                </svg>
                <span
                    class="text-2xl font-bold text-white group-hover:text-yellow-400 transition-colors">LiputanNews</span>
            </a>
        </div>

        <?php
        $kategoriAktif = $_GET['kategori'] ?? '';

        $menuItems = [
            [
                'icon' => 'fas fa-home',
                'text' => 'Beranda',
                'link' => 'index.php?page=home',
                'active' => !isset($_GET['kategori']) && (!isset($_GET['page']) || $_GET['page'] === 'home')
            ],
            [
                'icon' => 'fas fa-bars',
                'text' => 'Kategori',
                'link' => 'index.php?page=kategori',
                'active' => isset($_GET['kategori']),
                'dropdown' => [
                    'Politik' => 'politik',
                    'Hukum dan Kriminal' => 'ekonomi',
                    'Teknologi' => 'teknologi',
                    'Pendidikan' => 'hiburan',
                    'Otomotif' => 'gayahidup',
                    'Kesehatan' => 'olahraga',
                ]
            ],
            [
                'icon' => 'fas fa-info-circle',
                'text' => 'Tentang',
                'link' => 'tentang.php?page=tentang',
                'active' => ($_GET['page'] ?? '') === 'tentang'
            ],
            [
                'icon' => 'fas fa-headset',
                'text' => 'Support',
                'link' => 'index.php?page=support',
                'active' => ($_GET['page'] ?? '') === 'support'
            ]

        ];
        ?>

        <div class="nav-container">
            <div class="nav-menu">
                <?php foreach ($menuItems as $item): ?>
                    <?php if (isset($item['dropdown'])): ?>
                        <div class="nav-item dropdown <?= $item['active'] ? 'active' : '' ?>">
                            <i class="<?= $item['icon'] ?> nav-icon"></i>
                            <span><?= $item['text'] ?></span>
                            <div class="dropdown-content">
                                <?php foreach ($item['dropdown'] as $nama => $slug): ?>
                                    <a href="?page=home&kategori=<?= $slug ?>"
                                        class="<?= $kategoriAktif === $slug ? 'bg-red-100 font-semibold text-red-700' : 'text-gray-700' ?>">
                                        <?= htmlspecialchars($nama) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= $item['link'] ?>" class="nav-item <?= $item['active'] ? 'active' : '' ?>">
                            <i class="<?= $item['icon'] ?> nav-icon"></i>
                            <span><?= $item['text'] ?></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        </div>
        <div class="search-container">
            <form id="search-form" class="flex items-center">
                <div class="relative">
                    <input type="search" id="search-navbar-input" name="query" placeholder="Cari berita..." class="pl-10 pr-4 py-2 text-sm bg-white/90 text-gray-900 rounded-full border-0 
                                      focus:ring-2 focus:ring-white focus:bg-white focus:outline-none 
                                      transition-all duration-300 shadow-sm w-64" style="backdrop-filter: blur(4px);">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <button type="submit"
                    class="ml-2 p-2 rounded-full bg-white/20 hover:bg-white/30 transition-colors duration-300">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
            <button id="reset-search-button"
                class="hidden absolute -right-4 top-0 transform translate-x-full px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">Reset</button>


    </nav>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const currentPage = urlParams.get('page') || 'home';
        const links = document.querySelectorAll('.nav-link');

        links.forEach(link => {
            const linkPage = new URL(link.href).searchParams.get('page');
            if (linkPage === currentPage) {
                link.classList.add('bg-white/10', 'text-red-200');
                const underline = link.querySelector('span:last-child');
                if (underline) underline.classList.add('w-full');
            } else {
                link.classList.add('text-white', 'hover:text-red-200');
            }
        });

        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        const searchInput = document.getElementById('search-navbar-input');
        const resetButton = document.getElementById('reset-search-button');

        searchInput.addEventListener('input', () => {
            resetButton.classList.toggle('hidden', searchInput.value.trim() === '');
        });

        resetButton.addEventListener('click', () => {
            searchInput.value = '';
            resetButton.classList.add('hidden');
            searchInput.focus();
        });


    </script>
</body>

</html>