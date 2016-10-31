<?php

session_start();
ini_set( "display_errors", 0);
if ($_SESSION[namauser])
{
include "../config/koneksi.php";
include "../config/seo.php";
                $ns=mysql_num_rows(mysql_query("select * from siswa"));
				$j=mysql_fetch_array(mysql_query("select * from bobot"));
				  //-----hitung bobot
				   $j1=$j[j1];
				   $j2=$j[j2];
				   $j3=$j[j3];
				   $j4=$j[j4];
				   $j5=$j[j5];
				   //-- hitung wj1 => wj2
				   $wj1=$j1 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj2=$j2 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj3=$j3 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj4=$j4 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj5=$j5 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   
	   
if ($_POST[perbaikan])
							   {
								
								mysql_query("update bobot set j1='$_POST[j1]', j2='$_POST[j2]', j3='$_POST[j3]', j4='$_POST[j4]', j5='$_POST[j5]'");   
								   
							   }
if ($_POST[berita])
							   {
								$judul_seo=seo_title($_POST[judul]);
								$isi_berita=$_POST[isi_berita];
								mysql_query("insert into berita (judul,judul_seo,isi_berita,headline) values ('$_POST[judul]','$judul_seo','$_POST[isi_berita]','N')");   
								 echo "<script>alert('berita berhasil ditambah  '); window.location = 'cont.php?hal=berita'</script>";
								 
							   }
if ($_POST[update])
							   {
								$judul_seo=seo_title($_POST[judul]);
								$isi_berita=$_POST[isi_berita];
								mysql_query("update berita set judul='$_POST[judul]', judul_seo='$judul_seo', isi_berita='$isi_berita' where id_berita='$_POST[id]'");   
								 echo "<script>alert('berita berhasil update  '); window.location = 'cont.php?hal=berita'</script>";
								 
							   }



?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>aplikasi pendukung keputusan penentuan penerima beasiswa di SMK Negeri 1 Gondang </marque></title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
		<link href="../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	    <script src="../tinymcpuk/jscripts/tiny_mce/tiny_travaweb.js" type="text/javascript"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><center>Aplikasi Pendukung keputusan Penentuan Penerima Beasiswa di SMK Negeri 1 Gondang</center></a>
                    <div class="nav-collapse collapse">
                        
                        
						
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a href="?hal=home"><i class="icon-home"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="?hal=siswa"><i class="icon-folder-open"></i> Data Pemohon</a>
                        </li>
                        <li>
                            <a href="?hal=beasiswa"><i class="icon-folder-open"></i> Data Beasiswa</a>
                        </li>
						 <li>
                            <a href="?hal=berita"><i class="icon-folder-open"></i> kelola berita</a>
                        </li>
                       <li>
                            <a href="logout.php"><i class="icon-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                <?php
				if ($_GET[hal] == 'home' )
				{
				
							 
				   
				?>	
						<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right">

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                 <div class="span2">
                                    <div class="chart" data-percent="100"><?php echo "$ns siswa";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">siswa terdaftar</span>

                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="chart" data-percent="100"><?php $kwj=number_format($wj1,2); echo "$kwj";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">bobot w1</span>

                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="chart" data-percent="100"><?php $kwj2=number_format($wj2,2); echo "$kwj2";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">bobot w1</span>

                                    </div>
                                </div>
                                <div class="span2">
                                    <div class="chart" data-percent="100"><?php $kwj3=number_format($wj3,2); echo "$kwj3";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">bobot w3</span>

                                    </div>
                                </div>
								<div class="span2">
                                    <div class="chart" data-percent="100"><?php $kwj4=number_format($wj4,2); echo "$kwj4";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">bobot w4</span>

                                    </div>
                                </div>
								<div class="span2">
                                    <div class="chart" data-percent="100"><?php $kwj5=number_format($wj5,2); echo "$kwj5";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">bobot w5</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">perbaikan bobot</div>
                                <div class="pull-right">
                                  
                                </div>
                            </div>
                            <div class="block-content collapse in">
                               <div class="span12">
							   
							   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table class="table">
									
									<thead>
									<th>J1 (raport)</th>
									<th>J2 (kepribadian)</th>
									<th>J3 (saudara)</th>
									<th>J4 ("-"penghasilan)</th>
									<th>J5 (yatim/piatu)</th>
									</thead>
									<tbody>
									<tr><td><input type='text' name='j1' value="<?php echo "$j[j1]";?>" class='span3 '></td>
                                    <td><input type='text' name='j2'  value="<?php echo "$j[j2]";?>"class='span3 '></td>
                                    <td><input type='text' name='j3' value="<?php echo "$j[j3]";?>"class='span3 '></td>
                                    <td><input type='text'name='j4' value="<?php echo "$j[j4]";?>"class='span3 '></td>
                                    <td><input type='text' name='j5' value="<?php echo "$j[j5]";?>"class='span3'></td>
                                    </tr>
									
									</tbody></table>
									<div class="form-actions">
												<input type='submit' name='perbaikan' value="update" class="btn btn-primary">
												
									</div>
											</form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				if($_GET[hal]== 'siswa')
				{
				 $d=mysql_query("select * from siswa order by id_siswa asc");
                   while ($r=mysql_fetch_array($d))
				   {
					   $vraport=pow($r[raport],$wj1);
					   $vkepribadian=pow($r[kepribadian],$wj2);
					   $vsaudara=pow($r[saudara],$wj3);
					   $mwj=-$wj4;// pengurangan penghasilan
					   $vpenghasilan=pow($r[penghasilan],$mwj);
					  
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
				   }
					
				
                ?>		 
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">data siswa yang mengajukan beasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>nisn </th>
                                                <th>nama</th>
                                                <th>rata rata nilai </th>
                                                <th>kepribadian</th>
                                                <th>saudara</th>
                                                <th class="center"><center>penghasilan orang tua <br /> (kurang dari atau samadengan)</center></th>
                                                <th>yatim</th>
                                                
                                                <th>preferensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$sis=mysql_query("select * from siswa order by id_siswa desc");
										while ($r=mysql_fetch_array($sis))
										{
									     if ($cl == 'success')
										 {
										  $cl=warning; 
										 }
										 elseif ($cl == 'warning')
										 {
										  $cl=success;  
										 }
										$no++;
										?>
                                            <tr class="<?php echo "$cl";?>">
                                                <td><?php echo" $r[nisn]";?> </td>
                                                <td><?php echo" $r[nama]";?> </td>
                                                <td><?php echo" $r[raport]";?></td>
                                                <td class="center"> <?php echo" $r[kepribadian]";?></td>
                                                <td class="center"><?php echo" $r[saudara]";?></td>
                                                <td class="center"> <?php $penghasilan=number_format($r[penghasilan]); echo"Rp. $penghasilan";?></td>
                                                <td class="center"><?php
													if ($r[yatim] == 'Y')
													{
													echo "Yatim";	
													}
                                                    if ($r[yatim] == 'YP')
													{
													echo "Yatim Piatu";	
													}
													if ($r[yatim] == 'N')
													{
													echo "kedua keluarga masih hidup";	
													}


												     ?></td>
                                                <td class="center"><?php $p=number_format( $r[preferensi],5); echo"$p";?></td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                

				
                 <?php
				}
				if($_GET[hal] == 'beasiswa')
				{
					 $d=mysql_query("select * from siswa order by id_siswa asc");
                   while ($r=mysql_fetch_array($d))
				   {
					   $vraport=pow($r[raport],$wj1);
					   $vkepribadian=pow($r[kepribadian],$wj2);
					   $vsaudara=pow($r[saudara],$wj3);
					   $mwj=-$wj4;// pengurangan penghasilan
					   $vpenghasilan=pow($r[penghasilan],$mwj);
					  
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
				   }
	   
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">data siswa yang menerima beasiswa </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>nisn </th>
                                                <th>nama</th>
                                                <th>rata rata nilai </th>
                                                <th>kepribadian</th>
                                                <th>saudara</th>
                                                 <th class="center"><center>penghasilan orang tua <br /> (kurang dari atau samadengan)</center></th>
                                                <th>yatim</th>
                                                
                                                <th>preferensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$sis=mysql_query("select * from siswa order by preferensi desc limit 10 ");
										while ($r=mysql_fetch_array($sis))
										{
									     if ($cl == 'success')
										 {
										  $cl=warning; 
										 }
										 elseif ($cl == 'warning')
										 {
										  $cl=success;  
										 }
										$no++;
										?>
                                            <tr class="<?php echo "$cl";?>">
                                                <td><?php echo" $r[nisn]";?> </td>
                                                <td><?php echo" $r[nama]";?> </td>
                                                <td><?php echo" $r[raport]";?></td>
                                                <td class="center"> <?php echo" $r[kepribadian]";?></td>
                                                <td class="center"><?php echo" $r[saudara]";?></td>
                                                <td class="center"> <?php $penghasilan=number_format($r[penghasilan]); echo"Rp. $penghasilan";?></td>
                                                <td class="center"><?php
													if ($r[yatim] == 'Y')
													{
													echo "Yatim";	
													}
                                                    if ($r[yatim] == 'YP')
													{
													echo "Yatim Piatu";	
													}
													if ($r[yatim] == 'N')
													{
													echo "kedua keluarga masih hidup";	
													}


												     ?></td>
                                                <td class="center"><?php $p=number_format( $r[preferensi],5); echo"$p";?></td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				if($_GET[hal] == 'berita')
				{
				
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">kelola berita </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <a href="cont.php?module=add"><i class='icon-plus'></i>  tambah berita</a>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>judul</th>
                                                
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$sis=mysql_query("select * from berita order by id_berita desc   ");
										while ($r=mysql_fetch_array($sis))
										{
									     if ($cl == 'success')
										 {
										  $cl=warning; 
										 }
										 elseif ($cl == 'warning')
										 {
										  $cl=success;  
										 }
										$no++;
										?>
                                            <tr class="<?php echo "$cl";?>">
                                               
                                                <td><?php echo" $r[judul]";?> </td>
                                               
                                                <td class="center">
												<a href="hapus.php?id=<?php echo "$r[id_berita]";?>"><i class='icon-remove'></i> hapus</a> | 
												<a href="cont.php?hal=edit&id=<?php echo "$r[id_berita]";?>"><i class='icon-edit'></i> edit</a> |
												<a href="../permohonan/index.php?hal=<?php echo"$r[judul_seo]";?>" target="_blank">
												<i class="icon-globe"></i>Lihat</a></td>
												
                                            </tr>
                                        <?php
										}
										
										?>
										
										
										
										
										
										
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
				
				
				
				
				
				
				
				
				
				<?php

				}
				if($_GET[module] == 'add')
				{
				?>		
			     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">tambah berita </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">judul berita&nbsp;&nbsp;</label>
											<div class="controls">
											<input name="judul" type="text" class="span6 m-wrap" required/>
											</div>
											</div>
											<div class="control-group">
											<label class="control-label">isi berita&nbsp;&nbsp;</label>
											<div class="controls">
											<textarea  id="travaweb" name="isi_berita"  width="100%"/></textarea>
											</div>
											</div>
											<div class="control-group">
											<input name="berita" type="submit" value="simpan berita" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				if($_GET[hal] == 'edit')
				{
			    $e=mysql_fetch_array(mysql_query("select * from berita where id_berita='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">edit berita </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">judul berita&nbsp;&nbsp;</label>
											<div class="controls">
											<input name="judul" type="text" class="span6 m-wrap" value="<?php echo "$e[judul]";?>" required/>
												<input name="id" type="hidden" class="span6 m-wrap" value="<?php echo "$e[id_berita]";?>" required/>
											</div>
											</div>
											<div class="control-group">
											<label class="control-label">isi berita&nbsp;&nbsp;</label>
											<div class="controls">
											<textarea  id="travaweb" name="isi_berita"  width="100%"/><?php echo "$e[isi_berita]";?></textarea>
											</div>
											</div>
											<div class="control-group">
											<input name="update" type="submit" value="simpan berita" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
				
				<?php
				}
				?>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; SMK NEGERI 1 GONDANG</p>
            </footer>
        </div>
											
											</fieldset>
											</form>
											</div>
        <!--/.fluid-container-->
        <script src="../vendors/jquery-1.9.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="../assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>
<?php
}
else
{

header('location:login.php');

}


?>