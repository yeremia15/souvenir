<html> <!-- Bagian halaman HTML yang akan print -->
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

$no = 1;
// fungsi query untuk menampilkan data dari tabel souvenir
$query = mysqli_query($mysqli, "SELECT kode_souvenir,nama_souvenir,harga_beli,harga_jual,satuan,stok_awal,stok FROM is_souvenir ORDER BY nama_souvenir ASC")
                                or die('Ada kesalahan pada query tampil Data souvenir: '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>PRINT | DATA STOK</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
        <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
    </head>
    <body>
        <div id="title">
            LAPORAN STOK SOUVENIR FEB-UI
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE SOUVENIR</th>
                        <th height="20" align="center" valign="middle">NAMA SOUVENIR</th>
                        <th height="20" align="center" valign="middle">STOK AWAL</th>
                        <th height="20" align="center" valign="middle">STOK AKHIR</th>
                        <th height="20" align="center" valign="middle">KET</th>
                    </tr>
                </thead>
                <tbody>
<?php
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            //$harga_beli = format_rupiah($data['harga_beli']);
            //$harga_jual = format_rupiah($data['harga_jual']);
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[kode_souvenir]</td>
                        <td style='padding-left:5px;' width='180' height='13' valign='middle'>$data[nama_souvenir]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[stok_awal]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[stok]</td>
                        <td width='80' height='13' align='center' valign='middle'></td>
                    </tr>";
            $no++;
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
                                        <b>Bonaventura Satrio</b>
                                    </td>
                                </tr>
                            </table>
            <!-- <div id="footer-tanggal">
                Depok, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div> 
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                Ridho Haq
            </div>
        </div> -->

            <!-- <div id="footer-tanggal">
                Depok, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div> 
            <div id="footer-jabatan">
                Penanggung Jawab
            </div>
            
            <div id="footer-nama">
                Bonaventura Satrio
            </div> -->
        </div>
        
        <script>
        window.print();
        </script>

    </body>
</html><!-- Akhir halaman HTML yang akan di print -->