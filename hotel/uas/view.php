<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Beranda</a> | <a href="add.html">Tambahkan data baru</a> | <a href="logout.php">Keluar</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Judul buku</td>
			<td>Jumlah</td>
			<td>Harga (euro)</td>
			<td>Perbarui</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
