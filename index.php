<?php
error_reporting(0);
session_start();	
include "config/koneksi.php";


if ($_SESSION[namauser] )
{
 header('location:admin/cont.php?hal=home'); 
}
 if ($_SESSION[level] == null )
{
header ('location:permohonan/index.php?hal=home');
}
?>
