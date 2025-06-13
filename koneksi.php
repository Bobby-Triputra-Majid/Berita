<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_berita";

$connect = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}
?>