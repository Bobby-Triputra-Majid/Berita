<?php
$host = "localhost";
$user = "root";
$password = ""; // sesuaikan jika ada password
$database = "db_berita"; // ganti dengan nama database kamu

$connect = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}
?>