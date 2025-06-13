<?php
include_once './koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        $sql = "INSERT INTO dukungan (nama, email, pesan, tanggal) VALUES (?, ?, ?, NOW())";
        $stmt = $connect->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $nama, $email, $pesan);
            if ($stmt->execute()) {
                echo "<script>alert('Pesan Anda telah dikirim. Terima kasih!'); window.location.href='support.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan pesan.'); window.location.href='support.php';</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('Query tidak bisa diproses.'); window.location.href='support.php';</script>";
        }
    } else {
        echo "<script>alert('Semua bidang wajib diisi.'); window.location.href='support.php';</script>";
    }
} else {
    header('Location: support.php');
    exit;
}
?>