@extends('master.layout', ['title' => 'PROFILE INSTANSI'])
@section('content')
    <link rel="stylesheet" href="{{ asset('vendor/zoomist/zoomist.min.css') }}">
    <script src="{{ asset('vendor/zoomist/zoomist.min.js') }}"></script>
    <style>
        .image {
            width: 100%;
            height: 100%;
            background-size: cover;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h1>Profile Dinas Pariwisata Kabupaten Bone Bolango</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light"> <h4 class="text-light">Tentang Kami</h4></div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <img src="{{ asset('assets/image/logo.jpg') }}" width="100" alt="" srcset="">
                            </div>
                            <div class="content mt-4">
                                <h3 class="text-center">Visi Dan Misi Kabupaten Bone Bolango</h3>
                                <p><strong>Visi</strong></p>
                                <li>
                                    <strong>KABUPATEN BONE BOLANGO MAJU CEMERLANG</strong>
                                    MAJU artinya mandiri, juara dan unggul dalam pelayanan public serta terdepan dalam tata
                                    kelola pemerintahan

                                </li>
                                <li>
                                    <strong>BONE BOLANGO CEMERLANG</strong> dalam makna luas adalah suatu kondisi memantapkan pembangunan Kabupaten Bone Bolango yang “Unggul dan Berdaya saing” serta masyarakat berada pada tingkat peradaban tinggi. CEMERLANG dalam makna akronim diterjemahkan dalam makna 3 (tiga) pilar utama yakni CE (Cerdas), MER (Moderen), LANG (Gemilang)
                                </li>
                                <hr>
                                <p><strong>Misi</strong></p>
                                <li>
                                    <strong>MISI KESATUAN</strong>
                                    Mewujudkan masyarakat Modern, Berbudaya dan Sejaterah

                                </li>
                                <li>
                                    Memperkokoh infrastruktur dan pembangunan kawasan sebagai prime mover keunggulan yang berbasisi pelestarian sumberdaya alam
                                </li>
                                <li>
                                    Mewujudkan perekonomian daerah yang berdaya saing merata dan berkeadilan
                                </li>
                                <li>
                                    Mewujudkan tata kelola pemerintahan digital
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h4 class="text-light">Strukture Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <div id="my-zoomist" data-zoomist-src="{{ asset('assets/image/strukture.jpg') }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        new Zoomist('#my-zoomist', {
            height: '50%',
            slider: true,
            zoomer: true
        })
    </script>
@endsection
