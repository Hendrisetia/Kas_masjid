<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Tambah Data</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Donatur</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nm_donatur" name="nm_donatur" placeholder="Nama Donatur" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Telepon</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon"required>
        </div>
      </div>


    </div>
    <div class="card-footer">
      <input type="submit" name="Simpan" value="Simpan" class="btn btn-info" >
      <a href="?page=MyApp/data_donatur" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
  // Check if the name already exists
  $sql_check = "SELECT * FROM tb_donatur WHERE nm_donatur = '" . $_POST['nm_donatur'] . "'";
  $query_check = mysqli_query($koneksi, $sql_check);
  $count = mysqli_num_rows($query_check);

  if ($count > 0) {
    // Name already exists, display an error message
    echo "<script>
          Swal.fire({
            title: 'Tambah Data Gagal',
            text: 'Nama donatur sudah ada di database',
            icon: 'error',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              window.location = 'index.php?page=MyApp/add_donatur';
            }
          });
          </script>";
  } else {
    // Name doesn't exist, proceed with data insertion
    $sql_simpan = "INSERT INTO tb_donatur (nm_donatur, alamat, telepon) VALUES (
      '" . $_POST['nm_donatur'] . "',
      '" . $_POST['alamat'] . "',
      '" . $_POST['telepon'] . "'
    )";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
            Swal.fire({
              title: 'Tambah Data Berhasil',
              text: '',
              icon: 'success',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                window.location = 'index.php?page=MyApp/data_donatur';
              }
            });
            </script>";
    } else {
      echo "<script>
            Swal.fire({
              title: 'Tambah Data Gagal',
              text: '',
              icon: 'error',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                window.location = 'index.php?page=MyApp/add_donatur';
              }
            });
            </script>";
    }
  }
}
?>
