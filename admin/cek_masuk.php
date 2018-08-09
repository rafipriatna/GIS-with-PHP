<?php
	include ('../konfigurasi/koneksi.php');
	// Proses masuk.
	if(isset($_POST['masuk'])){
		$surel   		= mysqli_real_escape_string($koneksi, trim($_POST['surel']));
		$password 		= mysqli_real_escape_string($koneksi, trim($_POST['password']));
		// Cek username dari database.
		$cek 			= $koneksi->query("SELECT * FROM pengguna WHERE surel = '".$surel."'");
		$data 			= $cek->num_rows;

		if($data  == 1){
			$row = $cek->fetch_assoc();
			// Meriksa password dari database.
			if(password_verify($password, $row['password'])){
				$id     				= $row['id'];
				session_start();
				$_SESSION['id']			= $id;
            // Jika password cocok dengan yang di database.
            // Dibolehin masuk ke index.
				header('location:index.php');
				}else{
            // Jika password tidak cocok.
				echo "<script type='text/javascript'>alert('Username atau password salah!'); window.location.href='masuk.php';</script>";
				}
				}else{
            // Jika username dan password tidak cocok dengan $data
						echo "<script type='text/javascript'>alert('Username atau password salah!'); window.location.href='masuk.php';</script>";
				}
			}else{
                // Jika password dan username tidak cocok dengan yang di database.
                    echo "<script type='text/javascript'>alert('Username atau password salah!'); window.location.href='masuk.php';</script>";
            }
	
?>