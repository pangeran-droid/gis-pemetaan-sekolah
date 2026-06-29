<!-- Small boxes (Stat box) -->
<div class="col-lg-6 col-6">
  <div class="small-box bg-purple">
    <div class="inner">
      <h3><?= $jmlsekolah ?></h3>
      <p>Sekolah</p>
    </div>
    <div class="icon">
      <i class="fas fa-school"></i>
    </div>
    <a href="<?= base_url('Sekolah') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-6 col-6">
  <div class="small-box bg-indigo">
    <div class="inner">
      <h3><?= $jmlwilayah ?></h3>
      <p>Wilayah</p>
    </div>
    <div class="icon">
      <i class="fas fa-layer-group"></i>
    </div>
    <a href="<?= base_url('Wilayah') ?>" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<?php
$db = \Config\Database::connect();
foreach ($jenjang as $key => $value) {
  $jml = $db->table('tbl_sekolah')->where('id_jenjang', $value['id_jenjang'])->countAllResults();
  ?>
<!-- ./col -->
<div class="col-lg-3 col-3">
  <!-- small box -->
  <div class="small-box <?php if ($value['id_jenjang'] == 1) {
                                echo 'bg-primary';
                          } elseif ($value['id_jenjang'] == 2) {
                                echo 'bg-success';
                          } elseif ($value['id_jenjang'] == 3) {
                                echo 'bg-warning';
                          } elseif ($value['id_jenjang'] == 4) {
                                echo 'bg-danger';
                        } ?>">
    <div class="inner">
      <h3><?= $jml ?></h3>
      <p><?= $value['jenjang'] ?></p>
    </div>
    <div class="icon">
      <i class="fas fa-school"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<?php } ?>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-map-marked-alt"></i>
                Peta Persebaran Sekolah
            </h3>
        </div>
        <div class="card-body p-0">
            <div id="map" style="height:500px;"></div>
        </div>
    </div>
</div>

<script>
    var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta2 = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team'
    });

    var peta3 = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data: &copy; OpenStreetMap contributors, SRTM | Map style: &copy; OpenTopoMap (CC-BY-SA)'
    });

    var peta4 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB',
        subdomains: 'abcd',
        maxZoom: 19
    });

    var peta5 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, Earthstar Geographics',
        maxZoom: 19
    });

    var peta6 = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB',
        subdomains: 'abcd',
        maxZoom: 19
    });

    var map = L.map('map', {
        center: [<?= $web['coordinat_wilayah'] ?>],
        zoom: <?= $web['zoom_view'] ?>,
        layers: [peta1]
    });

    var baseMaps = {
        'Streets': peta1,
        'OpenStreetMap.HOT': peta2,
        'OpenTopoMap': peta3,
        'Carto Light': peta4,
        'Esri Satellite': peta5,
        'Carto Dark': peta6
    };

    var layerControl = L.control.layers(baseMaps).addTo(map);

    <?php foreach ($wilayah as $value) { ?>
    L.geoJSON(<?= $value['geojson'] ?>,{
        fillColor:'<?= $value['warna'] ?>',
        fillOpacity:0.7
    }).addTo(map);
    <?php } ?>

    <?php foreach ($sekolah as $value) { ?>
    var Icon = L.icon({
        iconUrl:'<?= base_url('marker/'.$value['marker']) ?>',
        iconSize:[35,50]
    });

    L.marker([<?= $value['coordinat'] ?>],{icon:Icon})
    .addTo(map);
    <?php } ?>
</script>