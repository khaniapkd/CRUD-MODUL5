<!DOCTYPE html>
<html>
<head>
<title>Daftar Asisten</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="add.php" method="post" name="form1">
					<input class="text" type="text" name="kode_asisten" placeholder="Kode Asisten" required="">
          <input class="text" type="text" name="nama_asisten" placeholder="Nama Asisten" required="">
          <input class="text" type="text" name="no_hp" placeholder="No HP" required="">
					<input class="text" type="email" name="email" placeholder="Email" required="">
					<input type="submit" name="Submit" value="Add">
          <?php

        	// Check If form submitted, insert form data into users table.
        	if(isset($_POST['Submit'])) {
        		$kode_asisten = $_POST['kode_asisten'];
        		$nama_asisten = $_POST['nama_asisten'];
        		$no_hp = $_POST['no_hp'];
            $email = $_POST['email'];

        		// file koneksi ke database
        		include_once("config.php");

        		// Insert data asisten
        		$result = mysqli_query($mysqli, "INSERT INTO tb_asisten(kode_asisten,nama_asisten,no_hp,email) VALUES('$kode_asisten','$nama_asisten','$no_hp','$email')");

        		// menampilkan pesan
        		echo "Asisten ditambahkan. <a href='index.php'>Lihat Asisten</a>";
        	}
        	?>
				</form>
			</div>
		</div>
	</div>
	<!-- //main -->
</body>
</html>
