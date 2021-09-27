<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mon site</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="container mx-auto">
    @include('assets.navbar')
    <div class="container mx-auto p-5 bg-pink-50">
    @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>