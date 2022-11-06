<!-- Aplikasi Persediaan souvenir pada Apotek
*******************************************************
* Developer    : Vanny Hadiwijaya, S.Kom
* Company      : Wijaya Studio
* Release Date : 14 November 2018
* Blog         : vannyhadiwijaya.blogspot.com
* E-mail       : vannyhadiwijaya@gmail.com
* Phone        : +62-821-3297-2137
-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data Souvenir Masuk
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda</a></li>
    <li class="active">Laporan</li>
    <li class="active">Data Souvenir Masuk</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <!-- Form Laporan -->
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="GET" action="modules/lap-souvenir-masuk/cetak.php" target="_blank">
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
                <th class="center">Periode Masuk</th>
                <th class="center">Tanggal</th>
                <th class="center">Kode Souvenir</th>
                <th class="center">Nama Souvenir</th>
                <th class="center">Stok Awal</th>
                <th class="center">Jumlah Masuk</th>
                <th class="center">Satuan</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel souvenir
            $query = mysqli_query($mysqli, "SELECT a.kode_transaksi,a.tanggal_masuk,a.kode_souvenir,b.stok_awal,a.jumlah_masuk,b.kode_souvenir,b.nama_souvenir,b.satuan
                                            FROM is_souvenir_masuk as a INNER JOIN is_souvenir as b ON a.kode_souvenir=b.kode_souvenir ORDER BY kode_transaksi DESC")
                                            or die('Ada kesalahan pada query tampil Data Souvenir Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $tanggal         = $data['tanggal_masuk'];
              $exp             = explode('-',$tanggal);
              $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
              $periode_masuk = date('F', strtotime($tanggal_masuk));

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_transaksi]</td>
                      <td width='80' class='center'>$periode_masuk</td>
                      <td width='80' class='center'>$tanggal_masuk</td>
                      <td width='80' class='center'>$data[kode_souvenir]</td>
                      <td width='200'>$data[nama_souvenir]</td>
                      <td width='100' align='right'>$data[stok_awal]</td>
                      <td width='100' align='right'>$data[jumlah_masuk]</td>
                      <td width='80' class='center'>$data[satuan]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
</section><!-- /.content -->