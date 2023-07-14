@extends('layouts.dashboard.master')

@section('title')
Admin Page
@endsection

@section('page')
    Dashboard
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Dashboard
    </li>
</ol>
@endsection
    
@section('content')
<div class="container overflow-auto">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mt-3 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                            <div class="card card-count">
                                <div class="card-body">
                                    <h1>{{ $kategorinya->count() }}</h1>
                                    <h5>Kategori</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mt-3 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                            <div class="card card-count">
                                <div class="card-body">
                                    <h1>{{ $subs->count() }}</h1>
                                    <h5>Sub-Kategori</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 mt-3 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                            <div class="card card-count">
                                <div class="card-body">
                                    <h1>{{ $materinya->count() }}</h1>
                                    <h5>Materi</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                            <table class="table table-hover">
                                <h5>Kategori Terfavorit</h5>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Dilihat oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategorinya as $kategori)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{{ $kategori->name }}</td>
                                        <td>{{ $kategori->visited }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                            <table class="table table-hover">
                                <h5>Materi Terfavorit</h5>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Dilihat oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materinya as $materi)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{{ $materi->name }}</td>
                                        <td>{{ $materi->visited }}</td>
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
</div>
@endsection
