@extends('layouts.landing.master')

@section('title')
Home
@endsection

@section('content')
    <!-- Jumbotron -->
    <div class="jumbotron">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex flex-column justify-content-center kiri-jumbotron">
                <p class="col-md-8 fs-4">Get to know about Bahasa Isyarat Indonesia (BISINDO) DI. Yogyakarta</p>
                <hr>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-end kanan-jumbotron">
                <img src="{{ asset('img/jumbotron.png') }}" alt="Gambar Sosialisasi Jumbotron" class="img-fluid ">
            </div>
        </div>
    </div>
    
    <!-- About -->
    <div class="about">
        <h2 class="text-center">About</h2>
        <hr>
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8 col-sm-12 col-xs-12 d-flex flex-column kiri-about">
                <p class="col-md-8 fs-4">Bahasa Isyarat Indonesia (BISINDO) dibentuk dari tahun 1960 oleh almarhum Bapak Siregar dan dilanjutkan oleh sebuah organisasi Tuli, Gerakan untuk Kesejahteraan Tuna Rungu Indonesia (GERKATIN) dan kini dikoordinasikan oleh Pusat Bahasa Isyarat Indonesia (Pusbisindo). Pusbisindo ini bertujuan untuk memperjuangkan literasi kaum Tuli dalam Bahasa Indonesia melalui BISINDO. Sebagai langkah awal untuk menuju kesetaraan, pada  tahun 2007, GERKATIN bekerja sama dengan The Center for Sign Linguistics and Deaf Studies di bawah The Chinese University of Hong Kong. Sampai sekarang, usahapun dapat menghasilkan beberapa penelitian termasuk kamus dan buku pedoman khusus Jakarta dan Yogyakarta tingkat satu dan dua. Dengan adanya kamus dan buku pedoman tersebut, situasi komunitas Tuli di Jakarta dan Yogyakarta sangat berkembang karena penelitian dan pelatihan tersebut memberi kepercayaan diri dan sumber kekuatan bagi komunitas Tuli sehingga dapat berdiri sendiri dan bangga terhadap bahasanya sendiri.</p>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center d-flex flex-column justify-content-center kanan-about">
                <img src="{{ asset('img/about.png') }}" alt="Gambar Sosialisasi Jumbotron" class="img-fluid">
            </div>
        </div>
    </div>
    
    <!-- Manfaat -->
    <div class="manfaat">
        <h2 class="text-center">Manfaat</h2>
        <hr>
        <div class="container-fluid">
            <div class="row manfaat-row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card card-manfaat text-center">
                        <div class="card-header-manfaat">
                            <img src="{{ asset('img/people.png') }}" class="card-img-top manfaat-img" alt="Memperkaya diri icon">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title card-title-manfaat">Memperkaya Ekspresi</h5>
                            <p class="card-text card-text-manfaat">BISINDO adalah komunikasi visual, tentu saja ekspresi berperan besar dalam menghidupkan suasana percakapan. Dengan mempelajari BISINDO dapat melatih dan memperkaya ekspresi Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card card-manfaat text-center">
                        <div class="card-header-manfaat">
                            <img src="{{ asset('img/no_brain.png') }}" class="card-img-top manfaat-img" alt="Otak Kiri-Kanan Seimbang icon">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title card-title-manfaat">Otak Kiri-Kanan Seimbang</h5>
                            <p class="card-text card-text-manfaat">Bahasa Isyarat dapat membantu keseimbangan perkembangan otak kiri dan kanan serta meningkatkan kecerdasan!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="card card-manfaat text-center">
                        <div class="card-header-manfaat">
                            <img src="{{ asset('img/discus.png') }}" class="card-img-top manfaat-img" alt="Jaringan Lebih Luas icon">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title card-title-manfaat">Jaringan Lebih Luas</h5>
                            <p class="card-text card-text-manfaat">Anda akan lebih mudah terhubung dengan komunitas Tuli dan mempunyai banyak teman-teman Tuli. Selain itu, Anda berkesempatan menjadi Juru Bahasa Isyarat (JBI).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection