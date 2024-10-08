<!DOCTYPE html>
<html lang="en">
{{-- lang="{{ str_replace('_', '-', app()->getLocale()) }}" --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="LuxChill Ecommerce" />
    <meta name="description" content="Website Ecommerce by LuxChill">
    <meta name="author" content="LuxChill">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css all --}}
    @include('client.layouts.partials.css')
    {{-- css local --}}
    @yield('style')

    <title>@yield('title')</title>
</head>

<body>

    <div class="page-wrapper">
        <div class="top-notice bg-primary text-white">
            @include('client.layouts.components.top-notice')
        </div>

        <header class="header">
            <div class="header-top">
                @include('client.layouts.partials.header-top')
            </div>

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                @include('client.layouts.partials.header-middle')
            </div>

            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                @include('client.layouts.partials.header-bottom')
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="footer bg-dark">
            @include('client.layouts.partials.footer')
        </footer>
    </div>

    {{-- loading effect --}}
    @include('client.layouts.components.loading-overlay')

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    @include('client.layouts.components.mobile-menu-container')
    <!-- End .mobile-menu-container -->

    @include('client.layouts.components.mobile-sticky-navbar')

    {{-- alert--}}

    @php

    $showNewLetter = false;

    @endphp

    @if($showNewLetter)
    @include('client.layouts.components.newsletter-popup')
    @endif
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button">
        <i class="icon-angle-up"></i>
    </a>

    {{-- script global --}}
    @include('client.layouts.partials.script')
    {{-- script local --}}
    @yield('script')
</body>

</html>
