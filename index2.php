<html>
<head>
	<title>Add Users</title>
</head>

<body>
	<a href="index.php">Kembali ke Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Kode Asisten</td>
				<td><input type="text" name="kode_asisten"></td>
			</tr>
			<tr>
				<td>Nama Asisten</td>
				<td><input type="text" name="nama_asisten"></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input type="text" name="no_hp"></td>
			</tr>
      <tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

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
</body>
</html>



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
<html>
<head>
	<title>Edit User Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="update_data" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Nama Asisten</td>
				<td><input type="text" name="nama_asisten" value=<?php echo $nama_asisten;?>></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input type="text" name="no_hp" value=<?php echo $no_hp;?>></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="kode_asisten" value=<?php echo $_GET['kode_asisten'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>




<?php
// membuat koneksi ke database dengan file config.php
include_once("config.php");

// Mengambil semua data yang ada pada tabel
$result = mysqli_query($mysqli, "SELECT * FROM tb_asisten ORDER BY kode_asisten ASC");
?>

<html>
<head>
    <title>Daftar Asisten WAD 2018</title>
</head>

<body>
<a href="add.php">Tambahkan Asisten</a><br/><br/>

    <table width='80%' border=1>

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
        echo "<td><a href='edit.php?kode_asisten=$data_asisten[kode_asisten]'>Edit</a> | <a href='delete.php?kode_asisten=$data_asisten[kode_asisten]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>
