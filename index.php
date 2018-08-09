<?php
// Aplikasi untuk unduh add-ons scenery Flight Simulator.
// Dikembangkan oleh Rafi Priatna.
include ('konfigurasi/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Scenery Flight Simulator</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>
        var marker;
        function initialize() {
          var infoWindow = new google.maps.InfoWindow;
          var map =  new google.maps.Map(document.getElementById('aku-peta'), {
            mapTypeId: google.maps.MapTypeId.HYBRID,
            zoom: 7
            });
            
          var bounds = new google.maps.LatLngBounds();
          <?php
              $query = $koneksi->query("SELECT * FROM bandara");
              while ($data = mysqli_fetch_array($query)){
                  $nama = $data['nama'];
                  $lat = $data['lat'];
                  $lon = $data['lon'];
                  $fs9 = $data['fs9'];
                  $fsx = $data['fsx'];
                  $p3d = $data['p3d'];
                  echo ("TambahMarker($lat, $lon, '<b>$nama</b><br/><br/><b>FS2004 / FS9 :</b><br/> $fs9<br/> <b>FSX :</b><br/> $fsx<br/> <b>P3D :</b><br/> $p3d');\n");                                         
              }
            ?>

          function TambahMarker(lat, lng, info) {
              var lokasi = new google.maps.LatLng(lat, lng);
              bounds.extend(lokasi);
              var marker = new google.maps.Marker({
                  map: map,
                  position: lokasi,
                  icon: 'gambar/bandara.png'
              });       
              loc = new google.maps.LatLng(2.3579666,128.4434358);
              bounds.extend(loc);
              map.fitBounds(bounds);
              bindInfoWindow(marker, map, infoWindow, info);
           }
       
          // Ketika di klik
          function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                // $("#info").modal('show');
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
          }
    
          }
        google.maps.event.addDomListener(window, "load", initialize);
    </script>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Scenery Flight Sim</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kirim Scenery</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Pencarian Scenery Flight Simulator</h1>
          <p class="lead">Scenery yang ada bersifat gratis / free. Saya kumpulkan dari Internet
              supaya mudah untuk dicari lagi.
          </p>
          <div class="panel-body">
            <div id="aku-peta" style="width:100%;height:450px;"></div>
            </div>
        </div>
      </div>
    </div>

    <!--
      Modal
      Belum work :(
     -->
    <div class="modal fade" id="info" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo $nama;?></h4>
          </div>
          <div class="modal-body">
            <b>FS2004 / FS9 : </b><br/>
            <?php echo $fs9;?><br/>         

            <b>FSX :</b><br/>
            <?php echo $fsx;?><br/>         

            <b>P3D :</b><br/>
            <?php echo $p3d;?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    document.getElementById('aku-peta').style.textAlign = "left";
    </script>
  </body>

</html>
