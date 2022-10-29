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
    <i class="fa fa-sign-out icon-title"></i> Data Souvenir Keluar

    <a class="btn btn-primary btn-social pull-right" href="?module=form_souvenir_keluar&form=add" title="Tambah Data" data-toggle="tooltip">
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
              Data souvenir Keluar berhasil disimpan.
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
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content