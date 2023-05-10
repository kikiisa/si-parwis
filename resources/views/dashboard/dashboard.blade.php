@extends('master.layout',['title' => 'Dashboard']);
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="mt-4 far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Users</h4>
                        </div>
                        <div class="card-body">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="mt-4 far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $admin }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="mt-4 fa fa-map text-light"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Titik Pemeteaan</h4>
                        </div>
                        <div class="card-body">
                            {{ $peta }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection