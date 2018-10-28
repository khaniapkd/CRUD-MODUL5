<?php
// membuat koneksi ke database dengan file config.php
include_once("config.php");

// Mengambil semua data yang ada pada tabel
$result = mysqli_query($mysqli, "SELECT * FROM tb_asisten ORDER BY kode_asisten ASC");
?>


<!DOCTYPE html>
<html>
<head>
<title>Daftar Asisten WAD 2018</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() {
	setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Form Daftar Asisten</h1>

			<div class="agileits-top">
        <a href="add.php">Tambahkan Asisten</a><br/><br/>

            <table id="customers" width='80%' border=1>

            <tr>
                <th>Kode Asisten</th> <th>Nama Asisten</th> <th>No Hp</th> <th>Email</th> <th>Aksi</th>
            </tr>
            <?php
            while($data_asisten = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$data_asisten['kode_asisten']."</td>";
                echo "<td>".$data_asisten['nama_asisten']."</td>";
                echo "<td>".$data_asisten['no_hp']."</td>";
                echo "<td>".$data_asisten['email']."</td>";
                echo "<td><a href='edit.php?kode_asisten=$data_asisten[kode_asisten]'>Edit</a> |
								<a href='delete.php?kode_asisten=$data_asisten[kode_asisten]'>Delete</a></td></tr>";
            }
            ?>
            </table>
			</div>

	</div>
	<!-- //main -->
</body>
</html>
