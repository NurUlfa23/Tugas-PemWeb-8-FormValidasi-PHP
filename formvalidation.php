<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwE0ngsV7Zt27NXFoaoApmYm81iuXoPkF0JwJ8EdknLPMO" crossorigin="anonymous">
<style>
.warning {color: #FF0000;}
</style>
</head>
<body>

<?php
$error_nama = "";
$error_email = "";
$error_web = "";
$error_pesan = "";
$error_telp = "";

$nama = "";
$email = "";
$web = "";
$pesan = "";
$telp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

	if (empty($_POST["nama"])) // Mengecek inputan nama jika kosong
	{
		$error_nama = "Nama tidak boleh kosong"; // Variabel $error_nama digunakan jika inputan nama kosong dan menampilkan pesan error
	}
	else
	{
		$nama = cek_input($_POST["nama"]); // Mengecek variabel nama
		if (!preg_match("/^[a-zA-Z ]*$/",$nama)); // Jika terdapat error inputan pada form bagian nama akan berwarna merah
		{
			$nameErr = "Inputan Hanya boleh Huruf dan Spasi";	// Menampilkan pesan error jika diinput selain huruf dan spasi	
		}
	}

     if (empty($_POST["email"])) // Mengecek inputan email jika kosong
     {
     	$error_email = "Email tidak boleh kosong"; // Variabel $error_nama digunakan jika inputan email kosong dan menampilkan pesan error
     }
     else
     {
     	$email = cek_input($_POST["email"]); // Mengecek variabel email
     	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Hanya diisi sesuai format dalam email
     	{
     		$error_email = "Format Email Invalid"; // Jika tidak sesuai format akan error
     	}
     }
 
     if(empty($_POST["pesan"])) // Mengecek inputan pesan jika kosong
     {
     	$error_pesan = "Pesan Tidak Boleh Kosong"; // Variabel $error_nama digunakan jika inputan pesan kosong dan menampilkan pesan error
     }
     else
     {
     	$pesan = cek_input($_POST["pesan"]); // Mengecek variabel pesan
     }

     if(empty($_POST["web"])) // Mengecek inputan web jika kosong
     {
     	$error_web = "Website Tidak Boleh Kosong"; // Variabel $error_nama digunakan jika inputan web kosong dan menampilkan pesan error
     }
     else
     {
     	$web = cek_input($_POST["web"]); // Mengecek variabel web

     	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$web)) // Diisi sesuai format
     	{
     		$error_web = "URL Tidak Valid";  // Menampilkan pesan error jika tidak sesuai format
     	}
     }

     if(empty($_POST["telp"])) // Mengecek inputan telp jika kosong
     {
     	$error_telp = "Telp Tidak Boleh Kosong"; // Variabel $error_nama digunakan jika inputan telp kosong dan menampilkan pesan error
     }
     else
     {
     	$telp = cek_input($_POST["telp"]); // Mengecek variabel telp

     	if(!is_numeric($telp)) // Hanya bisa diisi format angka
     	{
     		$error_telp = 'Nomor HP Hanya Boleh Angka'; // Menampilkan pesan error jika tidak sesuai format
     	}
     }

 }

 function cek_input($data) { // Memanggil cek_input untuk menghilangkan spasi sebelum dan sesudah inputan
 	$data = trim($data); // Trim digunakan untuk menghilangkan spasi 
 	$data = stripslashes($data); // Striplashes digunakan untuk menghapus escape character \ dari string
 	$data = htmlspecialchars($data); // Htmlspecialchars digunakan untuk mengubah beberapa character entity menjadi nama entity
 	return $data;
 }
 ?>

 <div class="row">
 <div class="col-md-6">
 <div class="card">
   <div class="card-header">
    Contoh Validasi Form dengan PHP
   </div>
   <div class="card-body">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
    <input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : ""); ?>" id="nama" placeholder="Nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama; ?></span> 
    </div>
    </div>
 <div class="form-group row">
 	<label for="email" class="col-sm-2 col-form-label">Email</label>
 	<div class="col-sm-10">
 	  <input type="text" name="email" class="form-control <?php echo($error_email !="" ? "is-invalid" : ""); ?>" id="email" placeholder="email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span> 
 	</div>
 </div>

<div class="form-group row">
	<label for="web" class="col-sm-2 col-form-label">Website</label>
	<div class="col-sm-10">
		<input type="text" name="web" class="form-control <?php echo($error_web !="" ? "is-invalid" : ""); ?>" id="web" placeholder="web" value="<?php echo $web; ?>" ><span class="warning"><?php echo $error_web; ?></span>
</div>
</div>

<div class="form-group row">
	<label for="telp" class="col-sm-2 col-form-label">Telp</label>
	<div class="col-sm-10">
		<input type="text" name="telp" class="form-control <?php echo($error_telp !="" ? "is-invalid" : ""); ?>" id="telp" placeholder="telp" value="<?php echo $telp; ?>" ><span class="warning"><?php echo $error_telp; ?></span>
</div>
</div>

<div class="form-group row">
	<label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
	<div class="col-sm-10">
		<input type="text" name="pesan" class="form-control <?php echo($error_pesan !="" ? "is-invalid" : ""); ?>" id="pesan" placeholder="pesan" value="<?php echo $pesan; ?>" ><span class="warning"><?php echo $error_pesan; ?></span>
</div>
</div>

<div class="form-group-row">
	<div class="col-sm-10">
		<button type="submit" class="btn btn-primary">Sign In</button> 
</div>
</div>
</form>

</div>
</div>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo "Nama = ".$nama; 
echo "<br>";
echo "Email = ".$email;
echo "<br>";
echo "Website = ".$web;
echo "<br>";
echo "Telp = ".$telp;
echo "<br>";
echo "Pesan = ".$pesan;
echo "<br>";
?>

</body>
</html>