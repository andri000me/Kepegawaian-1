<?php
//koneksi file ke database
$host = "localhost";
$userdb = "root";
$passdb = "";
$namadb = "kepegawaian";
$con = mysqli_connect($host, $userdb, $passdb, $namadb);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Manajemen</title>

	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="index.php">Manajemen User</a></div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Beranda</a></li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Manajemen User &raquo; Data User</h2>
			<hr />
			
			
			<form class="form-inline" method="post" action="tabeltahunankgb.php">
				<div class="form-group">
					<select name="katsearch" class="form-control">
                    <option value="TMT_KGB">TMT KGB</option>
                    <option value="NAIK_KGB">Naik KGB</option>
                    </select>
                    <input class="form-control" type=date name=key placeholder = keyword>
                    <button>search</button>
				
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table">
	<tr>
		<th>NAMA PEGAWAI</th>
		<th>NIP</th>
        <th>PANGKAT GOLONGAN</th>
        <th>JABATAN</th> 
        <th>TMT CPNS</th>
        <th>TMT JABATAN</th>
        <th>TMT KGB</th>
        <th>NAIK KGB</th>
        <th>TMT PANGKAT</th>
        <th>TEMPAT TUGAS</th>
        <th>ACTION</th>
	</tr>
	
	<?php
	
	//terima data keyword dari form search jika ada
	$key = $_POST['key'];
	$katsearch=$_POST['katsearch'];
	//definisikan perintah pemanggilan data
	$sql = "select NAMA_PEGAWAI,NIP,PANGKAT_GOLONGAN,JABATAN,TMT_CPNS,TMT_JABATAN,TMT_KGB,NAIK_KGB,TMT_PANGKAT,TUGAS from tb_kgb";
	
	if($key!=""):
		$sql .= " where $katsearch like '%$key%'";
	endif;
	
	//jalankan atau aktifkan perintah pemanggilan
	$query = mysqli_query($con,$sql);
	
	//echo mysqli_error($con);
	
	$no = 1;
	//pecah data yang telah di panggil menjadi array dapat ditampilkan/digunakan.
	while(list($NAMA_PEGAWAI,$NIP,$PANGKAT_GOLONGAN,$JABATAN,$TMT_CPNS,$TMT_JABATAN,$TMT_KGB,$NAIK_KGB,$TMT_PANGKAT,$TUGAS)=mysqli_fetch_row($query)):
	?>
	
	<tr>
		<td><?php echo $NAMA_PEGAWAI; ?></td>
		<td><?php echo $NIP; ?></td>
		<td><?php echo $PANGKAT_GOLONGAN; ?></td>
        <td><?php echo $JABATAN; ?></td>
        <td><?php echo $TMT_CPNS; ?></td>
        <td><?php echo $TMT_JABATAN; ?></td>
        <td><?php echo $TMT_KGB; ?></td>
        <td><?php echo $NAIK_KGB; ?></td>
        <td><?php echo $TMT_PANGKAT; ?></td>
        <td><?php echo $TUGAS; ?></td>
		<td><a href=konfirmasi_kgb.php?NIP=<?php echo $NIP?>            
                <li>
                  <span class="glyphicon glyphicon-list"></span>
                  <span class="glyphicon-class">Data Terpenuhi</span>
                </li>
                            		</a>
                            </td>
	</tr>
	<?php endwhile; ?>
</table>
			</div>
		</div>
	</div>
</body>
</html>