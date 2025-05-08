<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT gambar FROM tb_produk WHERE id_produk ='$id_produk'");
    $data = mysqli_fetch_array($query);

    if ($data) {
        $gambar = $data['gambar'];
        $dir = "produk_img/";

        if ($gambar && file_exists($dir . $gambar)) {
            unlink($dir . $gambar);
        }

        $delete = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_produk='$id_produk'");

        if ($delete) {
            echo "<script>alert('Data berhasil dihapus'); window.location='produk.php';</script>";
            header("refresh:0; produk.php");
        } else {
            echo "<script>alert('Data gagal dihapus'); window.location='produk.php';</script>";
            header("refresh:0; produk.php");
        }
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location='produk.php';</script>";
        header("refresh:0; produk.php");
    }
} else {
    echo "<script>alert('Akses tidak valid'); window.location='produk.php';</script>";
    header("refresh:0; produk.php");
}
