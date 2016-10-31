<?php
// panggil fungsi validasi xss dan injection


// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "beasiswa";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("MAAF UNTUK SEMENTARA WEBSITE TIDAK BISA DIGUNAKAN");

// buat variabel untuk validasi dari file fungsi_validasi.php

  
  
?>
