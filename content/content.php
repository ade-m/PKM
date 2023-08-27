<?php
require_once "./config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=login.php?alert=1'>";
}

else{
    if ($_GET['module'] == 'beranda') {
		include "modules/home/dashboard.php";
	}
	elseif ($_GET['module'] == 'dataNutrisi') {
		include "modules/monitoring/nutrisi/view.php";
	}
	elseif ($_GET['module'] == 'datapH') {
		include "modules/monitoring/ph/view.php";
	}
	elseif ($_GET['module'] == 'dataSuhu') {
		include "modules/monitoring/suhu/view.php";
	}
	elseif ($_GET['module'] == 'User') {
		include "modules/user/view.php";
	}
}

?>