<?php
if(!isset($_SESSION)) {
     session_start();
}
if(isset($_SESSION['username'])){

include "../include/konek.php";//sambungkan ke mysql

$NIP = $_GET['NIP'];//mengambil nilai kode pasien dari address bar

//mengambil data dari table pasien yg sesuai dengan pilihan user
$hasil = mysql_query("SELECT * FROM tb_ukp WHERE NIP = $NIP");
$hasil2 = mysql_query("SELECT nama_pangkat FROM tb_pangkat");

//memecah hasil query ke dalam array
$baris = mysql_fetch_array($hasil); //array dari tabel pasien
echo mysql_error(); //tampilkan instruksi jika terjadi error

$user= mysql_fetch_array(mysql_query("SELECT * FROM user WHERE kode_user=$_SESSION[username]")); $nama =($user['nama']); $gambar = $user['gambar'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data UKP | Update Data UKP</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-user"></i> <span>SIPANJI</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
              
              <?php
              if(empty($gambar)){
				  ?>
                  
			  		<img src="images/user.png" alt="..." class="img-circle profile_img">
			  <?php }
			  else{ ?>
                <img src="images/<?php echo "$gambar";?>.jpg" alt="..." class="img-circle profile_img">
                <?php } ?>
              </div>
              <div class="profile_info">
                <span>Welcome</span><br>
                <span><?php echo "$nama"; ?></span>
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a><i class="fa fa-users"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="inputpegawai.php">Input Data Pegawai</a></li>
                      <li><a href="tabelpegawai.php">Tabel Data Pegawai</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-star"></i> Usulan Kenaikan Pangkat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tabelukptahunan.php">Konfirmasi Kenaikan Pangkat </a></li>
                      <li><a href="tabelukp.php">Data UKP Lengkap</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Kenaikan Gaji Berkala <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tabeltahunankgb.php">Tabel Konfirmasi Kenaikan Gaji Berkala </a></li>
                      <li><a href="tabelkgb.php">Data KGB Lengkap</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-heart-o"></i> Usulan Pensiun <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tabeltahunanpensiun.php">Data Tahunan Pegawai Pensiun</a></li>
                      <li><a href="tabelpensiun.php">Tabel Data Pensiun</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tabellaporanpegawai.php">Laporan Pegawai</a></li>
                      <li><a href="tabellaporankgb.php">Laporan KGB</a></li>
                      <li><a href="tabellaporanukp.php">Laporan UKP</a></li>
                      <li><a href="tabellaporanpensiun.php">Laporan Pensiun</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php
              if(empty($gambar)){
				  ?>
                  
			  		<img src="images/user.png" alt="">
			  <?php }
			  else{ ?>
                <img src="images/<?php echo "$gambar";?>.jpg" alt="">
                <?php } ?><?php echo "$nama"; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profil.php"> Profile</a></li>
                    <li>
                      <a href="editprofil.php">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="aboutus.php">Help</a></li>
                    <li><a href="../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>        
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Data UKP</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 
                    
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengaturan Data UKP</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div align="center">
                     <table width="100%" height="700" border="0">
                      <form id="form1" name="postform" method="post" action="perbaruiukp.php">
		               <input name="nip" type="hidden" required class="form-control col-md-7 col-xs-12" value="<?php echo $baris['NIP']?>" id="first-name2">       
		                      <tr>
		                        <td>Nama Pegawai</td>
		                        <td>:</td>
		                        <td><input name="nama" type="text" required class="form-control col-md-7 col-xs-12" value="<?php echo $baris['NAMA_PEGAWAI']?>" id="first-name2">                 
                                </td>
	                          </tr>
		                      <tr>
		                        <td>NIP</td>
		                        <td>:</td>
		                        <td><input name="a" disabled required class="form-control col-md-7 col-xs-12" value="<?php echo $baris['NIP']?>" id="first-name2"></td>
	                          </tr>
		                      <tr>
		                            <td>Pangkat Golongan</td>
		                            <td>:</td>
		                            <td><select class="form-control" name="pangkat_golongan">
                              <option selected="selected"><?php echo $baris['PANGKAT_GOLONGAN']?></option>
                              <?php 
                              while($gol = mysql_fetch_array($hasil2)){
                              echo "<option>$gol[nama_pangkat]</option>";
                              }
                              ?>
                            </select></td>
                              </tr>
                              
                              <tr>
		                        <td>Jabatan</td>
		                        <td>:</td>
		                        <td>
		                          <input name="jabatan" value="<?php echo $baris['JABATAN']?>" type="text" required class="form-control col-md-7 col-xs-12" id="jabatan">
	                          </tr>
		                      
                              <tr>
		                        <td>Jabatan Eselon</td>
		                        <td>:</td>
		                        <td>
		                          <input name="jabatan_eselon" value="<?php echo $baris['JABATAN_ESELON']?>" type="text" required class="form-control col-md-7 col-xs-12" id="jabatan">
	                          </tr>
                              
                        	  <tr>
		                        <td>TMT CPNS</td>
		                        <td>:</td>
		                        <td>
		                          <div class="form-group">
							<div class='input-group date' id='datepicker'>
								<input type='text' value="<?php echo $baris['TMT_CPNS']?>" name="tmt_cpns" class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						
	                          </tr>
                              
                              <tr>
		                        <td>TMT PNS</td>
		                        <td>:</td>
		                        <td>
		                          <div class="form-group">
							<div class='input-group date' id='tmt_pns'>
								<input type='text' value="<?php echo $baris['TMT_PNS']?>" name="tmt_pns" class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						
	                          </tr>
                              
                              <tr>
		                        <td>TMT Pangkat</td>
		                        <td>:</td>
		                        <td>
                                <div class="form-group">
							<div class='input-group date' id='datepicker1'>
		                          <input name="tmt_pangkat" value="<?php echo $baris['TMT_PANGKAT']?>" type="text" class="form-control col-md-7 col-xs-12" id="sk_pangkat">
                                  <span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
	                          </tr>
                              
                              <tr>
		                        <td>Naik Pangkat</td>
		                        <td>:</td>
		                        <td>
                                <div class="form-group">
							<div class='input-group date' id='naik_pangkat'>
		                          <input name="naik_pangkat" value="<?php echo $baris['NAIK_PANGKAT']?>" type="text" required class="form-control col-md-7 col-xs-12" id="sk_pangkat">
                                  <span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
	                          </tr>
                              
                              <tr>
		                        <td>Pendidikan</td>
		                        <td>:</td>
		                        <td>
		                           <input name="pendidikan" value="<?php echo $baris['PENDIDIKAN']?>" type" required class="form-control col-md-7 col-xs-12" id="sk_pangkat""text>
                        </tr>
                              
                              <tr>
		                        <td>Tempat Tugas</td>
		                        <td>:</td>
		                        <td>
		                          <input type"text" name="tugas" value="<?php echo $baris['TUGAS']?>" required class="form-control col-md-7 col-xs-12">
	                          </tr>                              
                              <td>
		                      <td colspan="3"><div align="center">
		                   <button type="reset" onClick="return confirm('Apakah Anda Yakin Menghapus Hapus data Yang Akan Di Input?')" class="btn btn-primary">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
		                        </div></td>
		                        </tr>
		                        
	                        </form>
	                      </table>
                          </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered by Gantella Created By Muhammad Daniel Apriansyah Desain By Colorlib
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
    
    <script src="js/jQuery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
			$(function () {
				
				$('#datepicker').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				$('#datepicker1').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				
				$('#naik_pangkat').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				$('#tmt_jabatan').datetimepicker({
					format: 'YYYY-MM-DD',
				});
				$('#tmt_pns').datetimepicker({
					format: 'YYYY-MM-DD',
				});
			});
	</script>
  </body>
</html>
<?php 
}else{
?>
<script>document.location.href="../login/"</script>
<?php 
}
?>
