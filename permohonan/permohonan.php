<?php
session_start();
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$nama=$_POST[nama];
$raport=$_POST[raport];
$kepribadian=$_POST[kepribadian];
$saudara=$_POST[saudara];
$penghasilan=$_POST[penghasilan];
$yatim=$_POST[yatim];
$nisn=$_POST[nisn];
$rnisn=mysql_num_rows(mysql_query("select * from siswa where nisn='$nisn'"));
$rnama=mysql_num_rows(mysql_query("select * from siswa where nama='$nama'"));
if ($rnisn > 0)
{
 echo "<script>alert('NISN sudah ada, siswa dilarang mengisi permohonan lebih dari satu kali '); window.location = 'index.php?hal=permohonan&nama=$nama&nisn=$nisn&yatim=$yatim&penghasilan=$penghasilan&saudara=$saudara&raport=$raport&kepribadian=$kepribadian'</script>";
}
elseif ($rnama > 0)
{
 echo "<script>alert('nama sudah ada, siswa dilarang mengisi permohonan lebih dari satu kali '); window.location = 'index.php?hal=permohonan&nama=$nama&nisn=$nisn&yatim=$yatim&penghasilan=$penghasilan&saudara=$saudara&raport=$raport&kepribadian=$kepribadian'</script>";
}
elseif ( $nama == null or $nisn == null or $kepribadian == null or $penghasilan== null or $yatim == null or $raport == null  )
{
 echo "<script>alert('isi data dengan lengkap'); window.location = 'index.php?hal=permohonan&nama=$nama&nisn=$nisn&yatim=$yatim&penghasilan=$penghasilan&saudara=$saudara&raport=$raport&kepribadian=$kepribadian'</script>";
}

else
{
mysql_query("insert into siswa (nisn,nama,raport,kepribadian,saudara,penghasilan,yatim)values('$nisn','$nama','$raport','$kepribadian','$saudara','$penghasilan','$yatim')"); 
header ('location:index.php?hal=sukses');
}
?>