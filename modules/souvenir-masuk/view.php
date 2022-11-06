<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Data Souvenir Masuk

    <a class="btn btn-primary btn-social pull-right" href="?module=form_souvenir_masuk&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data souvenir Masuk berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Souvenir Masuk berhasil disimpan.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel souvenir -->
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
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content