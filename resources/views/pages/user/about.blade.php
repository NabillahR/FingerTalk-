@extends('layouts.landing.master')

@section('title')
About
@endsection

@section('content')
<div class="container mb-4 mt-4">
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 kiri-about">
            <img src="{{ asset('img/About-pic.png') }}" class="img-fluid rounded img-about-left" alt="About Image">
            <h5 class="mt-3 title-about-page">About</h5>
            <h3 class="sub-title-about-page">FingerTalk!</h3>
            <p class="mt-4 paragraf-about-page">FingerTalk! merupakan alat ajar digital Bahasa Isyarat Indonesia(BISINDO) yang berfokus pada Bahasa Isyarat Yogyakarta.<br /><br />
                Mari berkomunikasi tanpa hambatan! Di Indonesia terdapat lebih dari 2.500.000 tuli dan BISINDO adalah bentuk komunikasi yang paling efektif serta tidak terbatas hanya untuk Tuli tetapi juga untuk semua orang. Kenali dan lestarikan Bahasa Isyarat Indoenesia (BISINDO) bersama FingerTalk!</p>
        </div>
       
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center kanan-about">
            <img src="{{ asset('img/About-pic.png') }}" class="img-fluid rounded mx-auto d-block img-about-right" alt="Gambar ">
            <h5 class="explore-about">
                Explore with us!
            </h5>
            <div class="row all-img-explore mt-3">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <img src="{{ asset('img/logoPusbisindo.png') }}" alt="Pusat Bahasa Isyarat Indonesia (PUBISINDO) logo" class="img-explore">
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <img src="{{ asset('img/logoUII.png') }}" alt="Universitas Islam Indonesia (UII) logo" class="img-explore">
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection