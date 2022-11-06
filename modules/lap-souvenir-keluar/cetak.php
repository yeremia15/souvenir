<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

// ambil data hasil submit dari form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel souvenir keluar
    $query = mysqli_query($mysqli, "select distinct a.kode_transaksi, a.tanggal_keluar, a.kode_souvenir, b.stok_awal, c.jumlah_masuk,a.jumlah_keluar,b.stok, b.kode_souvenir,b.nama_souvenir,b.satuan,a.unit_kerja,a.alasan 
                                    from is_souvenir_keluar as a inner join is_souvenir as b on a.kode_souvenir = b.kode_souvenir inner join is_souvenir_masuk as c on c.kode_souvenir = a.kode_souvenir 
                                    WHERE a.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY a.kode_transaksi ASC") 
                                    or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Fakultas Ekonomi & Bisnis</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN DATA SOUVENIR KELUAR 
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE TRANSAKSI</th>
                        <th height="20" align="center" valign="middle">PERIODE</th>
                        <th height="20" align="center" valign="middle">TANGGAL</th>
                        <th height="20" align="center" valign="middle">KODE SOUVENIR</th>
                        <th height="20" align="center" valign="middle">NAMA SOUVENIR</th>
                        <th height="20" align="center" valign="middle">STOK AWAL</th>
                        <th height="20" align="center" valign="middle">STOK MASUK</th>
                        <th height="20" align="center" valign="middle">JUMLAH KELUAR</th>
                        <th height="20" align="center" valign="middle">STOK AKHIR</th>
                        <th height="20" align="center" valign="middle">UNIT KERJA</th>
                        <th height="20" align="center" valign="middle">ALASAN</th>

                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>

                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        $real_stok = [];
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal       = $data['tanggal_keluar'];
            $exp           = explode('-',$tanggal);
            $tanggal_keluar = $exp[2]."-".$exp[1]."-".$exp[0];
            $a = $data['stok_awal'];
            $b = $data['jumlah_masuk'];
            $c = $data['jumlah_keluar'];
            $periode = date('F', strtotime($tanggal));
            $stok_akhir = $a + $b - $c;
            if (isset($real_stok[$data['kode_souvenir']])){
                $real_stok[$data['kode_souvenir']]+= $stok_akhir;
              } else {
                $real_stok[$data['kode_souvenir']]= $stok_akhir;
              }

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[kode_transaksi]</td>
                        <td width='80' height='13' align='center' valign='middle'>$periode</td>
                        <td width='80' height='13' align='center' valign='middle'>$tanggal_keluar</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[kode_souvenir]</td>
                        <td style='padding-left:5px;' width='155' height='13' valign='middle'>$data[nama_souvenir]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[stok_awal]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[jumlah_masuk]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[jumlah_keluar]</td>
                        <td width='80' height='13' align='center' valign='middle'>".$real_stok[$data['kode_souvenir']]."</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[unit_kerja]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[alasan]</td>

                    </tr>";
            $no++;
        }
    }
?>  
                </tbody>
            </table>

            <table width="100%" align="center" border="0" style="page-break-inside: avoid;">
                                <tr>
                                    <td width="220" valign="top" align="center" style="font-size:12px; line-height: 2;">
                                        <br>
                                        Depok, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
                                        <br>
                                        Pimpinan
                                        <div style="position: relative; height: 65px;" align="center">
                                            &nbsp;
                                        </div>
                                        <b>Ridho Haq</b>
                                    </td>
                                    <td align="center" style="font-size:12px; line-height: 2;">
                                        &nbsp;
                                    </td>
                                    <td width="220" valign="top" align="right" style="font-size:12px; line-height: 2;">
                                        <br>
                                        Depok, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
                                        <br>
                                        Penanggung Jawab
                                        <div style="position: relative; height: 65px;" align="center">
                                            &nbsp;
                                        </div>
                                        <b>Satrio Haq</b>
                                    </td>
                                </tr>
                            </table>
            <!-- <div id="footer-tanggal">
                Pekanbaru, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                Susilawati Rusli
            </div>
        </div> -->

        <!-- Script Untuk Print Laporan -->
        <script>
        window.print();
        </script>

    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->