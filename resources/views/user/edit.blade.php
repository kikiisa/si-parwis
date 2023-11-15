@extends('master.layout', ['title' => 'Edit User'])
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
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
                        <div class="card-body">
                            <form action="{{ route('user.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$data->name}}" required placeholder="Nama" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{$data->email}}" required placeholder="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" value="{{$data->phone}}" required placeholder="Phone" name="phone"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-control">
                                    @error('password')
                                        {{$message}} 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirm">Konfirmasi</label>
                                    <input type="text" name="confirm" placeholder="Konfirmasi Password" class="form-control">
                                    @error('confirm')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
