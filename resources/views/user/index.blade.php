@extends('master.layout',['title' => 'Tambah User'])
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if (session()->has('errors'))
            <div class="alert alert-danger">{{session('errors')}}</div>
        @endif
        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-server mr-2"></i>Tambah User</a>
        <div class="section-body py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $x)
                                            <tr>
                    
                                                <td>{{ $loop->index+=1 }}</td>
                                                <td>{{ $x->name }}</td>
                                                <td>{{ $x->email }}</td>
                                                <td>
                                                    <form action="{{ Route("user.destroy",$x->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button onclick="return confirm('apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger">Hapus</button>
                                                        <a href="{{ Route("user.edit",$x->uuid) }}" class="btn btn-warning">Edit</a>
                                                    </form>
                                                </td>
                                            </tr>                          
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection