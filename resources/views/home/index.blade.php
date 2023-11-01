<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISTEM INFORMASI GIS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="theme/img/favicon.png" rel="icon">
    <link href="theme/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="theme/vendor/aos/aos.css" rel="stylesheet">
    <link href="theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="theme/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="theme/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="theme/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="theme/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">
    <!-- Template Main CSS File -->
    <link href="theme/css/style.css" rel="stylesheet">
</head>
<style>
    .map {
        width: 100%;
        height: 100%;
    }
    .leaflet-container {
        height: 400px;
        width: 600px;
        max-width: 100%;
        max-height: 100%;
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="theme/img/logo.jpg" alt="logo">
                <span>SIG PARIWISATA</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="{{ Route('profile') }}">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#services">Tracking Wisata</a></li>
                    <li><a class="getstarted scrollto" href="{{Route('auth')}}">Masuk</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">SIG PARIWISATA</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Explore seluruh wisata di Bone Bolango dan temukan
                        pesona indahnya! Nikmati pengalaman tak terlupakan di setiap sudut destinasi wisata yang ada!
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#services"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Cek Lokasi Wisata</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="theme/img/new.svg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">
        <section id="services">
            <header class="section-header">
                <h2>Tracking Wisata Terdekat Anda</h2>
                <p>Temukan Rekomendasi Wisata Terdekat Anda</p>
                @foreach ($kategori as $item)
                    @php
                        $datas = App\Models\WisataCategory::with('maping')
                            ->where('id', $item->id)
                            ->first();
                    @endphp
                    <a href="{{ Route('bycategori', $item->slug) }}" class="btn btn-primary text-white mb-4 mt-4">{{ $item->nama }}
                        <strong>{{ count($datas->maping) }}</strong></a>
                @endforeach
            </header>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-light">Maps</div>
                            <div class="card-body">
                                <div class="map" id="map" style="width:100%;">
                                </div>
                                <button class="btn btn-primary mt-2" onclick="refresh()" id="refresh">Check
                                    Lokasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-12 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="theme/img/logo.png" alt="">
                            <span>SIG PARIWISATA</span>
                        </a>
                        <p>Explore seluruh wisata di Bone Bolango dan temukan pesona indahnya! Nikmati pengalaman tak
                            terlupakan di setiap sudut destinasi wisata yang ada!</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
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
                    <div class="operasional">
                        <span class="btn mb-1 btn-success price"></span>
                        <span class="buka mb-1 btn bg-primary text-light fw-bold"></span>
                        <span class="tutup btn bg-danger text-light fw-bold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Dinas Pariwisata</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="/">Jodi</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="theme/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="theme/vendor/aos/aos.js"></script>
    <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="theme/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="theme/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="theme/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="theme/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="theme/js/main.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('vendor/routing/leaflet-routing-machine.js') }}"></script>
    <script src="{{ asset('vendor/routing/Control.Geocoder.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/lodash/core.js') }}"></script>
    <script>
        const myModal = new bootstrap.Modal('#exampleModalLong', {
            keyboard: false
        })
        let map = L.map('map').setView([0.546004, 123.106773], 13);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);
        const refresh = () => {
            window.location.reload()
            pos()
        }
        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
        function onClick(data) {
            alert(data);
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
                            console.log(datas)

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
                                                if (datas[index].categori.slug != 'hotel') {
                                                    BestTitik.push(routes[i])
                                                }
                                            }
                                        }
                                        // menggambar rute terdekat dari setiap titik 
                                        // L.Routing.line(routes[bestRoute], {
                                        //     styles: [{
                                        //         color: 'green',
                                        //         weight: '10'
                                        //     }]
                                        // }).addTo(map);
                                    }
                                    /// menandai setiap ujung titik
                                    L.marker([item.latitude, item.longitude], {
                                            riseOnHover: true,
                                            myUrl: `/detail-wisata/${item.uuid}`,
                                            icon: L.icon({
                                                iconUrl: `/assets/image/${item.categori.slug}.png`,
                                                iconSize: [35,
                                                    35
                                                ], // size of the icon
                                            })
                                        }).addTo(map)
                                        .bindPopup(
                                            `<strong>${item.nama_titik}</strong>  ${item.deskripsi}`
                                        ).openPopup().on('click', function(evt) {
                                            window.location.href = evt.target.options
                                                .myUrl
                                        });
                                })
                            })
                            datasWisata = BestTitik
                            console.log(datasWisata)
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
                                images.map((item, index) => {
                                    html += `<div class="carousel-item">
                                        <img src="/assets/image/${item}" class="d-block w-100"alt="...">
                                        </div>`
                                })
                                $(".slider").html(html)
                                $(".title-modal").text(datass.nama_titik)
                                $(".modal-title").text(
                                    `Wisata Terdekat Dalam Posisi Anda Yaitu  : ${datass.nama_titik}`
                                )
                                $(".deskripsi").html(`<p>${datass.deskripsi}</p>`)
                                $(".buka").html(`Jam Buka : ${datass.jam_buka}`)
                                $(".tutup").html(`Jam Tutup :${datass.jam_tutup}`)
                                
                                $(".price").html(`Biaya Masuk Rp. ${formatRupiah(datass.price)}`)
                            });
                        myModal.show()
                    }, 5000)
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        pos()
    </script>
</body>

</html>
