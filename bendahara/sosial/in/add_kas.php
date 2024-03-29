<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Pemasukan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Uraian</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="uraian_ks" name="uraian_ks" placeholder="Uraian Pemasukan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pemasukan (Rp.)</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="masuk" name="masuk" placeholder="Jumlah Pemasukan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="tgl_ks" name="tgl_ks" required>
				</div>
			</div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Donatur</label>
        <div class="col-sm-4">
          <select name="nm_donatur" id="nm_donatur" class="form-control">
            <option value="">- Pilih Donatur -</option>
            <?php
			$qnm_donatur = mysqli_query($koneksi, "SELECT * FROM tb_donatur");
			while ($data_nm_donatur = mysqli_fetch_array($qnm_donatur)) {
				echo "<option value='$data_nm_donatur[nm_donatur]'>$data_nm_donatur[nm_donatur]</option>";
			}
			?>
          </select>
        </div>
      </div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=i_data_ks" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){

    //menangkap post masuk
    $masuk=$_POST['masuk'];
    $nama_donatur = $_POST['nm_donatur'];

    //membuang Rp dan Titik
    $masuk_hasil=preg_replace("/[^0-9]/", "", $masuk);

    //mulai proses simpan data
        $sql_simpan = "INSERT INTO kas_sosial(tgl_ks,uraian_ks,masuk,keluar,jenis,donatur) VALUES (
        '".$_POST['tgl_ks']."',
        '".$_POST['uraian_ks']."',
        '".$masuk_hasil."',
        '0',
        'Masuk',
        '$nama_donatur')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=i_data_ks';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=i_add_ks';
          }
      })</script>";
    }}
     //selesai proses simpan data

     ?>

<script type="text/javascript">
    var masuk = document.getElementById('masuk');
    masuk.addEventListener('keyup', function (e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatmasuk() untuk mengubah angka yang di ketik menjadi format angka
    masuk.value = formatmasuk(this.value, 'Rp ');
    });

    /* Fungsi formatmasuk */
    function formatmasuk(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    masuk = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
    separator = sisa ? '.' : '';
    masuk += separator + ribuan.join('.');
    }

    masuk = split[1] != undefined ? masuk + ',' + split[1] : masuk;
    return prefix == undefined ? masuk : (masuk ? 'Rp ' + masuk : '');
    }
</script>