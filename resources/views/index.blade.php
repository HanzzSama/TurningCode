<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('src/css/adminPage.css') }}">
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}">

    <title>TurningCode</title>
</head>

<body>
    @if (session('success'))
        <div class="container-alert alert-close">
            <div class="alert alert-success">
                <h4>message : {{ session('success') }}</h4>
            </div>
        </div>
    @endif
    @if (session('info'))
        <div class="container-alert alert-close">
            <div class="alert alert-info">
                <h4>message : {{ session('info') }}</h4>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="container-alert alert-close">
            <div class="alert alert-error">
                <h4>message : {{ session('error') }}</h4>
            </div>
        </div>
    @endif

    {{-- Loader --}}
    @include('components.loads')

    {{-- Navigation --}}
    @if ($page != 'login' && $page != 'register')
        @include('components.aside')
        @include('components.nav')
    @endif


    {{-- AUTH PAGE --}}
    @if ($page == 'login')
        @include('auth.login')
    @elseif ($page == 'register')
        @include('auth.register')


        {{-- HOME PAGE --}}
    @elseif ($page == 'home')
        <div class="page-dashboard">
            @include('components.tools')
            @include('components.header')
            @include('components.card')
            @include('components.otherMateris')
            @include('components.lastMateris')
            @include('components.progres')
        </div>

        <div class="page-history">
            @include('components.history')
        </div>

        <div class="page-account">
            @include('components.account')
        </div>
    @elseif ($page == 'admin')
        <div class="page-admin">
            @include('components.adminPage')
        </div>

        {{-- MATERI PAGE --}}
    @elseif ($page == 'materi')
        @include('components.tools')
        @include('components.showAllMateris')

        {{-- SUB MATERI PAGE --}}
    @elseif ($page == 'submateri')
        @include('components.tools')
        @include('components.showAllSubMateri')
    @endif

    {{-- Bottom space --}}
    <div class="bottom-space"></div>

    {{-- Bottom Navigation --}}
    @if ($page != 'login' && $page != 'register' && $page != 'admin')
        @include('components.navBottom')
    @endif


    {{-- Scripts --}}
    <script src="{{ asset('src/js/adminWarn.js') }}"></script>
    <script src="{{ asset('src/js/aside.js') }}"></script>
    <script src="{{ asset('src/js/navPage.js') }}"></script>
    <script src="{{ asset('src/js/materis.js') }}"></script>
    <script src="{{ asset('src/js/showPass.js') }}"></script>
    <script src="{{ asset('src/js/loads.js') }}"></script>
    <script src="{{ asset('src/js/navBottomToggle.js') }}"></script>

</body>

</html>
