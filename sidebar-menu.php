<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  // jika menu data souvenir dipilih, menu data souvenir aktif
  if ($_GET["module"]=="souvenir" || $_GET["module"]=="form_souvenir") { ?>
    <li class="active">
      <a href="?module=souvenir"><i class="fa fa-folder"></i> Data Souvenir </a>
      </li>
  <?php
  }
  // jika tidak, menu data souvenir tidak aktif
  else { ?>
    <li>
      <a href="?module=souvenir"><i class="fa fa-folder"></i> Data Souvenir </a>
      </li>
  <?php
  }

  // jika menu data souvenir masuk dipilih, menu data souvenir masuk aktif
  if ($_GET["module"]=="souvenir_masuk" || $_GET["module"]=="form_souvenir_masuk") { ?>
    <li class="active">
      <a href="?module=souvenir_masuk"><i class="fa fa-clone"></i> Data Souvenir Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data souvenir masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=souvenir_masuk"><i class="fa fa-clone"></i> Data Souvenir Masuk </a>
      </li>
  <?php
  }

  // jika menu data souvenir keluar dipilih, menu data souvenir keluar aktif
  if ($_GET["module"]=="souvenir_keluar" || $_GET["module"]=="form_souvenir_keluar") { ?>
    <li class="active">
      <a href="?module=souvenir_keluar"><i class="fa fa-clone"></i> Data Souvenir Keluar </a>
      </li>
  <?php
  }
  // jika tidak, menu data souvenir keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=souvenir_keluar"><i class="fa fa-clone"></i> Data Souvenir Keluar </a>
      </li>
  <?php
  }

	// jika menu Laporan Stok souvenir dipilih, menu Laporan Stok souvenir aktif
	if ($_GET["module"]=="lap_stok") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
        		<li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan souvenir Masuk dipilih, menu Laporan souvenir Masuk aktif
	elseif ($_GET["module"]=="lap_souvenir_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
        		<li class="active"><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
      		</ul>
    	</li>
    <?php
  }
  // jika menu Laporan souvenir Keluar dipilih, menu Laporan souvenir Keluar aktif
	elseif ($_GET["module"]=="lap_souvenir_keluar") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li class="active"><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
        		<li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
      		</ul>
    	</li>
    <?php
	}

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	 // jika menu Laporan Stok souvenir dipilih, menu Laporan Stok souvenir aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan souvenir Masuk dipilih, menu Laporan souvenir Masuk aktif
  elseif ($_GET["module"]=="lap_souvenir_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li class="active"><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan souvenir Keluar dipilih, menu Laporan souvenir Keluar aktif
  elseif ($_GET["module"]=="lap_souvenir_keluar") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li class="active"><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Gudang') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
    <li class="active">
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }
  // jika tidak, menu home tidak aktif
  else { ?>
    <li>
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }

  // jika menu data souvenir dipilih, menu data souvenir aktif
  if ($_GET["module"]=="souvenir" || $_GET["module"]=="form_souvenir") { ?>
    <li class="active">
      <a href="?module=souvenir"><i class="fa fa-folder"></i> Data Souvenir </a>
      </li>
  <?php
  }
  // jika tidak, menu data souvenir tidak aktif
  else { ?>
    <li>
      <a href="?module=souvenir"><i class="fa fa-folder"></i> Data Souvenir </a>
      </li>
  <?php
  }

  // jika menu data souvenir masuk dipilih, menu data souvenir masuk aktif
  if ($_GET["module"]=="souvenir_masuk" || $_GET["module"]=="form_souvenir_masuk") { ?>
    <li class="active">
      <a href="?module=souvenir_masuk"><i class="fa fa-clone"></i> Data Souvenir Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data souvenir masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=souvenir_masuk"><i class="fa fa-clone"></i> Data Souvenir Masuk </a>
      </li>
  <?php
  }

  // jika menu Laporan Stok souvenir dipilih, menu Laporan Stok souvenir aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan souvenir Masuk dipilih, menu Laporan souvenir Masuk aktif
  elseif ($_GET["module"]=="lap_souvenir_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li class="active"><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan souvenir Keluar dipilih, menu Laporan souvenir Keluar aktif
  elseif ($_GET["module"]=="lap_souvenir_keluar") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li class="active"><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Souvenir </a></li>
            <li><a href="?module=lap_souvenir_masuk"><i class="fa fa-circle-o"></i> Souvenir Masuk </a></li>
            <li><a href="?module=lap_souvenir_keluar"><i class="fa fa-circle-o"></i> Souvenir Keluar </a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>