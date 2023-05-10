@extends('master.layout', ['title' => 'Tambah Pemetaan'])
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori Wisata</h1>
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
                        <div class="card-header bg-primary text-light">Kategori Wisata</div>
                        <div class="card-body">
                            <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Kategori Wisata</label>
                                    <input type="text" name="uuid" hidden value="{{ Str::uuid() }}">
                                    <input type="text" class="form-control" name="kategori"
                                        placeholder="Kategori Wisata">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                                </div>
                                <button class="btn btn-primary mt-1">Simpan</button>
                                <a href="{{ route('kategori') }}" class="btn btn-light mt-1">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
