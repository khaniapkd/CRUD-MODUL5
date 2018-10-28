<?php
// file untuk koneksi ke database
include_once("config.php");

// Mengecek jika form yang di submit adalah untuk update
if(isset($_POST['update']))
{
	$kode_asisten = $_POST['kode_asisten'];
	$nama_asisten=$_POST['nama_asisten'];
	$no_hp=$_POST['no_hp'];
	$email=$_POST['email'];

	// update data asisten
	$result = mysqli_query($mysqli, "UPDATE tb_asisten SET nama_asisten='$nama_asisten',no_hp='$no_hp',email='$email' WHERE kode_asisten='$kode_asisten'");

	// Mengarahkan ke halaman index
	header("Location: index.php");
}
?>
<?php
// Menampilkan daftar asisten
$kode_asisten = $_GET['kode_asisten'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_asisten WHERE kode_asisten='$kode_asisten'");

while($data_asisten = mysqli_fetch_array($result))
{
  $kode_asisten = $data_asisten['kode_asisten'];
	$nama_asisten = $data_asisten['nama_asisten'];
	$no_hp = $data_asisten['no_hp'];
	$email = $data_asisten['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Daftar Asisten</title>
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
				<form name="update_data" method="post" action="edit.php">
          <input class="text" type="text" name="nama_asisten" placeholder="Nama Asisten" value=<?php echo $nama_asisten;?> required="">
          <input class="text" type="text" name="no_hp" placeholder="No HP" value=<?php echo $no_hp;?> required="">
					<input class="text" type="email" name="email" placeholder="Email" value=<?php echo $email;?> required="">
          <input type="hidden" name="kode_asisten" value=<?php echo $_GET['kode_asisten'];?>>
					<input type="submit" name="update" value="Update">
				</form>
			</div>
		</div>
	</div>
	<!-- //main -->
</body>
</html>
