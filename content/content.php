<?php
require_once "./config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=login.php?alert=1'>";
}

else{
    if ($_GET['module'] == 'beranda') {
		include "modules/home/dashboard.php";
	}
	elseif ($_GET['module'] == 'dataAbsensi') {
		include "modules/master/absentelat/view.php";
	}
	elseif ($_GET['module'] == 'detailTelat') {
		include "modules/master/absentelat/detail.php";
	}
	elseif ($_GET['module'] == 'dataKaryawan') {
		include "modules/master/karyawan/view.php";
	}
	elseif ($_GET['module'] == 'dataSup') {
		include "modules/master/supplier/view.php";
	}
	elseif ($_GET['module'] == 'User') {
		include "modules/user/view.php";
	}
}

?>