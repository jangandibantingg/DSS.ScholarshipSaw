<?php
  include "../config/koneksi.php";
  
 

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = $_POST['username'];
$pass     = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);


//=============================================================================================================================

//===============================================================================================================================  
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
    $_SESSION['KCFINDER']=array();

  $_SESSION['KCFINDER']['disabled'] = false;

  $_SESSION['KCFINDER']['uploadURL'] = "../tinymcpuk/gambar";

  $_SESSION['KCFINDER']['uploadDir'] = "";


 
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[level]        = $r[level];



  
  header('location:cont.php?hal=home ');
}
else{
  echo "<script>alert('username/password yang anda masukkan salah'); window.location ='../index.php'</script>";
}


?>

  			