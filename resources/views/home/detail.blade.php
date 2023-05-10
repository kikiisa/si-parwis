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
                                        <img class="d-block w-100" src="{{ asset('assets/image/'.$image[0])}}" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{$data->nama_titik}}</h5>
                                            <p>{{ strip_tags($data->deskripsi)}}.</p>
                                        </div>
                                    </div>
                                    @foreach ($image as $x)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('assets/image/'.$x)}}" alt="Second slide">
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
                            <p class="mt-3">Kategori Wisata : <a href="http://" class="btn btn-success">{{ $data->categori->nama }}</a></p>
                            <div class="content">
                                <h1>{{ $data->nama_titik }}</h1>
                                {!! $data->deskripsi_full !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
        <script>
            let latt = document.querySelector('#lat');
            let long = document.querySelector('#long');
            // get current lokasi;
            var map = L.map('map').setView([0.546004, 123.106773], 50);
            var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const showPosition = (posisi) => {
                var popup = L.popup()
                    .setLatLng([posisi.coords.latitude, posisi.coords.longitude])
                    .setContent('Posisi Sekarang')
                    .openOn(map);
            }



            const pos = () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }

            const titik = () => {
                var popup = L.popup()
                    .setLatLng([{{ $data->latitude }}, {{ $data->longitude }}])
                    .setContent('titik wilayah')
                    .openOn(map);
            }
            var popup = L.popup()
                .setLatLng([{{ $data->latitude }}, {{ $data->longitude }}])
                .setContent('titik wilayah')
                .openOn(map);

            function onMapClick(e) {
                var popup = L.popup()
                    .setLatLng([0, 0])
                    .setContent('Titik Sekarang')
                    .openOn(map);
                popup
                    .setLatLng(e.latlng)
                    .setContent('Koordinat Posisi yang anda Klik' + e.latlng.toString())
                    .openOn(map);
                latt.value = e.latlng.lat
                long.value = e.latlng.lng
            }
            map.on('click', onMapClick);
        </script>
    </section>
@endsection
