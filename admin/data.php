<?php
  include "config/koneksi.php";
  ini_set( "display_errors", 0);
   
   
   echo "<center><h1>data penerima 10 beasiswa menurut SPK program</h1></center>";
   $g=mysql_query("select * from siswa order by preferensi desc limit 10");
   while ($f=mysql_fetch_array($g))
   {
   echo "<center><i style=color:blue >$f[id_siswa] preferensi ($f[preferensi]) </i></center> |";   
	   
	   
   }
   
   //aplikasi pendukung keputusan penentuan penerima beasiswa di SMK Negeri 1 Gondang.
  function raport($panjang) 
  { 
  $karakter= '1234567890';
  $string = ''; 
  for ($i = 0; $i < $panjang; $i++) 
  {
  $pos = rand(0, strlen($karakter)-1); 
  $string .= $karakter{$pos}; } 
  return $string; 
  }

  function kepribadian($panjang) 
   { 
  $karakter= '6789';
  $string = ''; 
  for ($i = 0; $i < $panjang; $i++) 
  {
  $pos = rand(0, strlen($karakter)-1); 
  $string .= $karakter{$pos}; } 
  return $string; 
  }
  
  function saudara($panjang) 
  { 
  $karakter= '12345';
  $string = ''; 
  for ($i = 0; $i < $panjang; $i++) 
  {
  $pos = rand(0, strlen($karakter)-1); 
  $string .= $karakter{$pos}; } 
  return $string; 
  }
  function penghasilan($panjang) 
  { 
  $karakter= '1234567890';
  $string = ''; 
  for ($i = 0; $i < $panjang; $i++) 
  {
  $pos = rand(0, strlen($karakter)-1); 
  $string .= $karakter{$pos}; } 
  return $string; 
  }
  
 
   function yatim($panjang) 
  { 
  $karakter= 'YNYNYNYNYNYNYNYNYN';
  $string = ''; 
  for ($i = 0; $i < $panjang; $i++) 
  {
  $pos = rand(0, strlen($karakter)-1); 
  $string .= $karakter{$pos}; } 
  return $string; 
  }
  
 

  
   //==for ($i = 0; $i < 100 ; $i++) 
   //== {
	   
   //==$raport=raport(2);
   //== $kepribadian=kepribadian(1);
   //==$saudara=saudara(1);
   //== $yatim=yatim(1);
   //== $penghasilan=penghasilan(2);
   //== mysql_query("insert into siswa (raport,kepribadian,saudara,penghasilan,yatim)values('$raport','$kepribadian','$saudara','$penghasilan','$yatim')"); 
   //== }
   
   //-----hitung bobot
   $j1=5;
   $j2=3;
   $j3=4;
   $j4=4;
   $j5=2;
   //-- hitung wj1 => wj2
   $wj1=$j1 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
   $wj2=$j2 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
   $wj3=$j3 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
   $wj4=$j4 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
   $wj5=$j5 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
   
	echo "<center><table border=1>
	      <tbody>
	      <thead>
		  <th>nis</th>
		  <th>raport (wj1)</th>
		  <th>kepribadian (wj2)</th>
		  <th>saudara (wj3)</th>
		  <th>penghasilan (wj4)</th>
		  <th>yatim (wj5)</th>
		  <th>vektor </th>
		  <th>preferensi </th>
		  </thead>";
   $d=mysql_query("select * from siswa order by id_siswa asc");
   while ($r=mysql_fetch_array($d))
   {
	   //menentukan nilai vektor
	   $vraport=pow($r[raport],$wj1);
	   $vkepribadian=pow($r[kepribadian],$wj2);
	   $vsaudara=pow($r[saudara],$wj3);
	   $vpenghasilan=pow($r[penghasilan],$wj4);
	  
	  if ($r[yatim]=='Y')
	   {
	   $vyatim=pow(1,$wj5);
	   }
	   if ($r[yatim] =='YP' ) {
	   $vyatim=pow(2,$wj5);
	   }
	  if ($r[yatim] =='N' )
	   {
	   $vyatim=0;   
	   } 
	   $vektor= $vyatim +   $vpenghasilan + $vsaudara + $vkepribadian +  $vraport ;
	   $svekektor= $svekektor + $vektor;
	   $cv=mysql_fetch_array(mysql_query("select * from vektor where id_vektor='1'"));
	   $preferensi= $vektor / $cv[vektor];
	   mysql_query("update siswa set preferensi='$preferensi' where id_siswa='$r[id_siswa]'");
		  echo "
		  <tr>
		  <td>$r[id_siswa] </td>
		  <td>$r[raport] ($wj1)</td>
		  <td>$r[kepribadian] ($wj2)</td>
		  <td>$r[saudara] ($wj3)</td>
		  <td>$r[penghasilan] ($wj4)</td>
		  <td>$r[yatim]($vyatim)</td>
		  <td>$vektor</td>
		  <td>$preferensi</td>
		  </tr>
		
		  
   
		  ";
   }
    echo "</ tbody> </table></center>";
   mysql_query ("update vektor set vektor ='$svekektor' where id_vektor='1'");
   


?>