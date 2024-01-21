<?php
    if (isset($_GET['kode'])) {
        $kode = $_GET['kode'];
        $sql_cek = "SELECT * FROM kas_sosial WHERE id_ks='$kode'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Kwitansi Donasi Kas Masjid</title>
   <style>
      @media print {
         .no-print {
            display: none;
         }
      }
   </style>
   <script>
      window.onload = function() {
         window.print();
      };
   </script>
</head>
<body>
    <?php if (isset($_GET['kode']) && $data_cek) { ?>
        <center>
            <h2>Kwitansi Donasi Kas Sosial</h2>
            <h3>Masjid At-Taqwa Desa Mojo</h3>
            <p>________________________________________________________________________</p>
            <div style="text-align:left">
                <strong>No. Kwitansi:</strong> <?php echo $data_cek['id_ks']; ?>
            </div>
            <div style="text-align:right">
                <strong>Tanggal:</strong> <?php echo $data_cek['tgl_ks']; ?>
            </div>
            <p style="text-align:left"><strong>Untuk Pembayaran:</strong> <?php echo $data_cek['uraian_ks']; ?></p>
            <p style="text-align:left"><strong>Donatur:</strong> <?php echo $data_cek['donatur']; ?></p>
            <p style="text-align:left"><strong>Uang Sejumlah:</strong> Rp <?php echo number_format($data_cek['masuk'], 0, ',', '.'); ?></p>
            <p style="text-align:left"><strong>Jumlah (dalam bilangan):</strong> <?php echo terbilang($data_cek['masuk']); ?> Rupiah</p>
            <p style="text-align:right; margin-top: 100px;">
                Mengetahui,
                <br>
                Ketua Pengurus Masjid
                <br><br><br><br>
                <span style="display: inline-block; width: 150px; text-align: center;">Rosyidin</span>
            </p>
        </center>
    <?php } else { ?>
        <center>
            <p>Data tidak ditemukan.</p>
        </center>
    <?php } ?>
</body>
</html>
<?php
    // Menutup koneksi database
    mysqli_close($koneksi);
?>
<?php
    function terbilang($angka) {
        $angka = abs($angka);
        $terbilang = array(
            '',
            'satu',
            'dua',
            'tiga',
            'empat',
            'lima',
            'enam',
            'tujuh',
            'delapan',
            'sembilan',
            'sepuluh',
            'sebelas'
        );
    
        if ($angka < 12) {
            return $terbilang[$angka];
        } elseif ($angka < 20) {
            return terbilang($angka - 10) . ' belas';
        } elseif ($angka < 100) {
            return terbilang($angka / 10) . ' puluh ' . terbilang($angka % 10);
        } elseif ($angka < 200) {
            return 'seratus ' . terbilang($angka - 100);
        } elseif ($angka < 1000) {
            return terbilang($angka / 100) . ' ratus ' . terbilang($angka % 100);
        } elseif ($angka < 2000) {
            return 'seribu ' . terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            return terbilang($angka / 1000) . ' ribu ' . terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            return terbilang($angka / 1000000) . ' juta ' . terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            return terbilang($angka / 1000000000) . ' miliar ' . terbilang($angka % 1000000000);
        } elseif ($angka < 1000000000000000) {
            return terbilang($angka / 1000000000000) . ' triliun ' . terbilang($angka % 1000000000000);
        } else {
            return 'undefined';
        }
    }
?>