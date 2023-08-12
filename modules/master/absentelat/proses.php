<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
require_once "../../../auth/cek.php";
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
    if($_GET['act']=='caritanggal'){
        if(isset($_POST['caritanggal'])){
            $tgl_awal = $_POST['tanggal_awal'];
            $tgl_akhir = $_POST['tanggal_akhir'];
        }
        header("location: ../../../main.php?module=dataAbsensi&tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir");
    }
    


    
?>
