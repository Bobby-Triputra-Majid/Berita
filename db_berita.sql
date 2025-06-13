USE if0_39190718_berita;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Drop table dulu jika sudah ada (opsional)
DROP TABLE IF EXISTS `berita`;
DROP TABLE IF EXISTS `tb_users`;

-- Recreate table berita
CREATE TABLE `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `author` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert berita terbaru (kategori tetap relevan)
INSERT INTO `berita` 
(`judul`, `description`, `kategori`, `image`, `slug`, `author`, `created_at`, `updated_at`) VALUES

('Indonesia Eksplorasi AI dan Teknologi Digital Bersama Inggris',
'Deputi Menteri Kominfo Nezar Patria melakukan kunjungan kerja ke London Tech Week 2025 untuk menjajaki kerjasama artificial intelligence dan digital tech dengan UK.',
'teknologi',
'ai_uk.jpg',
'indonesia-eksplorasi-ai-bersama-inggris',
'Nezar Patria',
'2025-06-12 10:00:00',
NULL),

('Indonesia Jajaki Kesepakatan FTA dengan Uni Eropa Akhir Juni',
'Menteri Airlangga Hartarto menyatakan bahwa negosiasi perjanjian perdagangan bebas dengan EU ditarget rampung akhir Juni, membuka akses pasar untuk produk Indonesia.',
'ekonomi',
'fta_eu.jpg',
'indonesia-jajaki-fta-uni-eropa-akhir-juni',
'Airlangga Hartarto',
'2025-06-07 09:00:00',
NULL),

('Turki Ekspor 48 Jet Tempur KAAN ke Indonesia',
'Presiden Erdogan mengumumkan kesepakatan ekspor 48 unit jet tempur generasi kelima KAAN ke Indonesia, dengan integrasi manufaktur lokal.',
'politik',
'kaan_jet.jpg',
'turki-ekspor-48-jet-tempur-kaan-ke-indonesia',
'Recep Erdogan',
'2025-06-11 10:51:00',
NULL),

('Indonesia Gulirkan Stimulus Rp 24,4 T Dorong Ekonomi Semester II',
'Pemerintah meluncurkan paket stimulus senilai Rp 24,4 triliun meliputi subsidi transportasi, bantuan sosial, dan diskon tol untuk menstabilkan konsumsi selama libur sekolah.',
'ekonomi',
'stimulus.jpg',
'indonesia-gulirkan-stimulus-rp24-4t',
'Sri Mulyani',
'2025-06-05 02:38:00',
NULL),

('Presiden Prabowo: Target Ekonomi RI Tumbuh 5–5,8 % di 2026',
'Menteri Keuangan menyampaikan bahwa target pertumbuhan ekonomi Indonesia tahun 2026 di kisaran 5,2–5,8 %, didukung penguatan sektor pangan, energi, dan pendidikan.',
'ekonomi',
'pertumbuhan2026.jpg',
'prabowo-optimis-pertumbuhan-ekonomi-2026',
'Sri Mulyani',
'2025-05-20 06:50:00',
NULL),

('GIIAS 2025 Siap Digelar 24 Juli di BSD City',
'Pameran otomotif terbesar di Indonesia, GIIAS 2025, akan digelar mulai 24 Juli hingga 3 Agustus di ICE BSD City, menampilkan produk terbaru industri otomotif.',
'otomotif',
'giias2025.jpg',
'giias-2025-siap-digelar-bsd-city',
'Gaikindo',
'2025-06-10 00:00:00',
NULL);

-- Recreate table tb_users
CREATE TABLE `tb_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `namalengkap` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert admin user
INSERT INTO `tb_users` (`namalengkap`, `email`, `password`, `created_at`, `updated_at`) VALUES
('Trimajid', 'admin@gmail.com', '$2y$10$ieE2x5EoqKlrPCI0WBoHw.CPH2QACX88bbparsy2TlV7UN.zQgNRi', '2025-06-04 11:23:37', NULL);

COMMIT;
