<?php
// Ubah data bandara.
// Dikembangkan oleh Rafi Priatna.
include ('../konfigurasi/koneksi.php');
$id  = (int) $_GET['id'];
$sql = $koneksi->query("SELECT * FROM bandara WHERE id = '$id'");
$result = $sql->fetch_assoc();
$lat    = $result['lat'];
$lon    = $result['lon'];
    ?>
<div class="row">
<div class="col-lg-4">
    <div class="card mb-6">
        <div class="card-header">
            <i class="fa fa-building"></i>
            Data bandara
        </div>
        <form method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Lat</label>
                    <input type="text" class="form-control" name="lat" id="lat">
                </div>
                <div class="form-group">
                    <label>Lng</label>
                    <input type="text" class="form-control" name="lon" id="lon">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="simpan_ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-8">
    <div class="card mb-6">
        <div class="card-header">
            <i class="fa fa-map-marker"></i>
            Peta
        </div>
        <div class="card-body">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script type="text/javascript">
            var geocoder = new google.maps.Geocoder();

            function geocodePosition(pos) {
              geocoder.geocode({
                latLng: pos
              }, function(responses) {
                if (responses && responses.length > 0) {
                  updateMarkerAddress(responses[0].formatted_address);
                } else {
                  updateMarkerAddress('Cannot determine address at this location.');
                }
              });
            }

            function updateMarkerStatus(str) {
              document.getElementById('markerStatus').innerHTML = str;
            }

            function updateMarkerPosition(latLng) {
                var lat = latLng.lat();
                var lon = latLng.lng();
              document.getElementById('lat').value = lat;
              document.getElementById('lon').value = lon;
            }

            function updateMarkerAddress(str) {
              document.getElementById('address').innerHTML = str;
            }

            function initialize() {
              var latLng = new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lon;?>);
              var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom: 8,
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              });
              var marker = new google.maps.Marker({
                position: latLng,
                title: 'Point A',
                map: map,
                draggable: true
              });
          
              updateMarkerPosition(latLng);
              geocodePosition(latLng);
          
              google.maps.event.addListener(marker, 'dragstart', function() {
                updateMarkerAddress('Digeser...');
              });
          
              google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerStatus('Digeser...');
                updateMarkerPosition(marker.getPosition());
              });
          
              google.maps.event.addListener(marker, 'dragend', function() {
                updateMarkerStatus('Pinned');
                geocodePosition(marker.getPosition());
              });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
            </script>
             <style>
             #mapCanvas {
               width: 675px;
               height: 400px;
               float: left;
             }
             #infoPanel {
               float: left;
               margin-left: 10px;
             }
             #infoPanel div {
               margin-bottom: 5px;
             }
             </style>
            
             <div id="mapCanvas"></div>
             <div id="infoPanel">
               <b><div id="markerStatus"><i>Klik terus digeser.</i></div></b>
             </div>
        </div>
    </div>
</div>
</div>
<?php
if(isset($_POST['simpan_ubah'])){
    $nama   = $_POST['nama'];
    $lat2   = $_POST['lat'];
    $lon2   = $_POST['lon'];

    $koneksi->query("UPDATE bandara SET nama = '$nama', lat = '$lat2', lon = '$lon2' WHERE id = '$id'");
    ?>
    <script type="text/javascript">
    alert("Sukses!");
    window.location.href="index.php";
    </script>
    <?php
}
?>