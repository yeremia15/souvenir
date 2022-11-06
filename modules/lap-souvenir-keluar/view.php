<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data Souvenir Keluar
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Laporan</li>
    <li class="active">Data Souvenir Keluar</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <!-- Form Laporan -->
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="GET" action="modules/lap-souvenir-keluar/cetak.php" target="_blank">
          <div class="box-body">

            <div class="form-group">
              <label class="col-sm-1">Tanggal</label>
              <div class="col-sm-2">
                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_awal" autocomplete="off" required>
              </div>

              <label class="col-sm-1">s.d.</label>
              <div class="col-sm-2">
                <input style="margin-left:-35px" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_akhir" autocomplete="off" required>
              </div>
            </div>
          </div>
          
          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-primary btn-social btn-submit">
                  <i class="fa fa-print"></i> Cetak
                </button>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
  <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Transaksi</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode Souvenir</th>
                <th class="center">Nama Souvenir</th>
                <th class="center">Stok Awal</th>
                <th class="center">Jumlah Masuk</th>
                <th class="center">Jumlah Keluar</th>
                <th class="center">Stok Akhir</th>
                <th class="center">Satuan</th>
                <th class="center">Unit Kerjan</th>
                <th class="center">Alasan</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel souvenir
            $query = mysqli_query($mysqli, "select distinct a.kode_transaksi, a.tanggal_keluar, a.kode_souvenir, b.stok_awal, c.jumlah_masuk,a.jumlah_keluar,b.stok, b.kode_souvenir,b.nama_souvenir,b.satuan,a.unit_kerja,a.alasan 
            from is_souvenir_keluar as a
            inner join is_souvenir as b on a.kode_souvenir = b.kode_souvenir 
            inner join is_souvenir_masuk as c on c.kode_souvenir = a.kode_souvenir 
            ORDER BY kode_transaksi DESC; ")
            or die('Ada kesalahan pada query tampil Data souvenir Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $tanggal         = $data['tanggal_keluar'];
              $exp             = explode('-',$tanggal);
              $tanggal_keluar   = $exp[2]."-".$exp[1]."-".$exp[0];

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_transaksi]</td>
                      <td width='80' class='center'>$tanggal_keluar</td>
                      <td width='80' class='center'>$data[kode_souvenir]</td>
                      <td width='200'>$data[nama_souvenir]</td>
                      <td width='100' align='right'>$data[stok_awal]</td>
                      <td width='100' align='right'>$data[jumlah_masuk]</td>
                      <td width='100' align='right'>$data[jumlah_keluar]</td>
                      <td width='100' align='right'>$data[stok]</td>
                      <td width='80' class='center'>$data[satuan]</td>
                      <td width='80' class='center'>$data[unit_kerja]</td>
                      <td width='80' class='center'>$data[alasan]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
</section><!-- /.content -->