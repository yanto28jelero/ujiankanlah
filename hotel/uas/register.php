<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="index.php">Beranda</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "Harus isi semua kolom.";
		echo "<br/>";
		echo "<a href='register.php'>Kembali</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registrasi Sukses";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p><font size="+2">Daftar</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nama Lengkap</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
