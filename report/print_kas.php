<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'kasmasjiddb';

$koneksi = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

include "../inc/rupiah.php";


<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM kas_sosial WHERE id_ks='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
// Ambil parameter kode pemasukan dari URL
$kode = $_GET['id_ks'];

// Query pemasukan dengan kode yang sesuai
$sql = $koneksi->prepare("SELECT * FROM kas_sosial WHERE jenis='Masuk' AND id_ks=?");
$sql->bind_param('i', $kode);
$sql->execute();
$data = $sql->get_result()->fetch_assoc();

// Format jumlah pemasukan
$jumlah_formatted = rupiah($data['masuk']);

// Cetak kwitansi
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kwitansi Pemasukan Sosial</title>
</head>
<body>
    <h2>Kwitansi Pemasukan Sosial</h2>
    <p>No. 001/KS/2023</p>
    <p>Tanggal: ' . date("d/M/Y", strtotime($data['tgl_ks'])) . '</p>
    <p>Uraian: ' . $data['uraian_ks'] . '</p>
    <p>Jumlah: ' . $jumlah_formatted . '</p>
    <hr>
    <p>Demikian kwitansi ini dibuat dengan sebenarnya dan dapat dipertanggungjawabkan.</p>
    <p>Diterima oleh,</p>
    <br>
    <p>[ tanda tangan ]</p>
    <p>[ nama ]</p>
    <p>[ tanggal ]</p>
    <script>window.print();</script>
</body>
</html>
';
?>
