<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #f1c40f;
        --text-color: #ffffff;
        --search-bg: #ffffff;
        --search-text: #333333;
    }

    .footer {
        background-color: var(--primary-color);
        color: var(--text-color);
        padding: 12px 20px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }
</style>
<footer class="ml-64 bg-[#2c3e50] text-white py-12 mt-16 px-6 shadow-lg">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start gap-8">
            <!-- Logo & Deskripsi -->
            <div class="text-center md:text-left max-w-md">
                <div class="flex items-center justify-center md:justify-start space-x-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 32 32">
                        <path
                            d="M 10.519531 3 C 9.1395313 3 8.0195312 4.12 8.0195312 5.5 C 8.0195313 6.73 8.9100781 7.7509375 10.080078 7.9609375 C 8.8000781 10.080937 8.0195312 12.9 8.0195312 16 L 9.0195312 16 C 9.0195312 12.97 10.940625 10.389922 13.640625 9.4199219 C 14.100625 7.3199219 14.769531 6 15.519531 6 C 16.009531 6 16.459844 6.5595313 16.839844 7.5195312 C 18.459844 7.5395312 20.34 7.6892969 22 8.0292969 C 20.54 5.5592969 18.399531 4 16.019531 4 C 14.929531 4 13.899219 4.3201563 12.949219 4.9101562 C 12.689219 3.8101562 11.699531 3 10.519531 3 z M 16 8 L 16 9 C 19.03 9 21.610078 10.919141 22.580078 13.619141 C 24.680078 14.079141 26 14.75 26 15.5 C 26 15.99 25.440469 16.440313 24.480469 16.820312 C 24.460469 18.440312 24.310703 20.320469 23.970703 21.980469 C 26.440703 20.520469 28 18.38 28 16 C 28 14.91 27.679844 13.879688 27.089844 12.929688 C 28.189844 12.669688 29 11.68 29 10.5 C 29 9.12 27.88 8 26.5 8 C 25.27 8 24.249063 8.8905469 24.039062 10.060547 C 21.919062 8.7805469 19.1 8 16 8 z M 8.0292969 10.019531 C 5.5592969 11.479531 4 13.62 4 16 C 4 17.09 4.3201563 18.120313 4.9101562 19.070312 C 3.8101562 19.330312 3 20.32 3 21.5 C 3 22.88 4.12 24 5.5 24 C 6.73 24 7.7509375 23.109453 7.9609375 21.939453 C 10.080937 23.219453 12.9 24 16 24 L 16 23 C 12.97 23 10.389922 21.080859 9.4199219 18.380859 C 7.3199219 17.920859 6 17.25 6 16.5 C 6 16.01 6.5595312 15.559688 7.5195312 15.179688 C 7.5395313 13.559688 7.6892969 11.679531 8.0292969 10.019531 z M 22.980469 16 C 22.980469 19.03 21.059375 21.610078 18.359375 22.580078 C 17.899375 24.680078 17.230469 26 16.480469 26 C 15.990469 26 15.540156 25.440469 15.160156 24.480469 C 13.540156 24.460469 11.66 24.310703 10 23.970703 C 11.46 26.440703 13.600469 28 15.980469 28 C 17.070469 28 18.100781 27.679844 19.050781 27.089844 C 19.310781 28.189844 20.300469 29 21.480469 29 C 22.860469 29 23.980469 27.88 23.980469 26.5 C 23.980469 25.27 23.089922 24.249063 21.919922 24.039062 C 23.199922 21.919062 23.980469 19.1 23.980469 16 L 22.980469 16 z">
                    </svg>
                    <span class="text-2xl font-bold">LiputanNews</span>
                </div>
                <p class="text-red-100 mb-4">LiputanNews — Mengabarkan Fakta, Membangun Bangsa.</p>
                <p class="text-sm text-yellow-400">&copy; <span id="currentYear"></span> LiputanNews. Seluruh hak cipta
                    dilindungi.</p>
            </div>

            <!-- Kontak -->
            <div class="text-center md:text-right">
                <h3
                    class="text-xl text-yellow-400 font-bold mb-4 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-16 after:h-1 after:bg-white after:rounded-full">
                    Hubungi Kami
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-center justify-center md:justify-end space-x-2">
                        <!-- Email -->
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8..." />
                        </svg>
                        <a href="mailto:redaksi@liputannews.id"
                            class="hover:text-yellow-400 transition">redaksi@liputannews.id</a>
                    </li>
                    <li class="flex items-center justify-center md:justify-end space-x-2">
                        <!-- Telepon -->
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28..." />
                        </svg>
                        <a href="tel:+628123456789" class="hover:text-yellow-400 transition">+62 822-8587-1925</a>
                    </li>
                    <li class="flex items-center justify-center md:justify-end space-x-2">
                        <!-- Instagram -->
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12a4 4 0 10-8 0..." />
                        </svg>
                        <a href="https://www.instagram.com/liputannews.id" target="_blank"
                            class="hover:text-yellow-400 transition">@liputannews.id</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>
</footer>