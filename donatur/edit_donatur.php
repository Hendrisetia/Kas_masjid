<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_donatur WHERE id_donatur='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Data</h3>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">

    <input type='hidden' class="form-control" name="id_donatur" value="<?php echo $data_cek['id_donatur']; ?>" readonly/>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Donatur</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="nm_donatur" name="nm_donatur" value="<?php echo $data_cek['nm_donatur']; ?>"/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">alamat</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>"/>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Telepon</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $data_cek['telepon']; ?>"/>
        </div>
      </div>

    <div class="card-footer">
      <input type="submit" name="Ubah" value="Simpan" class="btn btn-success" >
      <a href="?page=MyApp/data_donatur" title="Kembali" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_donatur SET
        nm_donatur='".$_POST['nm_donatur']."',
        alamat='".$_POST['alamat']."',
        telepon='".$_POST['telepon']."'
        WHERE id_donatur='".$_POST['id_donatur']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=MyApp/data_donatur';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=MyApp/data_donatur';
        }
      })</script>";
    }}
?>
