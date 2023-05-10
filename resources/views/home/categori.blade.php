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
@endsection
