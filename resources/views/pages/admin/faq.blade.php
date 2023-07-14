@extends('layouts.dashboard.master')

@section('title')
FAQ
@endsection

@section('page')
FAQ
@endsection

@section('css')
<link href="{{ asset('dist/css/bootstrap-iconpicker.min.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        FAQ
    </li>
</ol>
@endsection
    
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-12 col-md-6 col-xl-6 col-xxl-6 d-flex align-items-center">
                            <h5>List Frequently Asked Questions (FAQ)</h5>
                        </div>
                        <div class="col-12 col-md-6 col-xl-6 col-xxl-6 btn-add">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFAQ">Tambah FAQ</a>
                            <!-- Modal Add Kategori -->
                            <div class="modal fade" id="addFAQ" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addFAQLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addFAQLabel">Tambah Frequently Asked Questions (FAQ)</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ url('/admin/faq') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="iconLabel" class="form-label d-flex">Ikon FAQ</label>
                                                    <button type="button" class="btn btn-icon" role="iconpicker" name="icon" style="float: left;"></button> <br>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="questionLabel" class="form-label d-flex">Pertanyaan</label>
                                                    <input type="text" name="question" class="form-control" id="question" placeholder="Contoh: Apa yang dimaksud BISINDO?" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="answerLabel" class="form-label d-flex">Jawaban</label>
                                                    <textarea name="answer" id="answer" cols="30" rows="5" class="form-control" placeholder="Contoh: BISINDO adalah ...."></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                {{ Session::get('fail') }}
                                @php
                                    Session::forget('fail');
                                @endphp
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="overflow-auto">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ikon</th>
                                <th scope="col">Pertanyaan</th>
                                <th scope="col">Jawaban</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td><i class="{{ $faq->icon }}"></i></td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>
                                    <td>
                                        <form action="{{ url('/admin/faq', $faq->question ) }}" method="POST" class="ms-auto">
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editFAQ{{ $faq->id }}"><i class="fa fa-pencil-alt"></i> Ubah</button>
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0" type="submit"><i class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal Add Kategori -->
                                <div class="modal fade" id="editFAQ{{ $faq->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFAQ{{ $faq->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editFAQ{{ $faq->id }}Label">Tambah Kategori</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ url('/admin/faq'). '/' . $faq->question }}" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="iconLabel" class="form-label d-flex">Ikon FAQ</label>
                                                        <button type="button" class="btn btn-icon" role="iconpicker" name="icon" style="float: left;"></button> <br>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="questionLabel" class="form-label d-flex">Pertanyaan</label>
                                                        <input type="text" name="question" class="form-control" id="question" placeholder="Contoh: Apa yang dimaksud BISINDO?" required value="{{ $faq->question }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="answerLabel" class="form-label d-flex">Jawaban</label>
                                                        <textarea name="answer" id="answer" cols="30" rows="5" class="form-control" placeholder="Contoh: BISINDO adalah ....">{{ $faq->answer }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('dist/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endsection