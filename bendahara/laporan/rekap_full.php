<?php
// Menghitung saldo kas masjid
$sql_masjid = $koneksi->query("SELECT SUM(masuk) as tot_masuk FROM kas_masjid WHERE jenis='Masuk'");
while ($data_masjid = $sql_masjid->fetch_assoc()) {
  $masuk_masjid = $data_masjid['tot_masuk'];
}

$sql_masjid = $koneksi->query("SELECT SUM(keluar) as tot_keluar FROM kas_masjid WHERE jenis='Keluar'");
while ($data_masjid = $sql_masjid->fetch_assoc()) {
  $keluar_masjid = $data_masjid['tot_keluar'];
}

$saldo_masjid = $masuk_masjid - $keluar_masjid;

// Menghitung saldo kas sosial
$sql_sosial = $koneksi->query("SELECT SUM(masuk) as tot_masuk FROM kas_sosial WHERE jenis='Masuk'");
while ($data_sosial = $sql_sosial->fetch_assoc()) {
  $masuk_sosial = $data_sosial['tot_masuk'];
}

$sql_sosial = $koneksi->query("SELECT SUM(keluar) as tot_keluar FROM kas_sosial WHERE jenis='Keluar'");
while ($data_sosial = $sql_sosial->fetch_assoc()) {
  $keluar_sosial = $data_sosial['tot_keluar'];
}

$saldo_sosial = $masuk_sosial - $keluar_sosial;

$total_masuk = $masuk_masjid + $masuk_sosial;
$total_keluar = $keluar_masjid + $keluar_sosial;
$total_saldo = $saldo_masjid + $saldo_sosial;
?>

<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-info"></i> Saldo Kas Masjid</h5>
  <h5>Pemasukan: <?php echo rupiah($masuk_masjid); ?></h5>
  <h5>Pengeluaran: <?php echo rupiah($keluar_masjid); ?></h5>
  <hr>
  <h3>Saldo Akhir: <?php echo rupiah($saldo_masjid); ?></h3>
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-table"></i> Rekap Kas Masjid</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql_masjid = $koneksi->query("SELECT * FROM kas_masjid ORDER BY tgl_km ASC");
          while ($data_masjid = $sql_masjid->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php $tgl = $data_masjid['tgl_km'];
                  echo date("d/M/Y", strtotime($tgl)) ?></td>
              <td><?php echo $data_masjid['uraian_km']; ?></td>
              <td align="right"><?php echo rupiah($data_masjid['masuk']); ?></td>
              <td align="right"><?php echo rupiah($data_masjid['keluar']); ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">Total</th>
            <th align="right"><?php echo rupiah($masuk_masjid); ?></th>
            <th align="right"><?php echo rupiah($keluar_masjid); ?></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-info"></i> Saldo Kas Sosial</h5>
  <h5>Pemasukan: <?php echo rupiah($masuk_sosial); ?></h5>
  <h5>Pengeluaran: <?php echo rupiah($keluar_sosial); ?></h5>
  <hr>
  <h3>Saldo Akhir: <?php echo rupiah($saldo_sosial); ?></h3>
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-table"></i> Rekap Kas Sosial</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql_sosial = $koneksi->query("SELECT * FROM kas_sosial ORDER BY tgl_ks ASC");
          while ($data_sosial = $sql_sosial->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php $tgl = $data_sosial['tgl_ks'];
                  echo date("d/M/Y", strtotime($tgl)) ?></td>
              <td><?php echo $data_sosial['uraian_ks']; ?></td>
              <td align="right"><?php echo rupiah($data_sosial['masuk']); ?></td>
              <td align="right"><?php echo rupiah($data_sosial['keluar']); ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3">Total</th>
            <th align="right"><?php echo rupiah($masuk_sosial); ?></th>
            <th align="right"><?php echo rupiah($keluar_sosial); ?></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-check"></i> Total Rekapitulasi Kas</h5>
  <h5>Total Pemasukan: <?php echo rupiah($total_masuk); ?></h5>
  <h5>Total Pengeluaran: <?php echo rupiah($total_keluar); ?></h5>
  <hr>
  <h3>Total Saldo Akhir: <?php echo rupiah($total_saldo); ?></h3>
</div>
