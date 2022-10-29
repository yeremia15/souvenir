<!-- Aplikasi Persediaan Obat pada Apotek
*******************************************************
* Developer    : Vanny Hadiwijaya, S.Kom
* Company      : Wijaya Studio
* Release Date : 14 November 2018
* Blog         : vannyhadiwijaya.blogspot.com
* E-mail       : vannyhadiwijaya@gmail.com
* Phone        : +62-821-3297-2137
-->

<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih souvenir, panggil file view souvenir
	elseif ($_GET['module'] == 'souvenir') {
		include "modules/souvenir/view.php";
	}

	// jika halaman konten yang dipilih form souvenir, panggil file form souvenir
	elseif ($_GET['module'] == 'form_souvenir') {
		include "modules/souvenir/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih souvenir masuk, panggil file view souvenir masuk
	elseif ($_GET['module'] == 'souvenir_masuk') {
		include "modules/souvenir-masuk/view.php";
	}

	// jika halaman konten yang dipilih form souvenir masuk, panggil file form souvenir masuk
	elseif ($_GET['module'] == 'form_souvenir_masuk') {
		include "modules/souvenir-masuk/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih souvenir keluar, panggil file view souvenir keluar
	elseif ($_GET['module'] == 'souvenir_keluar') {
		include "modules/souvenir-keluar/view.php";
	}

	// jika halaman konten yang dipilih form souvenir keluar, panggil file form souvenir keluar
	elseif ($_GET['module'] == 'form_souvenir_keluar') {
		include "modules/souvenir-keluar/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan souvenir masuk, panggil file view laporan souvenir masuk
	elseif ($_GET['module'] == 'lap_souvenir_masuk') {
		include "modules/lap-souvenir-masuk/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan souvenir keluar, panggil file view laporan souvenir keluar
	elseif ($_GET['module'] == 'lap_souvenir_keluar') {
		include "modules/lap-souvenir-keluar/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>