@extends('layouts.landing.master')

@section('title')
Materi
@endsection

@section('content')
<div class="container faqs">
    <h5 class="text-center mt-5">FAQs</h5>
    <h3 class="text-center">Pertanyaan yang sering diajukan</h3>
    <p class="text-center">Apapun yang harus anda ketahui terkait Bahasa Isyarat Indonesia (BISINDO)!</p>
    <div class="row mt-5">
        @foreach($faqs as $faq)
            @if(($loop->index+1) % 2 != 0)
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 faqs-content">
                    <div><i class="{{ $faq->icon }}"></i></div>
                    <h5 class="mt-5">{{ $faq->question }}</h5>
                    <p class="mt-4">{{ $faq->answer }}</p>
                </div>
            @else
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 faqs-content faqs-right-content">
                <div><i class="{{ $faq->icon }}"></i></div>
                    <h5 class="mt-5">{{ $faq->question }}</h5>
                    <p class="mt-4">{{ $faq->answer }}</p>
                </div>
            @endif
        @endforeach
    </div>
    <div class="mt-5 mb-3">
        <div class="row another-question">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h4>Masih punya pertanyaan lainnya?</h4>
                <p>Tidak mendapat jawaban dari pertanyaanmu? Kontak tim kami untuk informasi lebih lanjut!</p>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 text-end">
                <a href="https://api.whatsapp.com/message/F6ZDXVKVANBDD1?autoload=1&app_absent=0" class="btn">Get in Touch</a>
            </div>
        </div>
    </div>
</div>
@endsection