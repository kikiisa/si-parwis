@extends('master.layout', ['title' => 'Tambah Fasilitas'])
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Fasilitas</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">Data Berhasil Di Tambahkan</div>
        @endif
        @if (session()->has('errors'))
            <div class="alert alert-danger">Data Gagal Di Tambahkan</div>
        @endif
        <div class="section-body py-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">Fasilitas</div>
                        <div class="card-body">
                            <form action="{{ route('fasilitas.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Nama Fasilitas</label>
                                    <input type="text" name="uuid" hidden value="{{ Str::uuid() }}">
                                    <input type="text" required class="form-control" name="judul"
                                        placeholder="Nama Fasilitas">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="file" required name="image" class="form-control">
                                </div>
                                <button class="btn btn-primary mt-1">Simpan</button>
                                <a href="{{ route('fasilitas') }}" class="btn btn-light mt-1">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
