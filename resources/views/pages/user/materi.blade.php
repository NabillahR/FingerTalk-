@extends('layouts.landing.master')

@section('title')
Materi
@endsection

@section('css')
<style>
    .materi-active {
        background-color: #038592 !important;
    }
</style>
@endsection

@section('content')
<div class="container mb-4">
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 overflow-y-auto" style="max-height: 550px">
            <h4 class="title-materi">Kenali Bahasa Isyarat yuk!</h4>
            <hr class="line-materi">
            <div class="container">
                @foreach($subs as $sub)
                <div class="row mt-3" id="sidebarMateri">
                    <hr>
                    <h5 class="sub-materi">{{ $sub->name }}</h5>
                    <hr> 
                    @foreach($materinya as $materi) 
                        @if($materi->id_sub_materi == $sub->id)
                            <a href="{{ url('materi') . '/' . $kategorinya->name . '/' . $materi->name }}" class="col-2 card-teori">
                                {{ $materi->name }}
                            </a>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        @if($gambarnya != null)
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center kanan-jumbotron gambar-teori">
            <img src="{{ asset('storage/img/materi') . '/' . $gambarnya->gambar }}" class="img-fluid border rounded" alt="Gambar {{ $materi->name }}">
        </div>
        @else
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center kanan-jumbotron gambar-teori">
            <img src="{{ asset('img/no-picture.png') }}" class="img-fluid border rounded">
        </div>
        @endif
    </div>
</div>
@endsection

@section("javascript")
<script>
    var header = document.getElementById("sidebarMateri");
    var urlnya = (location.pathname).split("/")[3];
    var tombols = document.getElementsByClassName('card-teori'); // Ganti 'namaKelasTombol' dengan kelas yang sesuai untuk elemen tombol

    // Loop melalui setiap elemen tombol
    for (var i = 0; i < tombols.length; i++) {
        var tombol = tombols[i];

        // Dapatkan href dari tombol
        var href = tombol.getAttribute('href');
        var linknya = href.split("/")[5];

        // Periksa apakah URL saat ini sama dengan href pada tombol
        if (urlnya === linknya) {
            // Tambahkan kelas baru ke elemen tombol
            tombol.classList.add('materi-active'); // Ganti 'namaKelasBaru' dengan kelas baru yang ingin ditambahkan
        }
    }
</script>
@endsection