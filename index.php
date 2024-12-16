<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ExBatik</title>

    <!-- leaflet css link  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Font Awesome icons link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Leaflet Plugin Search Control -->
    <link rel="stylesheet" href="plugin/leaflet-search-master/leaflet-search-master/dist/leaflet-search.min.css">

    <!-- Leaflet Plugin Default Extent -->
    <link rel="stylesheet"
        href="plugin\Leaflet.defaultextent-master\Leaflet.defaultextent-master\dist\leaflet.defaultextent.css">


    <style>
        main {
            margin-top: 80px;
            margin-bottom: 60px;
        }

        /* Style Navbar */
        .navbar {
            background-color: #9fbbfc;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10000;
        }

        .navbar-brand i,
        .nav-link i {
            margin-right: 5px;
        }

        .modal {
            z-index: 10001;
        }

        /* Style Peta */
        #map {
            width: 100%;
            height: 600px;
            margin-bottom: 20px;
        }

        .leaflet-control-zoom {
            margin-top: 70px !important;
        }

        .leaflet-control-layers {
            margin-top: 70px !important;
            margin-right: 30px !important;
        }


        /* Style Umum HTML*/
        body {
            font-family: 'Segoe UI';
            background-color: #2b0066;
            font-weight: bold;
            color: #250065;
            text-align: center;
        }

        /* Style Tabel */
        table {
            width: 80%;
            margin: 16px auto;
            border-collapse: collapse;
            font-size: 14px;
            font-weight: bold;
            background-color: rgb(194, 212, 255);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid white;
        }

        th {
            background-color: #330078;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #9fbbfc;
        }

        tr:hover {
            background-color: #0fefff;
        }

        /* Style Button */
        button {
            padding: 5px 10px;
            background-color: rgb(117, 0, 72);
            color: rgb(255, 255, 255);
            font-family: 'Segoe UI';
            font-weight: bold;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }

        button:hover {
            background-color: rgb(255, 31, 105);
        }

        .button-container {
            font-size: 18px;
            text-align: center;
            margin-bottom: 10px;
            padding: 10px 12px;
        }

        /* Style Card Bootstrap */
        .card {
            margin: 14px;
        }

        .card-title {
            font-weight: bold;
            color: #330078;
            font-family: 'Segoe UI';
        }

        .container {
            margin: 10px auto;
            padding: 10px;
            width: calc(100% - 32px);
            box-sizing: border-box;
        }

        .carousel-image {
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
        }

        /* Style bagian Kritik */
        .kritik label {
            color: purple;
            font-weight: bold;
        }

        .kritik textarea {
            border: 2px solid mediumvioletred;
            background-color: rgb(255, 230, 253);
        }

        /* Style bagian Saran */
        .saran label {
            color: darkblue;
            font-weight: bold;
        }

        .saran textarea {
            border: 2px solid blue;
            background-color: rgb(223, 242, 255);
        }


        /* Style Button Expand */
        .expand-button {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 14px;
            font-size: 14px;
            background-color: rgb(108, 108, 255);
            color: white;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .expand-button:hover {
            background-color: #0fefff;
        }

        .small-card {
            max-width: 700px;
            margin: auto;
        }

        /* Style untuk Gallery */
        .gallery-container {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
            background-color: #2b0066;
            border: 1px solid #0fefff;
            border-radius: 8px;
            position: relative;
        }

        .gallery-container img {
            display: inline-block;
            margin-right: 10px;
            border-radius: 8px;
            height: 300px;
            width: auto;
        }
    </style>
</head>

<body>
    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- leaflet js link  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- jquery link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Leaflet default extent -->
    <script src="plugin/Leaflet.defaultextent-master/Leaflet.defaultextent-master/dist/leaflet.defaultextent.js"></script>

    <!-- Leaflet Search -->
    <script src="plugin/leaflet-search-master/leaflet-search-master/dist/leaflet-search.min.js"></script>

    <!-- leaflet geoserver request link  -->
    <script src="lib/L.Geoserver.js"></script>

    <!-- jquery GeoJSON link  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-location-dot"></i>Kota Pekalongan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="https://geoportal.pekalongankota.go.id/" target="_blank"><i class="fa-solid fa-folder-open"></i>Sumber Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#deskripsi"><i class="fa-solid fa-square-pen"></i>Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#peta"><i class="fa-solid fa-map"></i>Peta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#batik"><i class="fa-solid fa-table-list"></i></i>Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kritikdansaran"><i class="fa-solid fa-envelope"></i>Kritik dan Saran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"><i class="fa-solid fa-circle-user"></i>Pembuat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="infoModalLabel">Informasi Pembuat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                            <tr>
                                <th>Nama</th>
                                <td>Nadine Zahida</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>23/517930/SV/22840</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>PGWEB-A</td>
                            </tr>
                            <tr>
                                <th>Mata Kuliah</th>
                                <td>PGWEB</td>
                            </tr>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container border border-primary rounded">
            <div class="card mt-3">
                <div class="alert alert-primary text-center h2-bold" role="alert">
                    <h1 id="deskripsi">❁❁❁❁❁❁❁❁❁❁<b>[[ ExBatik ]]</b>❁❁❁❁❁❁❁❁❁❁</h1>
                    <h4><b>Eksplorasi UMKM Batik Pekalongan</b></h4>
                </div>
                <div class="col-8 offset-2">
                    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/batikbuketan.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batikencim.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batikjawahokokai.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batikjlamprang.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batikliong.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batiksawat.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batiksemen.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batikterangbulan.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/batiktujuhrupa.jpg" class="d-block w-100 carousel-image" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p style="font-family:'Trebuchet MS';">
                        Kota Pekalongan merupakan salah satu kota yang terletak pada Jalur Pantai Utara (Jalur Pantura) Jawa Tengah yang menghubungkan Jakarta-Semarang-Surabaya, berbatasan dengan Kabupaten Pekalongan di sebelah barat serta selatan dan dengan Kabupaten Batang di sebelah timur. Terdapat 4 kecamatan yang ada pada Kabupaten Pekalongan, yaitu Kecamatan Pekalongan Utara, Pekalongan Barat, Pekalongan Selatan dan Pekalongan Timur.
                    </p>
                    <p style="font-family:'Trebuchet MS';">
                        Julukan Kota Batik telah diberikan pada Kota Pekalongan sejak lama. Hal tersebut dipengaruhi sejarah yang ada dahulu, di mana masyarakat Pekalongan memiliki pekerjaan sebagai produsen batik dan seluruh kegiatan dikerjakan di rumah-rumah penduduk, sehingga Batik Pekalongan menyatu erat dengan kehidupan masyarakat. Perjumpaan masyarakat Pekalongan dengan berbagai bangsa seperti Cina, Belanda, Arab, India, Melayu dan Jepang pada masa lampau telah mewarnai dinamika pada motif dan tata warna seni batik. Sehingga tumbuh beberapa jenis motif batik hasil pengaruh budaya dari berbagai bangsa tersebut yang kemudian sebagai motif khas dan menjadi identitas batik Pekalongan. Misalnya, Motif Jlamprang terinspirasi dari Negeri India dan Arab, Motif Encim dan Klenengan dipengaruhi oleh kebudayaan dari Cina, Motif Pagi-Sore dipengaruhi oleh orang Belanda, dan Motif Jawa Hokokai tumbuh pesat pada masa pendudukan Jepang.
                    </p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header alert alert-primary text-center">
                    <h4 id="peta">ヾ(≧▽≦ )\<b>===[[ Peta Sebaran UMKM Penyedia Batik Pekalongan ]]===</b>(〃￣︶￣)/</h4>
                </div>
                <div class="card-body">
                    <div class="mapouter">
                        <div id="map"></div>
                        <script>
                            var map = L.map("map").setView([-6.893857445379879, 109.6773822717813], 14);

                            var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                            });

                            var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                            });

                            var rupabumiindonesia = L.tileLayer('https://geoservices.big.go.id/rbi/rest/services/BASEMAP/Rupabumi_Indonesia/MapServer/tile/{z}/{y}/{x}', {
                                attribution: 'Badan Informasi Geospasial'
                            });
                            osm.addTo(map);
                        </script>

                        <script>
                            map.createPane('markerPane');
                            map.getPane('markerPane').style.zIndex = 5000;

                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "responsipgweb";

                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM batik";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $long = $row["longitude"];
                                    $lat = $row["latitude"];
                                    $toko = htmlspecialchars($row["toko"], ENT_QUOTES, 'UTF-8');
                                    $kategori = htmlspecialchars($row["kategori"], ENT_QUOTES, 'UTF-8');

                                    echo "console.log('Toko: $toko, Latitude: $lat, Longitude: $long');\n";

                                    echo "L.marker([$lat, $long], {
                                    icon: L.icon({
                                        iconUrl: 'icon/leaf-red.png',
                                        iconSize: [32, 80],
                                        iconAnchor: [32, 80],
                                        popupAnchor: [0, -32]
                                    })
                                }).addTo(map).bindPopup(
                                    '<b>Toko: </b>$toko<br> <b>Kategori: </b>$kategori<br> <b>Lintang: </b>$lat<br> <b>Bujur: </b>$long<br>'
                                );\n";
                                }
                            } else {
                                echo "console.log('No data available');";
                            }

                            if ($conn && !$conn->connect_error) {
                                $conn->close();
                            }
                            ?>
                        </script>

                        <script>
                            // WMS LAYER SAMA POLYGON GEOJSONNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                            map.createPane('wmsPane');
                            map.getPane('wmsPane').style.zIndex = 4000;

                            var wmsLayer1 = L.tileLayer.wms("https://geoportal.pekalongankota.go.id/geoserver/wms", {
                                layers: "DPUPR:strukturtransportasi_ln_5k_337520241104161529",
                                transparent: true,
                                format: "image/png",
                                pane: 'wmsPane'
                            }).addTo(map);

                            map.createPane('kelurahan');
                            map.getPane('kelurahan').style.zIndex = 3000;

                            map.getPane('popupPane').style.zIndex = 10000;
                            map.getPane('tooltipPane').style.zIndex = 9000;

                            var kelurahan = L.geoJSON(null, {
                                style: function(feature) {
                                    return {
                                        color: "rgb(31, 169, 255)",
                                        weight: 1,
                                        fillColor: "rgb(194, 251, 255)",
                                        fillOpacity: 1
                                    };
                                },
                                onEachFeature: function(feature, layer) {
                                    var popupContent = "Kelurahan/Desa : " + "<b>" + feature.properties.NAMOBJ + "</b>";

                                    layer.bindPopup(popupContent, {
                                        pane: 'popupPane',
                                    });

                                    layer.bindTooltip(feature.properties.NAMOBJ, {
                                        pane: 'tooltipPane',
                                        direction: "auto",
                                        sticky: true,
                                    });

                                    layer.on('click', function() {
                                        layer.openPopup();
                                    });
                                }
                            });

                            $.getJSON("data/pekalongan.geojson", function(data) {
                                kelurahan.addData(data);
                                map.addLayer(kelurahan);
                            });
                        </script>

                        <script>
                            // INI BAGIAN CONTROL LAYERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
                            var baseMaps = {
                                "OpenStreetMap": osm,
                                "Esri World Imagery": Esri_WorldImagery,
                                "Rupa Bumi Indonesia": rupabumiindonesia,
                            };
                            var overlayMaps = {
                                "Data Garis (WMS Layer)": wmsLayer1,
                                "Data Area (Polygon)": kelurahan,
                            };

                            var controlLayer = L.control.layers(baseMaps, overlayMaps, {
                                collapsed: true
                            });
                            controlLayer.addTo(map);

                            // INI BAGIAN SCALEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
                            var scale = L.control.scale(
                                position = "bottomleft",
                                imperial = false,
                            );
                            scale.addTo(map);

                            // INI BAGIAN GEOLOCATIONNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
                            map.locate({
                                setView: false,
                                maxZoom: 12,
                                enableHighAccuracy: true
                            });

                            function onLocationFound(e) {
                                var radius = e.accuracy / 8;

                                L.marker(e.latlng).addTo(map).bindPopup("Kamu berada dalam radius</br>" + radius + " meter</br>dari titik ini");
                                L.circle(e.latlng, radius).addTo(map);
                            }
                            map.on("locationfound", onLocationFound);


                            function onLocationError(e) {
                                alert(e.message);
                            }
                            map.on("locationerror", onLocationError);
                        </script>

                        <script>
                            // BAGIAN PLUGIN LEAFLETJS
                            var defaultExtentControl = L.control.defaultExtent({
                                position: 'topleft',
                                text: '↺',
                                title: 'Default Extent',
                            });
                            map.addControl(defaultExtentControl);

                            var searchControl = new L.Control.Search({
                                layer: kelurahan,
                                propertyName: 'NAMOBJ',
                                marker: false,
                                position: 'topleft',
                                moveToLocation: function(latlng, title, map) {
                                    var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                                    map.setView(latlng, zoom);
                                }
                            });

                            searchControl.on('search:locationfound', function(e) {
                                e.layer.setStyle({
                                    fillColor: '#52ffd4',
                                    color: '#ffefa4'
                                });
                                if (e.layer._popup)
                                    e.layer.openPopup();

                            }).on('search:collapsed', function(e) {

                                kelurahan.eachLayer(function(layer) {
                                    kelurahan.resetStyle(layer);
                                });
                            });
                            map.addControl(searchControl);
                        </script>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header alert alert-primary text-center">
                    <h4 id="batik">ヾ(≧▽≦ )\<b>===[[ Data Toko Batik ]]===</b>(〃￣︶￣)/</h4>
                </div>
                <div class="card-body">
                    <?php
                    if ($result->num_rows > 0) {
                        echo "<table><tr>
                        <th>No</th> <!-- Ubah ID menjadi No -->
                        <th>Toko</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                        </tr>";

                        $no = 1;

                        $result->data_seek(0);
                        while ($row = $result->fetch_assoc()) {
                            echo
                            "<tr>
                            <td>" . $no++ . "</td> <!-- Menampilkan nomor urut -->
                            <td>" . $row["toko"] . "</td>
                            <td>" . $row["longitude"] . "</td>
                            <td>" . $row["latitude"] . "</td>
                            <td>" . $row["kategori"] . "</td>
                            <td>
                            <button type='button' onclick='editData(" . $row["id"] . ")'>Edit</button>
                            <button type='submit' onclick='deleteData(" . $row["id"] . ")'>Hapus</button>
                            </td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>Tidak ada data</p>";
                    }
                    ?>
                </div>
                <div class="button-container">
                    <button onclick="window.location.href='input.php'">== [ Tambah Data ] ==</button>
                </div>
            </div>

            <script>
                function editData(id) {
                    window.location.href = "edit.php?id=" + id;
                }

                function deleteData(id) {
                    if (confirm("Yakin ingin menghapus data ini?")) {
                        window.location.href = "delete.php?hapus=" + id;
                    }
                }
            </script>

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="gallery-container">
                        <img src="images/batikbuketan.jpg">
                        <img src="images/batikencim.jpg">
                        <img src="images/batikjawahokokai.jpg">
                        <img src="images/batikjlamprang.jpg">
                        <img src="images/batikliong.jpg">
                        <img src="images/batiksawat.jpg">
                        <img src="images/batiksemen.jpg">
                        <img src="images/batikterangbulan.jpg">
                        <img src="images/batiktujuhrupa.jpg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card mt-3 small-card">
                    <div class="card-header alert alert-primary text-center">
                        <h4 id="kritikdansaran">ヾ(≧▽≦ )\<b>===[[ Kritik dan Saran ]]===</b>(〃￣︶￣)/</h4>
                    </div>
                    <div class="card-body">
                        <form action="note.php" method="POST" id="kritikSaranForm">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Isikan Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="user@example.com" required>
                            </div>
                            <div class="mb-3 kritik">
                                <label for="kritik" class="form-label">Kritik</label>
                                <textarea class="form-control" name="kritik" id="kritik" rows="3" placeholder="Masukkan kritik" required></textarea>
                            </div>
                            <div class="mb-3 saran">
                                <label for="saran" class="form-label">Saran</label>
                                <textarea class="form-control" name="saran" id="saran" rows="3" placeholder="Masukkan saran" required></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <button id="expandButton" class="expand-button">Tampilan Peta Penuh</button>

    <script>
        document.getElementById("expandButton").addEventListener("click", function() {

            var mapElement = document.getElementById("map");
            if (!mapElement.classList.contains("fullscreen")) {
                mapElement.style.position = "fixed";
                mapElement.style.top = "0";
                mapElement.style.left = "0";
                mapElement.style.width = "100vw";
                mapElement.style.height = "100vh";
                mapElement.style.zIndex = "999";
                map.invalidateSize();
                this.innerText = "Kembali ke Semula";
            } else {
                mapElement.style.position = "";
                mapElement.style.top = "";
                mapElement.style.left = "";
                mapElement.style.width = "100%";
                mapElement.style.height = "600px";
                mapElement.style.zIndex = "";
                map.invalidateSize();
                this.innerText = "Tampilan Peta Penuh";
            }
            mapElement.classList.toggle("fullscreen");
        });
    </script>
    <script>
        L.Control.Watermark = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img');

                img.src = 'icon/logo-sv-ugm.png';
                img.style.width = '200px';

                return img;
            },

            onRemove: function(map) {}
        });

        L.control.watermark = function(opts) {
            return new L.Control.Watermark(opts);
        }

        L.control.watermark({
            position: 'bottomright'
        }).addTo(map);
    </script>
</body>

</html>