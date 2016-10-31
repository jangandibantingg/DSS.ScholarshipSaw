<?php
session_start();
ini_set( "display_errors", 0);
include "../config/koneksi.php";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Education Time
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SMKN 1 GONDANG</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="#">SMKN 1 GONDANG</a></h1>
      <p>permohonan beasiswa</p>
    </div>
    <form action="../admin/cek_login.php" method="post" id="login">
      <fieldset>
        <legend>Student Login</legend>
        <input type="password" name="password" placeholder="password"/>
        <input type="text" name="username" placeholder="username"/>
       
        <input type="image" src="layout/images/sign_in.gif" id="signin" alt="Sign In" />
      </fieldset>
    </form>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
	<?php
	$menu=mysql_query("select judul,judul_seo from berita where headline='Y' order by id_berita asc");
	while ($rm=mysql_fetch_array($menu))
	{
	echo " <li><a href='$rm[judul_seo]'>$rm[judul]</a></li>";
	}
	?>
     
     
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <?php
	
	$r=mysql_fetch_array(mysql_query("select * from berita where judul_seo='$_GET[hal]'"));
	echo "<h2>$r[judul]</h2>";
	echo "$r[isi_berita]";
	if ($_GET[hal] == 'permohonan' )
	{
	echo "  
			<form method=post action=permohonan.php >
			<p>
            <input type='text' name='nisn' id='name' value='$_GET[nisn]' size='78' />
            <label for='name'><small>Nomor Induk Siswa National </small></label>
            </p>
			<p>
            <input type='text' name='nama' id='name' value='$_GET[nama]' size='78' />
            <label for='name'><small>Nama lengkap (sesuai absen)</small></label>
            </p>
			
			<p>
            <input type='text' name='raport' id='name' value='$_GET[raport]' size='78' />
            <label for='name'><small>nilai rata rata (hanya angka)</small></label>
            </p>
			<p>
            <input type='text' name='kepribadian' id='name' value='$_GET[kepribadian]' size='78' />
            <label for='name'><small>nilai kepribadian (hanya angka)</small></label>
            </p>
			<p>
            <input type='text' name='saudara' id='name' value='$_GET[saudara]' size='78' />
            <label for='name'><small>jumlah saudara </small></label>
            </p>
			<p>
            <select name='penghasilan'  />
			<option value=''>pilih penghasilan orang tua</option>
			<option value='500000'>kurang dari Rp 500.000</option>
			<option value='750000'>kurang dari Rp 750.000</option>
			<option value='1000000'>kurang dari Rp 1.000.000</option>
			<option value='1250000'>kurang dari Rp 1.250.000</option>
			<option value='1500000'>kurang dari Rp 1.500.000</option>
			<option value='2000000'>kurang dari Rp 2.000.000</option>
			<option value='2500000'>kurang dari Rp 2.500.000</option>
			
			</select>
            <label for='name'><small>penghasilan orang tua</small></label>
            </p>
			<p>
            <select name='yatim'  />
			<option value='N'>kedua orang tua masih hidup</option>
			<option value='Y'>yatim</option>
			<option value='YP'>yatim-piatu</option>
			</select>
            <label for='name'><small>yatim/piatu</small></label>
            </p>
	      <p>
            <input name='permohonan' type='submit' id='submit' value='kirim permohonan' />
           
          </p>
	      </form>
	
	
	
	";	
		  
	}
	if($_GET[hal] == 'sukses')
	{
	echo " <li class=comment_odd>
            <div class=author><img class=avatar src=images/doc.png width=32 height=32 alt= /><span class=name><a href=#>Permohonan Beasiswa Berhasil Dikirim</a></span> </div>
          
            <p>silahkan mengumpulkan berkas yang dibutuhkan ke ruangan BK (bimbingan konseling)</p>
            </li>";	
		
	}
	
	?>
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row5">
  <div id="footer" class="clear"> 
    <!-- ####################################################################################################### -->
    <div class="foot_contact">
      <h2>SMK NEGERI 1 GONDANG</h2>
      <address>
      jalan lengkong-gondang<br />
      no 28 Nganjuk - Jawa timur 
      </address>
      <ul>
        <li><strong>Tel:</strong>  0358-773-412 </li>
        <li><strong>Fax:</strong>  0358-773-412 </li>
        <li class="last"><strong>Email:</strong> <a href="#">contact@smknsatugondang.ac.id</a></li>
      </ul>
    </div>
    <div class="footbox">
      <h2>Berita</h2>
      <ul>
	  <?php
	  $b=mysql_query("select * from berita order by id_berita desc limit 10");
	  while ($rb=mysql_fetch_array($b))
	  {
		  
		echo "<li><a href='$rb[judul_seo]'> $rb[judul]</a></li>";  
	  }
	  ?>
        
        
       
      </ul>
    </div>
    <div class="footbox">
      <h2>Last Permohonan</h2>
      <ul>
         <?php
	  $b=mysql_query("select * from siswa order by id_siswa desc limit 10");
	  while ($rb=mysql_fetch_array($b))
	  {
		echo "<li><a href='#'>$rb[nisn] - $rb[nama]</a></li>";  
	  }
	  ?>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Beasiswa Sementara</h2>
      <ul>
       <?php
	  $b=mysql_query("select * from siswa order by preferensi desc limit 10");
	  while ($rb=mysql_fetch_array($b))
	  {
		  
		echo "<li><a href='#'>$rb[nisn] - $rb[nama]</a></li>";  
	  }
	  ?>
      </ul>
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">SMKN 1 GONDANG</a></p>
   
  </div>
</div>
</body>
</html>