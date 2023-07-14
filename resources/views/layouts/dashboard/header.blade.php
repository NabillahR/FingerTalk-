<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fingertalk | Admin Page</title>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- BOX ICONS CSS-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    @yield('css')
</head>

<body>
    @include('layouts.dashboard.sidebar')

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
        @include('layouts.dashboard.navbar')

        <div class="home-section container overflow-auto">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 overflow-auto nav-pages">
                    <h3 class="p-3 pages">
                        @yield('page')
                    </h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex align-items-center nav-breadcrumb">
                    <nav aria-label="breadcrumb">
                        @yield('breadcrumb')
                    </nav>
                </div>
            </div>