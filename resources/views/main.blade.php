<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert App</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- @include('layout.navbar') --}}
    @include('layout.hero-screen')
    @include('background')
    {{-- @include('form-converter.converter') --}}

    <script src="{{ asset('/js/navbar.js') }}"></script>
</body>

</html>
