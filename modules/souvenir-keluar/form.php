<script type="text/javascript">
  function tampil_souvenir(input){
    var num = input.value;

    $.post("modules/souvenir-keluar/souvenir.php", {
      dataidsouvenir: num,
    }, function(response) {      
      $('#stok').html(response)

      document.getElementById('jumlah_keluar').focus();
    });
  }

  function cek_jumlah_keluar(input) {
    jml = document.formsouvenirKeluar.jumlah_keluar.value;
    var jumlah = eval(jml);
    if(jumlah < 1){
      alert('Jumlah Masuk Tidak Boleh Nol !!');
      input.value = input.value.substring(0,input.value.length-1);
    }
  }

  function hitung_total_stok() {
    bil1 = document.formsouvenirKeluar.stok.value;
    bil2 = document.formsouvenirKeluar.jumlah_keluar.value;

    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var hasil = eval(bil1) - eval(bil2);
    }

    document.formsouvenirKeluar.total_stok.value = (hasil);
  }
</script>

<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Souvenir Keluar
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=souvenir_keluar"> Souvenir Keluar </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/souvenir-keluar/proses.php?act=insert" method="POST" name="formsouvenirKeluar">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat kode transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_transaksi,7) as kode FROM is_souvenir_keluar
                                                ORDER BY kode_transaksi DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_transaksi
              $tahun          = date("Y");
              $buat_id        = str_pad($kode, 7, "0", STR_PAD_LEFT);
              $kode_transaksi = "TK-$tahun-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Transaksi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_keluar" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Souvenir</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_souvenir" data-placeholder="-- Pilih Souvenir --" onchange="tampil_souvenir(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_souvenir = mysqli_query($mysqli, "SELECT kode_souvenir, nama_souvenir FROM is_souvenir ORDER BY nama_souvenir ASC")
                                                            or die('Ada kesalahan pada query tampil souvenir: '.mysqli_error($mysqli));
                      while ($data_souvenir = mysqli_fetch_assoc($query_souvenir)) {
                        echo"<option value=\"$data_souvenir[kode_souvenir]\"> $data_souvenir[kode_souvenir] | $data_souvenir[nama_souvenir] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
              <span id='stok'>
              <div class="form-group">
                <label class="col-sm-2 control-label">Stok</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="stok" name="stok" readonly required>
                </div>
              </div>
              </span>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jumlah Keluar</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_kaluar" name="jumlah_keluar" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_total_stok(this)&cek_jumlah_keluar(this)" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Total Stok</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="total_stok" name="total_stok" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Unit Kerja</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="unit_kerja" data-placeholder="-- Pilih --" autocomplete="off" required>
                          <option value="AACSB">AACSB</option>
                          <option value="AOL">AOL</option>
                          <option value="ARSIP">ARSIP</option>
                          <option value="BIRPEN">BIRPEN</option>
                          <option value="CDC">CDC</option>
                          <option value="Departemen Akuntansi">Departemen Akuntansi</option>
                          <option value="Departemen Manajemen">Departemen Manajemen</option>
                          <option value="Departemen Ilmu Ekonomi">Departemen Ilmu Ekonomi</option>
                          <option value="Ekstensi">Ekstensi</option>
                          <option value="Fastur">Fastur</option>
                          <option value="ICTC ( Humas &amp; SI/LKJ )">ICTC ( Humas &amp; SI/LKJ )</option>
                          <option value="International Office">International Office</option>
                          <option value="Kantor Kemahasiswaan">Kantor Kemahasiswaan</option>
                          <option value="Keuangan">Keuangan</option>
                          <option value="LPEM">LPEM</option>
                          <option value="Lembaga Demografi">Lembaga Demografi</option>
                          <option value="Lembaga Management">Lembaga Management</option>
                          <option value="MAKSI-PPAk.">MAKSI-PPAk.</option>
                          <option value="MEKK">MEKK</option>
                          <option value="MM">MM</option>
                          <option value="MPKP">MPKP</option>
                          <option value="PEBS">PEBS</option>
                          <option value="PPIA">PPIA</option>
                          <option value="PPA">PPA</option>
                          <option value="PPIE">PPIE</option>
                          <option value="PPIM">PPIM</option>
                          <option value="PSB">PSB</option>
                          <option value="RENBANG">RENBANG</option>
                          <option value="RPM">RPM</option>
                          <option value="S1 AKUNTANSI">S1 AKUNTANSI</option>
                          <option value="S1 BISNIS ISLAM">S1 BISNIS ISLAM</option>
                          <option value="S1 EKONOMI">S1 EKONOMI</option>
                          <option value="S1 EKONOMI ISLAM">S1 EKONOMI ISLAM</option>
                          <option value="S1 KKI">S1 KKI</option>
                          <option value="S1 MANAJEMEN">S1 MANAJEMEN</option>
                          <option value="S1 PRODI ISLAM">S1 PRODI ISLAM</option>
                          <option value="SDM">SDM</option>
                          <option value="SEKRETARIAT">SEKRETARIAT</option>
                          <option value="UKK">UKK</option>
                          <option value="UPBJ">UPBJ</option>
                          <option value="UPMA">UPMA</option>
                          <option value="VENTURA">VENTURA</option>
                          <option value="BEM">BEM</option>
                          <option value="BPM">BPM</option>
                          <option value="Badan Otonom Economica">Badan Otonom Economica</option>
                          <option value="Koperasi Mahasiswa Fakultas Ekonomi (KPME)">Koperasi Mahasiswa Fakultas Ekonomi (KPME)</option>
                          <option value="AIESEC">AIESEC</option>
                          <option value="Pusat Bimbingan Karir dan Magang (PBKM)">Pusat Bimbingan Karir dan Magang (PBKM)</option>
                          <option value="Kajian Ilmu Ekonomi dan Pembangunan Indonesia (KANOPI)">Kajian Ilmu Ekonomi dan Pembangunan Indonesia(KANOPI)</option>
                          <option value="Management Student Society (MSS)">Management Student Society (MSS)</option>
                          <option value="Studi Profesionalisme Akuntan (SPA)">Studi Profesionalisme Akuntan (SPA)</option>
                          <option value="Forum Studi Islam (FSI)">Forum Studi Islam (FSI)</option>
                          <option value="Persekutuan Oikumene Sivitas Akademika (POSA)">Persekutuan Oikumene Sivitas Akademika (POSA)</option>
                          <option value="Keluarga Umat Katholik Sivitas Akademika (KUKSA)">Keluarga Umat Katholik Sivitas Akademika (KUKSA)</option>
                          <option value="Keluarga Mahasiswa Hindu Dharma (KMHD)">Keluarga Mahasiswa Hindu Dharma (KMHD)</option>
                          <option value="Keluarga Mahasiswa Budha (KMB)">Keluarga Mahasiswa Budha (KMB)</option>
                          <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Alasan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="alasan" name="alasan">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=souvenir_keluar" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>