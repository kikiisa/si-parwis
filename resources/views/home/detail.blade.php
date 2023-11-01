@extends('master.layout', ['title' => $data->nama_titik])
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $data->nama_titik }}</h1>
        </div>
        <div class="section-body py-4">
            <div class="row justify-content-start">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Caption</h4>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{ asset('assets/image/' . $image[0]) }}"
                                            alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $data->nama_titik }}</h5>
                                            <p>{{ strip_tags($data->deskripsi) }}.</p>
                                        </div>
                                    </div>
                                    @foreach ($image as $x)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('assets/image/' . $x) }}"
                                                alt="Second slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $data->nama_titik }}</h5>
                                                <p>{{ $data->deskripsi }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">Maps</div>
                        <div class="card-body">
                            <div class="map" id="map" style="width: 100%">
                            </div>
                            <p class="mt-3">Kategori Wisata : <a href="http://"
                                    class="btn btn-success">{{ $data->categori->nama }}</a></p>
                            <div class="content">
                                <h1>{{ $data->nama_titik }}</h1>
                                {!! $data->deskripsi_full !!}
                            </div>
                            <button class="btn btn-success fw-bold">Biaya Masuk Rp. {{ number_format($data->price, 0, ',', '.') }}</button>
                            <button class="btn btn-primary fw-bold">Jam Buka : {{ $data->jam_buka }}</button>
                            <button class="btn btn-danger fw-bold">Jam Buka : {{ $data->jam_tutup }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
        <script src="{{ asset('vendor/routing/leaflet-routing-machine.js') }}"></script>
        <script src="{{ asset('vendor/routing/Control.Geocoder.js') }}"></script>
        <script src="{{ asset('vendor/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('vendor/lodash/core.js') }}"></script>
        <script>
            let latt = document.querySelector('#lat');
            let long = document.querySelector('#long');
            // get current lokasi;
            var map = L.map('map').setView([0.546004, 123.106773], 50);
            var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const pos = async () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        let datasWisata = null
                        let myPositionLat = position.coords.latitude
                        let myPositionLon = position.coords.longitude
                        let ResultPosition = new L.Routing.Waypoint(L.latLng(myPositionLat, myPositionLon))
                        let BestTitik = []
                        L.marker([myPositionLat, myPositionLon]).addTo(map)
                            .bindPopup(
                                `<strong>Posisi Anda Saat Ini</strong>`
                            ).openPopup();
                        let routeUs = L.Routing.osrmv1();
                        routeUs.route([ResultPosition, new L.Routing.Waypoint(L.latLng({{ $data->latitude }},
                            {{ $data->longitude }}))], (err, routes) => {
                            if (!err) {
                                let best = 100000000000000;
                                let bestRoute = 0;
                                for (i in routes) {
                                    /// mencari rute terdekat dari setiap titik
                                    /// membandingkan total setiap titik dengan mengambil jarak (Distance) dan membandikngkan dengan titik best
                                    if (routes[i].summary.totalDistance < best) {
                                        bestRoute = i;
                                        best = routes[i].summary.totalDistance;
                                        BestTitik.push(routes[i])
                                    }
                                }
                            }
                            datasWisata = BestTitik
                            setTimeout(() => {
                                const minValue = datasWisata.reduce((acc, obj,
                                    index) => {
                                    if (obj.summary.totalDistance < acc.value) {
                                        return {
                                            value: obj.summary.totalDistance,
                                            index: index,
                                            lat: obj.inputWaypoints[1].latLng.lat,
                                            lon: obj.inputWaypoints[1].latLng.lng,
                                        }
                                    } else {
                                        return acc
                                    }
                                }, {
                                    value: Infinity,
                                    index: -1
                                })
                                fetch(`/api-peta/${minValue.lat}/position/${minValue.lon}`)
                                    .then(response2 => response2.json())
                                    .then((datass) => {
                                        console.log(datass)
                                        L.Routing.control({
                                            waypoints: [
                                                L.latLng(myPositionLat, myPositionLon),
                                                L.latLng(minValue.lat, minValue
                                                    .lon)
                                            ],
                                            showAttribution: false
                                        }).addTo(map);
                                        L.marker([minValue.lat, minValue.lon],{
                                            icon: L.icon({
                                                iconUrl: `/assets/image/${datass.categori.slug}.png`,
                                                iconSize: [30,
                                                    30
                                                ], // size of the icon
                                            })
                                        }).addTo(map).bindPopup(
                                            `<strong>${datass.nama_titik}</strong>  ${datass.deskripsi}`
                                        ).openPopup()  
                                    });
                            }, 5000)
                        })
                    });
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }
            pos()
            var popup = L.popup()
                .setLatLng([{{ $data->latitude }}, {{ $data->longitude }}])
                .setContent('titik wilayah')
                .openOn(map);
        </script>
    </section>
@endsection
