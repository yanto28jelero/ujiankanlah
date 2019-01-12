<?php session_start(); ?>
<html>
<head>
	<title>HHalaman Utama</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		 Perpustakaan !
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Selamat Menggunakan<?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Keluar</a><br/>
		<br/>
		<a href='view.php'>Lihat dan Tambahkan Buku</a>
		<br/><br/>
	<?php	
	} else {
		echo "Login dulu.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Daftar</a>";
	}
	?>
	<div id="footer">
	
	</div>
</body>
</html>
