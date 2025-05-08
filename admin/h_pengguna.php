<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user ='$id_user'");

    if ($query) {
        echo "<script>alert('Data berhasil dihapus'); window.location='pengguna.php';</script>";
        header("refresh:0; pengguna.php");
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location='pengguna.php';</script>";
        header("refresh:0; pengguna.php");
    }
} else {
    echo "<script>alert('ID Pengguna tidak valid'); window.location='pengguna.php';</script>";
    header("refresh:0; pengguna.php");
}
?>