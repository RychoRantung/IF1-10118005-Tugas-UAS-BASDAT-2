<?php
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// mengaktifkan session pada php
session_start();
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($config,"SELECT  * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard Manager
		header("location:index1.php");
 
	
	}
}else{
	header("location:login.html?pesan=gagal");
}
 
?>