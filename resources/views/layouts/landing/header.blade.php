<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fingertalk | @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="{{ asset('css/landingPage.css') }}">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
        @yield('css')
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/Main%20Logo.png') }}" alt="Fingertalk" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-left">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Materi
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="{{ url('/materi') . '/' . $category->name }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                    </ul>
                    
                    <div class="align-items-center navbar-right">
                        <a class="faq" href="{{ url('/faq') }}">
                            FAQ
                        </a>
                    </div>
                </div>
            </div>
        </nav>