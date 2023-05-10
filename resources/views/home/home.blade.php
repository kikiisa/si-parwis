@extends('master.layout', ['title' => 'SISTEM INFORMASI TRACKING WISATA'])
@section('content')
    <style>
        .image {
            width: 100%;
            height: 100%;
            background-size: cover;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h1>SISTEM INFORMASI TRACKING WISATA</h1>
        </div>
        <div class="section-body">
            @foreach ($kategori as $item)
                @php
                    $datas = App\Models\WisataCategory::with('maping')->where("id",$item->id)->first() 
                @endphp
                <a href="{{ Route("bycategori",$item->slug) }}" class="btn btn-primary text-white mb-4">{{ $item->nama }} <strong>{{ count($datas->maping) }}</strong></a>
            @endforeach
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">Maps</div>
                        <div class="card-body">
                            <div class="map" id="map" style="width: 100%">
                            </div>
                            <button class="btn btn-primary mt-2" onclick="refresh()" id="refresh">Check Lokasi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                @forelse($wisata as $data)
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ $data->nama_titik }}</h4>
                            </div>
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <?php $y = collect($service->returnStringMerge($data->image)); ?>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 image" src="{{ asset('assets/image/' . $y[0]) }}"
                                            alt="First slide">
                                    </div>
                                    @foreach (collect($service->returnStringMerge($data->image)) as $x)
                                        <div class="carousel-item">
                                            <img class="d-block w-100 image" style="background-size: cover;"
                                                src="{{ asset('assets/image/' . $x) }}" alt="Second slide">
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
                            <div class="card-body">
                                <strong>Kategori Wisata</strong> : <a href="http://" class="btn btn-success">{{ $data->categori->nama }}</a>
                                <p>{!! $data->deskripsi !!}</p>
                                <a href="{{ Route("detail.wisata",$data->uuid) }}" class="btn btn-primary">Detail Wisata</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger">Maaf Tempat Wisata Belum Tersedia</div>
                @endforelse
            </div>
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="carousel-inner">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner slider">
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title-modal mt-2"></h4>
                            <div class="deskripsi">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('vendor/routing/leaflet-routing-machine.js') }}"></script>
    <script src="{{ asset('vendor/routing/Control.Geocoder.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/lodash/core.js') }}"></script>
    <script>
        let map = L.map('map').setView([0.546004, 123.106773], 13);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);
        const refresh = () => {
            window.location.reload()
            pos()
        }
        async function pos() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    let datasWisata = null
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    let ResultPosition = new L.Routing.Waypoint(L.latLng(latitude, longitude))
                    let BestTitik = []
                    L.marker([latitude, longitude]).addTo(map)
                        .bindPopup(
                            `<strong>Posisi Anda Saat Ini</strong>`
                        ).openPopup();
                    fetch('/api-peta')
                        .then(response => response.json())
                        .then((data) => {
                            let datas = data.data

                            datas.map((item, index) => {
                                let routeUs = L.Routing.osrmv1();
                                routeUs.route([ResultPosition, new L.Routing.Waypoint(L.latLng(item
                                    .latitude, item.longitude))], (err, routes) => {
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
                                        // menggambar rute terdekat dari setiap titik 
                                        L.Routing.line(routes[bestRoute], {
                                            styles: [{
                                                color: 'green',
                                                weight: '10'
                                            }]
                                        }).addTo(map);
                                    }
                                    /// menandai setiap ujung titik
                                    L.marker([item.latitude, item.longitude]).addTo(map)
                                        .bindPopup(
                                            `<strong>${item.nama_titik}</strong>  ${item.deskripsi}`
                                        ).openPopup();
                                })
                            })
                            datasWisata = BestTitik
                        })
                        .catch(error => console.log(error))
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
                                L.Routing.control({
                                    waypoints: [
                                        L.latLng(latitude, longitude),
                                        L.latLng(minValue.lat, minValue.lon)
                                    ],
                                    showAttribution: false
                                }).addTo(map);
                                L.marker([minValue.lat, minValue.lon]).addTo(map)
                                    .bindPopup(
                                        `<strong>Wisata Terdekat Saat Ini</strong>`
                                    ).openPopup();
                                // menampilkan modal dan konten dari info
                                let images = datass.image.split(",").map(String)
                                var html = `<div class="carousel-item active">
                                            <img src="/assets/image/${images[0]}" class="d-block w-100"
                                                alt="${images[0]}">
                                        </div>`
                                images.map((item,index) => {
                                    html+=`<div class="carousel-item">
                                        <img src="/assets/image/${item}" class="d-block w-100"alt="...">
                                        </div>`
                                })
                                $(".slider").html(html)
                                $(".title-modal").text(datass.nama_titik)
                                $(".modal-title").text(
                                    `Wisata Terdekat Dalam Posisi Anda Yaitu  : ${datass.nama_titik}`
                                )
                                $(".deskripsi").html(`<p>${datass.deskripsi}</p>`)
                            });
                            $("#exampleModalLong").modal({
                                backdrop: false
                            })
                    }, 5000)
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        pos()
    </script>
@endsection
