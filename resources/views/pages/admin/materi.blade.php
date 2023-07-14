@extends('layouts.dashboard.master')

@section('page')
    Kategori Materi
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/">Materi</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Kategori
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
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 d-flex align-items-center">
                            <h5>List Kategori Materi</h5>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 btn-add">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKategori">Tambah Kategori</a>
                            <!-- Modal Add Kategori -->
                            <div class="modal fade" id="addKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addKategoriLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addKategoriLabel">Tambah Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ url('/admin/materi/kategori') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="labelForName" class="form-label d-flex">Nama Kategori</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Angka" required style="text-transform: capitalize">
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
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <div class="card overflow-auto mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <a class="btn btn-list" data-bs-toggle="collapse" href="#collapse{{ $category->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                                                @if($submaterinya->where('id_kategori', $category->id)->count() > 0)
                                                    <i class="bx bx-right-arrow"></i>
                                                @endif
                                                {{ $category->name }}
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <div class="ms-auto mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0 btn-add">
                                                <button type="button" class="btn btn-sm btn-warning mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0" data-bs-toggle="modal" data-bs-target="#editKategori{{ $category->id }}"><i class="fa fa-pencil-alt"></i> Ubah</button>
                                                <a href="{{ url('/admin/materi/kategori') . '/' . $category->name . '/hapus' }}" class="btn btn-sm btn-danger mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0" type="submit"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit Kategori -->
                            <div class="modal fade" id="editKategori{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editKategori{{ $category->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editKategori{{ $category->id }}Label">Ubah Kategori</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ url('/admin/materi/kategori', $category->id) }}" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="labelForName" class="form-label d-flex">Nama Kategori</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Angka" required style="text-transform: capitalize" value="{{ $category->name }}">
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
                            <div class="collapse container" id="collapse{{ $category->id }}">
                                <div class="row mt-3 mb-3">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                        <h5>Materi dari Kategori: {{ $category->name }}</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 btn-add">
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubMateri{{ $category->id }}">Tambah Materi</a>
                                        <!-- Modal Tambah Sub Kategori -->
                                        <div class="modal fade" id="addSubMateri{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addSubMateri{{ $category->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="addSubMateri{{ $category->id }}Label">Tambah Materi di Kategori: {{ $category->name }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="{{ url('/admin/materi/kategori/sub') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="categoryID" value="{{ $category->id }}">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="labelForName" class="form-label d-flex">Nama Sub Kategori</label>
                                                                <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Angka" required style="text-transform: capitalize">
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
                                </div>
                                <ul class="list-group">
                                    @foreach($submaterinya as $sub)
                                        @if($sub->id_kategori == $category->id)
                                            @php
                                                $materinya = App\Models\Materi::where('id_sub_materi', $sub->id)->orderBy('name', 'ASC')->get();
                                            @endphp
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#materi{{ $sub->id }}" aria-expanded="false" aria-controls="materi{{ $sub->id }}">
                                                            @if($materinya->where('id_sub_materi', $sub->id)->count() > 0)
                                                                <i class="bx bx-right-arrow"></i>
                                                            @endif
                                                            {{ $sub->name }}
                                                        </button>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 btn-add">
                                                        <form action="{{ url('/admin/materi/kategori/sub', $sub->name ) }}" method="POST" class="ms-auto">
                                                            <button type="button" class="btn btn-sm btn-warning mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0" data-bs-toggle="modal" data-bs-target="#editSubKategori{{ $sub->id }}"><i class="fa fa-pencil-alt"></i> Ubah</button>
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0" type="submit"><i class="fa fa-trash"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                    <!-- Modal Edit Sub Kategori -->
                                                    <div class="modal fade" id="editSubKategori{{ $sub->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSubKategori{{ $sub->id }}Label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="editSubKategori{{ $sub->id }}Label">Edit Sub Kategori: {{ $sub->name }}</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="POST" action="{{ url('/admin/materi/kategori/sub') . '/' . $sub->id }}" enctype="multipart/form-data">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="labelForName" class="form-label d-flex">Nama Materi</label>
                                                                            <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Angka" required style="text-transform: capitalize" value="{{ $sub->name }}">
                                                                        </div>
                                                                        <div class="form-floating mb-3">
                                                                            <select class="form-select" id="categoryID" name="categoryID" aria-label="Category label select">
                                                                                <option value="{{ $sub->id_kategori }}" selected>{{ $category->name }}</option>
                                                                                <option disabled>--- Pilih Kategori Lainnya ---</option>
                                                                                @foreach($categories as $kategori)
                                                                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="floatingSelect">Kategori</label>
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
                                            </li>
                                            <div class="mt-2 mb-2">
                                                <div class="collapse collapse-horizontal" id="materi{{ $sub->id }}">
                                                    <div class="card card-body">
                                                        <div class="row mt-3 mb-3">
                                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                <h5>Materi dari Sub Materi: {{ $sub->name }}</h5>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 btn-add">
                                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMateri{{ $sub->id }}">Tambah Materi</a>
                                                                <!-- Modal Tambah Materi -->
                                                                <div class="modal fade" id="addMateri{{ $sub->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMateri{{ $sub->id }}Label" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="addMateri{{ $sub->id }}Label">Tambah Materi di Kategori: {{ $sub->name }}</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <form method="POST" action="{{ url('/admin/materi') }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="categoryID" value="{{ $sub->id }}">
                                                                                <div class="modal-body">
                                                                                    <div class="mb-3">
                                                                                        <label for="labelForName" class="form-label d-flex">Nama Materi</label>
                                                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Angka" required style="text-transform: capitalize">
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="labelForGambar" class="form-label d-flex">Gambar Materi</label>
                                                                                        <input type="file" name="gambar" class="form-control" id="gambar formFile" accept="image/png, image/jpeg, image/jpg, image/gif, image/svg" required style="text-transform: capitalize">
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
                                                        </div>
                                                        <div class="card card-body mb-4 overflow-auto">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Materi</th>
                                                                        <th scope="col">Gambar</th>
                                                                        <th scope="col">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($materinya as $materi)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->index+1 }}</th>
                                                                        <td>{{ $materi->name }}</td>
                                                                        <td><img src="{{ asset('storage/img/materi') . '/' . $materi->gambar }}" class="gambar-materi" alt="Gambar {{ $materi->name }}"></td>
                                                                        <td>
                                                                            <form action="{{ url('/admin/materi', $materi->name ) }}" method="POST" class="ms-auto">
                                                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editMateri{{ $materi->id }}"><i class="fa fa-pencil-alt"></i> Ubah</button>
                                                                                @method('delete')
                                                                                @csrf
                                                                                <button class="btn btn-sm btn-danger mt-2 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0" type="submit"><i class="fa fa-trash"></i> Hapus</button>
                                                                            </form>
                                                                        </td>
                                                                        <!-- Modal Edit Materi -->
                                                                        <div class="modal fade" id="editMateri{{ $materi->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMateri{{ $materi->id }}Label" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="editMateri{{ $materi->id }}Label">Edit Materi: {{ $materi->name }}</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form method="POST" action="{{ url('/admin/materi') . '/' . $materi->id }}" enctype="multipart/form-data">
                                                                                        @method('PUT')
                                                                                        @csrf
                                                                                        <div class="modal-body">
                                                                                            <div class="mb-3">
                                                                                                <label for="labelForName" class="form-label d-flex">Nama Materi</label>
                                                                                                <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: Angka" required style="text-transform: capitalize" value="{{ $materi->name }}">
                                                                                            </div>
                                                                                            <div class="form-floating mb-3">
                                                                                                <select class="form-select" id="subID" name="subID" aria-label="Sub Category label select">
                                                                                                    <option value="{{ $sub->id }}" selected>{{ $sub->name }}</option>
                                                                                                    <option disabled>--- Pilih Kategori Lainnya ---</option>
                                                                                                    @foreach($submaterinya as $sub)
                                                                                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <label for="floatingSelect">Sub Kategori</label>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="labelForGambar" class="form-label d-flex">Gambar Materi</label>
                                                                                                <input type="file" name="gambar" class="form-control" id="gambar formFile" accept="image/png, image/jpeg, image/jpg, image/gif, image/svg" style="text-transform: capitalize">
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
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @else
                        <h5 class="text-center">--- Tidak ada kategori ---</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection