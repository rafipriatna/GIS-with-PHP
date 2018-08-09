<?php
session_start();
include ('../konfigurasi/koneksi.php');
session_unset();
session_destroy();
header( "location:masuk.php" );
?>