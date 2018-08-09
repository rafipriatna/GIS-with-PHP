<?php
// Halaman masuk admin.
// Dikembangkan oleh Rafi Priatna.
session_start();
include ('../konfigurasi/koneksi.php');

if ($_SESSION['id']){
  header("location:index.php");
}else{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Rafi Priatna">
    <title>Masuk</title>
    <link href="css/masuk.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="POST" action="cek_masuk.php">
          <input type="text" class="fadeIn second" name="surel" placeholder="Surel">
          <input type="password" class="fadeIn third" name="password" placeholder="Kata sandi">
          <input type="submit" name="masuk" class="fadeIn fourth" value="Masuk">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
          <span>Copyright © Rafi Priatna 2018</span>
        </div>

      </div>
    </div>
</body>
<script type="text/javascript" src="js/masuk.js"><script/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"/>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<?php } ?>