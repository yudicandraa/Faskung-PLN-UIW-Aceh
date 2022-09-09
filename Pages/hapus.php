<?php 

include "../db_conn.php";
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include "../koneksi.php";
mysqli_query($koneksi, "DELETE FROM penarikan WHERE nomor_barang='$_GET[kode]'");

echo "<script>window.alert('Data Dihapus')
window.location='penarikan.php'</script>";
}else{
    header("Location: index.php");
    exit();
}
?>
