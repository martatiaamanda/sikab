<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ $title }} - Sistem Informasi Kelurahan Bakung</title>

    <x-metas-x-demo />
</head>

<body class="position-relative min-vh-100 "
    style="background: linear-gradient(34deg, rgba(136,206,232,0.1558998599439776) 13%, rgba(0,212,255,1) 100%);">
    @if (session('success') || session('error'))
        <x-toaster type="{{ session('success') ? 'success' : 'error' }}" :message="session('success') ?? session('error')" />
    @endif

    {{-- <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-85 rounded rounded-pill shadow-none my-3  bg-gradient-faded-info mt-4 "
        style="left: 50%; transform: translateX(-50%);">
        <div class="container text-center ">
            <p class="navbar-brand font-weight-bolder ms-lg-0 ms-3 m-0 text-white w-100  ">
                Sistem Informasi Kelurahan Bakung
            </p>
        </div>
    </nav> --}}


    <main class=" main-content  mt-0">
        {{ $slot }}
    </main>

    <x-scripts-x-demo />

    @if (isset($scripts))
        {{ $scripts }}
    @endif
</body>

</html>
