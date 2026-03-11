<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />
    <title>Document</title>
</head>

<body>

    <span class="loads" id="loads"></span>
    @if (!in_array($page, ['login', 'register']))
        @include('components.aside')
        @include('components.nav')
    @endif

    @if ($page == 'home')
        @include('components.tools')
        @include('components.header')
        @include('components.card')
        @include('components.lastMaterial')
        @include('components.progres')
        @include('components.otherMaterial')
        @include('components.history')
    @elseif($page == 'material')
        @include('components.showMaterial')
    @elseif($page == 'admin')
        @include('components.adminPage')
    @elseif($page == 'login')
        @include('auth.login')
    @elseif($page == 'register')
        @include('auth.register')
    @endif

    @if (!in_array($page, ['login', 'register']))
        <script src="{{ asset('src/js/aside.js') }}"></script>
    @endif
    <script src="{{ asset('src/js/showPass.js') }}"></script>
    <script src="{{ asset('src/js/loads.js') }}"></script>
</body>

</html>
