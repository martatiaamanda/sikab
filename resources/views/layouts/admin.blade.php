<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>{{$title}} - Sistem Informasi Kelurahan Bakung</title>
        <x-metas-x-demo />
    </head>
    <body class="g-sidenav-show  bg-gray-100" style="min-height: 100vh">
        @if ( session('success') || session('error') )
        <x-toaster type="{{session('success') ? 'success' : 'error'}}" :message="session('success') ?? session('error')" />
         @endif
        <x-layouts.sidebar-admin/>



        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg " style="min-height: 100vh" >
            <x-layouts.navbar/>

            {{ $slot }}
        </main>

        <x-scripts-x-demo/>

        @if (isset($scripts))
            {{ $scripts }}
        @endif
    </body>
</html>
